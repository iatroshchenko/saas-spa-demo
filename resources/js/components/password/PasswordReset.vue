<template>
  <div class="row w-100 mx-0">
    <div class="col-md-8 col-xl-6 mx-auto">
      <div class="card-body">
        <h6 class="card-title">Reset Password</h6>
        <div class="card-text mb-4">We'll send You a notification to reset your password</div>
        <form class="forms-sample">
          <div class="form-group">
            <label for="email">Email</label>
            <input v-model="formData.email" type="text" class="form-control" id="email" autocomplete="chrome-off"
                   placeholder="Email">
          </div>
          <div v-for="error in errors.email" class="form-group validation-error">
            {{ error }}
          </div>

          <div>
            <Loading v-if="isLoading"></Loading>
            <div class="d-flex" v-else>
              <a @click="sendPasswordResetEmail" class="btn btn-primary mr-2">Send Email</a>
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
  import { client } from '../../axios';
  import Loading from "../loading/Loading";

  export default {
    name: "PasswordReset",
    data() {
      return {
        isLoading: false,
        formData: {
          email: ''
        },
        errors: {
          email: []
        }
      }
    },
    components: {
      Loading
    },
    methods: {
      clearErrors() {
        this.errors = {
          email: []
        };
      },
      sendPasswordResetEmail () {
        this.clearErrors();
        this.isLoading = true;

        client.post('/password/email', {
          ...this.formData
        })
          .then(res => {
            this.$swal('Success', 'Email has been successfully sent', 'success');
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
          .finally(() => {
            this.isLoading = false;
          });
      }
    }
  }
</script>

<style scoped>

</style>
