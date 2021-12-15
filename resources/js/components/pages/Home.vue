<template>
  <div class="home">
    <div v-if="user">
      <div class="mb-2">
        Greetings, {{ user.name }}!
      </div>

      <superadmin-dashboard v-if="user.role && user.role === 'Superadmin'"></superadmin-dashboard>
      <business-dashboard v-if="user.role && user.role === 'Business Owner'"></business-dashboard>

    </div>
  </div>
</template>

<script>
  import { ACTION_USER_LOAD_USER } from "../../store/modules/user/actions";
  import { GETTER_USER_USER } from "../../store/modules/user/getters";
  import { mapActions, mapGetters } from "vuex"
  import SuperadminDashboard from "../dashboard/SuperadminDashboard";
  import BusinessDashboard from "../dashboard/BusinessDashboard";

  export default {
    name: "Home",
    data () {
      return {
        text: ''
      }
    },
    components: {
      SuperadminDashboard,
      BusinessDashboard
    },
    methods: {
      ...mapActions({
        loadUser: 'user/' + ACTION_USER_LOAD_USER
      })
    },
    computed: {
      ...mapGetters({
        user: 'user/' + GETTER_USER_USER
      })
    },
    mounted() {
    }
  }
</script>

<style scoped>

</style>
