<div class="list_collection" v-if="searched && !proxyError">
    <data-collection
        v-for="content in contents"
        :title="content.info.rus"
        :id="content.kinopoisk_id"
        :poster="content.info.poster"
        :quality="content.quality"
        :year="content.info.year"
        :genre="content.info.genre"
        :rating="content.info.rating.rating_imdb"
        :translation="content.translation"
    ></data-collection>
    <pagination/>
</div>
<div class="list_collection" v-else>
    <?php for ($i=0; $i < 8; $i++):?>
    <div class="splash_collection">
        <div class="splash_collection_poster"></div>
        <div class="splash_collection_about_small_big"></div>
        <div class="splash_collection_about_small"></div>
    </div>
    <?php endfor; ?>
</div>
