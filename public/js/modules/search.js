const Search = {
    data() {
        return {
            contents: [],
            valSearch: "",
            proxySearch: false,
            searching: false,
            proxyError: false,
            searched: false,
        }
    },

    created() {
        document.addEventListener('scroll', this.hideSearch)
    },

    methods: {
        async search() {
            this.contents = []
            this.searching = true
            this.searched = this.proxyError = false
            if (this.valSearch.length > 0) {
                this.proxySearch = true
                const req = await request(`https://bazon.cc/api/search?token=${token}&title=${this.valSearch}`)
                this.proxySearch = false

                if (!('results' in req) || !Boolean(this.contents = parseList(req['results'], ['kinopoisk_id', 'year', 'rus', 'rating_imdb', 'poster', 'quality', 'genre', 'translation'])))
                    this.proxyError = true
                else this.searched = !this.proxyError
            } else
                this.proxyError = true
        },

        hideSearch() {
            this.searching = false
        },

        typeSearch(event) {
            this.valSearch = event.target.value
        }
    },
}
const search = Vue.createApp(Search)


search.component('loader-search', {
    template: `
        <div class="spinner__loader">
            <div class="spinner__loader__inner__content"></div>
        </div>
    `
})

search.component('data-search', {
    props: ['title', 'quality', 'rating', 'id', 'year', 'poster', 'genre', 'translation'],
    template: `
        <a :href="'/watch/' + id">
            <div class="header_content_searched">
                <div class="inner_header_content_searched">
                    <div class="header_content_searched_img">
                        <img v-bind:src="poster" v-bind:alt="title">
                    </div>
                    <div class="header_content_searched_about">
                        <h3>{{ title }}</h3>
                        <div class="header_content_searched_about_list">
                            <p class="header_content_searched_about_list_item">{{  (genre.split(",")[0])[0].toUpperCase() + genre.split(",")[0].slice(1) }}</p>
                            <p class="header_content_searched_about_list_item">{{ quality }}</p>
                        </div>
                        <div class="header_content_searched_about_list">
                            <p class="header_content_searched_about_list_item">{{ rating }}</p>
                            <p class="header_content_searched_about_list_item">{{ year }}</p>
                            <p class="header_content_searched_about_list_item">{{ translation }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    `
})

search.mount('#search')
