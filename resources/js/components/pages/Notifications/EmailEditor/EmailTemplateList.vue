<template>
  <div class="email-template-editor-list">
    <!-- Inbox header -->
    <div v-show="false" class="email-inbox-header">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="email-title mb-2 mb-md-0">
            <span class="icon"
            ><svg
              xmlns="http://www.w3.org/2000/svg"
              width="24"
              height="24"
              viewBox="0 0 24 24"
              fill="none"
              stroke="currentColor"
              stroke-width="2"
              stroke-linecap="round"
              stroke-linejoin="round"
              class="feather feather-inbox"
            >
                <polyline points="22 12 16 12 14 15 10 15 8 12 2 12"></polyline>
                <path
                  d="M5.45 5.11L2 12v6a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-6l-3.45-6.89A2 2 0 0 0 16.76 4H7.24a2 2 0 0 0-1.79 1.11z"
                ></path></svg
            ></span>
            Inbox <span class="new-messages">(2 new messages)</span>
          </div>
        </div>
        <div class="col-lg-6">
          <div class="email-search">
            <div class="input-group input-search">
              <input
                class="form-control"
                type="text"
                placeholder="Search mail..."
              /><span class="input-group-btn">
                <button class="btn btn-outline-secondary" type="button">
                  <svg
                    xmlns="http://www.w3.org/2000/svg"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    stroke="currentColor"
                    stroke-width="2"
                    stroke-linecap="round"
                    stroke-linejoin="round"
                    class="feather feather-search"
                  >
                    <circle cx="11" cy="11" r="8"></circle>
                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                  </svg></button
                ></span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Inbox Header End -->

    <!-- Email Filters -->
    <div
      class="email-filters d-flex align-items-center justify-content-between flex-wrap"
    >
      <div class="email-filters-left flex-wrap d-md-flex">
        <div class="form-check form-check-flat form-check-primary">
          <label class="form-check-label">
            <input v-model="allTemplatesSelected" type="checkbox" class="form-check-input"/>
            <i class="input-frame bx bx-check"></i
            ></label>
        </div>
        <div class="btn-group mb-1 mb-md-0">
          <a @click="addNewTemplate" class="btn btn-outline-primary">New</a>
          <a @click="deleteSelected" class="btn btn-outline-danger">Delete</a>
        </div>
      </div>
    </div>
    <!-- Email Filters End -->

    <div class="email-list email-template-list">

      <!-- Email List Item -->
      <div
        v-for="template in selectedTemplates"
        class="email-list-item"
        @click="selectExistingTemplate(template)"
      >
        <div class="email-list-actions">
          <div class="form-check form-check-flat form-check-primary">
            <label @click.stop="" class="form-check-label">
              <input :value="template.id" v-model="selectedForAction" type="checkbox" class="form-check-input"/>
              <i class="input-frame bx bx-check"></i
              ></label>
          </div>
          <a :class="`favorite ${template.is_active ? 'active' : ''}`">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                         stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                         class="feather feather-star">
                        <polygon
                          points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2"></polygon>
                    </svg>
                </span>
          </a>
        </div>
        <a class="email-list-detail">
          <div>
            <span class="from">
              {{ template.name }}
            </span>
            <p class="msg">{{ template.subject }}</p>
          </div>
          <span class="date">{{ template.updated_at }}</span>
        </a>
      </div>
      <!-- Email List Item end -->

    </div>
  </div>


</template>

<script>
  import { client } from "../../../../axios";
  import { mapActions, mapGetters } from "vuex"
  import {
    ACTION_EMAILS_LOAD_TEMPLATES,
    ACTION_EMAILS_SELECT_TEMPLATE,
    ACTION_EMAILS_SELECT_EMAIL_TYPE
  } from "../../../../store/modules/emails/actions";
  import {
    GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE,
    GETTER_EMAILS_GET_TEMPLATES
  } from "../../../../store/modules/emails/getters";

  export default {
    name: "EmailTemplateList",
    data () {
      return {
        selectedForAction: [],
        allTemplatesSelected: false,
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
    watch: {
      allTemplatesSelected (val) {
        if (val) {
          this.selectAll();
        } else {
          this.unselectAll();
        }
      }
    },
    methods: {
      ...mapActions({
        loadEmailTemplates: 'emails/' + ACTION_EMAILS_LOAD_TEMPLATES,
        setTargetTemplate: 'emails/' + ACTION_EMAILS_SELECT_TEMPLATE,
        setEmailType: 'emails/' + ACTION_EMAILS_SELECT_EMAIL_TYPE,
      }),
      selectAll() {
        this.unselectAll();
        this.templates[this.selectedType].forEach(t => {
          this.selectedForAction.push(t.id);
        });
      },
      unselectAll() {
        this.selectedForAction = [];
      },
      addNewTemplate() {
        this.setTargetTemplate({
          shipper_id: this.$route.params.shipper_id,
          type: this.selectedType,
          id: null,
          background_color: "#f5f6fa",
          name: 'My Email Template',
          subject: null,
          html_template: this.newTemplateHtml
        });
      },
      selectExistingTemplate(template) {
        this.setTargetTemplate({
          shipper_id: this.$route.params.shipper_id,
          type: this.selectedType,
          id: template.id,
          name: template.name,
          subject: template.subject,
          background_color: template.background_color,
          html_template: template.html_template,
        });
      },
      deleteSelected() {
        if (!this.selectedForAction.length) return;

        client
          .post(`/api/shipper/${this.$route.params.shipper_id}/email-templates/delete`, {
            templates: [
              ...this.selectedForAction
            ]
          })
          .then(res => {
            this.loadEmailTemplates({
              shipper_id: this.$route.params.shipper_id
            })
              .then(res => {
                this.addNewTemplate();
              })
          })
      }
    },
    computed: {
      ...mapGetters({
        templates: 'emails/' + GETTER_EMAILS_GET_TEMPLATES,
        selectedType: 'emails/' + GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE
      }),
      selectedTemplates () {
        if (this.templates && this.selectedType) {
          return this.templates[this.selectedType];
        }

        return [];
      }
    },
    mounted() {
      this.setEmailType('quote');
    }
  }
</script>

<style lang="scss" scoped>
  .email-template-list {
    max-height: 300px;
    overflow-y: scroll;
  }
</style>
