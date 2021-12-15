// State Management
import Vue from 'vue';
import Vuex from 'vuex';

// Modules
import user from './modules/user/user';
import ui from "./modules/ui/ui";
import quote from "./modules/quote/quote";
import settings from "./modules/settings/settings";
import load from "./modules/load/load";
import emails from "./modules/emails/emails";
import contacts from "./modules/contacts/contacts";

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    user,
    ui,
    quote,
    settings,
    load,
    emails,
    contacts
  }
});

export default store;
