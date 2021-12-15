<template>
  <div class="row w-100 mx-0">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card-body">
        <h6 class="card-title">Change Password</h6>
        <div class="card-text mb-4">Please enter and confirm your new password</div>
        <form class="forms-sample">
          <div class="form-group">
            <label for="email">Email</label>
            <input v-model="formData.email" type="text" class="form-control" id="email" autocomplete="chrome-off"
                   placeholder="Email">
          </div>
          <div v-for="error in errors.email" class="form-group validation-error">
            {{ error }}
          </div>

          <div class="form-group">
            <label for="password">Password</label>
            <input v-model="formData.password" type="password" class="form-control" id="password" autocomplete="chrome-off"
                   placeholder="Password">
          </div>
          <div v-for="error in errors.password" class="form-group validation-error">
            {{ error }}
          </div>

          <div class="form-group">
            <label for="password_confirmation">Confirm Password</label>
            <input v-model="formData.password_confirmation" type="password" class="form-control" id="password_confirmation" autocomplete="chrome-off"
                   placeholder="Confirm Password">
          </div>

          <div>
            <Loading v-if="isLoading"></Loading>
            <div class="d-flex" v-else>
              <a @click="resetPassword" class="btn btn-primary mr-2">Change Password</a>
              <router-link to="/login" class="btn btn-light">
                Cancel
              </router-link>
            </div>
          </div>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import Loading from "../loading/Loading";
  import { client } from "../../axios";
  import router from "../../router";
  import { ACTION_USER_LOGOUT } from "../../store/modules/user/actions";
  import { mapActions } from "vuex"

  export default {
    name: "PasswordChange",
    data () {
      return {
        isLoading: false,
        formData: {
          email: '',
          password: '',
          password_confirmation: '',
          token: ''
        },
        errors: {
          email: [],
          password: [],
          token: []
        }
      }
    },
    components: {
      Loading
    },
    methods: {
      ...mapActions({
        logout: 'user/' + ACTION_USER_LOGOUT
      }),
      clearErrors () {
        this.errors = {
          email: [],
          password: []
        }
      },
      resetPassword () {
        this.clearErrors();
        this.isLoading = true;

        client.post('/password/reset', {
          ...this.formData
        })
          .then(res => {
            this.$swal('Success', 'Your password has been successfully changed', 'success')
              .then(() => {
                this.logout()
                  .then(() => {
                    router.push('/');
                  })
              });
          })
          .catch(error => {
            const err = error.response.data.errors;

            Object.keys(this.formData).forEach(key => {
              if (err[key]) {
                err[key].forEach(item => {
                  this.errors[key].push(item);
                });
              }
            });
          })
        .finally(() => {
          this.isLoading = false;
        })
      }
    },
    mounted() {
      const urlParams = new URLSearchParams(window.location.search);
      const email = urlParams.get('email');
      if (email) {
        this.formData.email = email;
      }
      this.formData.token = this.$route.params.token;
    }
  }
</script>

<style scoped>

</style>
