<template>
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">

      <div v-show="!isAuthenticated" class="card">
        <div class="row">
          <div class="col-md-4 pr-md-0">
            <div class="auth-left-wrapper" style="background-image: url(https://source.unsplash.com/4H_I-HRjkyA/219x452)">
            </div>
          </div>
          <div class="col-md-8 pl-md-0">
            <div class="auth-form-wrapper px-4 py-5">
              <a href="#" class="noble-ui-logo d-block mb-2">
                <img style="max-width: 100px;" src="/images/logo.jpg" alt="APP">
              </a>
              <h5 class="text-muted font-weight-normal mb-4">Welcome back! Log in to your account.</h5>
              <form class="forms-sample">
                <div class="form-group">
                  <label for="login_email">Email address</label>
                  <input v-model="formData.email" type="email" class="form-control" id="login_email" placeholder="Email">
                </div>
                <div v-for="error in errors.email" class="form-group validation-error">
                  {{ error }}
                </div>

                <div class="form-group">
                  <label for="login_password">Password</label>
                  <input v-model="formData.password" type="password" class="form-control" id="login_password" autocomplete="current-password"
                         placeholder="Password">
                </div>
                <div v-for="error in errors.password" class="form-group validation-error">
                  {{ error }}
                </div>

                <div class="form-check form-check-flat form-check-primary d-flex justify-content-between">
                  <label class="form-check-label">
                    <input type="checkbox" class="form-check-input">
                    Remember me
                    <i class="input-frame bx bx-check"></i>
                  </label>

                  <router-link :to="{ name: 'password-reset' }" class="">Forgot Password?</router-link>
                </div>
                <div class="mt-3">
                  <a @click="login" id="login" class="btn btn-primary mr-2 mb-2 mb-md-0">Login</a>
                </div>


                <div class="d-flex mt-3">
                  <div class="text-muted mr-1">Not a user?</div>
                  <router-link to="/register">Sign up</router-link>
                </div>

              </form>
            </div>
          </div>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  import {client} from "../../axios"
  import {mapActions, mapGetters} from "vuex"
  import {ACTION_USER_LOAD_USER, ACTION_USER_LOGIN} from "../../store/modules/user/actions";
  import {ACTION_ASK_PASSWORD_CHANGE} from "../../store/modules/ui/actions";
  import {GETTER_USER_IS_AUTHENTICATED} from "../../store/modules/user/getters";
  import router from "../../router";

  export default {
    name: "Login",
    data() {
      return {
        onEnterClick: e => {
          e.preventDefault();
          if (e.keyCode === 13) {
            document.getElementById("login").click();
          }
        },

        formData: {
          email: '',
          password: ''
        },
        errors: {
          email: [],
          password: []
        }
      }
    },
    methods: {
      ...mapActions({
        markUserAsLoggedIn: 'user/' + ACTION_USER_LOGIN,
        askPasswordChange: 'ui/' + ACTION_ASK_PASSWORD_CHANGE,
        loadUser: 'user/' + ACTION_USER_LOAD_USER
      }),
      clearErrors() {
        this.errors = {
          email: [],
          password: []
        };
      },
      login() {
        let self = this;
        self.clearErrors();

        let response = client.post('/login', this.formData)
          .then(response => {
            (async () => {
              await this.loadUser();
              let response = await client.get('/api/userinfo');
              const responseData = response.data.data;
              if (responseData.ask_password_change_next_login) {
                await this.askPasswordChange();
              }
              await this.markUserAsLoggedIn();
              await router.push('/');
            })();
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.errors).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.errors[key].push(item);
                });
              }
            });

          });
      },
    },
    computed: {
      ...mapGetters({
        isAuthenticated: 'user/' + GETTER_USER_IS_AUTHENTICATED
      })
    },

    mounted() {
      document.addEventListener('keyup', this.onEnterClick);

      const emailVerified = document.getElementById('email-verified');
      if (emailVerified) {
        this.$swal('Success', 'Your email has been verified successfully!', 'success');
        emailVerified.remove();
      }
    },
    beforeDestroy() {
      document.removeEventListener('keyup', this.onEnterClick);
    }
  }
</script>

<style scoped>

</style>
