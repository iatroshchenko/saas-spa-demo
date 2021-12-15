<template>
  <div class="email-template-form">

    <div v-if="targetTemplate" class="card">
      <div class="card-body">
        <h6 class="card-title">
          {{ targetTemplate.type }} Email Template
        </h6>

        <p v-if="this.variables && this.variables[this.selectedEmailType]" class="card-description">
          Variables can be used in double braces: for ex. {{ variableSyntaxExample }}
        </p>
        <p v-if="this.variables && this.variables[this.selectedEmailType]" class="card-description">
          Available variables for this template: {{ variables[this.selectedEmailType] }}
        </p>

        <form class="forms-sample">
          <div class="form-group">
            <label for="template_name">Template Name</label>
            <input v-model="targetTemplate.name" type="text" class="form-control" id="template_name" autocomplete="off"
                   placeholder="Template Name">
          </div>

          <div v-for="error in errors.name" class="form-group validation-error">
            {{ error }}
          </div>

          <div class="form-group">
            <label for="subject">Subject</label>
            <input v-model="targetTemplate.subject" type="text" class="form-control" id="subject" autocomplete="off" placeholder="Subject">
          </div>

          <div v-for="error in errors.subject" class="form-group validation-error">
            {{ error }}
          </div>

          <div class="form-group" v-show="editingBackgroundColor">
            <label for="background_color">Background Color</label>
            <chrome
              v-click-outside="() => { this.editingBackgroundColor = false; }"
              :value="{hex: targetTemplate.background_color || '#F5F6FA'}"
              @input="updateColorValue"></chrome>
          </div>

          <div class="form-group">
            <label for="html_template">Body</label>
            <editor
              v-model="targetTemplate.html_template"
              :inline="true"
              id="uuid"
              :init="{
                autofocus: true,
                height: 500,
                menubar: false,
                plugins: [
                  'advlist autolink lists link image charmap print preview anchor',
                  'searchreplace visualblocks code fullscreen',
                  'insertdatetime media table paste code help wordcount'
                ],
                toolbar:
                  'undo redo | formatselect | bold italic backcolor forecolor image | \
                  alignleft aligncenter alignright alignjustify | \
                  bullist numlist outdent indent | removeformat | help | background | mybutton ',
                setup: tinyMCESetup
            }"
            ></editor>
<!--            <textarea v-model="targetTemplate.html_template" class="form-control" id="html_template" rows="20"></textarea>-->
          </div>

          <div v-for="error in errors.html_template" class="form-group validation-error">
            {{ error }}
          </div>

          <div class="form-group">
            <label>Body as code (for custom styling)</label>
            <!-- Two-way Data-Binding -->
            <codemirror v-model="targetTemplate.html_template" :options="cmOptions" />
          </div>

          <a @click="save" class="btn btn-primary mr-2">Save</a>
          <a @click="saveAndSetActive" class="btn btn-primary mr-2">Save and Set Active</a>
        </form>
      </div>
    </div>

  </div>
</template>

