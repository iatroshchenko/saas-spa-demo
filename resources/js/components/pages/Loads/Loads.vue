<template>
  <div class="row">

    <div id="assignModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="assignModalLabel" aria-hidden="true">
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Assign Driver to Load</h6>
                <form class="forms-sample">

                  <div class="form-group">
                    <label for="assign_driver">Driver</label>
                    <select v-model="assignFormData.driver_id" name="assign_driver" id="assign_driver">
                      <option :value="null">Select Driver</option>
                      <option v-for="driver in drivers" :value="driver.id">
                        {{ driver.name }}
                      </option>
                    </select>
                  </div>

                  <div v-for="error in assignFormDataErrors.driver_id" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="mt-4 d-flex justify-content-end">
                    <a @click="assignDriverToLoad" class="btn btn-primary mr-2">Assign</a>
                    <a @click="onAssignModalHide" data-dismiss="modal" class="btn btn-light">Cancel</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h6 class="card-title">Loads</h6>

          <div class="mt-3 mb-3 d-flex justify-content-end">
            <router-link v-if="user && !['Driver', 'Dispatcher'].includes(user.role)" :to="'/shipper/' + $route.params.shipper_id  + '/loads/create'" class="btn btn-primary mr-2 mb-2 mb-md-0">
              Create Load
            </router-link>
          </div>

          <div v-if="items" class="row">
            <div class="col-sm-12 col-md-6">
              <div>
                <label class="per-page-count-label">
                  Show
                <select v-model="perPage" class="custom-select custom-select-sm form-control form-control-sm">
                  <option :value="5">5</option>
                  <option :value="10">10</option>
                  <option :value="30">30</option>
                  <option :value="50">50</option>
                  <option :value="items.length">All</option>
                </select> entries</label>
              </div>
            </div>
          </div>

          <div v-if="items" class="loads">
            <paginate
              name="items"
              :list="items"
              :per="perPage"
              class="paginate-list"
              tag="div"
            >

              <div class="row">

                <div class="col-12">

                  <div :key="i" v-for="(item, i) in paginated('items')">
                    <div class="grid-margin stretch-card">
                      <div class="card">
                        <div class="card-body no-padding">

                          <div class="row">
                            <div class="col-12 col-lg-2 pr-lg-0">
                              <div class="load-title-container">
                                <div class="card-title mb-0 text-success d-flex align-items-center justfify-content-center">
                                  <h6>{{ item.status_name }}</h6>
                                </div>

                                <div class="load-id">
                                  <div class="card-title mb-0 d-flex align-items-center justfify-content-center flex-column">

                                    <div class="load-id-item">
                                      Load ID:
                                    </div>
                                    <div class="load-id-item">
                                      {{ item.custom_load_number || item.id }}
                                    </div>

                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="col-12 col-lg-10 pl-lg-0">
                              <div class="load-content-container">

                                <div class="row">
                                  <div class="col-12 col-lg-10 pr-lg-0">

                                    <div class="load-content-content">

                                      <div class="load-content-top mb-3">
                                        <div class="load-content-top-item">
                                          <div>
                                            <b class="ml-1">
                                              Pick Up: <i class='bx bx-map-pin'></i>
                                              {{ item.origin.address_string }}
                                            </b>
                                          </div>

                                          <div class="divider ml-1 mr-1">
                                            |
                                          </div>

                                          <div class="text-muted">
                                            {{ item.origin.address_1 || item.origin.address_2 || 'No Origin Address provided' }}
                                          </div>

                                          <div class="ml-auto origin-view-link view-link">
                                            <a class="link">view</a>
                                          </div>
                                        </div>
                                        <div class="load-content-top-item">
                                          <div>
                                            <b class="ml-1">
                                              Drop off: <i class='bx bxs-map' ></i>
                                              {{ item.destination.address_string }}
                                            </b>
                                          </div>

                                          <div class="divider ml-1 mr-1">
                                            |
                                          </div>

                                          <div class="ml-1 text-muted">
                                            {{ item.destination.address_1 || item.destination.address_2 || 'No Destination Address provided' }}
                                          </div>

                                          <div class="ml-auto destination-view-link view-link">
                                            <a class="link">view</a>
                                          </div>
                                        </div>
                                      </div>

                                      <div class="load-content-center">

                                        <div class="load-content-center-top">

                                          <div class="load-content-center-left">
                                            {{ item.transport.available_date_formatted }}
                                          </div>
                                          <div class="load-content-center-center">
                                            Assigned to:
                                          </div>
                                          <div class="load-content-center-right">
                                            {{ item.transport.delivery_date_formatted }}
                                          </div>

                                        </div>

                                        <div class="load-content-center-bottom mb-3">

                                          <div class="load-content-center-left">12:00 pm</div>
                                          <div class="load-content-center-center load-content-center-center-driver">
                                            <b>
                                              {{ item.driver ? item.driver.name : 'No Driver Assigned' }}
                                            </b>
                                          </div>
                                          <div class="load-content-center-right">4:00 am</div>

                                        </div>

                                      </div>

                                      <div class="load-content-bottom">
                                        <div class="row">
                                          <div class="col-3">
                                            <div class="load-content-bottom-item">
                                              <i class="bx bxs-car"></i> Load
                                            </div>
                                            <div class="load-content-bottom-item">
                                              <div @click="detailsClick(i, 'Cars')" class="d-flex align-items-center opens-details">

                                                <span
                                                  class="details-arrow mr-1"
                                                >
                                                  <i v-if="loadDetails[i] && loadDetails[i] === 'Cars'" class='bx bxs-chevron-up'></i>
                                                  <i v-else class='bx bxs-chevron-down'></i>
                                                </span>

                                                <div class="load-content-bottom-item-text">
                                                  {{ item.vehicles.length }} cars
                                                </div>

                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-3">
                                            <div class="load-content-bottom-item">
                                              <i class="bx bxs-map"></i> Distance
                                            </div>
                                            <div class="load-content-bottom-item">
                                              <div class="d-flex align-items-center opens-details">

                                                <span class="details-arrow mr-1">
                                                  <i class='bx bxs-chevron-down'></i>
                                                </span>

                                                <div class="load-content-bottom-item-text">
                                                  {{ format(item.transport.distance, ', ', ' ') }} ml
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-3">
                                            <div class="load-content-bottom-item">
                                               <i class="bx bxs-user"></i> Shipper
                                            </div>
                                            <div class="load-content-bottom-item">
                                              <div class="d-flex align-items-center opens-details">

                                                <span class="details-arrow mr-1">
                                                  <i class='bx bxs-chevron-down'></i>
                                                </span>

                                                <div class="load-content-bottom-item-text">
                                                  Cars inc.
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                          <div class="col-3">
                                            <div class="load-content-bottom-item">
                                              <i class='bx bx-dollar-circle'></i> Price
                                            </div>
                                            <div class="load-content-bottom-item">
                                              <div class="d-flex align-items-center opens-details">

                                                <span class="details-arrow mr-1">
                                                  <i class='bx bxs-chevron-down'></i>
                                                </span>

                                                <div class="load-content-bottom-item-text">
                                                  $ {{ format(item.transport.price, ',') }}
                                                </div>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </div>

                                  <div class="col-12 col-lg-2 pl-lg-0">

                                    <div class="load-content-controls">

                                      <a v-if="user && user.role !== 'Driver'" @click="openAssignModal(item)" class="load-content-controls-item btn btn-outline-primary">Assign</a>
                                      <router-link
                                        :to="{ name: 'shipper.loads.review', params: { shipper_id: $route.params.shipper_id, load_id: item.id }}"
                                        class="load-content-controls-item btn btn-outline-dark"
                                      >
                                        Preview
                                      </router-link>

                                      <a
                                        @click.prevent="editLoad(item.id)"
                                        v-if="user && user.role !== 'Driver'"
                                        class="load-content-controls-item btn btn-outline-secondary edit-button"
                                      >Edit</a>

                                    </div>

                                  </div>
                                </div>


                              </div>
                            </div>
                          </div>

                        </div>
                      </div>
                    </div>

                    <!-- Load Details - Cars -->
                    <div v-show="loadDetails[i] === 'Cars'" class="load-details">
                      <div class="row">
                        <div class="col-12 col-xl-10 pl-xl-0 offset-xl-2 grid-margin stretch-card">
                          <div class="card details-card">
                            <div class="card-body">

                              <div class="vehicles">

                                <div style="font-weight: bold;" class="row">
                                  <div class="col-1">
                                    Year
                                  </div>
                                  <div class="col-2">
                                    Make / Model
                                  </div>
                                  <div class="col-2">
                                    Type
                                  </div>
                                  <div class="col-3">
                                    Vin
                                  </div>
                                  <div class="col-1">
                                    Price
                                  </div>
                                </div>

                                <div :key="i" v-for="(car, i) in item.vehicles" class="row">
                                  <div class="col-1">
                                    {{ car.year }}
                                  </div>
                                  <div class="col-2">
                                    {{ car.year }} {{ car.model }}
                                  </div>
                                  <div class="col-2">
                                    {{ car.size_name }}
                                  </div>
                                  <div class="col-3">
                                    {{ car.vin || 'No Vin provided' }}
                                  </div>
                                  <div class="col-1">
                                    $ {{ car.price || '95, 00' }}
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

              </div>

            </paginate>
          </div>

          <div v-if="items" class="loads-links">
            <div class="row">
              <div class="col-sm-12 col-md-5">
                Showing 1 to 10 of {{ items.length }} entries
              </div>

              <div class="col-sm-12 col-md-7">
                <div class="loads-links-pagination">
                  <paginate-links
                    @change="clearLoadDetails"
                    for="items"
                    :show-step-links="true"
                    :classes="{
                      'ul': 'pagination',
                      'li': 'page-item',
                      'a': 'page-link',

                      // 'a': ['prev-link', 'another-class']
                    }"
                  ></paginate-links>
                </div>
              </div>
            </div>
          </div>

          <div v-if="loads" class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>
              <tr>
                <th>ID</th>
                <th>Shipper</th>
                <th>Origin</th>
                <th>Destination</th>
                <th>Carrier</th>
                <th>Vehicle</th>
                <th>Price</th>
                <th>Deposit</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
              <tr v-for="item in loads">
                <td>
                  <div class="load-id-value-container">
                    {{ item.custom_load_number ? item.custom_load_number : ('L' + item.id) }}
                  </div>
                </td>
                <td>{{ item.shipper.full_name }}</td>
                <td>{{ item.origin.address_string }}</td>
                <td>{{ item.destination.address_string }}</td>
                <td>{{ item.transport.carrier_type_name }} Transport</td>
                <td>
                  <div class="mb-1" v-for="vehicle in item.vehicles">
                    {{ vehicle.make }} {{ vehicle.model }} {{ vehicle.year }}
                  </div>
                </td>
                <td>$ {{ item.transport.price ? format(item.transport.price, ' ') : 0 }}</td>
                <td>$ {{ item.transport.deposit ? format(item.transport.deposit, ' ') : 0 }}</td>
                <td>{{ item.status_name }}</td>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      ...
                    </button>
                    <div style="cursor: pointer;" class="dropdown-menu">
                      <router-link class="dropdown-item" :to="{ name: 'shipper.loads.review', params: { shipper_id: $route.params.shipper_id, load_id: item.id }}">
                        Preview
                      </router-link>
                      <a v-if="user && user.role !== 'Driver'" @click="emailLoadToClient(item)" class="dropdown-item">Send Email</a>
                      <a v-if="user && user.role !== 'Driver'" @click.prevent="editLoad(item.id)" class="dropdown-item">Edit</a>
                      <a v-if="user && user.role !== 'Driver'" @click="sendDeleteLoadRequest(item.id)" class="dropdown-item">Delete</a>
                    </div>
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
</template>

