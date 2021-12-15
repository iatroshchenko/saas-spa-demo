<template>
  <div class="email-type-selector">
    <div class="email-type-selector__menu aside-nav">
      <ul class="nav">
        <li
          :class="`email-type-selector__menu-item ${this.selected === 'quote' ? 'active' : ''}`"
          @click="selectEmailType('quote')"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-file-text"
              >
                <path
                  d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                ></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="16" y1="13" x2="8" y2="13"></line>
                <line x1="16" y1="17" x2="8" y2="17"></line>
                <polyline points="10 9 9 9 8 9"></polyline>
              </svg>
            </span>
            Quote
          </a>
        </li>

        <li
          :class="`email-type-selector__menu-item ${this.selected === 'quote-draft' ? 'active' : ''}`"
          @click="selectEmailType('quote-draft')"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-file-minus"
              >
                <path
                  d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"
                ></path>
                <polyline points="14 2 14 8 20 8"></polyline>
                <line x1="9" y1="15" x2="15" y2="15"></line>
              </svg>
            </span>
            Quote Draft
          </a>
        </li>

        <li
          :class="`email-type-selector__menu-item ${this.selected === 'credentials' ? 'active' : ''}`"
          @click="selectEmailType('credentials')"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-unlock"
              >
                <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                <path d="M7 11V7a5 5 0 0 1 9.9-1"></path>
              </svg>
            </span>
            Credentials
          </a>
        </li>

        <li
          :class="`email-type-selector__menu-item ${this.selected === 'order' ? 'active' : ''}`"
          @click="selectEmailType('order')"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-truck"
              >
                <rect x="1" y="3" width="15" height="13"></rect>
                <polygon points="16 8 20 8 23 11 23 16 16 16 16 8"></polygon>
                <circle cx="5.5" cy="18.5" r="2.5"></circle>
                <circle cx="18.5" cy="18.5" r="2.5"></circle>
              </svg>
            </span>
            Order
          </a>
        </li>

        <li
          :class="`email-type-selector__menu-item ${this.selected === 'email-verification' ? 'active' : ''}`"
          @click="selectEmailType('email-verification')"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-mail"
              >
                <path
                  d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"
                ></path>
                <polyline points="22,6 12,13 2,6"></polyline>
              </svg>
            </span>
            Email verification
          </a>
        </li>

        <li
          @click="selectEmailType('sms')"
          :class="`email-type-selector__menu-item ${this.selected === 'sms' ? 'active' : ''}`"
        >
          <a>
            <span class="icon">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
                fill="none"
                stroke="currentColor"
                stroke-width="2"
                stroke-linecap="round"
                stroke-linejoin="round"
                class="feather feather-smartphone"
              >
                <rect x="5" y="2" width="14" height="20" rx="2" ry="2"></rect>
                <line x1="12" y1="18" x2="12.01" y2="18"></line>
              </svg>
            </span>
            SMS Notification
          </a>
        </li>
      </ul>
    </div>
  </div>
</template>

<script>
  import { mapGetters, mapActions } from "vuex"
  import { GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE } from "../../../../store/modules/emails/getters";
  import { ACTION_EMAILS_SELECT_EMAIL_TYPE } from "../../../../store/modules/emails/actions";

  export default {
    name: "EmailTypeSelector",
    data () {
      return {

      }
    },

    methods: {
      ...mapActions({
        selectEmailType: 'emails/' + ACTION_EMAILS_SELECT_EMAIL_TYPE
      })
    },

    computed: {
      ...mapGetters({
        selected: 'emails/' + GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE
      })
    }
  };
</script>

<style lang="scss" scoped>
  .email-type-selector {
    &__menu {

    }

    &__menu-item {
      cursor: pointer;
    }
  }
</style>
