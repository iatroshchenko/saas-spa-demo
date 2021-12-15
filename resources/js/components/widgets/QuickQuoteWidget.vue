<template>
  <div class="container-fluid widget-container">
    <div class="quick-quote widget card">
      <div class="quick-quote__container">
        <FormulateForm
          :form-errors="errors"
          @submit="submitHandler"
        >
          <div v-if="step === STEP_FILL" class="row step step__fill">
            <div class="col-md-12">
              <div class="row">
                <div class="col-md-4">
                  <FormulateInput
                    id="origin"
                    ref="origin"
                    key="origin"
                    placeholder="Origin ZIP"
                    name="origin"
                    validation="required|number|min:5,length|max:5,length|notEqual:destination"
                  />
                </div>

                <div class="col-md-4">
                  <FormulateInput
                    placeholder="Destination ZIP"
                    ref="destination"
                    id="destination"
                    key="destination"
                    name="destination"
                    validation="required|number|min:5,length|max:5,length|notEqual:origin"
                  />
                </div>

                <div class="col-md-4">
                  <FormulateInput
                    type="checkbox"
                    id="not_operable"
                    key="not_operable"
                    name="not_operable"
                    label="Vehicle Not Operable"
                    class="quick-quote__checkbox"
                  />
                </div>
              </div>
            </div>
          </div>

          <div class="row step" v-if="step !== STEP_FILL">
            <div class="col-md-12">
              <table class="table">
                <thead>
                <th>Description</th>
                <th>Amount</th>
                </thead>
                <tbody>
                <tr>
                  <td>Vehicle Delivery from {{ steps[STEP_FILL].data.origin }} to {{ steps[STEP_FILL].data.destination
                    }} ({{ steps[STEP_FILL].data.distance }} miles)
                  </td>
                  <td>${{ total.toLocaleString() }}</td>
                </tr>
                </tbody>
              </table>
            </div>
          </div>

          <div v-if="step === STEP_SUMMARY" class="row mt-5 step step__summary">
            <div class="col-md-12 mt-6">
              <div class="row">
                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Vehicle Make"
                    name="vehicle_make"
                    id="vehicle_make"
                    key="vehicle_make"
                    validation="required"
                  />
                </div>

                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Vehicle Model"
                    name="vehicle_model"
                    id="vehicle_model"
                    key="vehicle_model"
                    validation="required"
                  />
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Vehicle Year"
                    name="vehicle_year"
                    id="vehicle_year"
                    key="vehicle_year"
                    :validation="`required|date:YYYY|max:${currentDate.getFullYear()}|min:1960`"
                  />
                </div>

                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Pickup Date"
                    name="pickup_date"
                    id="pickup_date"
                    key="pickup_date"
                    :validation="`required|after:${dayBefore.toISOString().split('T')[0]}`"
                    :defaultValue="pickupDate"
                    type="date"
                    v-model="pickupDate"
                  />
                </div>
              </div>
            </div>

          </div>

          <div v-if="step === STEP_FINAL" class="row mt-5 step step__summary">
            <div class="col-md-12 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <FormulateInput
                    placeholder="First Name"
                    name="first_name"
                    id="first_name"
                    key="first_name"
                    validation="required"
                  />
                </div>

                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Last Name"
                    name="last_name"
                    id="last_name"
                    key="last_name"
                    validation="required"
                  />
                </div>
              </div>
            </div>

            <div class="col-md-12 mt-4">
              <div class="row">
                <div class="col-md-6">
                  <FormulateInput
                    placeholder="Email Address"
                    name="email"
                    id="email"
                    key="email"
                    validation="required|email"
                  />
                </div>

                <div class="col-md-6">
                  <the-mask
                    placeholder="Phone Number"
                    mask="+1 (###) ###-####"
                    id="phone"
                    key="phone"
                    type="text"
                    class="form-control phone-number-wrapper"
                    v-model="phone"
                  ></the-mask>
                </div>
              </div>
            </div>

          </div>

          <div v-if="step === STEP_THANK_YOU" class="row mt-5 step step__thanks">
            <div class="offset-md-2 col-md-8">
              <p><i class='sidebar-icon bx bx-check-circle'></i>&nbsp;Thank you! Please follow the instructions we sent via email.</p>
            </div>
          </div>

          <div v-if="step !== STEP_THANK_YOU" class="row mt-4">
            <div class="col-md-12">
              <FormulateInput
                type="submit"
                :label="steps[step].button"
                class="quick-quote__submit"
                :disabled="loading"
              >
                <span v-if="loading">Loading</span>
              </FormulateInput>
            </div>
          </div>

          <div class="row mt-2">
            <div class="col-md-6">
              <FormulateErrors/>
            </div>
          </div>

        </FormulateForm>

      </div>
    </div>
  </div>
</template>

