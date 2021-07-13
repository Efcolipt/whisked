<template>
  <div class="splash-collection">
    <div class="splash-collection-poster"></div>
    <div class="splash-collection-headline"></div>
    <div class="splash-collection-text"></div>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.splash-collection {
  margin: 15px 25px;
}
.splash-collection-poster {
  background: #23232340;
  min-width: 260px;
  min-height: 360px;
  border-radius: 6px;
}
.splash-collection-headline {
  background: #23232340;
  max-width: 120px;
  min-height: 20px;
  margin-top: 10px;
  border-radius: 6px;
}
.splash-collection-text {
  background: #23232340;
  max-width: 60px;
  min-height: 20px;
  margin-top: 10px;
  border-radius: 6px;
}
</style>