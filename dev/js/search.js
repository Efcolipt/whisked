const token = '7250d60740fc5811592ea4fcf893239f'
const Search = {
    data() {
        return {
            contents: [],
            valSearch: "",
            proxySearch: false,
            searching: false,
            proxyError: false,
            searched: false,
            inputActive: false
        }
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
                if (!('results' in req) || Boolean(!this.result(req['results']))) {
                    this.proxyError = true
                }else{
                    this.searched =  !this.proxyError
                }
                console.log(this.contents)
            }
        },

        result(req) {
            const length = req.length <= 6 ? req.length : 6
            const result = {}
            for (let id = 0; id < length; id++) {
                if (searchKeysInObj(req[id],['kinopoisk_id','year','rus','rating_imdb','poster','quality','genre'])){
                     result[id] = {
                        'id': req[id].kinopoisk_id,
                        'title': req[id].info.rus,
                        'poster': req[id].info.poster,
                        'genre': (req[id].info.genre.split(',')[0]),
                        'rating': req[id].info.rating.rating_imdb,
                        'quality': req[id].quality,
                        'year': req[id].info.year
                    }
                }
            }
            return this.contents = result
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
    props: ['title', 'quality','rating', 'id', 'year', 'poster', 'genre'],
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
                            <p class="header_content_searched_about_list_item">{{ genre }}</p>
                            <p class="header_content_searched_about_list_item">{{ quality }}</p>
                        </div>
                        <div class="header_content_searched_about_list">
                            <p class="header_content_searched_about_list_item">{{ rating }}</p>
                            <p class="header_content_searched_about_list_item">{{ year }}</p>
                        </div>

                    </div>
                </div>
            </div>
        </a>
    `
})
search.mount('#search')

function getObjectVal(data, findKey) {
    let result = '';
    for (let key in data) {
        if (key == findKey)
            return data[findKey];

        if ((typeof data[key] === "object") && (data[key] !== null)) {
            if (key != findKey)
                result = getObjectVal(data[key], findKey)
        }
    }

    return result ? result : false;
}

function searchKeysInObj(obj, keys){
    const result = []
    for (let i = 0; i < keys.length; i++) {
        const res = getObjectVal(obj,keys[i])
        if (res) result.push(res)
    }
    if (result.length === keys.length) {
        return true
    }

    return false
}

async function request(url, method = 'POST', data = null) {
    try {
        const headers = {}
        let body

        if (data) {
            headers['Content-type'] = 'application/json'
            body = JSON.stringify(data)
        }

        const response = await fetch(url, {
            method,
            headers,
            body
        })

        return await response.json()
    } catch (e) {
        console.warn("Error " + e.message)
    }
}