<script>
  import {client} from "../../../axios";
  import {mapActions, mapGetters} from "vuex";
  import { ACTION_LOAD_DELETE, ACTION_LOAD_EMAIL } from "../../../store/modules/load/actions";
  import router from "../../../router";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";
  import format from "../../../help/number-formatter";

  export default {
    name: "Loads",
    data () {
      return {
        /* Pagination */
        perPage: 5,
        items: null,
        paginate: ['items'],
        /* Pagination */
        loadDetails: {},

        drivers: [],
        assignFormData: {
          load_id: null,
          driver_id: null
        },
        assignFormDataErrors: {
          load_id: [],
          driver_id: []
        },

        loads: null,
        dataTable: null,
        sendingEmail: false
      }
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

      /* Assign driver */
      clearAssignFormData() {
        this.assignformData = {
          driver_id: null,
          load_id: null
        };
      },
      clearAssignFormDataErrors() {
        this.assignFormDataErrors = {
          driver_id: [],
          load_id: []
        }
      },
      openAssignModal(load) {
        this.assignFormData.load_id = load.id;
        if (load.driver) {
          this.assignFormData.driver_id = load.driver.id;
        } else {
          this.assignFormData.driver_id = null;
        }
        $('#assignModal').modal().fadeIn();
      },
      assignDriverToLoad() {
        const shipperId = this.$route.params.shipper_id;

        this.clearAssignFormDataErrors();

        client.post('/api/shipper/' + shipperId + '/assign-driver-to-load', {
          ...this.assignFormData
        })
          .then(res => {
            $('#assignModal').modal('hide');

            this.$swal('Success', 'Driver has been assigned', 'success')
              .then(() => {
                this.loadLoads();
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.assignFormDataErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.assignFormDataErrors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.clearAssignFormData();
          })
      },
      onAssignModalHide() {
        this.clearAssignFormData();
      },
      loadDrivers() {
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/drivers')
          .then(res => {
            const drivers = res.data.data;
            if (drivers) {
              this.drivers = [...drivers]
            } else {
              console.log('Driver list empty');
            }
          })
          .catch(err => {
            this.$swal('Error', 'Could not load drivers', 'error')
          })
      },
      /* Assign driver */

      clearLoadDetails() {
        this.loadDetails = {};
      },

      detailsClick(i, type) {
        if (this.loadDetails[i]) {
          this.loadDetails[i] = false;
        } else {
          this.$set(this.loadDetails, i, type);
        }
      },

      editLoad(load_id) {
        router.push({
          name: 'shipper.loads.edit',
          params: {
            shipper_id: this.$route.params.shipper_id,
            load_id: load_id
          }
        })
      },
      sendDeleteLoadRequest(load_id) {

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id
        };

        this.deleteLoad(routeParams)
          .then(res => {
            this.$swal('Success', 'This load has been successfully deleted', 'success')
              .then(() => {
                this.loadLoads();
              });
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete this load', 'error');
          })
      },

      /* Email block*/
      emailLoadToClient(load) {
        if (this.sendingEmail) return;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id: load.id
        };

        const payload = {
          routeParams,
          load
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
            this.$swal.close();
            setTimeout(() => {
              this.$swal.fire({
                title: 'Success',
                text: 'Email has been successfully sent',
                icon: 'success',
                onOpen: () => {
                  setTimeout(() => {
                    this.$swal.close()
                  }, 1000);
                },
                showConfirmButton: false
              })
            }, 0);
          })
          .catch(err => {
            this.$swal.close();
          })
          .finally(() => {
            this.sendingEmail = false;
          })
      },
      /* Email block end */

      datatable() {
        var dt = $('#dataTableExample').DataTable({
          "aLengthMenu": [
            [10, 30, 50, -1],
            [10, 30, 50, "All"]
          ],
          "iDisplayLength": 10,
          "language": {
            search: ""
          },
          "order": []
        });
        dt.each(function() {
          var datatable = $(this);
          // SEARCH - Add the placeholder for Search and Turn this into in-line form control
          var search_input = datatable.closest('.dataTables_wrapper').find('div[id$=_filter] input');
          search_input.attr('placeholder', 'Search');
          search_input.removeClass('form-control-sm');
          // LENGTH - Inline-Form control
          var length_sel = datatable.closest('.dataTables_wrapper').find('div[id$=_length] select');
          length_sel.removeClass('form-control-sm');
        });

        this.dataTable = dt;

        $('.dropdown-menu').click(function(e) {
          e.stopPropagation();
        });
      },
      loadLoads() {
        client.get('/api/shipper/' + this.$route.params.shipper_id + '/loads')
          .then(res => {
            if (this.dataTable) this.dataTable.destroy();
            // this.loads = [...res.data.data];

            this.items = [...res.data.data];

            // setTimeout(() => {
            //   this.datatable();
            // }, 0);
          })
      }
    },
    mounted() {
      this.loadLoads();

      if (this.user && this.user.role !== 'Driver') {
        this.loadDrivers();
      }
    }
  }
