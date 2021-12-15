<template>
  <nav class="navbar">
    <a href="#" class="sidebar-toggler">
      <i class='header-icon bx bx-menu'></i>
    </a>
    <div class="navbar-content">
      <form class="search-form">
        <div class="input-group">
          <div class="input-group-prepend">
            <div class="input-group-text">
              <i data-feather="search"></i>
            </div>
          </div>
          <input type="text" class="form-control" id="navbarForm" placeholder="Search here...">
        </div>
      </form>
      <ul class="navbar-nav">
        <li v-show="false" class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="languageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="flag-icon flag-icon-us mt-1" title="us"></i> <span class="font-weight-medium ml-1 mr-1">English</span>
          </a>
          <div class="dropdown-menu" aria-labelledby="languageDropdown">
            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-us" title="us" id="us"></i> <span class="ml-1"> English </span></a>
            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-fr" title="fr" id="fr"></i> <span class="ml-1"> French </span></a>
            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-de" title="de" id="de"></i> <span class="ml-1"> German </span></a>
            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-pt" title="pt" id="pt"></i> <span class="ml-1"> Portuguese </span></a>
            <a href="javascript:;" class="dropdown-item py-2"><i class="flag-icon flag-icon-es" title="es" id="es"></i> <span class="ml-1"> Spanish </span></a>
          </div>
        </li>
        <li v-show="false" class="nav-item dropdown nav-apps">
          <a class="nav-link dropdown-toggle" href="#" id="appsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <div class="header-icon-container">
              <i class='header-icon bx bx-grid-alt'></i>
            </div>
          </a>
          <div class="dropdown-menu" aria-labelledby="appsDropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium">Web Apps</p>
              <a href="javascript:;" class="text-muted">Edit</a>
            </div>
            <div class="dropdown-body">
              <div class="d-flex align-items-center apps">
                <a href="/apps/chat">
                  <i class='bx bx-chat header-icon-lg'></i>
                  <p>Chat</p>
                </a>
                <a href="/apps/calendar">
                  <i class='bx bx-calendar-alt header-icon-lg'></i>
                  <p>Calendar</p>
                </a>
                <a href="/email/inbox">
                  <i class='bx bx-envelope header-icon-lg'></i>
                  <p>Email</p>
                </a>
                <a href="/general/profile">
                  <i class='bx bx-user header-icon-lg'></i>
                  <p>Profile</p>
                </a>
              </div>
            </div>
            <div class="dropdown-footer d-flex align-items-center justify-content-center">
              <a href="javascript:;">View all</a>
            </div>
          </div>
        </li>
        <li v-show="false" class="nav-item dropdown nav-messages">
          <a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="header-icon-container">
              <i class='header-icon bx bx-envelope'></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messageDropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium">9 New Messages</p>
              <a href="javascript:;" class="text-muted">Clear all</a>
            </div>
            <div class="dropdown-body">
              <a href="javascript:;" class="dropdown-item">
                <div class="figure">
                  <img src="https://via.placeholder.com/30x30" alt="userr">
                </div>
                <div class="content">
                  <div class="d-flex justify-content-between align-items-center">
                    <p>Leonardo Payne</p>
                    <p class="sub-text text-muted">2 min ago</p>
                  </div>
                  <p class="sub-text text-muted">Project status</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="figure">
                  <img src="https://via.placeholder.com/30x30" alt="userr">
                </div>
                <div class="content">
                  <div class="d-flex justify-content-between align-items-center">
                    <p>Carl Henson</p>
                    <p class="sub-text text-muted">30 min ago</p>
                  </div>
                  <p class="sub-text text-muted">Client meeting</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="figure">
                  <img src="https://via.placeholder.com/30x30" alt="userr">
                </div>
                <div class="content">
                  <div class="d-flex justify-content-between align-items-center">
                    <p>Jensen Combs</p>
                    <p class="sub-text text-muted">1 hrs ago</p>
                  </div>
                  <p class="sub-text text-muted">Project updates</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="figure">
                  <img src="https://via.placeholder.com/30x30" alt="userr">
                </div>
                <div class="content">
                  <div class="d-flex justify-content-between align-items-center">
                    <p>Amiah Burton</p>
                    <p class="sub-text text-muted">2 hrs ago</p>
                  </div>
                  <p class="sub-text text-muted">Project deadline</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="figure">
                  <img src="https://via.placeholder.com/30x30" alt="userr">
                </div>
                <div class="content">
                  <div class="d-flex justify-content-between align-items-center">
                    <p>Yaretzi Mayo</p>
                    <p class="sub-text text-muted">5 hr ago</p>
                  </div>
                  <p class="sub-text text-muted">New record</p>
                </div>
              </a>
            </div>
            <div class="dropdown-footer d-flex align-items-center justify-content-center">
              <a href="javascript:;">View all</a>
            </div>
          </div>
        </li>
        <li v-show="false" class="nav-item dropdown nav-notifications">
          <a class="nav-link dropdown-toggle" href="#" id="notificationDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="header-icon-container">
              <i class='header-icon bx bx-bell' ></i>
            </span>
            <div class="indicator">
              <div class="circle"></div>
            </div>
          </a>
          <div class="dropdown-menu" aria-labelledby="notificationDropdown">
            <div class="dropdown-header d-flex align-items-center justify-content-between">
              <p class="mb-0 font-weight-medium">6 New Notifications</p>
              <a href="javascript:;" class="text-muted">Clear all</a>
            </div>
            <div class="dropdown-body">
              <a href="javascript:;" class="dropdown-item">
                <div class="icon">
                  <i class='header-icon-sm bx bx-user-plus'></i>
                </div>
                <div class="content">
                  <p>New customer registered</p>
                  <p class="sub-text text-muted">2 sec ago</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="icon">
                  <i class='header-icon-sm bx bx-gift'></i>
                </div>
                <div class="content">
                  <p>New Order Recieved</p>
                  <p class="sub-text text-muted">30 min ago</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="icon">
                  <i class='header-icon-sm bx bxs-error-circle'></i>
                </div>
                <div class="content">
                  <p>Server Limit Reached!</p>
                  <p class="sub-text text-muted">1 hrs ago</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="icon">
                  <i class='header-icon-sm bx bx-layer' ></i>
                </div>
                <div class="content">
                  <p>Apps are ready for update</p>
                  <p class="sub-text text-muted">5 hrs ago</p>
                </div>
              </a>
              <a href="javascript:;" class="dropdown-item">
                <div class="icon">
                  <i class='header-icon-sm bx bx-download' ></i>
                </div>
                <div class="content">
                  <p>Download completed</p>
                  <p class="sub-text text-muted">6 hrs ago</p>
                </div>
              </a>
            </div>
            <div class="dropdown-footer d-flex align-items-center justify-content-center">
              <a href="javascript:;">View all</a>
            </div>
          </div>
        </li>
        <li v-if="user && user.controlledShippers[0]" class="nav-item nav-settings">
          <router-link :to="'/shipper/' + user.controlledShippers[0].id + '/settings'" class="nav-link">
            <span class="header-icon-container">
              <i class='header-icon bx bx-cog'></i>
            </span>
          </router-link>
        </li>
        <li v-if="user" class="nav-item dropdown nav-profile">
          <a class="nav-link dropdown-toggle" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img v-if="!user.avatar" :src="'https://ui-avatars.com/api/?size=30&name=' + user.name" alt="profile">
            <img v-else id="userAvatar" :src="user.avatar" alt="Profile">
          </a>
          <div class="dropdown-menu" aria-labelledby="profileDropdown">
            <div class="dropdown-header d-flex flex-column align-items-center">
              <div class="figure mb-3">
                <img v-if="!user.avatar" :src="'https://ui-avatars.com/api/?size=80&name=' + user.name" alt="Profile">
                <img id="userAvatarInside" v-else :src="user.avatar" alt="Profile">
              </div>
              <div class="info text-center">
                <p class="name font-weight-bold mb-0">{{ user.name }}</p>
                <p class="email text-muted mb-3">{{ user.email }}</p>
                <p class="role font-weight-bold mb-3">
                  {{ user.role }}
                </p>
              </div>
            </div>
            <div class="dropdown-body">
              <ul class="profile-nav p-0 pt-3">
                <li class="nav-item">
                  <a href="/profile" class="nav-link">
                    <i data-feather="user"></i>
                    <span>Profile</span>
                  </a>
                </li>
                <li v-show="isAuthenticated" class="nav-item">
                  <a href="" @click="logout" class="nav-link">
                    <i data-feather="log-out"></i>
                    <span>Log Out</span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
  import { client } from "../../axios"
  import { mapGetters, mapActions } from "vuex"
  import { GETTER_USER_IS_AUTHENTICATED, GETTER_USER_USER } from "../../store/modules/user/getters";
  import { ACTION_USER_LOGOUT } from "../../store/modules/user/actions";

  export default {
    name: "Header",
    methods: {
      logout () {
        client.post('/logout')
          .then(response => {
            this.markUserAsLoggedOut();
          })
      },
      ...mapActions({
        markUserAsLoggedOut: 'user/' + ACTION_USER_LOGOUT
      })
    },
    computed: {
      ...mapGetters({
        isAuthenticated: 'user/' + GETTER_USER_IS_AUTHENTICATED,
        user: 'user/' + GETTER_USER_USER
      }),
      isGuest () {
        return !this.isAuthenticated
      }
    }
  }

</script>

<style lang="scss" scoped>
  .dropdown-item:hover i {
    color: #535353 !important;
  }

  .header-icon {
    &-container {
      display: flex;
      align-items: center;
      justify-content: center;
    }
    &-ligth {
      color: #acacac;
    }
    &-lg {
      font-size: 24px;
    }
    &-sm {
      font-size: 18px;
    }
    color: #535353;
    font-size: 20px;
  }
</style>
