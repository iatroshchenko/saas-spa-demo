import {client} from "../../../axios";
import {local, session} from "../../../session";

/* Getters */
import {
  GETTER_CONTACTS_GET_SELECTED_CUSTOMER
} from "./getters";

/* Actions */
import {
  ACTION_CONTACTS_SELECT_CUSTOMER
} from "./actions";

/* Mutations */
import {
  MUTATION_CONTACTS_SET_SELECTED_CUSTOMER
} from "./mutations";

const state = {
  selectedCustomer: null
};
const getters = {
  [GETTER_CONTACTS_GET_SELECTED_CUSTOMER]: state => {
    return state.selectedCustomer;
  }
};
const actions = {
  [ACTION_CONTACTS_SELECT_CUSTOMER]: (context, payload) => {
    context.commit(MUTATION_CONTACTS_SET_SELECTED_CUSTOMER, payload);
  }
};
const mutations = {
  [MUTATION_CONTACTS_SET_SELECTED_CUSTOMER]: (state, selectedCustomer) => {
    state.selectedCustomer = {...selectedCustomer};
  }
};

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
