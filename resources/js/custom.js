String.prototype.capitalize = function() {
  return this.charAt(0).toUpperCase() + this.slice(1);
}

Userback = window.Userback || {};
Userback.access_token = process.env.MIX_USERBACK_ACCESS_TOKEN;

(function(id) {
  const s = document.createElement('script');
  s.async = 1;
  s.src = 'https://static.userback.io/widget/v1.js';
  const parent_node = document.head || document.body;
  parent_node.appendChild(s);
})('userback-sdk');