<script>
  import { client } from "../../../../axios"
  import { mapGetters, mapActions } from "vuex"
  import {
    GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE,
    GETTER_EMAILS_GET_TARGET_TEMPLATE
  } from "../../../../store/modules/emails/getters";
  import {ACTION_EMAILS_LOAD_TEMPLATES, ACTION_EMAILS_SELECT_TEMPLATE} from "../../../../store/modules/emails/actions";
  import Editor from '@tinymce/tinymce-vue'
  import { Chrome } from "vue-color"

  export default {
    name: "EmailTemplateEditor",
    components: {
      Editor,
      Chrome
    },
    data () {
      return {
        editingBackgroundColor: false,
        cmOptions: {
          tabSize: 4,
          mode: 'htmlmixed',
          theme: 'base16-dark',
          lineNumbers: true,
          line: true,
          // more CodeMirror options...
        },
        errors: {
          name: [],
          subject: [],
          html_template: []
        },
        variables: {},
        variableSyntaxExample: '{{ variable }}',
        newTemplateHtml: `<table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
            <tbody>
            <tr>
                <td style="padding: 30px 30px 0; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                    <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                        Using {{ variable }},
                    </p>
                    <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                        This is some next
                    </p>
                </td>
            </tr>
            </tbody>
        </table>

        <table style="width:100%;max-width:620px;margin:0 auto;background-color:#ffffff;">
            <tbody>

            <tr>
                <td style="padding: 30px 30px 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                    <p style="text-align: center; font-size: 20px; margin-bottom: 20px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                        Details seciton:
                    </p>

                    <p style="margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                        <b style="padding-left: 10px; padding-right: 5px;">Field: </b> {{ anotherVariable }}
                    </p>

                    <p style="text-align: center; padding: 20px; margin-bottom: 10px; color: #8094ae; font-family: 'DM Sans', Arial, 'Helvetica Neue', sans-serif;">
                        <a href="{{ someUrl }}" style="background-color:#2660f7;border-radius:4px;color:#ffffff;display:inline-block;font-size:14px;font-weight:700;line-height:44px;text-align:center;text-decoration:none;text-transform: uppercase; padding: 0 25px">
                            Custom Button
                        </a>
                    </p>

                </td>
            </tr>

            </tbody>
        </table>`
      }
    },
    props: ['template'],
    computed: {
      ...mapGetters({
        selectedEmailType: 'emails/' + GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE,
        targetTemplate: 'emails/' + GETTER_EMAILS_GET_TARGET_TEMPLATE
      })
    },
    methods: {
      tinyMCESetup(editor) {
        setTimeout(() => {
          this.updateEmailBackgroundColor(this.targetTemplate.background_color);
        }, 100);

        editor.ui.registry.addButton('background', {
          text: 'background',
          onAction: () => {
            this.editingBackgroundColor = true;
          }
        });

        /* example, adding a toolbar menu button */
        editor.ui.registry.addMenuButton('mybutton', {
          text: '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M20,17V7c0-2.168-3.663-4-8-4S4,4.832,4,7v10c0,2.168,3.663,4,8,4S20,19.168,20,17z M12,5c3.691,0,5.931,1.507,6,1.994 C17.931,7.493,15.691,9,12,9S6.069,7.493,6,7.006C6.069,6.507,8.309,5,12,5z M6,9.607C7.479,10.454,9.637,11,12,11 s4.521-0.546,6-1.393v2.387C17.931,12.493,15.691,14,12,14s-5.931-1.507-6-2V9.607z M6,17v-2.393C7.479,15.454,9.637,16,12,16 s4.521-0.546,6-1.393v2.387C17.931,17.493,15.691,19,12,19S6.069,17.493,6,17z"></path></svg>',
          fetch: (callback) => {
            const items = [];

            this.variables[this.selectedEmailType].forEach(i => {
              items.push({
                type: 'menuitem',
                text: i,
                onAction: () => {
                  editor.insertContent('{{ '  + i  + ' }}');
                }
              })
            })

            callback(items);
          }
        });
      },
      ...mapActions({
        refreshTemplates: 'emails/' + ACTION_EMAILS_LOAD_TEMPLATES,
        setTargetTemplate: 'emails/' + ACTION_EMAILS_SELECT_TEMPLATE,
      }),
      updateEmailBackgroundColor(hex) {
        document.getElementsByClassName("mce-content-body")[0].style.backgroundColor = hex;
      },
      updateColorValue(color) {
        this.targetTemplate.background_color = color.hex;
        this.updateEmailBackgroundColor(color.hex);
      },
      loadVariables() {
        return client
          .get(`/api/shipper/${this.$route.params.shipper_id}/email-templates/variables`)
          .then(res => {
            this.variables = {...res.data.data}
          });
      },
      clearErrors() {
        this.errors = {
          name: [],
          subject: [],
          html_template: []
        }
      },
      save() {
        this.clearErrors();

        const newTemplateHtml = this.newTemplateHtml;

        client
          .post(`/api/shipper/${this.$route.params.shipper_id}/email-templates`, {
            ...this.targetTemplate
          })
          .then(res => {
            this.refreshTemplates({
              shipper_id: this.$route.params.shipper_id
            })
              .then(res => {
                this.setTargetTemplate({
                  shipper_id: this.$route.params.shipper_id,
                  type: this.selectedEmailType,
                  id: null,
                  name: 'My Email Template',
                  subject: null,
                  html_template: newTemplateHtml,
                  background_color: "#F5F6FA"
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
          });
      },
      saveAndSetActive() {
        this.clearErrors();

        const newTemplateHtml = this.newTemplateHtml;

        client
          .post(`/api/shipper/${this.$route.params.shipper_id}/email-templates/active`, {
            ...this.targetTemplate
          })
          .then(res => {
            this.refreshTemplates({
              shipper_id: this.$route.params.shipper_id
            })
              .then(res => {
                this.setTargetTemplate({
                  shipper_id: this.$route.params.shipper_id,
                  type: this.selectedEmailType,
                  id: null,
                  background_color: "#F5F6FA",
                  name: 'My Email Template',
                  subject: null,
                  html_template: newTemplateHtml,
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
          });
      }
    },
    mounted() {
      this.loadVariables();
    }
  }
</script>

<style lang="scss" scoped>
</style>
