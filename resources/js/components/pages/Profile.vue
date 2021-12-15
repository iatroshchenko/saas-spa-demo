<template>
  <div class="row">
    <div class="col-12 col-xl-6">
      <div class="row">
        <div class="col-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <div class="card-title mb-2 d-flex align-items-center">
                <div class="card-title-icon mr-2">
                  <i class='bx bx-user'></i>
                </div>
                <h6>Profile</h6>
              </div>

              <div class="form-group">
                <FormulateInput
                  type="image"
                  name="avatar"
                  label="Upload your custom avatar"
                  help="Select an image to upload."
                  validation="mime:image/jpeg,image/png,image/gif"
                  :uploader="avatarUploader"
                  v-model="avatarFile"
                />
              </div>

              <div class="mt-2">
                <div @click="updateProfileData" class="btn btn-primary">Save</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
</template>

<script>

  import { client } from "../../axios";
  import { mapActions } from "vuex";
  import {ACTION_UI_REFRESH_USER_IMAGES, ACTION_UI_TOAST} from "../../store/modules/ui/actions";
  import { ACTION_USER_LOAD_USER } from '../../store/modules/user/actions';

  export default {
    name: "Profile",
    data () {
      return {
        avatarFile: null,
        profileFormData: {
          avatar: ''
        }
      }
    },
    watch: {
      avatarFile(val) {
        setTimeout(() => {
          if (val && val.results[0]) {
            this.profileFormData.avatar = val.results[0].name;
          }
        }, 300);
      }
    },
    methods: {
      ...mapActions({
        toast: 'ui/' + ACTION_UI_TOAST,
        refreshImages: 'ui/' + ACTION_UI_REFRESH_USER_IMAGES,
        loadUser: 'user/' + ACTION_USER_LOAD_USER
      }),
      avatarUploader: async (file, progress, error, options) => {

        try {
          const formData = new FormData()
          formData.append('file', file)
          const result = await client.post('/api/upload-avatar', formData, {
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
      updateProfileData() {
        client.post('/api/profile', {
          ...this.profileFormData
        })
          .then(res => {
            this.loadUser('force')
              .then(res => {
                setTimeout(() => {
                  this.refreshImages();
                }, 100);

                this.toast( {
                  vm: this,
                  text: 'Profile successfully updated!'
                });
              });
          })
      }
    },
  }
</script>

<style scoped>

</style>
