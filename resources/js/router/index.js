import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '../store'

Vue.use(VueRouter);

// Standalone Pages
import Emails from "../components/pages/Notifications/Emails";
import Contacts from "../components/pages/Contacts/Contacts";

// Users (staff + client users)
import ClientUsers from "../components/pages/Shipper/ClientUsers";
import ShipperUsers from "../components/pages/Shipper/Users";

// Components
import Login from "../components/auth/Login";
import Register from "../components/auth/Register";
import Home from "../components/pages/Home";
import PageNotFound from "../components/pages/PageNotFound";
import PasswordReset from "../components/password/PasswordReset";
import Profile from "../components/pages/Profile";

// Orders
import ShipperOrders from "../components/pages/Orders/Orders";

// Quotes
import ShipperQuotes from "../components/pages/Quotes/Quotes";
import CreateQuote from "../components/pages/Quotes/CreateQuote";
import ReviewQuote from "../components/pages/Quotes/ReviewQuote";
import EditQuote from "../components/pages/Quotes/EditQuote";
import QuoteAccomplish from "../components/pages/Public/QuoteAccomplish";

// Loads
import ShipperLoads from "../components/pages/Loads/Loads";
import CreateLoad from "../components/pages/Loads/CreateLoad";
import ReviewLoad from "../components/pages/Loads/ReviewLoad";
import EditLoad from "../components/pages/Loads/EditLoad";


// Business
import BusinessSettings from "../components/settings/BusinessSettings";

// Widgets
import QuickQuoteWidget from '../components/widgets/QuickQuoteWidget';

// Middleware
import {
  guest,
  authenticated,
  canManageUsers,
  canSeeQuotes, canGetQuote, canEditQuote, canCreateQuotes, canCreateOrders,
  canSeeLoads, canGetLoad, canEditLoad, canCreateLoads,
  canEditEmailTemplates, canManageContacts, canManageAdmins, canManageManagers, canManageDispatchers, canManageDrivers
} from "../middleware";

import PasswordChange from "../components/password/PasswordChange";
import ConfirmOrder from "../components/pages/Public/ConfirmOrder";
import Leads from "../components/pages/Shipper/Leads";

const handle404 = (to, from, next) => {
  // if (store.getters.isAuthenticated) {
  //     next('/')
  //     return
  // }
  // next('/login')
};

