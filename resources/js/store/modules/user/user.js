import {client} from "../../../axios";
import {local, session} from "../../../session";

/* Getters */
import {
  GETTER_USER_IS_AUTHENTICATED,
  GETTER_USER_USER
} from "./getters";

/* Actions */
import {
  ACTION_USER_LOGIN,
  ACTION_USER_LOGOUT,
  ACTION_USER_SET_USER,
  ACTION_USER_FORGET_USER,
  ACTION_USER_LOAD_USER
} from "./actions";

/* Mutations */
import {
  MUTATION_USER_LOGIN,
  MUTATION_USER_LOGOUT,
  MUTATION_USER_SET_USER,
  MUTATION_USER_FORGET_USER
} from "./mutations";

const state = {
  isAuthenticated: !!local.get('isAuthenticated'),
  user: null
};
const getters = {
  [GETTER_USER_IS_AUTHENTICATED]: state => state.isAuthenticated,
  [GETTER_USER_USER]: state => state.user
};
const actions = {
  [ACTION_USER_LOGIN]: context => {
    local.set('isAuthenticated', 'yes');
    context.commit(MUTATION_USER_LOGIN);
  },
  [ACTION_USER_LOGOUT]: context => {
    local.set('isAuthenticated', '');
    context.dispatch(ACTION_USER_FORGET_USER)
      .then(() => {
        context.commit(MUTATION_USER_LOGOUT);
      });
  },
  [ACTION_USER_SET_USER]: (context, user) => {
    context.commit(MUTATION_USER_SET_USER, user);
  },
  [ACTION_USER_FORGET_USER]: context => {
    context.commit(MUTATION_USER_FORGET_USER)
  },
  [ACTION_USER_LOAD_USER]: (context, force = false) => {
    if (!force) {
      let user = context.state.user;
      if (user) return;
    }

    return client.get('/api/userinfo')
      .then(res => {
        const user = {
          name: res.data.data.name,
          email: res.data.data.email,
          controlledShippers: res.data.data.controlledShippers,
          shippers: res.data.data.shippers,
          role: res.data.data.role_name,
          sidebar: res.data.data.sidebar,
          avatar: res.data.data.avatar
        };
        return context.dispatch(ACTION_USER_SET_USER, user);
      })
      .catch(err => {
        if (context.state.isAuthenticated) {
          context.dispatch(ACTION_USER_LOGOUT);
        }
      })
  }
};
const mutations = {
  [MUTATION_USER_LOGIN]: state => {
    state.isAuthenticated = true;
  },
  [MUTATION_USER_LOGOUT]: state => {
    state.isAuthenticated = false;
  },
  [MUTATION_USER_SET_USER]: (state, user) => {
    state.user = user;
  },
  [MUTATION_USER_FORGET_USER]: state => {
    state.user = null;
  }
};

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
