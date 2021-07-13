export default {
  // Global page headers: https://go.nuxtjs.dev/config-head
  head: {
    title: "whisked",
    htmlAttrs: {
      lang: "en",
      prefix:"og: http://ogp.me/ns#"
    },
    meta: [
      {
        charset: "utf-8"
      },
      {
        name: "viewport",
        content: "width=device-width, initial-scale=1, shrink-to-fit=no"
      }, 
      {
        "http-equiv": "X-UA-Compatible",
        content: "IE=edge"
      },
      {
        hid: "description",
        name: "description",
        content: "Устройте кинотеатр у себя дома! Смотрите онлайн фильмы хорошего качества в приятной домашней обстановке и в удобное для вас время. Для вас всегда доступны бесплатные фильмы без регистрации на любой вкус: сериалы, фильмы, мультфильмы и многое другое."
      },
      {
        name: "format-detection",
        content: "telephone=no"
      },
      {
        name: "robots",
        content: "index, follow"
      },
      {
        name: "theme-color",
        content: "#040404e6"
      },
      {
        name: "author",
        content: "Libils Team"
      },
      {
        name: "copyright",
        content: "Libils Team"
      },
    ],
    link: [
      {
        rel: "icon",
        type: "image/x-icon",
        href: "/favicon.ico"
      }
    ]
  },
  
  env: {
    baseUrl: process.env.BASE_URL || 'http://localhost:3000',
    apiKey: "850a24d2-f3a2-4451-b89e-1d20d8149663",
    urlTopFilms: "https://kinopoiskapiunofficial.tech/api/v2.2/films/top",
    urlDetailFilms: "https://kinopoiskapiunofficial.tech/api/v2.1/films/"
  },

  loading: {
    color: "#04a49c",
    height: "3px"
  },
  // Global CSS: https://go.nuxtjs.dev/config-css
  css: [],

  // Plugins to run before rendering page: https://go.nuxtjs.dev/config-plugins
  plugins: [
    '~/plugins/Intersection.js',
    '~/plugins/Scroll.js',
    '~/plugins/Global.js',
  ],

  serverMiddleware: ["~/api/index.js"],
  // Auto import components: https://go.nuxtjs.dev/config-components
  components: true,

  // Modules for dev and build (recommended): https://go.nuxtjs.dev/config-modules
  buildModules: [],
  // Modules: https://go.nuxtjs.dev/config-modules
  modules: [
    // https://go.nuxtjs.dev/axios
    "@nuxtjs/axios"
  ],

  // Axios module configuration: https://go.nuxtjs.dev/config-axios
  axios: {},

  // Build Configuration: https://go.nuxtjs.dev/config-build
  build: {}
};
