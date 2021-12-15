<template>

  <ul class="nav">

    <li v-if="user.shippers[0]" class="nav-item nav-category">
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

    <li v-if="user.sidebar.includes('quotes')" class="nav-item">
      <router-link
              :to="'/shipper/' + user.shippers[0].id + '/quotes'"
              class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-layer-plus'></i>
        </div>
        <span class="link-title">Quotes</span>
      </router-link>
    </li>

    <li v-if="user.sidebar.includes('quotes')" class="nav-item">
      <router-link
        :to="'/shipper/' + user.shippers[0].id + '/orders'"
        class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-package'></i>
        </div>
        <span class="link-title">Orders</span>
      </router-link>
    </li>

    <li v-if="user.sidebar.includes('loads')" class="nav-item">
      <router-link
              :to="'/shipper/' + user.shippers[0].id + '/loads'"
              class="nav-link"
      >
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-trip'></i>
        </div>
        <span class="link-title">Loads</span>
      </router-link>
    </li>

  </ul>
</template>

<script>
  export default {
    name: "ClientSidebar",
    props: ['user']
  }
</script>

<style scoped>

</style>
