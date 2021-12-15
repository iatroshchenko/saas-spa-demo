<template>
  <div class="row">
    <div id="sendContactsModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="sendContactsModalLabel" aria-hidden="true">
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="forms-sample">
                  <h6 class="card-title">This user can successfully start working with APP</h6>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="created_email">Email</label>
                    <input disabled v-model="createdUser.email" type="text" class="form-control" id="created_email" placeholder="Email">
                  </div>
                </div>

                <div class="form-group position-relative">
                  <label for="create_password">Password</label>
                  <input disabled v-model="createdUser.password" :type="passwordFieldType" class="form-control" id="created_password" placeholder="Password">
                  <div @click="switchPasswordVisibility" id="createdPasswordToggler" class="passwordToggler">
                    <i v-if="passwordFieldType === 'password'" class='bx bx-show'></i>
                    <i v-else class="bx bxs-hide"></i>
                  </div>
                </div>

                <div class="mt-3">
                  <Loading v-if="sendingCredentials"></Loading>
                  <a v-else @click="sendCredentials" class="btn btn-primary">
                    Send Credentials by email
                  </a>
                  <a data-dismiss="modal" class="btn btn-light">Cancel</a>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="createModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
      <div class="modal-container modal-too-high d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Create Client</h6>
                <form class="forms-sample">

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="create_first_name">First Name</label>
                    <input v-model="createFormData.first_name" type="text" class="form-control" id="create_first_name" placeholder="First Name">
                  </div>
                  <div v-for="error in createFormDataErrors.first_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="create_last_name">Last Name</label>
                    <input v-model="createFormData.last_name" type="text" class="form-control" id="create_last_name" placeholder="Last Name">
                  </div>
                  <div v-for="error in createFormDataErrors.last_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="create_email">Email</label>
                    <input v-model="createFormData.email" type="text" class="form-control" id="create_email" placeholder="Email">
                  </div>
                  <div v-for="error in createFormDataErrors.email" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="create_phone">Phone Number</label>
                    <the-mask v-model="createFormData.phone" mask="+1 (###) ###-####" placeholder="Phone Number" id="create_phone" type="text" class="form-control"></the-mask>
                  </div>
                  <div v-for="error in createFormDataErrors.phone" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input v-model="generate_password" type="checkbox" class="form-check-input">
                      Generate password
                      <i class="input-frame bx bx-check"></i></label>
                  </div>

                  <div class="form-group position-relative">
                    <label for="create_password">Password</label>
                    <input @input="onCreatePasswordInput" v-model="createFormData.password" :type="passwordFieldType" class="form-control" id="create_password" placeholder="Password">
                    <div class="passwordToggler" @click="switchPasswordVisibility" id="passwordToggler">
                      <i v-if="passwordFieldType === 'password'" class='bx bx-show'></i>
                      <i v-else class="bx bxs-hide"></i>
                    </div>
                  </div>
                  <div v-for="error in createFormDataErrors.password" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group form-check">
                    <label class="form-check-label">
                      <input :disabled="ask_password_change_disabled" v-model="ask_password_change_next_login" type="checkbox" class="form-check-input">
                      Ask for a password change after next login
                      <i class="input-frame bx bx-check"></i></label>
                  </div>

                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input v-model="createFormData.type" type="radio" class="form-check-input" value="0">
                        Residence
                        <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input v-model="createFormData.type" type="radio" class="form-check-input" value="1">
                        Business
                        <i class="input-frame"></i></label>
                    </div>
                  </div>

                  <div v-for="error in createFormDataErrors.type" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="company">Company</label>
                    <input v-model="createFormData.company" type="text" class="form-control" id="company"
                           autocomplete="chrome-off" placeholder="Company">
                  </div>

                  <div v-for="error in createFormDataErrors.company" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="address_1">Address 1</label>
                    <input v-model="createFormData.address_1" type="text" class="form-control" id="address_1"
                           autocomplete="chrome-off" placeholder="Address 1">
                  </div>

                  <div v-for="error in createFormDataErrors.address_1" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="address_2">Address 2</label>
                    <input v-model="createFormData.address_2" type="text" class="form-control" id="address_2"
                           autocomplete="chrome-off" placeholder="Address 2">
                  </div>

                  <div v-for="error in createFormDataErrors.address_2" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group has-predictions">
                    <label for="zip">Zip Code</label>
                    <input
                      v-mask="'#####'"
                      @input="autocompleteShipperByZip"
                      @focusout="onShipperZipFocusOut"
                      v-model="createFormData.zip"
                      type="text"
                      class="form-control"
                      id="zip"
                      autocomplete="chrome-off"
                      placeholder="Zip Code"
                    >

                    <div v-if="predictions.shipper.zip && predictions.shipper.zip.length" class="predictions">
                      <div @click="fillShipperInfoByZipPrediction(prediction)" v-for="prediction in predictions.shipper.zip" class="predictions-prediction p-2">
                        {{ prediction.description }}
                      </div>
                    </div>
                  </div>

                  <div v-for="error in createFormDataErrors.zip" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group has-predictions">
                    <label for="city">City</label>
                    <input
                      v-model="createFormData.city"
                      @input="autocompleteShipperByCity"
                      @focusout="onShipperCityFocusOut"
                      type="text"
                      class="form-control"
                      id="city"
                      autocomplete="chrome-off"
                      placeholder="City"
                    >

                    <div v-if="predictions.shipper.city && predictions.shipper.city.length" class="predictions">
                      <div @click="fillShipperInfoByCityPrediction(prediction)" v-for="prediction in predictions.shipper.city" class="predictions-prediction p-2">
                        {{ prediction.description }}
                      </div>
                    </div>
                  </div>

                  <div v-for="error in createFormDataErrors.city" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="state">State</label>

                    <select
                      class="form-control"
                      v-if="states"
                      v-model="createFormData.state"
                      id="state"
                    >
                      <option selected="" disabled="">State</option>
                      <option v-for="item in states" :value="item.key">
                        {{ item.value }}
                      </option>
                    </select>
                  </div>

                  <div v-for="error in createFormDataErrors.state" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="phone_2">Phone 2</label>
                    <the-mask
                      v-model="createFormData.phone_2"
                      placeholder="Phone 2"
                      mask="+1 (###) ###-####"
                      id="phone_2"
                      type="text"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in createFormDataErrors.phone_2" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="mobile">Mobile</label>
                    <the-mask
                      v-model="createFormData.mobile"
                      placeholder="Mobile"
                      mask="+1 (###) ###-####"
                      id="mobile"
                      type="text"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in createFormDataErrors.mobile" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="fax">Fax</label>

                    <the-mask
                      v-model="createFormData.fax"
                      type="text"
                      placeholder="Fax"
                      mask="+1 (###) ###-####"
                      id="fax"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in createFormDataErrors.fax" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="notes_from_shipper">Notes From Shipper</label>
                    <textarea v-model="createFormData.notes_from_shipper" type="text" class="form-control"
                              id="notes_from_shipper" autocomplete="chrome-off"
                              placeholder="Notes From Shipper"></textarea>
                  </div>

                  <div v-for="error in createFormDataErrors.notes_from_shipper" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="mt-4 d-flex justify-content-end">
                    <a @click="createUser" class="btn btn-primary mr-2">Create</a>
                    <a @click="onCreateModalHide" data-dismiss="modal" class="btn btn-light">Cancel</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div id="editModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-container modal-too-high d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit Client</h6>
                <form class="forms-sample">

                  <div class="form-group">
                    <label for="edit_first_name">First Name</label>
                    <input v-model="editFormData.first_name" type="text" class="form-control" id="edit_first_name" autocomplete="chrome-off" placeholder="First Name">
                  </div>
                  <div v-for="error in editFormDataErrors.first_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_last_name">Last Name</label>
                    <input v-model="editFormData.last_name" type="email" class="form-control" id="edit_last_name" placeholder="Last Name">
                  </div>
                  <div v-for="error in editFormDataErrors.last_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div v-if="user && user.role === 'Business Owner'" class="form-group">
                    <label for="edit_email">Email</label>
                    <input v-model="editFormData.email" type="text" class="form-control" id="edit_email" autocomplete="chrome-off" placeholder="Email">
                  </div>
                  <div v-else class="form-group">
                    <label>Email</label>
                    <div class="d-flex">
                      <input type="text" disabled class="form-control" :value="editFormData.email">
                      <a @click="showChangeUserEmailInput()" style="width: 140px;" class="btn btn-primary">Change Email</a>
                    </div>
                  </div>

                  <div v-if="changeUserEmailInput" class="form-group">
                    <label for="new_email">New email</label>
                    <div class="d-flex">
                      <input v-model="changeUserEmail.formData.email" type="text" class="form-control" id="new_email" autocomplete="chrome-off" placeholder="New Email">
                      <Loading v-if="changeUserEmail.isSending"></Loading>
                      <a v-else @click="sendChangeUserEmailConfirmationNotification" style="width: 140px;" class="btn btn-primary">Save</a>
                    </div>
                  </div>

                  <div v-for="error in changeUserEmail.errors.email" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div v-for="error in editFormDataErrors.email" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_status">Status</label>
                    <select v-model="editFormData.status" name="edit_status" id="edit_status">
                      <option value="0">Inactive</option>
                      <option value="1">Active</option>
                    </select>
                  </div>
                  <div v-for="error in editFormDataErrors.status" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="phone">Phone</label>
                    <the-mask v-model="editFormData.phone" placeholder="Phone Number" mask="+1 (###) ###-####" id="phone" type="text" class="form-control"></the-mask>
                  </div>
                  <div v-for="error in editFormDataErrors.phone" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input v-model="editFormData.type" type="radio" class="form-check-input" value="0">
                        Residence
                        <i class="input-frame"></i></label>
                    </div>
                    <div class="form-check form-check-inline">
                      <label class="form-check-label">
                        <input v-model="editFormData.type" type="radio" class="form-check-input" value="1">
                        Business
                        <i class="input-frame"></i></label>
                    </div>
                  </div>

                  <div v-for="error in editFormDataErrors.type" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_company">Company</label>
                    <input v-model="editFormData.company" type="text" class="form-control" id="edit_company"
                           autocomplete="chrome-off" placeholder="Company">
                  </div>

                  <div v-for="error in editFormDataErrors.company" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_address_1">Address 1</label>
                    <input v-model="editFormData.address_1" type="text" class="form-control" id="edit_address_1"
                           autocomplete="chrome-off" placeholder="Address 1">
                  </div>

                  <div v-for="error in editFormDataErrors.address_1" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_address_2">Address 2</label>
                    <input v-model="editFormData.address_2" type="text" class="form-control" id="edit_address_2"
                           autocomplete="chrome-off" placeholder="Address 2">
                  </div>

                  <div v-for="error in editFormDataErrors.address_2" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group has-predictions">
                    <label for="edit_zip">Zip Code</label>
                    <input
                      v-mask="'#####'"
                      @input="autocompleteShipperByZip"
                      @focusout="onShipperZipFocusOut"
                      v-model="editFormData.zip"
                      type="text"
                      class="form-control"
                      id="edit_zip"
                      autocomplete="chrome-off"
                      placeholder="Zip Code"
                    >

                    <div v-if="predictions.shipper.zip && predictions.shipper.zip.length" class="predictions">
                      <div @click="fillShipperInfoByZipPrediction(prediction)" v-for="prediction in predictions.shipper.zip" class="predictions-prediction p-2">
                        {{ prediction.description }}
                      </div>
                    </div>
                  </div>

                  <div v-for="error in editFormDataErrors.zip" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group has-predictions">
                    <label for="edit_city">City</label>
                    <input
                      v-model="editFormData.city"
                      @input="autocompleteShipperByCity"
                      @focusout="onShipperCityFocusOut"
                      type="text"
                      class="form-control"
                      id="edit_city"
                      autocomplete="chrome-off"
                      placeholder="City"
                    >

                    <div v-if="predictions.shipper.city && predictions.shipper.city.length" class="predictions">
                      <div @click="fillShipperInfoByCityPrediction(prediction)" v-for="prediction in predictions.shipper.city" class="predictions-prediction p-2">
                        {{ prediction.description }}
                      </div>
                    </div>
                  </div>

                  <div v-for="error in editFormDataErrors.city" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_state">State</label>

                    <select
                      class="form-control"
                      v-if="states"
                      v-model="editFormData.state"
                      id="edit_state"
                    >
                      <option selected="" disabled="">State</option>
                      <option v-for="item in states" :value="item.key">
                        {{ item.value }}
                      </option>
                    </select>
                  </div>

                  <div v-for="error in editFormDataErrors.state" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_phone_2">Phone 2</label>
                    <the-mask
                      v-model="editFormData.phone_2"
                      placeholder="Phone 2"
                      mask="+1 (###) ###-####"
                      id="edit_phone_2"
                      type="text"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in editFormDataErrors.phone_2" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_mobile">Mobile</label>
                    <the-mask
                      v-model="editFormData.mobile"
                      placeholder="Mobile"
                      mask="+1 (###) ###-####"
                      id="edit_mobile"
                      type="text"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in editFormDataErrors.mobile" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_fax">Fax</label>

                    <the-mask
                      v-model="editFormData.fax"
                      type="text"
                      placeholder="Fax"
                      mask="+1 (###) ###-####"
                      id="edit_fax"
                      class="form-control"
                    ></the-mask>
                  </div>

                  <div v-for="error in editFormDataErrors.fax" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <div class="form-group">
                    <label for="edit_notes_from_shipper">Notes From Shipper</label>
                    <textarea v-model="editFormData.notes_from_shipper" type="text" class="form-control"
                              id="edit_notes_from_shipper" autocomplete="chrome-off"
                              placeholder="Notes From Shipper"></textarea>
                  </div>

                  <div v-for="error in editFormDataErrors.notes_from_shipper" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <a @click="saveUser" class="btn btn-primary mr-2">Save</a>
                  <a @click="onEditModalHide" data-dismiss="modal" class="btn btn-light">Cancel</a>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="col-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <div class="row inbox-wrapper">
            <div class="col-12 col-xl-4 email-aside border-lg-right mb-3">
              <div class="aside-content">
                <div class="aside-header">
                  <div class="customer-header d-flex align-items-center justify-content-between">
                    <h6 class="card-title">Clients</h6>
                    <a @click="onCreateModalOpen" data-toggle="modal" data-target="#createModal" class="btn btn-primary mr-2 mb-2 mb-md-0">Create Client</a>
                  </div>
                </div>

                <div class="d-flex flex-column">
                  <a @click="selectClient(item)" v-for="item in clients" :class="`customer-item d-flex align-items-center border-bottom pt-3 pb-3 pl-3 ${(selectedClient && selectedClient.id === item.id ) ? 'active' : ''}`">
                    <div class="mr-3">
                      <img :src="`https://ui-avatars.com/api/?size=80&name=${item.name}`" class="rounded-circle wd-35" alt="user">
                    </div>
                    <div class="w-100">
                      <div class="d-flex justify-content-between">
                        <h6 class="text-body mb-2">{{ item.name }}</h6>
                      </div>
                      <p class="text-muted tx-13">
                        {{ item.email }}
                      </p>
                    </div>
                  </a>
                </div>

              </div>

            </div>
            <div class="col-12 col-xl-8">
              <div v-if="selectedClient" class="customers-contacts">
                <div class="row">
                  <div class="col-12 col-xl-9 grid-margin grid-margin-xl-0 mb-2 stretch-card">
                    <div style="width:100%;" class="customers-contacts-header d-flex">
                      <div class="customer-contacts-title">
                        <h6 class="card-title">
                          {{ selectedClient.name }}
                        </h6>
                      </div>

                      <div class="customer-contacts-controls d-flex ml-auto">
                        <a @click="editUser(selectedClient)" data-toggle="modal" data-target="#editModal" class="btn btn-secondary mr-2">Edit</a>
                        <a @click="deleteUser(selectedClient)" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <!-- Customer Info -->
                  <div class="col-12 col-xl-9 grid-margin grid-margin-xl-0 stretch-card">
                    <div class="card">
                      <div class="card-body">

                        <h6 class="card-title">Customer Info</h6>

                        <p>
                          {{ selectedClient.company }}
                        </p>

                        <p>
                          {{ selectedClient.address }}
                        </p>

                        <p>
                          {{ selectedClient.phone }}
                        </p>

                        <p>
                          {{ selectedClient.fax}}
                        </p>

                        <p>
                          {{ selectedClient.email}}
                        </p>

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
</template>

