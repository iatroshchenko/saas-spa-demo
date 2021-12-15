<template>
  <div class="row">

    <div id="quoteEmailModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
         aria-labelledby="sendContactsModalLabel" aria-hidden="true">
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="forms-sample">
                  <h6 class="card-title">Send Quote Email</h6>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="quote_email_address">Email</label>
                    <input v-model="quoteEmailAddress" type="text" class="form-control" id="quote_email_address"
                           placeholder="Email">
                  </div>

                  <div v-for="error in quoteEmailForm.errors.email" class="form-group validation-error">
                    {{ error }}
                  </div>

                </div>

                <div class="mt-3">
                  <Loading v-if="sendingEmail"></Loading>
                  <a v-else @click="sendEmailToAddressQuoteRequest" class="btn btn-primary">
                    Send Quote Email
                  </a>
                  <a v-if="!sendingEmail" @click="onEmailModalHide" data-dismiss="modal"
                     class="btn btn-light">Cancel</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="quote" class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title mb-0">Preview Order</h6>

            <div class="quote-controls">
              <button type="button" class="btn btn-success" data-toggle="modal" data-target="#pay_model"
                      v-if="quote.paid === false">Pay ${{ format(quote.transport.price, ' ') }}
              </button>
              <!-- Modal -->
              <div class="modal fade" id="pay_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                   ref="pay-modal" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Account Information</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class='form-group'>
                        <label for='card_number'>Card Number</label>
                        <the-mask
                          v-model="formData.card_number"
                          placeholder="Card Number"
                          :mask="['#### #### #### ####']"
                          id="card_number"
                          type="text"
                          class="form-control"
                        ></the-mask>
                      </div>

                      <div class='form-row'>
                        <div class='form-group col-4'>
                          <label for='card_month'>Exp Month</label>
                          <the-mask
                            v-model="formData.card_month"
                            placeholder="Exp Month"
                            :mask="['##','#']"
                            id="card_month"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>
                        <div class='form-group col-4'>
                          <label for='card_year'>Exp Year</label>
                          <the-mask
                            placeholder="Exp Year"
                            v-model="formData.card_year"
                            :mask="['####']"
                            id="card_year"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>
                        <div class='form-group col-4'>
                          <label for='card_ccv'>CCV</label>
                          <the-mask
                            v-model="formData.card_ccv"
                            placeholder="CCV"
                            :mask="['####','###']"
                            id="card_ccv"
                            type="text"
                            class="form-control"
                          ></the-mask>
                        </div>
                      </div>
                      <div v-for="error in quotePayForm.errors.shipper_id" class="form-group validation-error">
                        {{ error }}
                      </div>
                      <div v-for="error in quotePayForm.errors.card_number" class="form-group validation-error">
                        {{ error }}
                      </div>
                      <div v-for="error in quotePayForm.errors.card_month" class="form-group validation-error">
                        {{ error }}
                      </div>
                      <div v-for="error in quotePayForm.errors.card_year" class="form-group validation-error">
                        {{ error }}
                      </div>
                      <div v-for="error in quotePayForm.errors.card_ccv" class="form-group validation-error">
                        {{ error }}
                      </div>
                      <div class="form-group validation-error">
                        {{ quotePayForm.message }}
                      </div>
                    </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button @click="payOrder" type="button" class="btn btn-primary">Pay</button>
                    </div>
                  </div>
                </div>
              </div>


              <a
                v-if="quote.is_deleted"
                @click="sendRestoreQuoteRequest(quote)"
                class="btn btn-success"
              >Restore</a>
              <a v-else @click="sendDeleteQuoteRequest(quote)" class="btn btn-danger">Delete {{ quote.entity_type.capitalize() }}</a>

              <a v-if="quote.is_not_deleted" @click="editQuote" class="btn btn-primary">Edit {{ quote.entity_type.capitalize() }}</a>

              <!-- To toggle modal uncomment -->
              <!-- <a @click="emailQuoteToClient" data-toggle="modal" data-target="#quoteEmailModal" class="btn btn-secondary">Send Email</a>-->
              <a v-if="quote.is_not_deleted" @click="emailQuoteToClient" class="btn btn-secondary">Send Email</a>

              <div v-if="quote.converts_to_order" @click="convertQuoteToOrder" class="btn btn-success">Convert to Order
              </div>
            </div>
          </div>

          <div v-if="quote && stepStatuses.length">
            <ol :class="`steps steps-count-${stepStatuses.length}`" id="quoteProgressBar">
              <li
                v-for="step in stepStatuses"
                :class="step.value === quote.status_name ? 'active' : ''"
              >
                <span>
                  {{ step.value }}
                </span>
              </li>
            </ol>
          </div>

          <div class="row">
            <div class="col-12 col-xl-8">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-user'></i>
                        </div>
                        <h6>Shipper</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th class="shipper-field-th">Field</th>
                            <th class="shipper-value-th">Value</th>
                          </tr>
                          </thead>
                          <tbody>

                          <tr>
                            <td class="py-1">First Name</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.first_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Last Name</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.last_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Email</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.email }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Phone</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.phone ? '+1' + quote.shipper.phone : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Type</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.type_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Company</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.company }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Address 1</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.address_1 }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Address 2</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.address_2 }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Zip</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.zip }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">City</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.city }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">State</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.state }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">State Name</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.state_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Phone 2</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.phone_2 ? '+1' + quote.shipper.phone_2 : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Mobile</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.mobile ? '+1' + quote.shipper.mobile : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Notes From Shipper</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ quote.shipper.notes_from_shipper }}
                              </div>
                            </td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-xl-4">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-file'></i>
                        </div>
                        <h6>Quote</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Field</th>
                            <th>Value</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td class="py-1">ID</td>
                            <td>{{ quote.id }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Status</td>
                            <td>{{ quote.status_name }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Client</td>
                            <td>{{ quote.client.name }}, {{ quote.client.company }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-truck'></i>
                        </div>
                        <h6>Transport</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Field</th>
                            <th>Value</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                            <td class="py-1">Carrier Type</td>
                            <td>{{ quote.transport.carrier_type_name }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Available</td>
                            <td>On {{ quote.transport.available_date }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Delivery</td>
                            <td>{{ quote.transport.delivery_accuracy_name }} {{ quote.transport.delivery_date }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Distance</td>
                            <td>{{ format(quote.transport.distance, ' ') }} ml</td>
                          </tr>

                          <tr>
                            <td class="py-1">Price</td>
                            <td>$ {{ format(quote.transport.price, ' ') }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Deposit</td>
                            <td>$ {{ quote.transport.deposit ? format(quote.transport.deposit) : 0 }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-user'></i>
                        </div>
                        <h6>Activity</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped" v-if="quote.activities && quote.activities.length">
                          <thead>
                          <tr>
                            <th>
                              Date
                            </th>
                            <th>
                              Description
                            </th>
                            <th>
                              By
                            </th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr :key="key" v-for="(activity, key) in quote.activities">
                            <td>
                              {{ activity.when }}
                            </td>
                            <td>
                              {{ activity.description }}
                            </td>
                            <td>
                              {{ activity.causer ? activity.causer.label : 'System' }}
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-map'></i>
                        </div>
                        <h6>Origin</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Field</th>
                            <th>Value</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr v-if="!ignoredColumns.origin.includes(key)" v-for="key in Object.keys(quote.origin) ">
                            <td class="py-1">{{ snakeToHuman(key) }}</td>
                            <td>{{ quote.origin[key] }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div v-if="quote.origin && !(quote.origin.lat && quote.origin.lng)">
                        Could not get coordinates for that zip
                      </div>
                      <div v-if="quote.destination && (quote.destination.lat && quote.destination.lng)" id="origin-map"
                           class="origin-map"></div>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-md-6">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-map'></i>
                        </div>
                        <h6>Destination</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Field</th>
                            <th>Value</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr v-if="!ignoredColumns.destination.includes(key)"
                              v-for="key in Object.keys(quote.destination) ">
                            <td class="py-1">{{ snakeToHuman(key) }}</td>
                            <td>{{ quote.destination[key] }}</td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div v-if="quote.destination && !(quote.destination.lat && quote.destination.lng)">
                        Could not get coordinates for that zip
                      </div>
                      <div v-if="quote.destination && (quote.destination.lat && quote.destination.lng)"
                           id="destination-map" class="destination-map"></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bxs-car'></i>
                        </div>
                        <h6>Vehicles</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Year</th>
                            <th>Make</th>
                            <th>Model</th>
                            <th>Vin</th>
                            <th>Running</th>
                            <th>Size</th>
                          </tr>
                          </thead>
                          <tbody>

                          <tr>
                            <td class="py-1">{{ quote.vehicle.year }}</td>
                            <td class="py-1">{{ quote.vehicle.make }}</td>
                            <td class="py-1">{{ quote.vehicle.model }}</td>
                            <td class="py-1">{{ quote.vehicle.vin }}</td>
                            <td class="py-1">{{ quote.vehicle.is_running ? 'Running' : 'Immovable' }}</td>
                            <td class="py-1">{{ quote.vehicle.size_name }}</td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12" v-if="quote.status_name === 'Paid'">
              <div class="row">
                <div class="col-12 grid-margin stretch-card">
                  <div class="card">
                    <div class="card-body">
                      <div class="card-title mb-0 d-flex align-items-center">
                        <div class="card-title-icon mr-2">
                          <i class='bx bx-credit-card'></i>
                        </div>
                        <h6>Payment History</h6>
                      </div>

                      <div class="table-responsive">
                        <table class="table table-striped">
                          <thead>
                          <tr>
                            <th>Shipper</th>
                            <th>Receipt URL</th>
                            <th>Status</th>
                            <th>Created Date</th>
                          </tr>
                          </thead>
                          <tbody>

                          <tr>
                            <td class="py-1">{{ quote.payment.shipper_id }}</td>
                            <td class="py-1"><a v-bind:href="quote.payment.receipt_url">View Invoice</a></td>
                            <td class="py-1">{{ quote.payment.status }}</td>
                            <td class="py-1">{{ quote.payment.created_at }}</td>
                          </tr>

                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>


    <div class="m-5" v-else>
      <Loading></Loading>
    </div>


  </div>
</template>

<script>
  import {client} from "../../../axios"
  import Loading from "../../loading/Loading";
  import router from "../../../router";
  import {mapActions, mapGetters, mapState} from "vuex";
  import {
    ACTION_QUOTE_DELETE,
    ACTION_QUOTE_EMAIL,
    ACTION_QUOTE_RESTORE,
    ACTION_QUOTE_TO_ORDER
  } from "../../../store/modules/quote/actions";
  import format from "../../../help/number-formatter";

  export default {
    name: "ReviewQuote",
    data() {
      return {
        formData: {
          card_number: null,
          card_month: null,
          card_year: null,
          card_ccv: null,
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.$route.params.quote_id,
        },
        quote: null,
        stepStatuses: [],

        quoteEmailPopup: false,
        quoteEmailAddress: '',
        quoteEmailForm: {
          errors: {
            email: []
          }
        },
        quotePayForm: {
          errors: {
            card_number: [],
            card_month: [],
            card_year: [],
            card_ccv: [],
            shipper_id: []
          },
          message: null,
        },
        client,
        loading: false,
        loaded: false,
        ignoredColumns: {
          origin: ['lat', 'lng', 'address_string'],
          destination: ['lat', 'lng', 'address_string']
        },
        sendingEmail: false, // flag - send email loading
        sendingPayInfo: false, // flag - send pay loading

      }
    },
    components: {
      Loading
    },
    methods: {
      ...mapActions({
        deleteQuote: 'quote/' + ACTION_QUOTE_DELETE,
        restoreQuote: 'quote/' + ACTION_QUOTE_RESTORE,
        emailQuote: 'quote/' + ACTION_QUOTE_EMAIL,
        quoteToOrder: 'quote/' + ACTION_QUOTE_TO_ORDER
      }),
      format,
      payOrder() {
        Object.keys(this.quotePayForm.errors).forEach(key => {
          this.quotePayForm.errors[key] = [];
        });

        client.post('/api/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.quote.id + '/pay', {
          ...this.formData
        })

          .then(res => {
            $('#pay_model').modal('hide');
            this.$swal('Success', 'Order has been successfully paid!', 'success')
              .then(() => {
                router.push(
                  {
                    name: 'shipper.orders'
                  }
                );
              });
          }).catch(error => {

          const err = error.response.data.errors;

          const card_err = error.response.data.message;
          if (err) {
            Object.keys(this.quotePayForm.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.quotePayForm.errors[key].push(item);
                });
              }
            });
          } else {
            this.quotePayForm.message = card_err;
          }
        })
          .finally(() => {
            this.sendingPayInfo = false;
          });
      },

      convertQuoteToOrder() {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.quote.id
        };

        const payload = {
          routeParams,
          quote: this.quote
        }

        this.sendingEmail = true;
        this.$swal.fire({
          title: 'Converting Quote to Order',
          text: 'Your Quote is now being converted to Order',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        this.quoteToOrder(payload)
          .then(res => {
            if (res.data.redirect) {
              return router.push(res.data.redirect);
            }

            this.$swal('Success', 'This quote has been successfully converted to Order!', 'success')
              .then(() => {
                router.push(
                  {
                    name: 'shipper.loads.review',
                    params: {
                      shipper_id: this.$route.params.shipper_id,
                      load_id: res.data.data.id
                    }
                  }
                )
              });
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })

      },

      sendRestoreQuoteRequest() {
        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.quote.id
        };

        this.restoreQuote(routeParams)
          .then(res => {
            this.$swal('Success', 'This quote has been successfully restored', 'success')
              .then(() => {
                if (res.data.type === 'quote') {
                  router.push(
                    {
                      name: 'shipper.quotes'
                    }
                  );
                }

                if (res.data.type === 'order') {
                  router.push(
                    {
                      name: 'shipper.orders'
                    }
                  );
                }
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not restore this quote', 'error');
          })
      },

      sendDeleteQuoteRequest() {

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.quote.id
        };

        this.deleteQuote(routeParams)
          .then(res => {
            this.$swal('Success', 'This quote has been successfully deleted', 'success')
              .then(() => {
                router.push(
                  {
                    name: 'shipper.quotes'
                  }
                );
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete this quote', 'error');
          })
      },

      /* Email block */
      emailQuoteToClient() {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.quote.id
        };

        const payload = {
          routeParams,
          quote: this.quote
        }

        this.sendingEmail = true;
        this.$swal.fire({
          title: 'Sending email',
          text: 'Your email is now being sent',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        this.emailQuote(payload)
          .then(res => {
            this.$swal('Success', 'Email has been successfully sent!', 'success');
            this.loadQuoteInfo();
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })
      },

      emailQuoteToAddress() {
        this.quoteEmailAddress = this.quote.shipper.email;
        this.onEmailModalShow();
      },

      sendEmailToAddressQuoteRequest() {
        Object.keys(this.quoteEmailForm.errors).forEach(key => {
          this.quoteEmailForm.errors[key] = [];
        });
        this.sendingEmail = true;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          quote_id: this.quote.id
        };

        const payload = {
          routeParams,
          quote: this.quote
        }

        this.emailQuote(payload)
          .then(res => {
            this.$swal('Success', 'Email has been successfully sent!', 'success');
            $('#quoteEmailModal').modal('hide');
          })
          .catch(error => {

            const err = error.response.data.errors;

            Object.keys(this.quoteEmailForm.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.quoteEmailForm.errors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.sendingEmail = false;
          });
      },

      onEmailModalShow() {

      },
      onEmailModalHide() {
        this.quoteEmailAddress = this.quote.shipper.email;
      },
      /* Email block end */

      editQuote() {
        router.push({
          name: 'shipper.orders.edit',
          params: {
            shipper_id: this.$route.params.shipper_id,
            quote_id: this.$route.params.quote_id
          }
        });
      },

      initOriginPointMap(google) {
        const myLatLng = {
          lat: this.quote.origin.lat,
          lng: this.quote.origin.lng
        };
        const map = new google.maps.Map(document.getElementById("origin-map"), {
          zoom: 6,
          center: myLatLng,
        });
        new google.maps.Marker({
          position: myLatLng,
          map,
          title: "Origin Point",
        });
      },
      initDestinationPointMap(google) {
        const myLatLng = {
          lat: this.quote.destination.lat,
          lng: this.quote.destination.lng
        };
        const map = new google.maps.Map(document.getElementById("destination-map"), {
          zoom: 6,
          center: myLatLng,
        });
        new google.maps.Marker({
          position: myLatLng,
          map,
          title: "Destination Point",
        });
      },
      snakeToHuman(text) {
        return text.replaceAll('_', ' ').split(' ').map(item => {
          return item[0].toUpperCase() + item.slice(1);
        }).join(' ');
      },
      loadQuoteInfo() {
        return client.get('/api/shipper/' + this.$route.params.shipper_id + '/quotes/' + this.$route.params.quote_id)
          .then(res => {
            this.quote = res.data.data;
          })
          .catch(error => {
            if (error.response.status === 422) {
              router.push('/404');
            } else {
              this.$swal('Error', 'Could not load quote info', 'error');
            }
          })
      },
      loadQuoteStepStatuses() {
        return client.get('/api/quote-progress-statuses-data')
          .then(res => {
            this.stepStatuses = [...res.data.data];
          })
      }
    },
    mounted() {
      const googleApiKey = process.env['MIX_GOOGLE_API_KEY'];

      if (!googleApiKey) {
        throw 'GOOGLE_API_KEY not found! Please setup GOOGLE_API_KEY';
      }

      const {Loader} = require('google-maps');
      const loader = new Loader(googleApiKey);

      this.loadQuoteInfo()
        .then(() => {
          (async () => {
            const google = await loader.load();
            if (this.quote.origin.lat && this.quote.origin.lng) {
              this.initOriginPointMap(google);
            }
            if (this.quote.destination.lat && this.quote.origin.lng) {
              this.initDestinationPointMap(google);
            }
          })();
        });

      this.loadQuoteStepStatuses();
    }
  }
</script>

<style lang="scss">
  .card-title-icon {
    font-size: 24px;
    color: #334152;
  }

  th.shipper-field-th {
    width: 30%;
  }

  .shipper-value {
    &-container {
      min-height: 14px;
    }
  }

  .origin-map {
    height: 300px;
  }

  .destination-map {
    height: 300px;
  }
</style>
