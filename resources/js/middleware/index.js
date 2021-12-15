import store from "../store";
import {client} from "../axios";
import {ACTION_USER_LOGOUT} from "../store/modules/user/actions";

export const authenticated = {
  name: 'authenticated',
  middleware: function ({ to, from, router, pipeline }) {
    if (!store.state.user.isAuthenticated) {
      return router.push('/login');
    }

    return client.get('/api/auth')
      .then(res => {
        let authenticated = res.data;
        if (authenticated) {
          return pipeline.proceed();
        } else {
          store.dispatch('user/' + ACTION_USER_LOGOUT);
        }
      })
      .catch(err => {
        store.dispatch('user/' + ACTION_USER_LOGOUT);
      })
  }
}

export const guest = {
  name: 'guest',
  middleware: function ({ to, from, router, pipeline }) {
    if (store.state.user.isAuthenticated) {
      return router.push('/');
    }
    return pipeline.proceed();
  }
}

export const canEditEmailTemplates = {
  name: 'canEditEmailTemplates',
  middleware: function ({to, from, router, pipeline}) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/edit-email-templates', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageUsers = {
  name: 'canManageUsers',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-users', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageAdmins = {
  name: 'canManageAdmins',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-admins', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageManagers = {
  name: 'canManageManagers',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-managers', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageDispatchers = {
  name: 'canManageDispatchers',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-dispatchers', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageDrivers = {
  name: 'canManageDrivers',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-drivers', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canSeeQuotes = {
  name: 'canSeeQuotes',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/see-quotes', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canGetQuote = {
  name: 'canGetQuote',
  middleware: function ({ to, from, router, pipeline }) {
    const quoteId = to.params.quote_id;

    client.post('/api/can/get-quote', {
      quote_id: quoteId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canEditQuote = {
  name: 'canEditQuote',
  middleware: function ({ to, from, router, pipeline }) {
    const quoteId = to.params.quote_id;

    client.post('/api/can/edit-quote', {
      quote_id: quoteId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canCreateQuotes = {
  name: 'canCreateQuotes',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/create-quotes', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canCreateOrders = {
  name: 'canCreateOrders',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/create-orders', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canSeeLoads = {
  name: 'canSeeLoads',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/see-loads', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canGetLoad = {
  name: 'canGetLoad',
  middleware: function ({ to, from, router, pipeline }) {
    const loadId = to.params.load_id;

    client.post('/api/can/get-load', {
      load_id: loadId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canEditLoad = {
  name: 'canEditLoad',
  middleware: function ({ to, from, router, pipeline }) {
    const loadId = to.params.load_id;

    client.post('/api/can/edit-load', {
      load_id: loadId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canCreateLoads = {
  name: 'canCreateLoads',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/create-loads', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}

export const canManageContacts = {
  name: 'canManageContacts',
  middleware: function ({ to, from, router, pipeline }) {
    const shipperId = to.params.shipper_id;

    client.post('/api/can/manage-contacts', {
      shipper_id: shipperId
    })
      .then(res => {
        return pipeline.proceed();
      })
      .catch(err => {
        if (err.response.status !== 401) {
          // if not auth error
          return router.push('/404');
        } else {
          return router.push('/login');
        }
      })
  }
}
