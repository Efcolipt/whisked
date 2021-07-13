import Vue from "vue";

// Make sure to pick a unique name for the flag
// so it won't conflict with any other mixin.
Vue.mixin({
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition;
    } else {
      return { x: 0, y: 0 };
    }
  },
  methods: {
    async getData(url, params) {
      try {
        const response = await this.$axios.$get(url, {
          params,
          headers: {
            "X-API-KEY": process.env.apiKey
          }
        });
        return response || [];
      } catch (e) {
        console.log(e);
      }
    }
  }
}); // Set up your mixin then
