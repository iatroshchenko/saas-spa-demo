<template>
  <div class="load-card">

    <div class="load-card-top">
      <div class="row">
        <div class="col-12 col-lg-4 pr-lg-0">
          <div class="load-id">
            <div class="load-card-content-block-header">
              <div class="load-card-content-block-header-title">
                Load ID: # {{ load.id }}
              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-lg-8 pl-lg-0">
          <div class="load-options">
            <div class="load-options-status">
              {{ load.status_name }}
            </div>

            <div v-if="user && user.role !== 'Driver'" class="load-options-options">
              <div class="options-toggler">
                <div @click="toggleDropdown" class="toggler">
                  Options <i class="bx bx-chevron-down"></i>
                </div>

                <div v-click-outside="() => {this.dropdown = false;}" v-show="dropdown" class="options-dropdown">
                  <div @click="emailLoadToClient" class="options-dropdown-item">
                    Send Email
                  </div>
                  <div @click="editLoad" class="options-dropdown-item">
                    Edit
                  </div>
                  <div @click="sendDeleteLoadRequest" class="options-dropdown-item">
                    Delete
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="load-card-content">
      <div class="row">
        <div class="col-12 col-lg-4 pr-lg-0">

          <div class="load-card-content-left">

            <!-- Shipper -->
            <div class="load-card-content-shipper">

              <!-- Content block -->
              <div class="load-card-content-block">
                <div class="load-card-content-block-header">
                  <div class="load-card-content-block-header-title">
                    <i class="bx bx-user"></i> SHIPPER (Customer)
                  </div>
                  <div
                    @click="editLoad"
                    class="load-card-content-block-header-link"
                  >
                    edit
                  </div>
                </div>

                <div class="load-card-content-block-body">
                  <div class="load-card-content-block-company">
                    {{ load.shipper.company || load.shipper.full_name }}
                  </div>
                  <div class="load-card-content-block-address">
                    <p>
                      {{ load.shipper.address_1 || load.shipper.address_2 || 'No Address Provided' }}
                    </p>
                    <p>{{ load.shipper.address_string || 'No City Provided' }}</p>
                  </div>
                </div>

                <div class="load-card-content-block-contacts">
                  <div class="load-card-content-block-contacts-item">
                    <div class="load-card-content-block-contacts-item-key">Phone</div>
                    <div class="load-card-content-block-contacts-item-value">
                      {{ load.shipper.phone }}
                    </div>
                  </div>
                  <div class="load-card-content-block-contacts-item">
                    <div class="load-card-content-block-contacts-item-key">Email</div>
                    <div class="load-card-content-block-contacts-item-value">
                      {{ load.shipper.email }}
                    </div>
                  </div>
                </div>
              </div>
              <!-- Content Block End -->

            </div>

            <div class="load-card-content-trip">
              <div class="load-card-content-trip-draw">
                <div class="load-card-content-trip-draw-start">
                  <i class="bx bxs-map"></i>
                </div>

                <div class="load-card-content-trip-draw-line">
                </div>

                <div class="load-card-content-trip-draw-end">
                  <i class="bx bxs-map"></i>
                </div>
              </div>

              <div class="load-card-content-trip-content">

                <!-- Content block -->
                <div class="load-card-content-block">
                  <div class="load-card-content-block-header">
                    <div class="load-card-content-block-header-title">
                      Origin
                    </div>
                    <div
                      @click="editLoad"
                      class="load-card-content-block-header-link">
                      edit
                    </div>
                  </div>

                  <div class="load-card-content-block-body">
                    <div class="load-card-content-block-company">
                      {{ load.origin.company || 'No company provided' }}
                    </div>
                    <div class="load-card-content-block-address">
                      <p>
                        {{ load.origin.address_1 || load.origin.address_2 || 'No Address Provided' }}
                      </p>
                      <p>
                        {{ load.origin.address_string || 'No City Provided' }}
                      </p>
                    </div>
                  </div>

                  <div class="load-card-content-block-contacts">
                    <div class="load-card-content-block-contacts-item">
                      <div class="load-card-content-block-contacts-item-key">Phone</div>
                      <div class="load-card-content-block-contacts-item-value">
                        {{ load.origin.phone || load.origin.phone_2 || 'No Phone Provided' }}
                      </div>
                    </div>
                    <div class="load-card-content-block-contacts-item">
                      <div class="load-card-content-block-contacts-item-key">Email</div>
                      <div class="load-card-content-block-contacts-item-value">
                        {{ load.origin.email || 'No Email Provided' }}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Content Block End -->

                <!-- Content block -->
                  <div class="load-card-content-block">
                    <div class="load-card-content-block-header">
                      <div class="load-card-content-block-header-title">
                        Destination
                      </div>
                      <div @click="editLoad" class="load-card-content-block-header-link">
                        edit
                      </div>
                    </div>

                    <div class="load-card-content-block-body">
                      <div class="load-card-content-block-company">
                          {{ load.destination.company || 'No company provided' }}
                      </div>
                      <div class="load-card-content-block-address">
                        <p>
                          {{ load.destination.address_1 || load.destination.address_2 || 'No Address Provided' }}
                        </p>
                        <p>
                          {{ load.destination.address_string || 'No City Provided' }}
                        </p>
                      </div>
                    </div>

                    <div class="load-card-content-block-contacts">
                      <div class="load-card-content-block-contacts-item">
                        <div class="load-card-content-block-contacts-item-key">Phone</div>
                        <div class="load-card-content-block-contacts-item-value">
                          {{ load.origin.phone || load.origin.phone_2 || 'No Phone Provided' }}
                        </div>
                      </div>
                      <div class="load-card-content-block-contacts-item">
                        <div class="load-card-content-block-contacts-item-key">Email</div>
                        <div class="load-card-content-block-contacts-item-value">
                          {{ load.origin.email || 'No Email Provided' }}
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Content Block End -->

              </div>
            </div>

            <div class="load-card-content-driver">

              <!-- Content block -->
                <div class="load-card-content-block">
                  <div class="load-card-content-block-header">
                    <div class="load-card-content-block-header-title">
                      <i data-feather="truck"></i> Assigned To
                    </div>
                    <div @click="editLoad" class="load-card-content-block-header-link">
                      edit
                    </div>
                  </div>

                  <div class="load-card-content-block-body">
                    <div class="load-card-content-block-company">
                      {{ load.driver ? load.driver.name : "No Driver Assigned" }}
                    </div>
                    <div v-if="load.driver" class="load-card-content-block-address">
                      <p>Box Truck: #000001</p>
                    </div>
                  </div>

                  <div v-if="load.driver" class="load-card-content-block-contacts">
                    <div class="load-card-content-block-contacts-item">
                      <div class="load-card-content-block-contacts-item-key">Phone</div>
                      <div class="load-card-content-block-contacts-item-value">
                        {{ load.driver.phone }}
                      </div>
                    </div>

                    <div class="load-card-content-block-contacts-item">
                      <div class="load-card-content-block-contacts-item-key">Email</div>
                      <div class="load-card-content-block-contacts-item-value">
                        {{ load.driver.email }}
                      </div>
                    </div>
                  </div>
                </div>
                <!-- Content Block End -->

            </div>
          </div>

        </div>

        <div class="col-12 col-lg-8 pl-lg-3">

          <div class="load-card-content-right">

              <!-- Content block -->
                <div class="load-card-content-block">
                  <div class="load-card-content-block-header">
                    <div class="load-card-content-block-header-title">
                      <i class='bx bxs-car' ></i> Vehicles
                    </div>
                    <div
                      @click="editLoad"
                      class="load-card-content-block-header-link">
                      edit
                    </div>
                  </div>

                  <div class="load-card-content-primary">

                    <div class="load-card-content-table">
                      <div class="row table-header">
                        <div class="col-1">
                          Year
                        </div>
                        <div class="col-2">
                          Make/Model
                        </div>
                        <div class="col-3">
                          Type
                        </div>
                        <div class="col-4">
                          Vin
                        </div>
                        <div class="col-2">
                          Price
                        </div>
                      </div>

                      <div v-for="vehicle in load.vehicles" class="row table-row">
                        <div class="col-1">
                          {{ vehicle.year }}
                        </div>
                        <div class="col-2">
                          {{ vehicle.make }} {{ vehicle.model }}
                        </div>
                        <div class="col-3">
                          {{ vehicle.size_name }}
                        </div>
                        <div class="col-4">
                          {{ vehicle.vin || 'No VIN Provided'}}
                        </div>
                        <div class="col-2">
                          $ {{ vehicle.price }}
                        </div>
                      </div>
                    </div>

                  </div>

                  <div class="load-card-content-secondary">
                    <div class="row">
                      <div class="col-12 col-lg-6">

                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">Invoice #:</div>
                          <div class="div load-card-content-secondary-item-value">
                            98977
                          </div>
                        </div>
                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">
                            Net:
                          </div>
                          <div class="div load-card-content-secondary-item-value">
                            30 days
                          </div>
                        </div>
                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">
                            Pay type:
                          </div>
                          <div class="div load-card-content-secondary-item-value">
                            CC (Visa)
                          </div>
                        </div>

                      </div>
                      <div class="col-12 col-lg-6">

                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">Price: </div>
                          <div class="div load-card-content-secondary-item-value">
                            <b>${{ format(load.transport.price, ',', ' ') }}</b>
                          </div>
                        </div>
                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">
                            Payment:
                          </div>
                          <div class="div load-card-content-secondary-item-value">
                            $ 0.00
                          </div>
                        </div>
                        <div class="load-card-content-secondary-item">
                          <div class="load-card-content-secondary-item-key">
                            Balance:
                          </div>
                          <div class="div load-card-content-secondary-item-value">
                            $ 0.00
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="load-card-content-block-tabs">
                    <div>
                        <tabs :options="{ useUrlFragment: false }" @clicked="() => {}" @changed="() => {}">
                            <tab :name="'Notes ' + '(2)'">
                              <div class="notes">
                                <div class="notes-item">
                                    <div class="notes-item-author">
                                      John Bettye (Driver)
                                    </div>
                                    <div class="notes-item-title">
                                      This is a note from driver
                                    </div>
                                    <div class="notes-item-body">
                                      Dolores dolorum eligendi quod voluptas quo sint reprehenderit ut mollitia iste voluptatum tempora.
                                    </div>
                                  </div>

                                  <div class="notes-item">
                                    <div class="notes-item-author">
                                      Sam Doyle (Customer)
                                    </div>
                                    <div class="notes-item-title">
                                      This is a note from customer
                                    </div>
                                    <div class="notes-item-body">
                                      Thank You
                                    </div>
                                  </div>
                              </div>
                            </tab>
                            <tab :name="'Attachments ' + '(' + (load.attachments ? load.attachments.length : 0) + ')'">
                              <div v-if="load.attachments && load.attachments.length" class="current-attachments">
                                <div v-for="a in load.attachments" class="current-attachment-links">
                                  <a :href="a.value" target="_blank">
                                    {{ a.key }}
                                  </a>
                                </div>
                              </div>
                              <div v-else>
                                No Attacments
                              </div>
                            </tab>
                            <tab :name="'Photos ' + (photos ? '(' + photos.length + ')' : '(0)')">
                              <div v-if="photos && photos.length">
                                <div
                                  class="photo"
                                  v-for="(photo, i) in photos"
                                  :key=i
                                >
                                  <div class="photo-name">
                                    <a target="_blank" :href="photo.value">
                                      {{ photo.key }}
                                    </a>
                                  </div>
                                  <div class="photo-preview">
                                    <img style="width: 200px; height: 200px;" :src="photo.value" alt="">
                                  </div>
                                </div>
                              </div>
                              <div v-else>
                                No photos
                              </div>
                            </tab>
                            <tab name="Transactions (0)">
                              No Transactions currently available
                            </tab>
                            <tab :name="'Activity ' + '(' + (load.activities ? load.activities.length: 0) + ')'">
                              <table class="table table-striped" v-if="load.activities && load.activities.length">
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
                                  <tr :key="key" v-for="(activity, key) in load.activities">
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
                            </tab>
                        </tabs>
                    </div>
                  </div>
                </div>
                <!-- Content Block End -->

          </div>

        </div>
      </div>
    </div>

  </div>
