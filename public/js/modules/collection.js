const Collection = {
    data() {
        return {
            pageNumber: 0,
            contents: [],
            proxySearch: false,
            proxyError: false,
            searched: false,
        }
    },
    created() {
        this.list()
    },
    methods: {
        async list() {
            this.proxySearch = true
            const req = await request(builderUrl())
            this.proxySearch = false
            if (!('results' in req) || !Boolean(this.contents = parseList(req['results'], ['kinopoisk_id', 'year', 'rus', 'rating_imdb', 'poster', 'quality', 'genre', 'translation']))) {
                this.proxyError = true
            } else {
                this.searched = !this.proxyError
            }
        },
    },
}
const collection = Vue.createApp(Collection)


collection.component('data-collection', {
    props: ['title', 'quality', 'rating', 'id', 'year', 'poster', 'genre', 'translation'],
    template: `
        <div class="collection" :data-id="id">
            <a class="link_collection" :href="'/watch/' + id" >
                <div class="poster_collection">
                    <img :src="poster" loading="lazy" :alt="title" >
                    <div class="info_collection_on_poster">
                        <div class="rait_collection">
                            <p class="text_mont">Рейтинг IMDB <span>{{rating}}</span></p>
                        </div>
                        <div class="average_collection">
                            <p><span>{{quality}}</span></p>
                        </div>
                    </div>
                </div>
                <div class="about_collection">
                    <p class="headline_collection">{{title}}</p>
                    <p class="date_collection text_mont">{{year}}, {{ (genre.split(",")[0])[0].toUpperCase() + genre.split(",")[0].slice(1) }}</p>
                </div>
            </a>
        </div>
    `
})

collection.component('pagination', {
    data() {
        return{
            page: 1,
            type:"film",
            disabledClass:'navigation_collection_page_disabled',
            defaultClass:'navigation_collection_page',
        }
    },
    methods:{
        definePaginataion(){
            this.page = $('.wrapper').attr("data-page")
            this.type = $('.wrapper').attr("data-route")
        },
    },
    created() {
        this.definePaginataion()
    },
    template: `
    <div class="navigation_collection">
    	<a
            :href="'/'+ type +'?page=' + (page <= 1 ? 1 : page - 1)"
            :class="[defaultClass,  (page <= 1) ? disabledClass : '']">
                Назад
        </a>

        <a
            :href="'/'+ type +'?page=' + (Number(page) + 1)"
            :class="[defaultClass, (page >= 460) ? disabledClass : '']">
                Вперед
        </a>

    </div>
 `
})

if ($('*').is('#galery')) collection.mount('#galery')
