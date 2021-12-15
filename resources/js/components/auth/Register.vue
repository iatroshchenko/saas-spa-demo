<template>
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-12 col-lg-6 mx-auto">
      <div class="card">
        <div class="row">
          <div class="col-md-12 pl-md-0">
            <div class="auth-form-wrapper p-5 px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">
                <img style="max-width: 100px;" src="/images/logo.jpg" alt="APP">
              </a>
              <h5 class="text-muted font-weight-normal mb-4">Create a free account.</h5>

              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <!-- First Name -->
                  <div class="form-group">
                    <label for="first_name">First Name</label>
                    <input v-model="formData.first_name" type="text" class="form-control" id="first_name" placeholder="First Name">
                  </div>
                  <div v-for="error in errors.first_name" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <!-- Last Name -->
                  <div class="form-group">
                    <label for="last_name">Last Name</label>
                    <input v-model="formData.last_name" type="text" class="form-control" id="last_name" placeholder="Last Name">
                  </div>
                  <div v-for="error in errors.last_name" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <!-- Email -->
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input v-model="formData.email" type="text" class="form-control" id="email" placeholder="Email">
                  </div>
                  <div v-for="error in errors.email" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <!-- Phone Number -->
                  <div class="form-group">
                    <label for="phone">Phone Number</label>
                    <the-mask v-model="formData.phone" placeholder="Phone Number" mask="+1 (###) ###-####" id="phone" type="text" class="form-control"></the-mask>
                  </div>
                  <div v-for="error in errors.phone" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <!-- Password -->
                  <div class="form-group">
                    <label for="password">Password</label>
                    <input v-model="formData.password" type="password" class="form-control" id="password" placeholder="Password">
                  </div>
                  <div v-for="error in errors.password" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <!-- Confirm Password -->
                  <div class="form-group">
                    <label for="password_confirmation">Confirm Password</label>
                    <input v-model="formData.password_confirmation" type="password" class="form-control" id="password_confirmation" placeholder="Confirm Password">
                  </div>
                  <div v-for="error in errors.password_confirmation" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-12">
                  <!-- Business Name -->
                  <div class="form-group">
                    <label for="business_name">Business Name</label>
                    <input v-model="formData.business_name" type="text" class="form-control" id="business_name" placeholder="Business Name">
                  </div>
                  <div v-for="error in errors.business_name" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <!-- Mailing Address -->
                  <div class="form-group">
                    <label for="address">Address</label>
                    <input v-model="formData.address" type="text" class="form-control" id="address" placeholder="Mailing Address">
                  </div>
                  <div v-for="error in errors.address" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <!-- City -->
                  <div class="form-group">
                    <label for="city">City</label>
                    <input v-model="formData.city" type="text" class="form-control" id="city" placeholder="City">
                  </div>
                  <div v-for="error in errors.city" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-6 col-md-12">
                  <!-- State -->
                  <div class="form-group">
                    <label for="state">State</label>
                    <input v-model="formData.state" type="text" class="form-control" id="state" placeholder="State">
                  </div>
                  <div v-for="error in errors.state" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>

                <div class="col-lg-6 col-md-12">
                  <!-- Zip -->
                  <div class="form-group">
                    <label for="zip">Zip</label>
                    <input v-mask="'#####'" v-model="formData.zip" type="text" class="form-control" id="zip" placeholder="Zip">
                  </div>
                  <div v-for="error in errors.zip" class="form-group validation-error">
                    {{ error }}
                  </div>
                </div>
              </div>

              <div class="mt-3">
                <a @click="register" class="btn btn-primary mr-2 mb-2 mb-md-0">
                  Sign Up
                </a>
              </div>

              <router-link to="/login" class="d-block mt-3 text-muted">Already a user? Sign in</router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {client} from "../../axios"
  import router from "../../router";
  import Loading from "../loading/Loading";

  export default {
    name: "Register",
    components: {
      Loading
    },
    data() {
      return {
        isLoading: false,
        formData: {
          first_name: '',
          last_name: '',
          email: '',
          phone: '',
          password: '',
          password_confirmation: '',
          business_name: '',
          address: '',
          city: '',
          state: '',
          zip: ''
        },
        errors: {
          first_name: [],
          last_name: [],
          email: [],
          password: [],
          phone: [],
          business_name: [],
          address: [],
          city: [],
          state: [],
          zip: []
        }
      }
    },
    methods: {
      clearErrors () {
        Object.keys(this.errors).forEach(key => {
          this.errors[key] = [];
        });
      },
      registerRequest() {
        client.post('/register', this.formData)
          .then(response => {
            this.$swal('Success', 'You have been successfully registered. Please confirm your email', 'success')
              .then(() => {
                router.push('/');
              });
          })
          .catch(error => {
            this.$swal('Error', 'Your form contains some errors', 'error');

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
      register() {
        if (this.isLoading) return;
        this.clearErrors();
        this.isLoading = true;

        this.$swal.fire({
          title: 'Registering',
          text: 'Your Shipper is being registered',
          onOpen: () => {
            this.$swal.showLoading();
          }
        });

        setTimeout(() => {
          this.registerRequest();
        }, 500);
      }
    }
  }
</script>

<style lang="scss" scoped>
  .register-button {
    display: flex;
    align-items: center;
    justify-content: center;
  }
</style>
