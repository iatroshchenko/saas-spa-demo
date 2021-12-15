<template>
  <div class="row w-100 mx-0 auth-page">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card-body">
        <h6 class="card-title">Change Your Password</h6>
        <div class="card-text mb-4">We detected that You use generated password. Please consider changing it</div>
        <form class="forms-sample">
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
            <input v-model="formData.password_confirmation" type="password" class="form-control"
                   id="password_confirmation" autocomplete="chrome-off" placeholder="Password">
          </div>
          <a @click="changePassword" class="btn btn-primary mr-2">Change Password</a>
          <a @click="skipPasswordChange" class="btn btn-light">Skip</a>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapActions} from 'vuex';
  import {ACTION_SKIP_PASSWORD_CHANGE} from "../../store/modules/ui/actions";
  import {client} from "../../axios";
  import router from "../../router";

  export default {
    name: "AskPasswordChange",
    data() {
      return {
        formData: {
          password: '',
          password_confirmation: ''
        },
        errors: {
          password: [],
        }
      }
    },
    methods: {
      ...mapActions({
        skipPasswordChange: 'ui/' + ACTION_SKIP_PASSWORD_CHANGE
      }),
      clearErrors() {
        this.errors = {
          password: []
        }
      },
      changePassword() {
        this.clearErrors();

        client.post('/api/change-password', this.formData)
          .then(res => {
            this.$swal('Success', 'You have successfully changed your password', 'success')
              .then(() => {
                this.skipPasswordChange()
                  .then(() => {
                    router.push('/');
                  });
              });
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
          })
      }
    }
  }
</script>

<style scoped>

</style>
