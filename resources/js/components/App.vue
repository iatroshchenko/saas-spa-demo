<template>
  <div v-if="isAuthenticated && !external">
    <Main></Main>
  </div>
  <div v-else>
    <Anonymous-main></Anonymous-main>
  </div>
</template>

<script>
  import Main from "./Main";
  import AnonymousMain from "./AnonymousMain";
  import { client } from "../axios";
  import { mapGetters, mapActions } from "vuex";
  import router from "../router";
  import { GETTER_USER_IS_AUTHENTICATED } from "../store/modules/user/getters";
  import { ACTION_USER_LOAD_USER } from "../store/modules/user/actions";
  import { local } from "../session";
  import {ACTION_UI_LOAD_THEME_FILE} from "../store/modules/ui/actions";

  export default {
    name: "App",
    props: {
      external: {
        type: Boolean,
        default: false
      }
    },
    components: {
      Main,
      AnonymousMain
    },
    computed: {
      ...mapGetters({
        isAuthenticated: 'user/' + GETTER_USER_IS_AUTHENTICATED
      }),
      currentPath () {
        return this.$route.path;
      },
      matched () {
        return this.$route.matched[0] ? this.$route.matched[0].name : null;
      }
    },
    watch: {
      isAuthenticated (val) {
        if (val === false) {
          router.push('/login');
        }
      }
    },
    methods: {
      ...mapActions({
        loadUser: 'user/' + ACTION_USER_LOAD_USER,
        applyTheme: 'ui/' + ACTION_UI_LOAD_THEME_FILE
      })
    },
    created() {
      this.applyTheme();

      client
        .get('/sanctum/csrf-cookie')
        .then(response => {
          console.log('CSRF Cookie received');
          console.log(response);
        });
    },
    mounted() {
      const { external } = this.$props;
      console.log(external);
      if (!external) {
        this.loadUser();
      }

      const newEmailVerified = document.getElementById('new-email-verified');
      if (newEmailVerified) {
        this.$swal('Success', 'Your new email has been successfully verified', 'success');
      }

      const newQuoteConvertedToLoad = document.getElementById('quote-converted-to-order')
      if (newQuoteConvertedToLoad) {
        this.$swal('Success', 'Your quote has been successfully converted to Order', 'success');
      }
    }
  }
</script>

<style scoped>

</style>
