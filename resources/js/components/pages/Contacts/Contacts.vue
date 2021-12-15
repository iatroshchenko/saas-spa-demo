<template>
  <div class="row">

    <div id="contactModal" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="contactModalLabel" aria-hidden="true">
      <div class="modal-container d-flex align-items-center justify-content-center">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="card">
              <div class="card-body">
                <div class="forms-sample">
                  <h6 class="card-title">Contact</h6>

                  <div v-show="actionCompany" class="form-group form-check">
                    <label class="form-check-label">
                      <input v-model="actionContact.is_primary" type="checkbox" class="form-check-input">
                      Primary Contact
                      <i class="input-frame bx bx-check"></i></label>
                  </div>

                  <!-- Customer -->
                  <div class="form-group">

                    <!-- Multiselect -->
                    <label>Company</label>
                    <multiselect
                      v-model="actionCompany"
                      tag-placeholder="New company"
                      placeholder="Search or add a company"
                      label="name"
                      track-by="id"
                      :options="companyOptions"
                      :multiple="false"
                      :taggable="true"
                      @tag="addTag"
                    ></multiselect>

                  </div>
                  <div v-for="error in contactErrors.customer_id" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="contact_first_name">First Name</label>
                    <input v-model="actionContact.first_name" type="text" class="form-control" id="contact_first_name"
                           placeholder="First Name">
                  </div>
                  <div v-for="error in contactErrors.first_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <!-- First Name -->
                  <div class="form-group">
                    <label for="contact_last_name">Last Name</label>
                    <input v-model="actionContact.last_name" type="text" class="form-control" id="contact_last_name"
                           placeholder="Last Name">
                  </div>
                  <div v-for="error in contactErrors.last_name" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <!-- Phone -->
                  <div class="form-group">
                    <label for="contact_phone">Phone Number</label>
                    <the-mask v-model="actionContact.phone" mask="+1 (###) ###-####" placeholder="Phone Number"
                              id="contact_phone" type="text" class="form-control"></the-mask>
                  </div>
                  <div v-for="error in contactErrors.phone" class="form-group validation-error">
                    {{ error }}
                  </div>

                  <!-- Email -->
                  <div class="form-group">
                    <label for="contact_email">Email</label>
                    <input v-model="actionContact.email" type="text" class="form-control" id="contact_email"
                           placeholder="Email">
                  </div>
                  <div v-for="error in contactErrors.email" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="mt-3">
                  <a @click="saveContact(actionContact)" class="btn btn-primary">
                    Save
                  </a>
                  <a data-dismiss="modal" class="btn btn-light">Cancel</a>
                </div>

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
                    <h6 class="card-title">Contacts</h6>
                    <a @click="addNewContact" class="btn btn-primary">
                      New
                    </a>
                  </div>
                </div>

                <div class="d-flex flex-column">
                  <div v-for="item in customers">

                    <a v-if="!item.is_contact" @click="selectCustomer(item)"
                       :class="`customer-item d-flex align-items-center border-bottom pt-3 pb-3 pl-3 ${(selectedCompany && selectedCompany.id === item.id ) ? 'active' : ''}`">
                      <div class="mr-3">
                        <i class='customer-icon bx bx-folder'></i>
                        <!-- <img :src="`https://ui-avatars.com/api/?size=80&name=${customer.company}`"
                             class="rounded-circle wd-35" alt="user"> -->
                      </div>
                      <div class="w-100">
                        <div class="d-flex justify-content-between">
                          <h6 class="text-body mb-2">{{ item.name }} ({{ item.contacts_count }})</h6>
                        </div>
                        <p style="font-weight: bold;" class="text-muted tx-15">
                          {{ item.contacts.find(i => i.is_primary) ? item.contacts.find(i => i.is_primary).name : 'No primary contact' }}
                        </p>
                        <p class="text-muted tx-13 mt-1">
                          {{ item.contacts.find(i => i.is_primary) ? item.contacts.find(i => i.is_primary).email : 'No primary contact' }}
                        </p>
                      </div>
                    </a>

                    <div v-if="selectedCompany && selectedCompany.id === item.id"
                         class="d-flex flex-column contacts">
                      <a @click="selectContact(contact)" v-for="contact in selectedCompany.contacts"
                         :class="`contacts-item d-flex align-items-center border-bottom pt-3 pb-3 pl-3 ${(selectedContact && selectedContact.id === contact.id ) ? 'active' : ''}`">
                        <div class="mr-3">
                          <img :src="`https://ui-avatars.com/api/?size=80&name=${contact.name}`"
                               class="rounded-circle wd-35" alt="user">
                        </div>
                        <div class="w-100">
                          <div class="d-flex justify-content-between">
                            <h6 class="text-body mb-2">
                              {{ contact.name }}

                              <span v-if="contact.is_primary" class="contacts-primary-badge">
                                <i class="bx bxs-badge-check"></i>
                              </span>
                            </h6>
                          </div>
                          <p class="text-muted tx-13">
                            {{ contact.email }}
                          </p>
                        </div>
                      </a>
                    </div>

                    <a
                      v-if="item.is_contact" @click="selectContact(item)"
                      :class="`contacts-item d-flex align-items-center border-bottom pt-3 pb-3 pl-3 ${(selectedContact && selectedContact.id === item.id ) ? 'active' : ''}`"
                    >
                      <div class="mr-3">
                        <img :src="`https://ui-avatars.com/api/?size=80&name=${item.name}`"
                             class="rounded-circle wd-35" alt="user">
                      </div>
                      <div class="w-100">
                        <div class="d-flex justify-content-between">
                          <h6 class="text-body mb-2">
                            {{ item.name }}

                            <span v-if="item.is_primary" class="contacts-primary-badge">
                                <i class="bx bxs-badge-check"></i>
                              </span>
                          </h6>
                        </div>
                        <p class="text-muted tx-13">
                          {{ item.email }}
                        </p>
                      </div>
                    </a>

                  </div>

                </div>

              </div>

            </div>
            <div class="col-12 col-xl-8">
              <div v-if="selectedContact" class="customers-contacts">
                <div class="row">
                  <div class="col-12 col-xl-9 grid-margin grid-margin-xl-0 mb-2 stretch-card">
                    <div style="width:100%;" class="customers-contacts-header d-flex">
                      <div class="customer-contacts-title">
                        <h6 class="card-title">
                          {{ selectedContact.name }}
                        </h6>
                      </div>

                      <div class="customer-contacts-controls d-flex ml-auto">
                        <a @click="editContact(selectedContact)" class="btn btn-secondary mr-2">Edit</a>
                        <a @click="deleteContact(selectedContact)" class="btn btn-danger">Delete</a>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="row">

                  <!-- Contact info Info -->
                  <div v-if="selectedContact" class="col-12 col-xl-9 grid-margin grid-margin-xl-0 stretch-card">
                    <div class="card">
                      <div class="card-body">

                        <h6 class="card-title">Contact Info</h6>

                        <p>
                          {{ selectedContact.name }}

                          <span v-if="selectedContact.is_primary" class="contacts-primary-badge">
                            <i class="bx bxs-badge-check"></i>
                          </span>
                        </p>

                        <p>
                          {{ selectedContact.phone }}
                        </p>

                        <p>
                          {{ selectedContact.email }}
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
  import {client} from "../../../axios";
  import Multiselect from 'vue-multiselect'

  export default {
    name: "Contacts",
    components: {
      Multiselect
    },
    data() {
      return {
        selectedCompany: null,
        actionCompany: null,
        selectedContact: null,
        actionContact: {},
        loading: false,

        contacts: [],
        customers: [],
        companyOptions: [],
        contactErrors: {
          first_name: [],
          last_name: [],
          email: [],
          phone: [],
          customer_id: []
        }
      }
    },
    methods: {
      addTag (newTag) {
        for(let i = 0; i < this.companyOptions.length; i++){
          if (this.companyOptions[i].id === 0) this.companyOptions.splice(i, 1);
        }

        const tag = {
          name: newTag,
          id: 0
        }

        this.companyOptions.unshift(tag);
        this.actionCompany = tag;
      },

      addNewContact(contact) {
        $('#contactModal').modal('show');
        this.actionContact = {};
      },
      editContact(contact) {
        $('#contactModal').modal('show');
        this.actionContact = {...contact};

        if (contact.contact_group_id) {
          this.actionCompany = this.companyOptions.find(i => i.id === contact.contact_group_id);
        } else {
          this.actionCompany = null;
        }
      },
      selectCustomer(customer) {
        this.selectedContact = null;
        if (this.selectedCompany && this.selectedCompany.id === customer.id) {
          this.selectedCompany = null
        } else {
          this.selectedCompany = {...customer};
        }
      },
      selectContact(contact) {
        if (this.selectedCompany && this.selectedCompany.id !== contact.contact_group_id) this.selectedCompany = null;
        this.selectedContact = {...contact};
      },
      saveContact(contact) {
        if (contact.id) {
          this.updateContact(contact);
        } else {
          this.createContact(contact);
        }
      },
      createContact(contact) {
        if (this.loading) return;
        this.loading = true;

        this.clearContactErrors();
        const shipperId = this.$route.params.shipper_id;
        const customerId = this.selectedCompany ? this.selectedCompany.id : null;

        client.post(`/api/shipper/${shipperId}/contacts`, {
          ...contact,
          contact_group_name: this.actionCompany ? this.actionCompany.name : null,
          contact_group_id: this.actionCompany ? this.actionCompany.id : null
        })
          .then(res => {
            this.loadContacts()
              .then(() => {
                /* Re-select selected company */
                if (customerId) {
                  const selectedCompany = this.customers.find(item => {
                    return item.id === customerId;
                  });
                  this.selectedCompany = {...selectedCompany};
                }

                /* Reset selected contact */
                this.selectedContact = null;
                this.actionCompany = null;

                $('#contactModal').modal('hide');
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.contactErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.contactErrors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.loading = false;
          });
      },
      updateContact(contact) {
        if (this.loading) return;
        this.loading = true;

        this.clearContactErrors();
        const shipperId = this.$route.params.shipper_id;
        const customerId = this.selectedCompany ? this.selectedCompany.id : null;

        client.post(`/api/shipper/${shipperId}/contacts/${contact.id}`, {
          ...contact,
          contact_group_name: this.actionCompany ? this.actionCompany.name : null,
          contact_group_id: this.actionCompany ? this.actionCompany.id : null
        })
          .then(res => {
            this.loadContacts()
              .then(() => {
                /* Re-select selected company */
                if (customerId) {
                  const selectedCompany = this.customers.find(item => {
                    return item.id === customerId;
                  });
                  this.selectedCompany = {...selectedCompany};
                }

                /* Reset selected contact */
                this.selectedContact = null;
                this.actionCompany = null;

                $('#contactModal').modal('hide');
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.contactErrors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.contactErrors[key].push(item);
                });
              }
            });
          })
          .finally(() => {
            this.loading = false;
          });
      },
      deleteContact(contact) {
        if (this.loading) return;
        this.loading = true;

        this.clearContactErrors();
        const shipperId = this.$route.params.shipper_id;

        const customerId = this.selectedCompany ? this.selectedCompany.id : null;

        client.post(`/api/shipper/${shipperId}/contacts/${contact.id}/delete`)
          .then(res => {
            this.loadContacts()
              .then(() => {
                /* Re-select selected company */
                if (customerId) {
                  const selectedCompany = this.customers.find(item => {
                    return item.id === customerId;
                  });
                  this.selectedCompany = {...selectedCompany};
                }

                /* Reset selected contact */
                this.selectedContact = null;
                this.actionCompany = null;
              });
          })
          .finally(() => {
            this.loading = false;
          });
      },
      clearContactErrors() {
        this.contactErrors = {
          email: [],
          first_name: [],
          last_name: [],
          phone: [],
          customer_id: []
        }
      },
      loadContacts() {
        return client.get('/api/shipper/' + this.$route.params.shipper_id + '/contacts/')
          .then(res => {
            this.customers = [...res.data.data];
            this.companyOptions = [...res.data.data].filter(i => !i.is_contact);
          });
      }
    },
    mounted() {
      this.loadContacts();
    }
  }
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>

<style lang="scss">
  .customer-item {
    cursor: pointer;

    &:hover {
      background-color: rgba(38, 96, 247, 0.1);
    }

    &.active {
      background-color: rgba(38, 96, 247, 0.1);
    }
  }

  .customer-icon {
    font-size: 28px;
    color: #888;
  }

  .contacts {
    padding-left: 30px;
  }

  .contacts-item {
    cursor: pointer;

    &:hover {
      background-color: rgba(38, 96, 247, 0.1);
    }

    &.active {
      background-color: rgba(38, 96, 247, 0.1);
    }
  }

  .contacts-primary-badge {
    margin-left: 5px;
    color: #ffe995;
  }
</style>
