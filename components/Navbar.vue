<template lang="html">
    <header v-scroll="headerFixed">
      <div class="container">
        <div class="inner-header">
          <div class="header-brand">
            <NuxtLink to="/">Whisked</NuxtLink>
            <span class="beta">beta</span>
          </div>
          <nav>
            <ul class="header-menu">
              <li class="header-menu-item">
                <NuxtLink class="header-menu-link" to="/"
                  >Топ-250</NuxtLink>
              </li>
              <li class="header-menu-item">
                <NuxtLink class="header-menu-link" to="/movies/"
                  >Фильмы</NuxtLink>
              </li>
              <li class="header-menu-item">
                <NuxtLink class="header-menu-link" to="/series/"
                  >Сериалы</NuxtLink
                >
              </li>
              <li class="header-menu-item">
                <NuxtLink class="header-menu-link" to="/anime/">Аниме</NuxtLink>
              </li>
            </ul>
          </nav>
          <div class="header-search">
            <form @submit.prevent>
              <div class="form-control">
                <input class="search" type="text" placeholder="Чем помочь ?" />
                <button>
                  <svg viewBox="0 0 18 18">
                    <path
                      fill-rule="evenodd"
                      clip-rule="evenodd"
                      d="M13.9499 12.4702C15.9598 9.71455 15.6403 5.74064 13.048 3.14826C10.193 0.293337 5.66259 0.195039 2.92892 2.92871C0.195246 5.66238 0.293543 10.1928 3.14847 13.0478C5.74081 15.6401 9.71462 15.9596 12.4703 13.9498C12.5259 14.1145 12.6194 14.2692 12.7506 14.4004L15.4212 17.071C15.8768 17.5266 16.6155 17.5266 17.0711 17.071C17.5267 16.6154 17.5267 15.8767 17.0711 15.4211L14.4005 12.7505C14.2693 12.6193 14.1146 12.5259 13.9499 12.4702ZM11.7161 11.7166C13.6296 9.80299 13.5608 6.63167 11.5624 4.63322C9.56394 2.63478 6.39262 2.56597 4.47905 4.47954C2.56548 6.39311 2.63429 9.56442 4.63274 11.5629C6.63119 13.5613 9.8025 13.6301 11.7161 11.7166Z"
                    ></path>
                  </svg>
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
</template>

<script>
export default {
  data() {
    return {
      lastScrollTop: 0,
    };
  },
  methods: {
    headerFixed(evt, el) {
      if (window.scrollY <= 0) {
        el.classList.remove("header_visible", "header_invisible");
        return;
      }
      if (window.scrollY > this.lastScrollTop) {
        el.classList.remove("header_visible");
        el.classList.add("header_invisible");
      } else if (window.scrollY < this.lastScrollTop) {
        el.classList.remove("header_invisible");
        el.classList.add("header_visible");
      }

      this.lastScrollTop = window.scrollY;
    },
  },
};
</script>

<style scoped>
header {
  position: sticky;
  top: 0px;
  z-index: 25;
  padding: 25px 0;
  background: #23232340;
  transition: top 0.4s linear, background 0.4s linear;
}

.header_visible {
  top: 0px;
  background: #040404e6;
}
.header_invisible {
  top: -90px;
  background: #040404e6;
}

.inner-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.header-brand a {
  font-size: 32px;
  font-family: "PT Sans", sans-serif;
  color: #fff;
  transition: color 0.3s ease;
}

.header-brand:hover a {
  color: var(--main-color);
}

.beta {
  font-size: 11px;
  color: #dadada;
  text-transform: uppercase;
  background: #3e3e3e;
  border-radius: 3px;
  padding: 3px;
  margin-left: 5px;
  vertical-align: super;
}

.header-menu {
  display: flex;
}

.header-menu-item {
  margin-left: 15px;
}
.header-menu-link {
  -webkit-transition: color 0.3s ease;
  -o-transition: color 0.3s ease;
  transition: color 0.3s ease;
  color: #fff;
  font-size: 18px;
}

.header-menu-item:hover .header-menu-link {
  color: var(--main-color);
}

.header-menu-item:first-child {
  margin-left: 0;
}

.form-control {
  position: relative;
}

.header-search .search {
  padding: 12px 39px 11px 39px;
  border: 0;
  background: #272727;
  border-radius: 4px;
  color: #a6a6a6;
  font-size: 15px;
  width: 350px;
}

.header-search button {
  position: absolute;
  left: 21.5px;
  background-color: inherit;
  top: 50%;
  cursor: pointer;
  border: 0;
  font-weight: 200;
  bottom: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 18px;
  height: 18px;
  fill: #a6a6a6;
}
</style>
