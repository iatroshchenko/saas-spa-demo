import {client} from "../../../axios";
import {local, session} from "../../../session";

/* Getters */
import {
  GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE,
  GETTER_EMAILS_GET_TEMPLATES,
  GETTER_EMAILS_GET_TARGET_TEMPLATE
} from "./getters";

/* Actions */
import {
  ACTION_EMAILS_LOAD_TEMPLATES,
  ACTION_EMAILS_SELECT_EMAIL_TYPE, ACTION_EMAILS_SELECT_TEMPLATE
} from "./actions";

/* Mutations */
import {
  MUTATION_EMAILS_SET_SELECTED_EMAIL_TYPE, MUTATION_EMAILS_SET_SELECTED_TYPE_ON_TARGET_TEMPLATE,
  MUTATION_EMAILS_SET_TARGET_TEMPLATE,
  MUTATION_EMAILS_SET_TEMPLATES
} from "./mutations";

const state = {
  selectedEmailType: null,
  emailTemplates: null,
  targetTemplate: null
};
const getters = {
  [GETTER_EMAILS_GET_SELECTED_EMAIL_TYPE]: state => state.selectedEmailType,
  [GETTER_EMAILS_GET_TEMPLATES]: state => state.emailTemplates,
  [GETTER_EMAILS_GET_TARGET_TEMPLATE]: state => state.targetTemplate
};
const actions = {
  [ACTION_EMAILS_SELECT_EMAIL_TYPE]: (context, selectedEmailType) => {
    context.commit(MUTATION_EMAILS_SET_SELECTED_EMAIL_TYPE, selectedEmailType);
    context.commit(MUTATION_EMAILS_SET_SELECTED_TYPE_ON_TARGET_TEMPLATE);
  },
  [ACTION_EMAILS_LOAD_TEMPLATES]: (context, payload) => {
    const shipperId = payload.shipper_id;

    client
      .get(`/api/shipper/${shipperId}/email-templates`)
      .then(res => {
        context.commit(MUTATION_EMAILS_SET_TEMPLATES, {
          ...res.data.data
        });
      });
  },
  [ACTION_EMAILS_SELECT_TEMPLATE]: (context, payload) => {
    context.commit(MUTATION_EMAILS_SET_TARGET_TEMPLATE, payload);
  }
};
const mutations = {
  [MUTATION_EMAILS_SET_SELECTED_EMAIL_TYPE]: (state, selectedEmailType) => {
    state.selectedEmailType = selectedEmailType;
    state.targetTemplate = null;
  },
  [MUTATION_EMAILS_SET_TEMPLATES]: (state, emailTemplates) => {
    state.emailTemplates = emailTemplates;
  },
  [MUTATION_EMAILS_SET_TARGET_TEMPLATE]: (state, targetTemplate) => {
    state.targetTemplate = { ...targetTemplate };
  },
  [MUTATION_EMAILS_SET_SELECTED_TYPE_ON_TARGET_TEMPLATE]: (state) => {
    if (state.targetTemplate) {
      state.targetTemplate.type = state.selectedEmailType || 'quote'
    }
  }
};

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
