<template>
  <div class="email-template-editor-area">
    <!-- Email Template List -->
    <email-template-list></email-template-list>
    <!-- Email Template List End -->

    <!-- Email Form -->
    <email-template-editor></email-template-editor>
    <!-- Email Form End -->
  </div>
</template>

<script>
  import EmailTemplateList from "./EmailTemplateList";
  import EmailTemplateEditor from "./EmailTemplateEditor";

  export default {
    name: "EmailTemplateEditorArea",
    props: [
      'templates'
    ],
    components: {
      EmailTemplateList,
      EmailTemplateEditor
    }
  };
</script>

<style lang="scss" scoped>
</style>
