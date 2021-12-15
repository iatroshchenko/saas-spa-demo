import {client} from "../../../axios";
import { MUTATION_SETTINGS_SET } from './mutations';

export const ACTION_SETTINGS_GET = 'get-widget-settings';

const actions = {
  [ACTION_SETTINGS_GET]: (context, id) => {
    client.get(`/api/shipper/${id}/settings`).then(response => {
      context.commit(MUTATION_SETTINGS_SET, response.data);
    });
  }
};

export default actions;
