class Session extends Map {
  set(id, value) {
    if (typeof value === 'object') value = JSON.stringify(value);
    sessionStorage.setItem(id, value);
  }

  get(id) {
    const value = sessionStorage.getItem(id);
    try {
      return JSON.parse(value);
    } catch (e) {
      return value;
    }
  }
}
const session = new Session();

class Local extends Map {
  set(id, value) {
    if (typeof value === 'object') value = JSON.stringify(value);
    localStorage.setItem(id, value);
  }

  get(id) {
    const value = localStorage.getItem(id);
    try {
      return JSON.parse(value);
    } catch (e) {
      return value;
    }
  }
}
const local = new Local();

// exports
module.exports = {
  session,
  local
};
