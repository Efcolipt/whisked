<template lang="html">
    <footer>
        <div class="container">
           <div class="inner-footer">
                <div class="footer-menu">
                    <ul class="footer-list">
                        <li class="footer-list-item">
                            <NuxtLink class="footer-list-item-link" to="/rightholders">Правообладателям</NuxtLink>
                        </li>
                    </ul>
                </div>
            <div class="footer-info">
                <span class="footer-info-release">
                    Release <span class="text-mont">v2.0.0</span>
                </span>
                <span class="footer-info-copy">
                    © <span class="text-mont">2018-{{ currentYear }}</span> Whisked
                </span>
            </div>
           </div>
        </div>
    </footer>
</template>

<script>
export default {
  data() {
    return {
      currentYear: 0,
    };
  },
  created() {
    let date = new Date();
    this.currentYear = date.getFullYear();
  },
};
</script>

<style scoped>
footer {
  padding: 35px 0;
  background: #23232340;
  z-index: 20;
  width: 100%;
}

.footer-list {
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
  -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center;
}

.footer-list-item:first-child {
  margin-left: 0 !important;
}

.footer-list-item {
  margin-left: 35px;
}

.footer-list-item-link {
  -webkit-transition: color 0.3s ease;
  -o-transition: color 0.3s ease;
  transition: color 0.3s ease;
  color: #fff;
  font-size: 18px;
  transition: color 0.3s ease;
}

.footer-list-item-link:hover {
  color: var(--main-color);
}

.inner-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
}
.footer-info {
  display: flex;
  color: #a6a6a6;
}
.footer-info-copy {
  margin-left: 30px;
}
.text-mont {
  font-family: "Montserrat", serif;
}
</style>
