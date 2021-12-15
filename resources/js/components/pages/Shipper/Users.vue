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
                    Send Credentials to user's email
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
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Create User</h6>
                <form class="forms-sample">

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="create_first_name">First Name</label>
                    <input v-model="createFormData.first_name" type="text" class="form-control" id="create_first_name" placeholder="First Name">
                  </div>
                  <div v-for="error in createFormDataErrors.first_name" class="form-group validation-error">
                    {{ error
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

                  <div class="form-group">
                    <label for="create_role">Role</label>
                    <select v-model="createFormData.role" name="create_role" id="create_role">
                      <option v-for="role in roles" :value="role.id">
                        {{ role.name }}
                      </option>
                    </select>
                  </div>

                  <div v-for="error in createFormDataErrors.role" class="form-group validation-error">
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
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <h6 class="card-title">Edit User</h6>
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
                    <label for="edit_role">Role</label>
                    <select v-model="editFormData.role" name="edit_role" id="edit_role">
                      <option v-for="role in roles" :value="role.id">
                        {{ role.name }}
                      </option>
                    </select>
                  </div>
                  <div v-for="error in editFormDataErrors.role" class="form-group validation-error">
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

                  <a @click="saveUser" class="btn btn-primary mr-2">Save</a>
                  <a @click="onEditModalHide" data-dismiss="modal" class="btn btn-light">Cancel</a>
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
          <h6 class="card-title">Staff</h6>

          <div class="mt-3 mb-3 d-flex justify-content-end">
            <a data-toggle="modal" data-target="#createModal" class="btn btn-primary mr-2 mb-2 mb-md-0">Create User</a>
          </div>

          <div class="table-responsive">
            <table id="dataTableExample" class="table table-striped">
              <thead>
              <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Phone Number</th>
                <th>Status</th>
                <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <tr v-for="item in users">
                  <td>{{ item.first_name }}</td>
                  <td>{{ item.last_name }}</td>
                  <td>{{ item.email }}</td>
                  <td>{{ item.role_name }}</td>
                  <td>{{ item.phone }}</td>
                  <td>{{ item.status_name }}</td>
                  <td>
                    <div class="btn-group">
                      <button type="button" class="btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">...</button>
                      <div style="cursor: pointer;" class="dropdown-menu">
                        <a class="dropdown-item" @click="editUser(item)" data-toggle="modal" data-target="#editModal">Edit</a>
                        <a class="dropdown-item" @click="deleteUser(item)">Delete</a>
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
  import { client } from "../../../axios";
  import Loading from "../../loading/Loading";
  import router from "../../../router";
  import {GETTER_USER_USER} from "../../../store/modules/user/getters";
  import {mapGetters} from "vuex";

  export default {
    name: "Users",
    data () {
      return {
        users: [],
        dataTable: null,
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
          role: [],
        },
        generate_password: false,
        ask_password_change_next_login: true,
        ask_password_change_disabled: false,
        sendingCredentials: false,

        editFormData: {},
        editFormDataErrors: {
          first_name: [],
          last_name: [],
          phone: [],
          email: [],
          status: [],
          role: []
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
      },
      loadRoleList() {
        return client.get('/api/shipper/staff-roles-to-create')
         .then(res => {
           this.roles = [...res.data.roles];
         })
         .catch(err => {
           this.$swal('Error', 'Could not get roles', 'error')
         });
      },
      loadUsers() {
        const routeNameToEndpointMap = {
          ['shipper.admins']: 'admins',
          ['shipper.managers']: 'managers',
          ['shipper.drivers']: 'drivers',
          ['shipper.dispatchers']: 'dispatchers',
        };

        const endpoint = routeNameToEndpointMap[this.$route.name] || 'users';

        client.get('/api/shipper/' + this.$route.params.shipper_id + '/' + endpoint)
          .then(res => {
            if (this.dataTable) this.dataTable.destroy();
            this.users = [...res.data.data];
            setTimeout(() => {
              this.datatable();
            }, 0);
          })
          .catch(err => {
            this.$swal('Error', 'Could not get users', 'error')
          })
      },

      /* Create user */
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
      },
      createUser() {
        this.clearCreateErrors();
        client.post('/api/shipper/' + this.$route.params.shipper_id + '/users/', {
          ...this.createFormData,
          ask_password_change_next_login: this.ask_password_change_next_login
        })
          .then(res => {
            this.$swal('Success', 'User has been created', 'success')
              .then(() => {
                this.generate_password = true;

                this.loadUsers();
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
            this.$swal('Success', 'Email change request notification has been successfully sent to user', 'success')
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

        client.post('/api/shipper/' + this.$route.params.shipper_id + '/users/' + this.editFormData.id, {
          ...updateData
        })
          .then(res => {
            this.$swal('Success', 'User has been updated', 'success')
              .then(() => {
                this.loadUsers();
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
            this.$swal('Success', 'User has been successfully deleted', 'success')
              .then(() => {
                this.loadUsers();
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
      currentRoute() {
        return this.$route.name;
      },
      currentRole() {
        const routeToRoleMap = {
          'shipper.admins': () => this.roles.find(i => i.name === "Admin").id,
          'shipper.managers': () => this.roles.find(i => i.name === "Manager").id,
          'shipper.drivers': () => this.roles.find(i => i.name === "Driver").id,
          'shipper.dispatchers': () => this.roles.find(i => i.name === "Dispatcher").id
        }

        return routeToRoleMap[this.$route.name]();
      }
    },

    watch: {
      currentRoute(val) {
        this.createFormData.role = this.currentRole;
        this.loadUsers();
      },
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
      this.loadRoleList()
        .then(res => {
          this.createFormData.role = this.currentRole;
        });
      this.loadUsers();
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