const router = new VueRouter({
  mode: 'history',
  routes: [
    /* Auth Block */
    {
      path: '/login',
      name: 'login',
      component: Login,
      meta: {
        middleware: guest
      }
    },
    {
      path: '/register',
      name: 'register',
      component: Register,
      meta: {
        middleware: guest
      },
    },

    /* User block */
    {
      path: '/profile',
      name: 'profile',
      component: Profile,
      meta: {
        middleware: authenticated
      }
    },

    /* Password reset */
    {
      path: '/password/reset',
      name: 'password-reset',
      component: PasswordReset,
      meta: {
        middleware: guest
      }
    },
    {
      path: '/password/reset/:token',
      name: 'password-change',
      component: PasswordChange,
      meta: {
        middleware: [
          guest
        ]
      }
    },
    /* Password reset end block */

    /* Pages Block */
    {
      path: '/',
      name: 'home',
      component: Home,
      meta: {
        middleware: [
          authenticated
        ]
      }
    },

    /* Users Block */
    {
      path: '/shipper/:shipper_id/admins',
      name: 'shipper.admins',
      component: ShipperUsers,
      meta: {
        middleware: [
          authenticated,
          canManageAdmins
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/managers',
      name: 'shipper.managers',
      component: ShipperUsers,
      meta: {
        middleware: [
          authenticated,
          canManageManagers
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/dispatchers',
      name: 'shipper.dispatchers',
      component: ShipperUsers,
      meta: {
        middleware: [
          authenticated,
          canManageDispatchers
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/drivers',
      name: 'shipper.drivers',
      component: ShipperUsers,
      meta: {
        middleware: [
          authenticated,
          canManageDrivers
        ]
      }
    },

    /* Clients Block */
    {
      path: '/shipper/:shipper_id/clients',
      name: 'shipper.clients',
      component: ClientUsers,
      meta: {
        middleware: [
          authenticated,
          canManageUsers
        ]
      }
    },

    /* Leads Block */
    {
      path: '/shipper/:shipper_id/leads',
      name: 'shipper.leads',
      component: Leads,
      meta: {
        middleware: [
          authenticated,
          canManageUsers
        ]
      }
    },

    /* Confirm Order */
    {
      path: '/temporary/confirm-order/:quote_id',
      name: 'temporary.confirm-order',
      component: ConfirmOrder
    },

    /* Quotes Block */
    {
      path: '/shipper/:shipper_id/quotes',
      name: 'shipper.quotes',
      component: ShipperQuotes,
      meta: {
        middleware: [
          authenticated,
          canSeeQuotes
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/quotes/create',
      name: 'shipper.quotes.create',
      component: CreateQuote,
      meta: {
        middleware: [
          authenticated,
          canCreateQuotes
        ]
      }
    },

    /* Orders Block */
    {
      path: '/shipper/:shipper_id/orders',
      name: 'shipper.orders',
      component: ShipperOrders,
      meta: {
        middleware: [
          authenticated,
          canSeeQuotes
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/orders/create',
      name: 'shipper.orders.create',
      component: CreateQuote,
      meta: {
        middleware: [
          authenticated,
          canCreateOrders
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/orders/:quote_id',
      name: 'shipper.orders.review',
      component: ReviewQuote,
      meta: {
        middleware: [
          authenticated,
          canGetQuote
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/orders/:quote_id/edit',
      name: 'shipper.orders.edit',
      component: EditQuote,
      meta: {
        middleware: [
          authenticated,
          canEditQuote
        ]
      },
    },

    /* Contacts block */
    {
      path: '/shipper/:shipper_id/contacts',
      name: 'Contacts',
      component: Contacts,
      meta: {
        middleware: [
          authenticated,
          canManageContacts
        ]
      }
    },

    /* Emails */
    {
      path: '/shipper/:shipper_id/emails',
      name: 'Emails',
      component: Emails,
      meta: {
        middleware: [
          authenticated,
          canEditEmailTemplates
        ]
      }
    },

    /* open route for guest quote edit start */
    {
      path: '/external/shipper/:shipper_id/quotes/:quote_id/accomplish',
      name: 'external.shipper.quotes.accomplish',
      component: QuoteAccomplish,
    },
    /* open route for guest quote edit end */

    /* Open route for client to confirm quote */
    /* Open route for client to confirm quote */

    /* Loads Block */
    {
      path: '/shipper/:shipper_id/loads',
      name: 'shipper.loads',
      component: ShipperLoads,
      meta: {
        middleware: [
          authenticated,
          canSeeLoads
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/loads/create',
      name: 'shipper.loads.create',
      component: CreateLoad,
      meta: {
        middleware: [
          authenticated,
          canCreateLoads
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/loads/:load_id',
      name: 'shipper.loads.review',
      component: ReviewLoad,
      meta: {
        middleware: [
          authenticated,
          canGetLoad
        ]
      }
    },
    {
      path: '/shipper/:shipper_id/loads/:load_id/edit',
      name: 'shipper.loads.edit',
      component: EditLoad,
      meta: {
        middleware: [
          authenticated,
          canEditLoad
        ]
      }
    },

    /* Settings Block */

    {
      path: '/shipper/:shipper_id/settings',
      name: 'business.settings',
      component: BusinessSettings,
      meta: {
        middleware: [
          authenticated
        ]
      }
    },

    /* Widgets block */

    {
      path: '/widget/quick-quote',
      name: 'widgets.quick-quote',
      component: QuickQuoteWidget,
    },

    /* All routes unknown so far */
    {
      path: "*",
      name: '404',
      component: PageNotFound,
      beforeEnter: (to, from, next) => {
        if (!store.state.user.isAuthenticated) {
          return next('/login');
        } else {
          return next();
        }
      }
    }
  ],
});

/* Middleware pipeline */
class Pipeline {
  constructor(to, from, next, router, mw = []) {
    this.currentMW = 0;
    this.mw = mw;
    this.to = to;
    this.from = from;
    this.finally = next;
    this.router = router;
  }

  proceed() {
    this.currentMW++;
    return this.go();
  }

  go() {
    const currentMiddleware = this.mw[this.currentMW];
    if (!currentMiddleware) {
      return this.finally();
    }

    return currentMiddleware.middleware({
      router: this.router,
      to: this.to,
      from: this.from,
      pipeline: this
    });
  }
}

router.beforeEach((to, from, next) => {
  let mw = [];

  if (to.meta.middleware) {
    mw = Array.isArray(to.meta.middleware)
      ? to.meta.middleware
      : [to.meta.middleware];
  }

  const pipeline = new Pipeline(to, from, next, router, mw);
  pipeline.go();
});

export default router;
