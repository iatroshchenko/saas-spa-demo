<template>
  <div class="row inbox-wrapper">
    <div class="col-lg-12">
      <div class="card">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-3 email-aside border-lg-right">
              <div class="aside-content">
                <div class="aside-header">
                  <h6 class="card-title">Emails</h6>
                </div>
                <email-type-selector></email-type-selector>
              </div>
            </div>
            <div class="col-lg-9 email-content">
              <email-template-editor-area></email-template-editor-area>
            </div>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import EmailTypeSelector from "./EmailTypes/EmailTypeSelector"
  import EmailTemplateEditorArea from "./EmailEditor/EmailTemplateEditorArea";
  import { mapActions } from "vuex";
  import {ACTION_EMAILS_LOAD_TEMPLATES} from "../../../store/modules/emails/actions";

  export default {
    name: "Emails",

    data () {
      return {
      }
    },

    components: {
      EmailTypeSelector,
      EmailTemplateEditorArea
    },

    methods: {
      ...mapActions({
        loadEmailTemplates: 'emails/' + ACTION_EMAILS_LOAD_TEMPLATES
      })
    },

    mounted() {
      this.loadEmailTemplates({
        shipper_id: this.$route.params.shipper_id
      });
    }
  }
</script>
