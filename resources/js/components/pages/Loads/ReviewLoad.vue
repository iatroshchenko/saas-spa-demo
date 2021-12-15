<template>
  <div class="row">

    <div id="loadEmailModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="sendContactsModalLabel" aria-hidden="true">
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="forms-sample">
                  <h6 class="card-title">Send Load Email</h6>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="load_email_address">Email</label>
                    <input v-model="loadEmailAddress" type="text" class="form-control" id="load_email_address" placeholder="Email">
                  </div>

                  <div v-for="error in loadEmailForm.errors.email" class="form-group validation-error">
                    {{ error }}
                  </div>

                </div>

                <div class="mt-3">
                  <Loading v-if="sendingEmail"></Loading>
                  <a v-else @click="sendEmailToAddressLoadRequest" class="btn btn-primary">
                    Send Load Email
                  </a>
                  <a v-if="!sendingEmail" @click="onEmailModalHide" data-dismiss="modal" class="btn btn-light">Cancel</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div v-if="load" class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-between align-items-center mb-2">
            <h6 class="card-title mb-0">Preview Load</h6>

            <div v-show="false" class="load-controls">
              <a v-if="user && user.role !== 'Driver'" @click="sendDeleteLoadRequest(load)" class="btn btn-danger">Delete Load</a>
              <a v-if="user && user.role !== 'Driver'" @click="editLoad" class="btn btn-primary">Edit Load</a>

              <!-- To toggle modal uncomment -->
              <!-- <a @click="emailLoadToClient" data-toggle="modal" data-target="#loadEmailModal" class="btn btn-secondary">Send Email</a>-->
              <a v-if="user && user.role !== 'Driver'" @click="emailLoadToClient" class="btn btn-secondary">Send Email</a>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <review-load-card v-if="load"
                :load="load"
                :user="user"
              ></review-load-card>
            </div>
          </div>

          <div v-show="false" class="row">
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
                                {{ load.shipper.first_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Last Name</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.last_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Email</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.email }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Phone</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.phone ? '+1' + load.shipper.phone : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Type</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.type_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Company</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.company }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Address 1</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.address_1 }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Address 2</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.address_2 }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Zip</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.zip }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">City</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.city }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">State</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.state }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">State Name</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.state_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Phone 2</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.phone_2 ? '+1' + load.shipper.phone_2 : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Mobile</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.mobile ? '+1' + load.shipper.mobile : '' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Notes From Shipper</td>
                            <td>
                              <div class="shipper-value-container">
                                {{ load.shipper.notes_from_shipper }}
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
                        <h6>Load</h6>
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
                            <td class="py-1">Custom Load Number</td>
                            <td>
                              <div class="load-optional-value-container">
                                {{ load.custom_load_number }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">ID</td>
                            <td>{{ load.id }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Attachments</td>
                            <td v-if="load.attachments && load.attachments.length">
                              <a :key="key" v-for="(a, key) in load.attachments" target="_blank" :href="a.value">
                                {{ a.key }}
                              </a>
                            </td>
                            <td v-else>No Attachments</td>
                          </tr>

                          <tr>
                            <td class="py-1">Referrer</td>
                            <td>
                              <div class="load-optional-value-container">
                                {{ load.referrer || 'No Referrer' }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Status</td>
                            <td>{{ load.status_name }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Client</td>
                            <td>{{ load.client.name }}, {{ load.client.company }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Driver</td>
                            <td v-if="load.driver">{{ load.driver.name }}, {{ load.driver.email }}</td>
                            <td v-else>No Driver Assigned</td>
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
                            <td>{{ load.transport.carrier_type_name }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Available</td>
                            <td>{{ load.transport.available_accuracy_name }} {{ load.transport.available_date }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Delivery</td>
                            <td>{{ load.transport.delivery_accuracy_name }} {{ load.transport.delivery_date }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Distance</td>
                            <td>{{ format(load.transport.distance, ' ') }} ml</td>
                          </tr>

                          <tr>
                            <td class="py-1">Price</td>
                            <td>$ {{ format(load.transport.price, ' ') }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Deposit</td>
                            <td>$ {{ format(load.transport.deposit, ' ') }}</td>
                          </tr>

                          <tr>
                            <td class="py-1">Customer Pay Terms</td>
                            <td>
                              <div class="load-optional-value-container">
                                {{ load.transport.customer_pay_terms_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Carrier Pay Terms</td>
                            <td>
                              <div class="load-optional-value-container">
                                {{ load.transport.carrier_pay_terms_name }}
                              </div>
                            </td>
                          </tr>

                          <tr>
                            <td class="py-1">Carrier Pay</td>
                            <td>
                              <div class="load-optional-value-container">
                               $ {{ format(load.transport.carrier_pay, ' ') }}
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
                          <tr v-if="!ignoredColumns.origin.includes(key)" v-for="key in Object.keys(load.origin) ">
                            <td class="py-1">{{ snakeToHuman(key) }}</td>
                            <td>
                              <div v-if="!phoneColumns.origin.includes(key)" class="load-optional-value-container">
                                {{ load.origin[key] }}
                              </div>
                              <div v-else class="load-optional-value-container">
                                {{ load.origin[key] ? '+1' + load.origin[key] : '' }}
                              </div>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div v-if="load.origin && !(load.origin.lat && load.origin.lng)">
                        Could not get coordinates for that zip
                      </div>
                      <div v-if="load.destination && (load.destination.lat && load.destination.lng)" id="origin-map" class="origin-map"></div>

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
                          <tr v-if="!ignoredColumns.destination.includes(key)" v-for="key in Object.keys(load.destination) ">
                            <td class="py-1">{{ snakeToHuman(key) }}</td>
                            <td>
                              <div v-if="!phoneColumns.destination.includes(key)" class="load-optional-value-container">
                                {{ load.destination[key] }}
                              </div>
                              <div v-else class="load-optional-value-container">
                                {{ load.destination[key] ? '+1' + load.destination[key] : '' }}
                              </div>
                            </td>
                          </tr>
                          </tbody>
                        </table>
                      </div>

                      <div v-if="load.destination && !(load.destination.lat && load.destination.lng)">
                        Could not get coordinates for that zip
                      </div>
                      <div v-if="load.destination && (load.destination.lat && load.destination.lng)" id="destination-map" class="destination-map"></div>
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
                            <th>Price</th>
                            <th>State</th>
                            <th>Color</th>
                            <th>Plate Number</th>
                            <th>Lot Number</th>
                            <th>P O Number</th>
                            <th>Notes</th>
                          </tr>
                          </thead>
                          <tbody>

                          <tr v-for="vehicle in load.vehicles">
                            <td class="py-1">{{ vehicle.year }}</td>
                            <td class="py-1">{{ vehicle.make }}</td>
                            <td class="py-1">{{ vehicle.model }}</td>
                            <td class="py-1">{{ vehicle.vin }}</td>
                            <td class="py-1">{{ vehicle.is_running ? 'Running' : 'Immovable' }}</td>
                            <td class="py-1">{{ vehicle.size_name }}</td>
                            <td class="py-1">$ {{ vehicle.price }}</td>
                            <td class="py-1">{{ vehicle.state }}</td>
                            <td class="py-1">{{ vehicle.color }}</td>
                            <td class="py-1">{{ vehicle.plate_number }}</td>
                            <td class="py-1">{{ vehicle.lot_number }}</td>
                            <td class="py-1">{{ vehicle.p_o_number }}</td>
                            <td class="py-1">{{ vehicle.notes }}</td>
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
  import { mapActions } from "vuex";
  import { ACTION_LOAD_EMAIL, ACTION_LOAD_DELETE } from "../../../store/modules/load/actions";
  import { mapGetters } from "vuex";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";
  import format from "../../../help/number-formatter";
  import ReviewLoadCard from "./ReviewLoadCard";

  export default {
    name: "ReviewLoad",
    data () {
      return {
        load: null,

        loadEmailPopup: false,
        loadEmailAddress: '',
        loadEmailForm: {
          errors: {
            email: []
          }
        },

        ignoredColumns: {
          origin: ['lat', 'lng', 'address_string', 'phone_masked', 'phone2_masked', 'mobile_masked'],
          destination: ['lat', 'lng', 'address_string', 'phone_masked', 'phone2_masked', 'mobile_masked']
        },
        phoneColumns: {
          origin: ['phone', 'phone2', 'mobile'],
          destination: ['phone', 'phone2', 'mobile']
        },
        sendingEmail: false, // flag - send email loading
      }
    },
    components: {
      Loading,
      ReviewLoadCard
    },
    computed: {
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      })
    },
    methods: {
      ...mapActions({
        deleteLoad: 'load/' + ACTION_LOAD_DELETE,
        emailLoad: 'load/' + ACTION_LOAD_EMAIL
      }),
      format,
      sendDeleteLoadRequest() {

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id: this.load.id
        };

        this.deleteLoad(routeParams)
          .then(res => {
            this.$swal('Success', 'This load has been successfully deleted', 'success')
              .then(() => {
                router.push(
                  {
                    name: 'shipper.loads'
                  }
                );
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete this load', 'error');
          })
      },

      /* Email block */
      emailLoadToClient() {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id: this.load.id
        };

        const payload = {
          routeParams,
          load: this.load
        }

        this.sendingEmail = true;
        this.$swal.fire({
          title: 'Sending email',
          text: 'Your email is now being sent',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        this.emailLoad(payload)
          .then(res => {
            this.$swal('Success', 'Email has been successfully sent!', 'success');
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })
      },

      emailLoadToAddress() {
        this.loadEmailAddress = this.load.shipper.email;
        this.onEmailModalShow();
      },

      sendEmailToAddressLoadRequest() {
        Object.keys(this.loadEmailForm.errors).forEach(key => {
          this.loadEmailForm.errors[key] = [];
        });
        this.sendingEmail = true;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id: this.load.id
        };

        const payload = {
          routeParams,
          load: this.load
        }

        this.emailLoad(payload)
          .then(res => {
            this.$swal('Success', 'Email has been successfully sent!', 'success');
            $('#loadEmailModal').modal('hide');
          })
          .catch(error => {

            const err = error.response.data.errors;

            Object.keys(this.loadEmailForm.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.loadEmailForm.errors[key].push(item);
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
        this.loadEmailAddress = this.load.shipper.email;
      },
      /* Email block end */

      editLoad() {
        router.push({
          name: 'shipper.loads.edit',
          params: {
            shipper_id: this.$route.params.shipper_id,
            load_id: this.$route.params.load_id
          }
        });
      },

      initOriginPointMap(google) {
        const myLatLng = {
          lat: this.load.origin.lat,
          lng: this.load.origin.lng
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
          lat: this.load.destination.lat,
          lng: this.load.destination.lng
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
      loadLoadInfo() {
        return client.get('/api/shipper/' + this.$route.params.shipper_id + '/loads/' + this.$route.params.load_id)
          .then(res => {
            this.load = res.data.data;
          })
          .catch(error => {
            if (error.response.status === 422) {
              router.push('/404');
            } else {
              this.$swal('Error', 'Could not load Load info', 'error');
            }
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

      this.loadLoadInfo()
        .then(() => {
          (async () => {
            const google = await loader.load();
            if (this.load.origin.lat && this.load.origin.lng) {
              this.initOriginPointMap(google);
            }
            if (this.load.destination.lat && this.load.origin.lng) {
              this.initDestinationPointMap(google);
            }
          })();
        });
    }
  }
</script>

<style lang="scss" scoped>
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

  .load-optional-value {
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

