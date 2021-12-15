<template>

  <nav class="settings-sidebar">
    <div class="sidebar-body">
      <a href="#" class="settings-sidebar-toggler">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
             stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
             class="feather feather-settings">
          <circle cx="12" cy="12" r="3"></circle>
          <path
            d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1 0 2.83 2 2 0 0 1-2.83 0l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-2 2 2 2 0 0 1-2-2v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83 0 2 2 0 0 1 0-2.83l.06-.06a1.65 1.65 0 0 0 .33-1.82 1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1-2-2 2 2 0 0 1 2-2h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 0-2.83 2 2 0 0 1 2.83 0l.06.06a1.65 1.65 0 0 0 1.82.33H9a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 2-2 2 2 0 0 1 2 2v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 0 2 2 0 0 1 0 2.83l-.06.06a1.65 1.65 0 0 0-.33 1.82V9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 2 2 2 2 0 0 1-2 2h-.09a1.65 1.65 0 0 0-1.51 1z"></path>
        </svg>
      </a>
      <h6 class="text-muted">Sidebar:</h6>
      <div class="form-group border-bottom">
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarLight"
                   value="sidebar-light" checked="">
            Light
            <i class="input-frame"></i></label>
        </div>
        <div class="form-check form-check-inline">
          <label class="form-check-label">
            <input type="radio" class="form-check-input" name="sidebarThemeSettings" id="sidebarDark"
                   value="sidebar-dark">
            Dark
            <i class="input-frame"></i></label>
        </div>
      </div>
      <div class="theme-wrapper">
        <h6 class="text-muted mb-2">Light Version:</h6>
        <a @click="setLightTheme" :class="`theme-item ${theme === 'light' ? 'active' : ''}`">
          <img src="https://www.nobleui.com/html/template/assets/images/screenshots/light.jpg" alt="light version">
        </a>
        <h6 class="text-muted mb-2">Dark Version:</h6>
        <a @click="setDarkTheme" :class="`theme-item ${theme === 'dark' ? 'active' : ''}`">
          <img src="https://www.nobleui.com/html/template/assets/images/screenshots/dark.jpg" alt="light version">
        </a>
      </div>
    </div>
  </nav>

</template>

<script>

  import { mapGetters, mapActions } from "vuex";
  import {ACTION_UI_CHANGE_THEME} from "../../store/modules/ui/actions";
  import {GETTER_UI_THEME} from "../../store/modules/ui/getters";

  export default {
    name: "SettingsSidebar",
    data () {
      return {

      }
    },
    methods: {
      ...mapActions({
        setTheme: 'ui/' + ACTION_UI_CHANGE_THEME
      }),
      setLightTheme() {
        this.setTheme('light');
      },
      setDarkTheme() {
        this.setTheme('dark');
      }
    },
    computed: {
      ...mapGetters({
        theme: 'ui/' + GETTER_UI_THEME
      })
    },
    mounted() {
      $(function () {
        // Settings sidebar toggle
        $('.settings-sidebar-toggler').on('click', function(e) {
          $('body').toggleClass('settings-open');
        });

        // Sidebar theme settings
        $("input:radio[name=sidebarThemeSettings]").click(function() {
          $('body').removeClass('sidebar-light sidebar-dark');
          $('body').addClass($(this).val());
        })
      })
    }
  }
</script>

<style scoped>

</style>
