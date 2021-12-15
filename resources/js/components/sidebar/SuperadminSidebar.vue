<template>

  <ul class="nav">
    <li class="nav-item nav-category">Pages</li>
    <li class="nav-item">
      <router-link to="/" class="nav-link">
        <div class="link-icon sidebar-icon-container">
          <i class='sidebar-icon bx bx-home'></i>
        </div>
        <span class="link-title">Home</span>
      </router-link>
    </li>

    <!-- Superadmin View -->
    <li class="nav-item nav-category">Quotes</li>
    <div v-if="user.controlledShippers.length">
      <li v-for="shipper in user.controlledShippers" class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#quotes" role="button"
           aria-expanded="true" aria-controls="quotes">
          <div class="sidebar-icon-container link-icon">
            <i class='sidebar-icon bx bx-cube'></i>
          </div>
          <div class="link-title">{{ shipper.name }}</div>
          <div class="sidebar-icon-container link-arrow">
            <i class='sidebar-icon bx bx-chevron-down'></i>
          </div>
        </a>
        <div class="collapse show" id="quotes">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a class="nav-link" :href="$router.resolve({name: 'shipper.quotes', params:{shipper_id: shipper.id}}).href">Quotes</a>
            </li>
          </ul>
        </div>
      </li>
    </div>

    <li v-if="user.controlledShippers.length" class="nav-item nav-category">Shippers</li>
    <div v-if="user.controlledShippers.length">
      <li v-for="item in user.controlledShippers" class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#shipping" role="button"
           aria-expanded="true" aria-controls="shipping">
          <div class="sidebar-icon-container link-icon">
            <i class='sidebar-icon bx bx-cube'></i>
          </div>
          <span class="link-title">{{ item.name }}</span>
          <div class="sidebar-icon-container link-arrow">
            <i class='sidebar-icon bx bx-chevron-down'></i>
          </div>
        </a>
        <div class="collapse show" id="shipping">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a class="nav-link" :href="$router.resolve({name: 'shipper.users', params:{shipper_id: item.id}}).href">Users</a>
            </li>
          </ul>
        </div>
      </li>
    </div>

    <li v-if="user.controlledShippers.length" class="nav-item nav-category">Clients</li>
    <div v-if="user.controlledShippers.length">
      <li v-for="item in user.controlledShippers" class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#clients" role="button"
           aria-expanded="true" aria-controls="clients">
          <div class="sidebar-icon-container link-icon">
            <i class='sidebar-icon bx bx-cube'></i>
          </div>
          <span class="link-title">{{ item.name }}</span>
          <div class="sidebar-icon-container link-arrow">
            <i class='sidebar-icon bx bx-chevron-down'></i>
          </div>
        </a>
        <div class="collapse show" id="clients">
          <ul class="nav sub-menu">
            <li class="nav-item">
              <a class="nav-link" :href="$router.resolve({name: 'shipper.users', params:{shipper_id: item.id}}).href">Users</a>
            </li>
          </ul>
        </div>
      </li>
    </div>
    <!-- Superadmin View End -->
  </ul>
</template>

<script>
  export default {
    name: "SuperadminSidebar",
    props: ['user']
  }
</script>

<style scoped>

</style>
