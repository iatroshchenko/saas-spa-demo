<template>
  <div class="main main-wrapper">
    <AskPasswordChange v-if="askingPasswordChange"></AskPasswordChange>

    <SettingsSidebar></SettingsSidebar>

    <Sidebar v-if="!askingPasswordChange"></Sidebar>
    <div v-if="!askingPasswordChange" class="page-wrapper">
      <Header></Header>
      <div class="page-content">
        <router-view></router-view>
      </div>
      <footer class="footer d-flex flex-column flex-md-row align-items-center justify-content-between">
        <p class="text-muted text-center text-md-left">Copyright © 2020 <a href="https://indiviar.com" target="_blank">Indiviar</a>. All rights reserved</p>
      </footer>
    </div>
  </div>
</template>

<script>
  import Header from "./nav/Header";
  import Sidebar from "./nav/Sidebar";
  import SettingsSidebar from "./nav/SettingsSidebar";
  import AskPasswordChange from "./include/AskPasswordChange";
  import {mapGetters} from "vuex"
  import {GETTER_ASKING_PASSWORD_CHANGE} from "../store/modules/ui/getters";

  export default {
    name: "Main",
    components: {
      Header,
      Sidebar,
      AskPasswordChange,
      SettingsSidebar
    },
    computed: {
      ...mapGetters({
        askingPasswordChange: 'ui/' + GETTER_ASKING_PASSWORD_CHANGE
      })
    }
  }
</script>

<style scoped>

</style>
