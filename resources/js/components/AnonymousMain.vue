<template>
  <div class="main main-wrapper">
    <div class="page-wrapper">
      <div class="page-content d-flex align-items-center justify-content-center">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "AnonymousMain.vue",
  }
</script>

<style lang="scss" scoped>
  .main-wrapper {
    .page-wrapper {
      width: 100%;
      margin-left: 0;

      .page-content {
        margin-top: 0;
      }
    }
  }
</style>
