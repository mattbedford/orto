import Vue from 'vue'
import App from './App.vue'
import router from './router'

Vue.config.productionTip = false

Vue.directive('scroll', {
  inserted: function (el, binding) {
    let f = function (evt) {
      if (binding.value(evt, el)) {
        window.removeEventListener('scroll', f)
      }
    }
    window.addEventListener('scroll', f)
  }
})

// eslint-disable-next-line no-undef
const wpi = nonce_object;

Vue.config.productionTip = false;
Vue.prototype.$wp = wpi;

Vue.mixin({
  data() {
    return {
      nonce: this.$wp.rest_nonce,
      rest_base: this.$wp.rest_base,
    };
  },
});

new Vue({
  router,
  render: h => h(App),
  data: {
    inCart: [],
    ref: null,
  }
}).$mount('#app')
