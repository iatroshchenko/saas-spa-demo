const baseURL = '/api';
const axiosInstance = require('axios').create({
  baseURL
});
axios = require('axios').create();

// exports
module.exports = {
  apiClient: axiosInstance,
  client: axios
};
