import {client} from "../../../axios";
import {local, session} from "../../../session";
import refreshImage from "../../../help/image-refresher";

/* Getters */
import {
  GETTER_ASKING_PASSWORD_CHANGE,
  GETTER_UI_THEME
} from "./getters";

/* Actions */
import {
  ACTION_ASK_PASSWORD_CHANGE,
  ACTION_SKIP_PASSWORD_CHANGE,
  ACTION_UI_TOAST,
  ACTION_UI_CHANGE_THEME,
  ACTION_UI_LOAD_THEME_FILE,
  ACTION_UI_REFRESH_USER_IMAGES
} from "./actions";

/* Mutations */
import {
  MUTATION_ASK_PASSWORD_CHANGE,
  MUTATION_SKIP_PASSWORD_CHANGE,
  MUTATION_UI_SET_THEME
} from "./mutations";

const state = {
  askingPasswordChange: false,
  theme: local.get('theme') || 'light'
};

const getters = {
  [GETTER_ASKING_PASSWORD_CHANGE]: state => state.askingPasswordChange,
  [GETTER_UI_THEME]: state => state.theme
};

const actions = {
  [ACTION_UI_REFRESH_USER_IMAGES]: (context) => {
    // User Avatar
    let image = document.getElementById('userAvatar');
    if (image) refreshImage(image);

    // User Avatar Inner
    image = document.getElementById('userAvatarInside');
    if (image) refreshImage(image);

    image = document.getElementById('companyLogo');
    if (image) refreshImage(image);
  },
  [ACTION_UI_TOAST]: (context, payload) => {
    payload.vm.$swal.mixin({
      toast: true,
      position: 'bottom',
      showConfirmButton: false,
      timer: 1500
    }).fire({
      icon: 'success',
      title: payload.text
    });
  },
  [ACTION_ASK_PASSWORD_CHANGE]: context => {
    context.commit(MUTATION_ASK_PASSWORD_CHANGE);
  },
  [ACTION_SKIP_PASSWORD_CHANGE]: context => {
    context.commit(MUTATION_SKIP_PASSWORD_CHANGE);
  },
  [ACTION_UI_LOAD_THEME_FILE]: (context) => {
    const currentTheme = context.getters[GETTER_UI_THEME];

    const appUrl = process.env.MIX_APP_URL;
    const darkThemeFileLink = appUrl + '/css/app-dark.css';
    const lightThemeFileLink = appUrl + '/css/app.css';

    document.getElementById('mainStyle')
      .setAttribute("href", currentTheme === 'light' ? lightThemeFileLink : darkThemeFileLink);
  },
  [ACTION_UI_CHANGE_THEME]: (context, payload) => {
    context.commit(MUTATION_UI_SET_THEME, payload);
    context.dispatch(ACTION_UI_LOAD_THEME_FILE);
  }
};
const mutations = {
  [MUTATION_ASK_PASSWORD_CHANGE]: state => {
    state.askingPasswordChange = true;
  },
  [MUTATION_SKIP_PASSWORD_CHANGE]: state => {
    state.askingPasswordChange = false;
  },
  [MUTATION_UI_SET_THEME]: (state, payload) => {
    local.set('theme', payload);
    state.theme = local.get('theme') || 'light';
  }
};

export default {
  namespaced: 'true',
  state,
  getters,
  actions,
  mutations
}
