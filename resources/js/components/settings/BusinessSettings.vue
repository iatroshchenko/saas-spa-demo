<template>
  <div class="container-fluid">

    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="card-title mb-0 d-flex align-items-center">
                  <div class="card-title-icon mr-2">
                    <i class='bx bx-user'></i>
                  </div>
                  <h6>Business settings</h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div class="row">
          <div class="col-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-header">
                <nav>
                  <div class="nav nav-tabs card-header-tabs" id="nav-tab" role="tablist">
                    <a class="nav-item nav-link active" id="nav-settings-tab" data-toggle="tab" href="#nav-settings"
                       role="tab" aria-controls="nav-settings" aria-selected="true">
                      <i class='bx bx-cog'></i>&nbsp;<span>Settings</span>
                    </a>
                    <a class="nav-item nav-link" id="nav-widgets-tab" data-toggle="tab" href="#nav-widgets" role="tab"
                       aria-controls="nav-widgets" aria-selected="false">
                      <i class='bx bx-code'></i>&nbsp;<span>Widgets</span>
                    </a>
                    <a class="nav-item nav-link" id="nav-emails-tab" data-toggle="tab" href="#nav-emails" role="tab"
                       aria-controls="nav-emails" aria-selected="false">
                      <i class='bx bx-envelope'></i>&nbsp;<span>Notifications</span>
                    </a>
                    <a class="nav-item nav-link" id="nav-integration-tab" data-toggle="tab" href="#nav-integration"
                       role="tab"
                       aria-controls="nav-integration" aria-selected="false">
                      <i class='bx bx-money'></i>&nbsp;<span>Payments</span>
                    </a>
                  </div>

                </nav>
              </div>

              <div class="card-body">
                <div class="tab-content" id="nav-tabContent">
                  <div class="tab-pane fade show active" id="nav-settings" role="tabpanel"
                       aria-labelledby="nav-settings-tab">

                    <div class="row">
                      <div class="col-12 col-xl-6">
                        <div v-if="currentCompanyLogoUrl" class="form-group">
                          <label>Company Logo</label>
                          <div class="company-logo-container">
                            <img id="companyLogo" :src="currentCompanyLogoUrl" alt="Company Logo Url">
                          </div>
                        </div>

                        <div class="form-group">
                          <FormulateInput
                            type="image"
                            name="company logo"
                            label="New Company logo"
                            help="Upload new company logo"
                            validation="mime:image/jpeg,image/png,image/gif"
                            :uploader="companyLogoUploader"
                            v-model="companyLogoFile"
                          />
                        </div>

                        <div class="form-group">
                          <FormulateInput
                            type="text"
                            v-model="formData.business_name"
                            name="Business Name"
                            label="Enter your Business Name"
                            validation="min:3,length"
                            validation-name="Business Name"
                          />
                        </div>

                        <div class="form-group">
                          <FormulateInput
                            type="text"
                            v-model="formData.address"
                            name="Address"
                            label="Enter Your Address"
                            validation="min:3,length"
                            validation-name="Address"
                          />
                        </div>

                        <div class="form-group">
                          <FormulateInput
                            type="text"
                            v-model="formData.email"
                            name="Email"
                            label="Enter Your Email"
                            validation="email"
                            validation-name="Email"
                          />
                        </div>

                        <ValidationProvider
                          name="Phone"
                          rules="required|numeric|min:10|max:10"
                          v-slot="{ errors }"
                        >
                          <div class="form-group">
                            <label for="phone">Phone</label>
                            <the-mask
                              v-model="formData.phone"
                              placeholder="Phone Number"
                              mask="+1 (###) ###-####"
                              id="phone"
                              autocomplete="chrome-off"
                              type="text"
                              class="form-control"
                            ></the-mask>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <ValidationProvider
                          name="Fax"
                          rules="required|numeric|min:10|max:10"
                          v-slot="{ errors }"
                        >
                          <div class="form-group">
                            <label for="fax">Fax</label>
                            <the-mask
                              v-model="formData.fax"
                              placeholder="Fax"
                              mask="+1 (###) ###-####"
                              id="fax"
                              autocomplete="chrome-off"
                              type="text"
                              class="form-control"
                            ></the-mask>
                          </div>

                          <div class="form-group validation-error">
                            {{ errors[0] }}
                          </div>
                        </ValidationProvider>

                        <div class="form-group">
                          <label for="price_per_mile">Price Per Mile</label>

                          <the-mask
                            v-model="formData.price_per_mile"
                            placeholder="Price per mile"
                            :mask="['$ ####', '$ # ###', '$ ## ###']"
                            id="price_per_mile"
                            type="text"
                            class="form-control"
                          ></the-mask>

                        </div>

                        <div v-for="error in errors.price_per_mile" class="form-group validation-error">
                          {{ error }}
                        </div>

                        <div class="form-group">
                          <label>Timezone</label>

                          <multiselect
                            v-model="formData.timezone"
                            :options="timezones"
                            :searchable="true"
                            :close-on-select="true"
                            :show-labels="true"
                            placeholder="Pick a value"
                          ></multiselect>
                        </div>

                      </div>
                    </div>

                  </div>

                  <div class="tab-pane fade" id="nav-widgets" role="tabpanel"
                       aria-labelledby="nav-settings-tab">

                    <div class="row">
                      <div class="col-12 col-xl-6">

                        <div class="form-group">
                          <label for="api_key">Quick quote widget:</label>
                          <div v-if="settings.data.length > 0" class="widget__link" id="api_key">
                            {{ quoteHelperIframe }}
                          </div>
                        </div>

                      </div>
                    </div>
                  </div>

                  <div class="tab-pane fade" id="nav-integration" role="tabpanel"
                       aria-labelledby="nav-settings-tab">
                    <h4>Stripe</h4>
                    <div class="form-group">
                      <label for="public_key">Public Key :</label>
                      <input v-model="formData.public_key" type="text" class="form-control" id="public_key"
                             placeholder="Public Key">
                    </div>
                    <div v-for="error in errors.public_key" class="form-group validation-error">
                      {{ error }}
                    </div>
                    <div class="form-group">
                      <label for="secret_key">Secret Key :</label>
                      <input v-model="formData.secret_key" type="text" class="form-control" id="secret_key"
                             placeholder="Secret Key">
                      <div v-for="error in errors.secret_key" class="form-group validation-error">
                        {{ error }}
                      </div>
                    </div>
                    <div class='from-group'>
                      <div class="form-check">
                        <input v-model="formData.test_mode" class="form-check-input ml-0" type="checkbox" value="1"
                               id="test_mode">
                        <label class="form-check-label ml-3" for="test_mode">Test Mode</label>
                      </div>
                    </div>
                    <hr>
                  </div>

                  <div class="tap-pane fade" id="nav-emails" role="tabpanel" aria-labelledby="nav-emails-tab">
                    <Emails></Emails>
                    <div class="mb-4"></div>
                  </div>

                  <div @click="setSettings" class="btn btn-primary">Save Settings</div>
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

  import {client} from "../../axios";
  import {mapActions, mapGetters, mapState} from 'vuex';
  import {GETTER_USER_USER} from "../../store/modules/user/getters";
  import {ACTION_USER_LOAD_USER} from "../../store/modules/user/actions";
  import {ACTION_SETTINGS_GET} from "../../store/modules/settings/actions";
  import Emails from "../pages/Notifications/Emails";
  import Multiselect from "vue-multiselect";
  import timezones from "../../help/timezones";
  import {ACTION_UI_REFRESH_USER_IMAGES} from "../../store/modules/ui/actions";

  export default {
    name: "BusinessSettings",
    data() {
      return {
        companyLogoFile: null,
        currentCompanyLogoUrl: null,

        timezones,
        formData: {
          price_per_mile: null,
          public_key: null,
          secret_key: null,
          test_mode: null,

          business_name: null,
          address: null,
          email: null,
          phone: null,
          fax: null,
          timezone: null
        },
        errors: {
          price_per_mile: [],
          public_key: [],
          secret_key: [],
          test_mode: [],

          business_name: [],
          address: [],
          email: [],
          phone: [],
          fax: [],
          timezone: []
        },
        client,
        loading: false,
        loaded: false,
      }
    },
    components: {
      Emails,
      Multiselect
    },
    methods: {
      /* Logo Uploader */
      companyLogoUploader: async (file, progress, error, options) => {

        try {
          const formData = new FormData()
          formData.append('file', file)
          const result = await client.post('/api/upload-company-logo', formData, {
            headers: {
              'Content-Type': 'multipart/form-data'
            }
          });
          progress(100);

          return { name: result.data.name };
        } catch (err) {
          let errorMessageText = 'Unable to upload file';

          if (err.response.status === 422) {
            errorMessageText = err.response.data.errors.file[0];
          }

          if (err.response.status === 413) {
              errorMessageText = 'File must be up to 1MB size';
          }

          error(errorMessageText);
        }
      },

      /* Parse User Data */
      parseCompanyLogo() {
        this.currentCompanyLogoUrl = this.user.controlledShippers[0].logo;
      },

      parseUserData() {
        this.formData.price_per_mile = this.user.controlledShippers[0].price_per_mile;
        this.formData.public_key = this.user.controlledShippers[0].public_key;
        this.formData.secret_key = this.user.controlledShippers[0].secret_key;
        this.formData.test_mode = this.user.controlledShippers[0].test_mode;

        this.formData.business_name = this.user.controlledShippers[0].business_name;
        this.formData.address = this.user.controlledShippers[0].address;
        this.formData.email = this.user.controlledShippers[0].email;
        this.formData.phone = this.user.controlledShippers[0].phone;
        this.formData.fax = this.user.controlledShippers[0].fax;
        this.formData.timezone = this.user.controlledShippers[0].timezone;

        this.parseCompanyLogo();
      },

      ...mapActions({
        loadUser: 'user/' + ACTION_USER_LOAD_USER,
        loadSettings: 'settings/' + ACTION_SETTINGS_GET,
        refreshImages: 'ui/' + ACTION_UI_REFRESH_USER_IMAGES
      }),
      clearErrors() {
        Object.keys(this.errors).forEach(key => {
          this.errors[key] = [];
        });
      },
      setSettings() {
        this.clearErrors();
        client.post('/api/shipper/' + this.user.controlledShippers[0].id + '/settings', {
          ...this.formData
        })
          .then(res => {
            this.loadUser(true)
              .then(res => {
                this.parseCompanyLogo();

                setTimeout(() => {
                  this.refreshImages();

                  this.$swal.mixin({
                    toast: true,
                    position: 'bottom',
                    showConfirmButton: false,
                    timer: 1500
                  }).fire({
                    icon: 'success',
                    title: 'Settings Updated'
                  });
                }, 300);
              })
          }).catch(error => {
          const err = error.response.data.errors;
          Object.keys(this.errors).forEach(key => {
            if (err[key]) {
              err[key].forEach(item => {
                this.errors[key].push(item);
              });
            }
          });
        })
          .finally(() => {
            this.isLoading = false;
          });
      },
      logoUrl: state => {
        const {data} = state.settings;
        const logoSetting = data.length > 0 && data.find(item => item.key === 'logo');

        return logoSetting ? logoSetting.value : null;
      }
    },
    watch: {
      companyLogoFile(val) {
        setTimeout(() => {
          if (val && val.results[0]) {
            this.formData.logo = val.results[0].name;
          }
        }, 300);
      }
    },
    computed: {
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      }),
      ...mapState({
        settings: state => state.settings,
        quoteHelperIframe: state => {
          const {data} = state.settings;
          const apiKeySetting = data.find(item => item.key === 'API');

          if (apiKeySetting) {
            return `<iframe height="400px" width="100%" frameBorder="0" src="${process.env.MIX_APP_URL}/widget/quick-quote?pub=${apiKeySetting.value}" />`;
          }

          return '';
        },
      }),
      uploadLogoUrl: function () {
        return `/api/shipper/${this.$route.params.shipper_id}/settings/logo`;
      }
    },
    mounted() {
      this.loading = true;

      this.loadUser()
        .then(() => {
          this.parseUserData();

          this.loadSettings(this.$route.params.shipper_id)
            .then(() => {
              this.loading = false
              this.loaded = true
            });
        })


    }
  }
</script>

<style lang="scss" scoped>
  .widget {
    &__link {
      padding: 10px;
      border-radius: 4px;
      background-color: #ececec;
      color: #000;
    }
  }

  .company-logo-container {
    img {
      border-radius: 50%;
    }
  }
</style>
