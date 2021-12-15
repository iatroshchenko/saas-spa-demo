import state from "./state";

export const MUTATION_SETTINGS_SET = 'set-widget-settings'

const mutations = {
  [MUTATION_SETTINGS_SET]: (state, payload) => {
    state.data = payload;
  }
};

export default mutations;