<script>
  import {client} from "../../axios"

  const STEP_FILL = 1;
  const STEP_SUMMARY = 2;
  const STEP_FINAL = 3;
  const STEP_THANK_YOU = 4;

  export default {
    mounted() {
      client.defaults.headers.common['Authorization'] = `Bearer ${this.$route.query.pub}`;
      this.getBusinessSettings();
    },
    methods: {
      submitHandler: function (data) {
        const {step, steps} = this;

        this.errors = [];
        steps[step].data = data;

        switch (step) {
          case STEP_FILL:
            this.getDistanceBetween(data.origin, data.destination);
            break;
          case STEP_FINAL:
            this.createQuote(data)
            break;
          default:
            this.switchStep(steps[step].next);
        }
      },
      switchStep: function (step) {
        this.step = step;
      },
      getBusinessSettings: function () {
        client.get(
          '/api/v1/business'
        )
          .then(response => this.businessSettings = response.data);
      },
      getDistanceBetween: function (origin, destination) {
        this.loading = true;

        client.get(
          '/api/v1/external/distance-between',
          {
            params: {
              origin,
              destination
            },
          }
        )
          .then(response => {
            const {step, steps} = this;
            const currentStep = steps[step];

            currentStep.data.distance = response.data;

            this.total = response.data * this.businessSettings.price_per_mile;

            this.switchStep(currentStep.next);

            this.loading = false;
          })
          .catch(error => {
            error.response && this.errors.push(error.response.data.message);

            this.loading = false;
          });
      },
      createQuote: function (formData) {
        this.loading = true;
        const data = this.collectData();
        const {steps, step} = this;

        client.post('/api/v1/quote/draft', data)
          .then((response) => {

            this.switchStep(steps[step].next)
          })
          .catch(error => {
            const errors = error.response.data.errors;
            Object.keys(errors).forEach(item => {
              this.errors = this.errors.concat(errors[item]);
            })
          })
          .finally(() => {
            this.loading = false;
          });
      },
      collectData: function () {
        const {steps} = this

        let data = {};

        Object.keys(steps).forEach((index) => {
          data = {
            ...data,
            ...steps[index].data
          };
        })

        data = {
          ...data,
          total: this.total,
          pickup_date: this.pickupDate,
          phone: this.phone
        };

        return data;
      },
    },
    data() {
      const currentDate = new Date();

      const dayBefore = new Date();
      dayBefore.setDate(dayBefore.getDate() - 1);

      return {
        errors: [],
        loading: false,
        businessSettings: {},

        total: 0,
        pickupDate: currentDate.toISOString().split('T')[0],
        phone: '',

        currentDate,
        dayBefore,

        STEP_FILL,
        STEP_SUMMARY,
        STEP_FINAL,
        STEP_THANK_YOU,

        step: STEP_FILL,

        steps: {
          [STEP_FILL]: {
            next: STEP_SUMMARY,
            button: 'Get quote now',
            data: {}
          },
          [STEP_SUMMARY]: {
            next: STEP_FINAL,
            button: 'Continue',
            data: {}
          },
          [STEP_FINAL]: {
            next: STEP_THANK_YOU,
            button: 'Continue',
            data: {}
          },
          [STEP_THANK_YOU]: {
            next: `/shipper/${this.businessSettings && this.businessSettings.id}/quotes/create`,
            button: false
          }
        },
      }
    }
  }
</script>

<style lang="scss" scoped>
  body {
    background: transparent;
  }

  label {
    margin: 0;
  }

  .page-content {
    /*padding: 0 !important;*/
    /*flex-grow: 0 !important;*/
  }

  .page-wrapper {
    background: transparent !important;
  }

  .formulate-input[data-classification=box] .formulate-input-label--after {
    color: #cecece;
  }

  .formulate-input[data-classification=text] input {
    background: #fff;
  }

  .formulate-input .formulate-input-element {
    max-width: none;
  }

  .formulate-input-element--date {
    input {
      padding: 0.6em !important;
    }
  }
</style>

<style lang="scss" scoped>
  .widget-container {
    padding: 50px;
    height: 400px;

    display: flex;
    align-items: center;
  }

  .quick-quote {

    &__container {
      .step {

        &__fill {

        }

        &__summary {
        }

        &__thanks {
          display: flex;
          color: green;

          &>div {
            &>p {
              display: flex;
              color: green;
            }
          }
        }
      }
    }

    &.widget {
      width: 700px;
      padding: 20px;
    }

    &__checkbox {
      padding: 8px 0;
    }

    &__submit {

    }
  }

  .operable-checkbox {
    padding: 12px;
  }

  .phone-number-wrapper {
    border: 1px solid #cecece;
    border-radius: 0.3em;
    padding: 0.75em;

    &::placeholder {
      color: rgb(170, 170, 170);
    }
  }
</style>
