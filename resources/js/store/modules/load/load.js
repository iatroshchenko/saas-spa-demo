import {client} from "../../../axios";
import {local, session} from "../../../session";

/* Getters */
import {
} from "./getters";

/* Actions */
import {
  ACTION_LOAD_DELETE,
  ACTION_LOAD_EMAIL
} from "./actions";

/* Mutations */
import {
} from "./mutations";

const state = {
};
const getters = {
};
const actions = {
  [ACTION_LOAD_DELETE]: (context, routeParams) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/loads/' + routeParams.load_id + '/delete');
  },
  [ACTION_LOAD_EMAIL]: (context, { load, routeParams }) => {
    return client.post('/api/shipper/' + routeParams.shipper_id + '/loads/' + load.id + '/email', {
      email: load.shipper.email
    })
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