<script>
  import { client } from "../../../axios";
  import Loading from "../../loading/Loading";
  import router from "../../../router";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";
  import {mapGetters} from "vuex";

  export default {
    name: "Clients",
    data () {
      return {
        predictions: {
          shipper: {
            zip: [],
            city: [],
            state: []
          }
        },

        selectedClient: null,

        currentAutocompleteForm: 'create',

        clients: [],

        states: [],

        passwordFieldType: 'password',

        changeUserEmailInput: false,

        createFormData: {

        },
        createFormDataErrors: {
          first_name: [],
          last_name: [],
          password: [],
          phone: [],
          email: [],
          type: [],
          company: [],
          city: [],
          state: [],
          zip: [],
          address_1: [],
          address_2: [],
          phone_2: [],
          mobile: [],
          fax: [],
          notes_from_shipper: []
        },
        generate_password: false,
        ask_password_change_next_login: true,
        ask_password_change_disabled: false,
        sendingCredentials: false,

        editFormData: {

        },
        editFormDataErrors: {
          first_name: [],
          last_name: [],
          password: [],
          phone: [],
          email: [],
          type: [],
          company: [],
          city: [],
          state: [],
          zip: [],
          address_1: [],
          address_2: [],
          phone_2: [],
          mobile: [],
          fax: [],
          notes_from_shipper: []
        },

        /* change user email */
        changeUserEmail: {
          formData: {
            old_email: '',
            email: '',
          },
          errors: {
            old_email: [],
            email: []
          },
          isSending: false
        },

        createdUser: {
          email: '',
          password: ''
        },

        roles: []
      }
    },
    components: {
      Loading
    },
    methods: {
      showChangeUserEmailInput() {
        this.changeUserEmail.formData.old_email = this.editFormData.email;
        this.changeUserEmailInput = true;
      },
      generatePassword() {
        const size = 8;
        let chars = 'a-z,A-Z,0-9,#';
        let charactersArray = chars.split(',');
        let CharacterSet = '';
        let password = '';

        if( charactersArray.indexOf('a-z') >= 0) {
          CharacterSet += 'abcdefghijklmnopqrstuvwxyz';
        }
        if( charactersArray.indexOf('A-Z') >= 0) {
          CharacterSet += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }
        if( charactersArray.indexOf('0-9') >= 0) {
          CharacterSet += '0123456789';
        }
        if( charactersArray.indexOf('#') >= 0) {
          CharacterSet += '![]{}()%&*$#^<>~@|';
        }

        for(let i=0; i < size; i++) {
          password += CharacterSet.charAt(Math.floor(Math.random() * CharacterSet.length));
        }
        this.createFormData.password = password;

      },
      switchPasswordVisibility() {
        this.passwordFieldType = this.passwordFieldType === 'password' ? 'text' : 'password'
      },
      loadClients() {
        return client.get('/api/shipper/' + this.$route.params.shipper_id + '/clients')
          .then(res => {
            this.clients = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not get clients', 'error')
          })
      },
      loadStates() {
        return client.get('/api/states-data')
          .then(res => {
            this.states = [...res.data.data];
          })
          .catch(err => {
            this.$swal('Error', 'Could not load states data', 'error');
          })
      },

      /* Clean Block */
      cleanShipperPredictions() {
        this.predictions.shipper.city = [];
        this.predictions.shipper.zip = [];
      },
      clearCreateFormData() {
        this.createFormData = {};
      },
      clearEditFormData() {
        this.createFormData = {};
      },
      /* Clean block end */

      /* Autocomplete */
      autocompleteShipperByZip() {
        this.predictions.shipper.zip = [];

        if (window.autocompleteShipperByZipTimeout) clearTimeout(window.autocompleteShipperByZipTimeout);
        window.autocompleteShipperByZipTimeout = setTimeout(() => {

          if (this.activeFormData.zip.length >= 3) {
            this.getZipInfo(this.activeFormData.zip)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.shipper.zip = [...predictions];
                }

              })
          }
        }, 500)
      },

      onShipperZipFocusOut() {
        setTimeout(() => {
          this.predictions.shipper.zip = [];
        }, 100);
      },

      fillShipperInfoByZipPrediction(prediction) {
        if (prediction.types.includes('postal_code')) {
          this.activeFormData.city = prediction.terms[0].value;
          this.activeFormData.state = prediction.terms[1].value;
          this.activeFormData.zip = prediction.terms[2].value;
        }
        this.cleanShipperPredictions();
      },

      autocompleteShipperByCity() {
        this.predictions.shipper.city = [];

        if (window.autocompleteShipperByCityTimeout) clearTimeout(window.autocompleteShipperByCityTimeout);
        window.autocompleteShipperByCityTimeout = setTimeout(() => {

          if (this.activeFormData.city.length >= 3) {
            this.getCityInfo(this.activeFormData.city)
              .then(res => {
                this.swalMixin();

                const predictions = res.data.data.predictions;
                if (predictions.length) {
                  this.predictions.shipper.city = [...predictions];
                }
              })
          }

        }, 500)
      },

      onShipperCityFocusOut() {
        setTimeout(() => {
          this.predictions.shipper.city = [];
        }, 100);
      },

      fillShipperInfoByCityPrediction(prediction) {
        this.activeFormData.city = prediction.structured_formatting.main_text;

        this.getPlaceInfo(prediction.place_id)
          .then(res => {
            const details = res.data.data;

            details.results.forEach(item => {
              if (item.types.includes('postal_code')) {
                item.address_components.forEach(address_component => {
                  if (address_component.types.includes('postal_code')) {
                    this.activeFormData.zip = address_component.long_name;
                  }

                  if (address_component.types.includes('locality')) {
                    // this.activeFormData.city = address_component.long_name;
                  }

                  if (address_component.types.includes('administrative_area_level_1')) {
                    this.activeFormData.state = address_component.short_name;
                  }
                })
              }
            })
          })
          .finally(() => {
            this.cleanShipperPredictions();
          });
      },

      /* Zip Block */
      swalMixin() {
        return this.$swal.mixin({
          toast: true,
          position: 'bottom',
          showConfirmButton: false,
          timer: 1500
        }).fire({
          icon: 'success',
          title: 'Zip info loaded'
        });
      },

      getZipInfo(zip) {
        return client.get('/api/zip/' + zip + '/autocomplete');
      },

      getCityInfo(city) {
        return client.get('/api/city/' + city + '/autocomplete');
      },

      getPlaceInfo(placeId)
      {
        return client.get('/api/place/' + placeId + '/details');
      },

      /* Autocomplete end */

      /*Select User*/
      selectClient(client) {
        this.selectedClient = {...client};
      },

      /* Create user */
      onCreateModalOpen () {
        this.currentAutocompleteForm = 'create';
      },
      onCreatePasswordInput() {
        this.ask_password_change_next_login = true;
        this.ask_password_change_disabled = true;
      },
      onCreateModalHide() {
        this.ask_password_change_next_login = false;
        this.ask_password_change_disabled = false;
        this.createFormData = {
          ask_password_change_next_login: false,
          phone: null,
        };
        this.changeUserEmailInput = false;
        this.clearCreateErrors();
      },
      createUser() {
        this.clearCreateErrors();
        client.post('/api/shipper/' + this.$route.params.shipper_id + '/clients/', {
          ...this.createFormData,
          ask_password_change_next_login: this.ask_password_change_next_login
        })
          .then(res => {
            this.$swal('Success', 'Client has been created', 'success')
              .then(() => {
                this.generate_password = true;

                this.loadClients()
                  .then(res => {
                    this.selectClient(this.clients[0]);
                    this.clearCreateFormData();
                  });
                $('#createModal').modal('hide');

                this.createdUser.email = this.createFormData.email;
                this.createdUser.password = this.createFormData.password;

                $('#sendContactsModal').modal('show');
                this.onCreateModalHide();
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.createFormDataErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.createFormDataErrors[key].push(item);
                });
              }
            });
          })
      },
      clearCreateErrors () {
        Object.keys(this.createFormDataErrors).forEach(key => {
          this.createFormDataErrors[key] = [];
        });
      },
      clearEditErrors () {
        Object.keys(this.editFormDataErrors).forEach(key => {
          this.editFormDataErrors[key] = [];
        });
      },
      /* Create User end */

      /* Change User email */
      changeUserEmailModal(user) {
        this.changeUserEmail.formData.old_email = user.email;
      },
      clearChangeUserEmailErrors() {
        this.changeUserEmail.errors = {
          email: [],
          old_email: []
        }
      },
      sendChangeUserEmailConfirmationNotification () {
        this.clearChangeUserEmailErrors();
        this.changeUserEmail.isSending = true;

        client.post('/api/user/request-email-change', {
          ...this.changeUserEmail.formData
        })
          .then(res => {
            this.$swal('Success', 'Email change request notification has been successfully sent to client', 'success')
              .then(res => {
                $('#changeEmailModal').modal('hide');
                this.changeUserEmail.formData = {
                  email: '',
                  old_email: ''
                };
                this.changeUserEmailInput = false;
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.changeUserEmail.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.changeUserEmail.errors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.changeUserEmail.isSending = false;
          })
      },

      /* Edit user */
      editUser(user) {
        this.currentAutocompleteForm = 'edit';
        this.editFormData = {...user};
      },

      onEditModalHide() {
        // this.editFormData = {};
      },
      saveUser() {
        this.clearEditErrors();

        const updateData = {
          ...this.editFormData
        };
        if (this.user.role !=='Business Owner') {
          delete updateData.email;
        }

        client.post('/api/shipper/' + this.$route.params.shipper_id + '/clients/' + this.editFormData.id, {
          ...updateData
        })
          .then(res => {
            this.$swal('Success', 'Client has been updated', 'success')
              .then(() => {
                this.loadClients()
                  .then(res => {
                    const updatedSelectedUser = this.clients.find(i => i.id === this.selectedClient.id);
                    this.selectedClient = { ...updatedSelectedUser };
                    this.clearEditFormData();
                  });
                $('#editModal').modal('hide');
                this.onEditModalHide();

              });
          })
          .catch(error => {

            const err = error.response.data.errors;

            Object.keys(this.editFormDataErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.editFormDataErrors[key].push(item);
                });
              }
            });

          })
      },

      /* Delete user  */
      deleteUser(user){
        client.post('/api/shipper/' + this.$route.params.shipper_id + '/users/' + user.id + '/delete')
          .then(res => {
            this.$swal('Success', 'Client has been successfully deleted', 'success')
              .then(() => {
                this.selectedClient = null;
                this.loadClients();
              })
          })
          .catch(err => {
            this.$swal('Error', 'Could not delete user', 'error');
          })
      },

      /* Send Credentials */
      sendCredentials() {
        this.sendingCredentials = true;
        client.post('/api/send-credentials', {...this.createdUser, shipper_id: this.$route.params.shipper_id})
          .then(() => {
            this.$swal('Success', 'Credentials have been sent', 'success')
              .then(() => {
                $('#sendContactsModal').modal('hide');
              });
          })
          .catch(() => {
            this.$swal('Error', 'Credentials could not be sent', 'error')
          })
          .finally(() => {
            this.sendingCredentials = false;
          });
      }
    },

    computed: {
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      }),
      activeFormData() {
        if (this.currentAutocompleteForm === 'create') {
          return this.createFormData;
        }
        if (this.currentAutocompleteForm === 'edit') {
          return this.editFormData;
        }
      }
    },

    watch: {
      generate_password (val) {
        this.ask_password_change_next_login = !val;
        if (val) {
          this.generatePassword();
          this.ask_password_change_disabled = false;
        }
      },
      ask_password_change_next_login (val) {
        this.generate_password = !val;
      }
    },
    mounted() {
      this.loadClients()
      this.loadStates();
      this.generate_password = true;
    }
  }
</script>

<style lang="scss" scoped>
  .passwordToggler {
    position: absolute;
    cursor: pointer;
    top: 57%;
    right: 0;
    margin-right: 10px;
    & i {
      font-size: 21px;
    }
  }
</style>
