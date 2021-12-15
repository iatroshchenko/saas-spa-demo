import {client} from "../../../axios";
import {local, session} from "../../../session";

/* Getters */
import {
} from "./getters";

/* Actions */
import {
  ACTION_QUOTE_DELETE,
  ACTION_QUOTE_EMAIL,
  ACTION_QUOTE_TO_ORDER,
  ACTION_QUOTE_RESTORE
} from "./actions";

/* Mutations */
import {
} from "./mutations";

const state = {
};
const getters = {
};
const actions = {
  [ACTION_QUOTE_DELETE]: (context, routeParams) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/quotes/' + routeParams.quote_id + '/delete');
  },
  [ACTION_QUOTE_EMAIL]: (context, { quote, routeParams }) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/quotes/' + quote.id + '/email', {
      email: quote.shipper.email
    })
  },
  [ACTION_QUOTE_TO_ORDER]: (context, { quote, routeParams }) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/quotes/' + quote.id + '/to-order')
  },
  [ACTION_QUOTE_RESTORE]: (context, routeParams) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/quotes/' + routeParams.quote_id + '/restore');
  }
};
const mutations = {
};

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