</template>

<script>

import router from "../../../router";
import format from "../../../help/number-formatter";

import {client} from "../../../axios";
import {mapActions, mapGetters} from "vuex";
import { ACTION_LOAD_DELETE, ACTION_LOAD_EMAIL } from "../../../store/modules/load/actions";

export default {
  name: "ReviewLoadCard",
  props: ['load', 'user'],
  data () {
    return {
      dropdown: false
    }
  },
  computed: {
    photos () {
      return this.load.attachments ?
        this.load.attachments.filter(i => {
          return ['jpg', 'png'].includes(i.format);
        }) :
        null;
    }
  },
  methods: {
    format,
    toggleDropdown () {
      setTimeout(() => {
        this.dropdown = !this.dropdown;
      }, 0);
    },
    editLoad() {
      router.push({
        name: 'shipper.loads.edit',
        params: {
          shipper_id: this.$route.params.shipper_id,
          load_id: this.load.id
        }
      })
    },

    /* Controls */
    ...mapActions({
      deleteLoad: 'load/' + ACTION_LOAD_DELETE,
      emailLoad: 'load/' + ACTION_LOAD_EMAIL
    }),

      sendDeleteLoadRequest() {
        const load_id = this.load.id;

        const routeParams = {
          shipper_id: this.$route.params.shipper_id,
          load_id
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
      /* Email block*/
      emailLoadToClient() {
        if (this.sendingEmail) return;

        const load = this.load;

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
  },
  mounted () {
    feather.replace();
  }
}


</script>

<style lang="scss">

$accent: #65c946;
$links:#c16049;
$grayBase: #e4e3e2;

.load-options {
  border: 1px solid #000;
  &-status {
    text-transform: uppercase;
    color: $accent;
    font-weight: bold;
  }
  display: flex;
  align-items: center;
  height: 100%;
  &-options {
    margin-left: auto;
    .btn {
      width: 140px;
      border-radius: 25px;
      height: 40px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .btn-dark {
      border: 4px solid #000;
    }
  }
  font-size: 24px;
  background-color: $grayBase;
  padding: 5px;
  padding-left: 25px;
}

.load-card-top {
  margin-bottom: 20px;
}

.load-card-content {
  margin-bottom: 20px;

  &-table {
    padding: 0 5px;
  }

  &-block {
    &-header {
      background-color: #334152;
      color: #fff;
      display: flex;
      align-items: center;
      padding: 15px;
      &-title {
        font-size: 24px;
        display: flex;
        align-items: center;
        & i {
          padding-right: 5px;
          color: $accent;
        }
        & svg {
          padding-right: 5px;
          color: $accent;
        }
      }
      &-link {
        cursor: pointer;
        margin-left: auto;
        font-size: 16px;
        color: $links;
        &:hover {
          color: #fff;
        }
      }
    }
    &-company {
      font-weight: bold;
    }
    &-body {
      padding: 10px;
      background-color: $grayBase;
      color: #504e4f;
    }
    &-contacts {
      padding: 10px 15px;
      background-color: #a9a9a9;
      color: #504e4f;
      &-item {
        display: flex;
        &-key {
          width: 100px;
        }
        &-value {
          font-weight: bold;
        }
        border-bottom: 1px solid #fff;
        &:last-child {
          border-bottom: none;
        }
      }
    }

    &-tabs {
      margin-top: 20px;
      flex: 1 1 auto;
      background: $grayBase;

      .tabs-component {
        margin: 0;
      }
    }
  }

  &-trip {
    margin-top: 20px;
    display: flex;
    &-draw {
      width: 10%;
      display: flex;
      flex-direction: column;
      &-start {
        font-size: 40px;
        height: 15%;
        display: flex;
        align-items: center;
        justify-content: center;
        i {
          color: $accent;
        }
      }
      &-end {
        i {
          color: #cd4e51;
        }
      }
      &-line {
        height: 70%;
        width: 51%;
        border-right: 3px dashed $accent;
      }
      &-end {
        font-size: 40px;
        height: 15%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
    }
    &-content {
      width: 90%;
    }
  }

  &-driver {
    margin-top: 20px;
  }

  &-primary {
    background-color: $grayBase;
    padding: 10px;
  }
  &-secondary {
    padding: 10px;
    background-color: #a9a9a9;
    color: #000;
    &-item {
      display: flex;
      &-key {
        width: 100px;
        font-weight: bold;
      }
    }
  }

  &-right {
    height: 100%;
    .load-card-content-block {
      height: 100%;
      display: flex;
      flex-direction: column;
    }
  }
}

.table-header {
  color: $accent;
  text-transform: uppercase;
  border-bottom: 1px solid #fff;
  margin: 0px 5px;
  padding-bottom: 5px;
  font-weight: bold;
}

.table-row {
  margin: 0 5px;
  padding: 2px 0;
}

.options-toggler {
  font-size: 16px;
  cursor: pointer;
  position: relative;
}

.options-dropdown {
  cursor: pointer;
  position: absolute;
  z-index: 999;
  width: 120px;
  right: 0;
  top: 40px;
  background: $grayBase;
  border: 1px solid #000;

  &-item {
    padding: 0 5px;
    &:hover {
      background: #fafafa;
    }
  }
}

.notes {
  &-item {
    font-size: 14px;
    width: 300px;
    border: 1px solid #ddd;
    padding: 10px;
    margin-bottom: 10px;
    &:last-child {
      margin-bottom: 0;
    }

    &-title {
      font-size: 16px;
      font-weight: bold;
    }

    &-author {
      color: #4f4f4f;
    }
  }
}

</style>
