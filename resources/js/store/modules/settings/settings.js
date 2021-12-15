import {client} from "../../../axios";

/* State */
import state from "./state";

/* Getters */
import getters from "./getters";

/* Actions */
import actions from "./actions";

/* Mutations */
import mutations from "./mutations";

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
