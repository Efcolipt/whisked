<template>
  <div @click="$emit('download')" class="download-more">
    <button class="btn-download-more">
      <span>Показать еще</span>
      <svg
        xmlns="http://www.w3.org/2000/svg"
        xmlns:xlink="http://www.w3.org/1999/xlink"
        id="Layer_1"
        style="enable-background: new 0 0 128 128"
        version="1.1"
        viewBox="0 0 128 128"
        xml:space="preserve"
      >
        <g>
          <path
            d="M96.1,103.6c-10.4,8.4-23.5,12.4-36.8,11.1c-10.5-1-20.3-5.1-28.2-11.8H44v-8H18v26h8v-11.9c9.1,7.7,20.4,12.5,32.6,13.6   c1.9,0.2,3.7,0.3,5.5,0.3c13.5,0,26.5-4.6,37-13.2c19.1-15.4,26.6-40.5,19.1-63.9l-7.6,2.4C119,68.6,112.6,90.3,96.1,103.6z"
          />
          <path
            d="M103,19.7c-21.2-18.7-53.5-20-76.1-1.6C7.9,33.5,0.4,58.4,7.7,81.7l7.6-2.4C9,59.2,15.5,37.6,31.9,24.4   C51.6,8.4,79.7,9.6,98,26H85v8h26V8h-8V19.7z"
          />
        </g>
      </svg>
    </button>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.download-more {
  margin: 70px 25px;
}

.download-more:hover .btn-download-more {
  background: rgba(35, 35, 35, 0.8);
}

.btn-download-more {
  cursor: pointer;
  transition: background 0.3s ease-in-out;
  padding: 15px 0;
  width: 100%;
  display: flex;
  align-items: center;
  font-size: 20px;
  justify-content: center;
  border: none;
  border-radius: 3px;
  background: rgba(35, 35, 35, 0.5);
  color: #fff;
}
.btn-download-more span {
  font-family: "Montserrat", sans-serif;
}
.btn-download-more svg {
  width: 28px;
  height: 28px;
  margin-left: 20px;
  fill: #fff;
}
</style>