</script>

<style lang="scss" scoped>
  .load-id-value-container {
    width: 80px;
    line-break: anywhere;
    white-space: initial;
  }

  .load-id-item {
    font-weight: 600;
    text-transform: uppercase;
    color: #fff;
  }

  .load-title {
    &-container {
      display: flex;
      align-items: center;
      justify-content: space-between;
      height: 100%;
      flex-direction: column;
      padding: 10px;
      background: #334152;
    }
  }


  .load-content {
    &-content {
      padding: 10px;
      background-color: #eee;
    }

    &-top {
      &-item {
        display: flex;
      }
    }
    &-center {
      &-top {
        padding-top: 10px;
        border-top: 1px solid #000;
        display: flex;
        justify-content: space-between;
      }
      &-bottom {
        display: flex;
        justify-content: space-between;
      }
      &-left {
        width: 100px;
        display: flex;
        justify-content: flex-end;
      }
      &-right {
        width: 100px;
        display: flex;
        justify-content: flex-start;
      }
      &-center {
        &-driver {
          padding-top: 1px;
          border-top: 1px dashed #ccc;
        }
        width: 100%;
        display: flex;
        justify-content: center;
      }
    }

    &-controls {
      display: flex;
      flex-direction: column;
      justify-content: center;
      padding: 10px;
      background-color: #eee;

      height: 100%;

      &-item {
        &:last-child {
          margin-bottom: 0;
        }
        margin-bottom: 10px;
        height: 40px;
        display: flex;
        align-items: center;
        justify-content: center;
        &.edit-button {
          color: #fa7050;
          &:hover {
            color: #fff;
          }
        }
      }
    }
  }

  span.details-arrow {
      display: flex;
      align-items: center;
      justify-content: center;
      color: #fff;
      background-color: blue;
      width: 14px;
      border-radius: 50%;
    }

  .opens-details {
    cursor: pointer;
  }

  .details-card {
    background-color: #eee;
  }

  .per-page-count-label {
    display: flex;
    width: 220px;
    align-items: center;
    justify-content: space-between;
    margin-bottom: 10px;
  }

  .per-page-count-label {
    & > select {
      width: 120px;
    }
  }

  .loads-links {
    ul.pagination {
      justify-content: flex-end;
    }
  }

  a.link {
    cursor: pointer;
  }
</style>
