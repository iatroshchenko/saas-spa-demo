<template>
  <div class="row">
    <div v-if="quote" class="offset-md-2 col-md-8 col-xs-12 col-lg-6 offset-lg-3 grid-margin stretch-card">
      <div class="card">

        <div class="card-body">
          <div class="row">
            <div class="col-md-12 mb-3 d-flex align-items-center justify-content-center">
              <div class="quote__company-logo right">
                <img v-if="logo" :src="logo"/>
              </div>
            </div>
          </div>
          <div class="row">

            <div class="col-12 mb-4">
              <div class="row">
                <div class="col-12">
                  <div class="card">

                    <div class="card-body">

                      <terms :quote="quote"></terms>

                      <ValidationObserver ref="agreementForm">
                        <div class="row">
                          <div class="col-md-12">

                            <ValidationProvider
                              name="agreement"
                              :rules="{ required: { allowFalse: false } }"
                              v-slot="{ errors }"
                            >
                              <div class="form-group form-check">
                                <label class="form-check-label">
                                  <input v-model="formData.agreement" type="checkbox"
                                         class="form-check-input">

                                  Do you accept the terms and conditions?
                                  <i class="input-frame bx bx-check"></i>
                                </label>
                              </div>

                              <div v-if="serverErrors.agreement.length" class="serverErrors">
                                <div v-for="error in serverErrors.agreement" class="form-group validation-error">
                                  {{ error }}
                                </div>
                              </div>
                              <div v-else class="form-group validation-error">
                                {{ errors[0] }}
                              </div>
                            </ValidationProvider>

                          </div>
                        </div>

                        <div class="row">
                          <div class="col-md-12">
                            <div class="form-group">
                              <label>Signature</label>
                            </div>
                            <vueSignature
                              class="quote__signature"
                              ref="quote_signature"
                              :w="'100%'"
                              :h="'240px'"
                            >
                            </vueSignature>
                            <a style="cursor:pointer;" class="mt-2" @click="$refs.quote_signature.clear()">Clear</a>

                            <div v-if="serverErrors.quote_signature.length" class="serverErrors">
                              <div v-for="error in serverErrors.quote_signature" class="form-group validation-error">
                                {{ error }}
                              </div>
                            </div>
                          </div>
                        </div>
                      </ValidationObserver>

                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12">
              <div v-if="sendingRequest">
                <Loading></Loading>
              </div>
              <div v-else>
                <a @click="completeOrder" class="btn btn-primary">Complete order</a>
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
  import Loading from "../../loading/Loading";
  import {client} from "../../../axios";
  import router from "../../../router";
  import terms from "../../shared/terms";
  import vueSignature from 'vue-signature';
  import Terms from '../../shared/terms.vue';

  export default {
    name: "ConfirmOrder",
    components: {
      Loading,
      terms,
      vueSignature
    },
    data() {
      return {
        quote: null,
        sendingRequest: null,
        logo: '',

        quoteDataUrl: null,
        quoteConfirmUrl: null,

        formData: {
          agreement: true,
          quote_signature: null
        },

        serverErrors: {
          agreement: [],
          quote_signature: []
        }
      }
    },
    methods: {
      loadQuoteData() {
        client.get(this.quoteDataUrl)
          .then(res => {
            this.quote = res.data.data;
          })
          .catch(err => {
            this.$swal('Error', 'Could not load quote info', 'error')
              .then(() => {
                router.push('/');
              });
          })
      },
      completeOrder() {
        if (this.sendingRequest) return;

        if (this.$refs.quote_signature.isEmpty()) {
          this.serverErrors.quote_signature.push('Signature cannot be empty');
          return;
        }

        this.formData.quote_signature = this.$refs.quote_signature.save('image/svg+xml');

        this.sendingRequest = true;
        client.post(this.quoteConfirmUrl, {
          ...this.formData
        })
          .then(res => {
            this.$swal('Success', 'Your order has been completed', 'success')
              .then(() => {
                router.push('/');
              })
          })
          .catch(error => {
            if (error.response.status === 422) {
              this.$swal('Error', 'Form contains some errors', 'error')
                .then(() => {
                });
            }

            const err = error.response.data.errors;

            Object.keys(this.serverErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.serverErrors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.sendingRequest = false;
          })
      }
    },
    mounted() {
      this.quoteDataUrl = `/api/temporary/confirm-order/${this.$route.params.quote_id}/data?expires=${this.$route.query.quote_data_expires}&signature=${this.$route.query.quote_data_signature}`
      this.quoteConfirmUrl = `/api/temporary/confirm-order/${this.$route.params.quote_id}/confirm?expires=${this.$route.query.confirm_expires}&signature=${this.$route.query.confirm_signature}`;
      this.loadQuoteData();
    }
  }
</script>

<style scoped>

</style>
