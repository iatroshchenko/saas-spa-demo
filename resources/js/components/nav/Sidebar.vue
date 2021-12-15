<template>
  <nav class="sidebar">
    <div class="sidebar-header">
      <router-link to="/" class="sidebar-brand sidebar-logo">
        <img style="max-width: 100px;" src="/images/logo.jpg" alt="">
      </router-link>
      <div class="sidebar-toggler not-active">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
    <div class="sidebar-body" v-if="user">

      <superadmin-sidebar v-if="user.role === 'Superadmin'" :user="user"></superadmin-sidebar>
      <business-owner-sidebar v-if="user.role === 'Business Owner'" :user="user"></business-owner-sidebar>
      <staff-sidebar v-if="['Admin', 'Manager', 'Driver', 'Dispatcher'].includes(user.role)" :user="user"></staff-sidebar>
      <client-sidebar v-if="user.role === 'Client'" :user="user"></client-sidebar>

    </div>
  </nav>
</template>

<script>
  import router from "../../router";
  import {mapGetters, mapActions} from "vuex";
  import {GETTER_USER_USER} from "../../store/modules/user/getters";
  import BusinessOwnerSidebar from "../sidebar/BusinessOwnerSidebar";
  import ClientSidebar from "../sidebar/ClientSidebar";
  import StaffSidebar from "../sidebar/StaffSidebar";
  import SuperadminSidebar from "../sidebar/SuperadminSidebar";

  export default {
    name: "Sidebar",
    data () {
      return {

      }
    },
    components: {
      BusinessOwnerSidebar,
      ClientSidebar,
      StaffSidebar,
      SuperadminSidebar
    },
    computed: {
      currentRoute () {
        return router.currentRoute
      },
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      })
    },
    methods: {
      activeClass(path, className = 'active') {
        return router.currentRoute === path ? className : null;
      }
    },
    mounted() {
      $(function() {
        const body = $('body');
        const mainWrapper = $('.main-wrapper');
        const footer = $('footer');
        const sidebar = $('.sidebar');
        const navbar = $('.navbar').not('.top-navbar');

        // Sidebar toggle to sidebar-folded
        $('.sidebar-toggler').on('click', function(e) {
          $(this).toggleClass('active');
          $(this).toggleClass('not-active');
          if (window.matchMedia('(min-width: 992px)').matches) {
            e.preventDefault();
            body.toggleClass('sidebar-folded');
          } else if (window.matchMedia('(max-width: 991px)').matches) {
            e.preventDefault();
            body.toggleClass('sidebar-open');
          }
        });

        // close sidebar when click outside on mobile/table
        $(document).on('click touchstart', function(e){
          e.stopPropagation();

          // closing of sidebar menu when clicking outside of it
          if (!$(e.target).closest('.sidebar-toggler').length) {
            var sidebar = $(e.target).closest('.sidebar').length;
            var sidebarBody = $(e.target).closest('.sidebar-body').length;
            if (!sidebar && !sidebarBody) {
              if ($('body').hasClass('sidebar-open')) {
                $('body').removeClass('sidebar-open');
              }
            }
          }
        });

        //Close other submenu in sidebar on opening any
        $(".sidebar-body > .nav > .nav-item > a[data-toggle='collapse']").on("click", function () {
          $(".sidebar-body > .nav > .nav-item").find('.collapse.show').collapse('hide');
        });
      });
    }
  }
</script>

<style lang="scss">
  .sidebar-icon {
    &-container {
      display: flex;
      justify-content: center;
      align-items: center;
    }

    font-size: 18px;
  }
</style>
