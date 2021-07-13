<template lang="html">
  <div class="collection">
    <NuxtLink class="collection-link" :to="'/watch/' + movie.filmId" >
      <div class="poster-collection">
        <figure>
          <img 
            :src="movie.posterUrlPreview" 
            :alt="movie.nameRu"
          />
        </figure>
      </div> 
      <div class="body-collection">
        <h3>{{ movie.nameRu }}</h3>
        <small>{{ movie.year }}, {{ ...this.movie.genres }}</small>
      </div>
    </NuxtLink>
  </div>
</template>

<script>
export default {
  props: {
    movie: {
      type: [Object, Array],
      required: true,
    },
  },
  created() {
    this.movie.genres = Array.from(this.movie.genres).map((a) =>
      Object.values(a).join("")
    );
  },
};
</script>

<style scoped>
.collection {
  margin: 15px 25px;
  width: 260px;
}
.collection-link {
  display: block;
}
.poster-collection {
  position: relative;
  height: 360px;
  overflow: hidden;
  border-radius: 6px;
}
.poster-collection img {
  width: 100%;
  height: 360px;
  -o-object-fit: cover;
  object-fit: cover;
  -webkit-transition: -webkit-transform 0.6s ease;
  transition: -webkit-transform 0.6s ease;
  -o-transition: transform 0.6s ease;
  transition: transform 0.6s ease;
  transition: transform 0.6s ease, -webkit-transform 0.6s ease;
}

.body-collection h3 {
  margin-top: 10px;
  margin-bottom: 10px;
  font-size: 15px;
  -webkit-transition: color 0.3s ease;
  -o-transition: color 0.3s ease;
  transition: color 0.3s ease;
  overflow: hidden;
  -o-text-overflow: ellipsis;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
}

.body-collection small {
  color: #a6a6a6;
  font-size: 14px;
  font-family: "Montserrat", serif;
}

.collection-link:hover img {
  -webkit-transform: scale(1.06);
  -ms-transform: scale(1.06);
  transform: scale(1.06);
}
</style>