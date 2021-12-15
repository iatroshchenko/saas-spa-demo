<template>

  <ul class="nav">

    <li v-if="user.controlledShippers[0]" class="nav-item nav-category">
      Dashboard
    </li>

    <li class="nav-item">
      <router-link to="/" class="nav-link">
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-home'></i>
        </div>
        <span class="link-title">Home</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/contacts'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bxs-group'></i>
        </div>
        <span class="link-title">
          Contacts
        </span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item nav-category">
      Sales
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/leads'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-group'></i>
        </div>
        <span class="link-title">Leads</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/quotes'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-layer-plus'></i>
        </div>
        <span class="link-title">Quotes</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/orders'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-package'></i>
        </div>
        <span class="link-title">Orders</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item nav-category">
      Dispatch
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/loads'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bxs-car'></i>
        </div>
        <span class="link-title">Loads</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/tracking'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-trip'></i>
        </div>
        <span class="link-title">Tracking</span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item nav-category">
      Users
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <router-link
        :to="'/shipper/' + user.controlledShippers[0].id + '/clients'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bxs-group'></i>
        </div>
        <span class="link-title">
          Clients
        </span>
      </router-link>
    </li>

    <li v-if="user.controlledShippers[0]" class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#user-management" role="button"
         aria-expanded="true" aria-controls="user-management">
        <div class="sidebar-icon-container link-icon">
          <i class='sidebar-icon bx bx-group'></i>
        </div>
        <div class="link-title">Staff</div>
        <div class="sidebar-icon-container link-arrow">
          <i class='sidebar-icon bx bx-chevron-down'></i>
        </div>
      </a>
      <div class="collapse show" id="user-management">
        <ul class="nav sub-menu">
          <li class="nav-item">
            <router-link :to="'/shipper/' + user.controlledShippers[0].id + '/admins'" class="nav-link">
              Admins
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="'/shipper/' + user.controlledShippers[0].id + '/managers'" class="nav-link">
              Managers
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="'/shipper/' + user.controlledShippers[0].id + '/dispatchers'" class="nav-link">
              Dispatchers
            </router-link>
          </li>
          <li class="nav-item">
            <router-link :to="'/shipper/' + user.controlledShippers[0].id + '/drivers'" class="nav-link">
              Drivers
            </router-link>
          </li>
        </ul>
      </div>
    </li>

<!--    <li v-if="user.controlledShippers[0]" class="nav-item nav-category">-->
<!--      Settings-->
<!--    </li>-->

<!--    <li v-if="user.controlledShippers[0]" class="nav-item">-->
<!--      <router-link-->
<!--        :to="'/shipper/' + user.controlledShippers[0].id + '/settings'"-->
<!--        class="nav-link"-->
<!--      >-->
<!--        <div class="link-icon sidebar-icon-container">-->
<!--          <i class='sidebar-icon bx bx-cog'></i>-->
<!--        </div>-->
<!--        <span class="link-title">Settings</span>-->
<!--      </router-link>-->
<!--    </li>-->

<!--    <li v-if="user.controlledShippers[0]" class="nav-item">-->
<!--      <router-link-->
<!--        :to="'/shipper/' + user.controlledShippers[0].id + '/emails'"-->
<!--        class="nav-link"-->
<!--      >-->
<!--        <div class="link-icon sidebar-icon-container">-->
<!--          <i class='sidebar-icon bx bx-envelope'></i>-->
<!--        </div>-->
<!--        <span class="link-title">Notifications</span>-->
<!--      </router-link>-->
<!--    </li>-->

  </ul>
</template>

<script>
  export default {
    name: "BusinessOwnerSidebar",
    props: ['user']
  }
</script>

<style scoped>

</style>
