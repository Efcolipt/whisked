const token = '7250d60740fc5811592ea4fcf893239f'



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
        const key = getObjectVal(obj,keys[i])
        if (key) result.push(key)
    }
    if (result.length === keys.length) return true

    return false
}

let defaultRoutes = {
    movies: {
        type:"film",
        query: false
    },
    serials: {
        type:"serial",
        query: false
    },
    anime: {
        type:"film",
        query: [['cat'],['аниме']]
    },
}

function builderUrl(){
    let $parent = $('.wrapper')
    let page = $parent.attr('data-page'), route = $parent.attr('data-route'), query = ""
    let data = getObjectVal(defaultRoutes, route)
    if (data.query) for (let i = 0; i < data.query[0].length; i++)  query += `&${data.query[0][i]}=${data.query[1][i]}`
    return `https://bazon.cc/api/json?token=${token}&type=${data.type}&page=${page}${query}`
}

function ucFirst(str) {
  if (!str) return str;

  return str[0].toUpperCase() + str.slice(1);
}

function parseList(req,keys){
    const result = {}
    let current = 0, uniq = [], deleted = 0
    for (let i = 0; i < req.length; i++) if (searchKeysInObj(req[i],keys)) result[current++] = req[i]
    return result
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
    methods: {
        async search() {
            this.contents = []
            this.searching = true
            this.searched = this.proxyError = false
            if (this.valSearch.length > 0) {
                this.proxySearch = true
                const req = await request(`https://bazon.cc/api/search?token=${token}&title=${this.valSearch}`)
                this.proxySearch = false
                console.log(req)
                if (!('results' in req) || !Boolean(this.contents = parseList(req['results'], ['kinopoisk_id','year','rus','rating_imdb','poster','quality','genre','translation']))) {
                    this.proxyError = true
                }else{
                    this.searched =  !this.proxyError
                }
            }else{
                this.proxyError = true
            }
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
    props: ['title', 'quality','rating', 'id', 'year', 'poster', 'genre','translation'],
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

//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIl9iYXNlLmpzIiwiY29sbGVjdGlvbi5qcyIsInNlYXJjaC5qcyJdLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiQUFBQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUN6RkE7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQzNGQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBIiwiZmlsZSI6ImFwcC5qcyIsInNvdXJjZXNDb250ZW50IjpbImNvbnN0IHRva2VuID0gJzcyNTBkNjA3NDBmYzU4MTE1OTJlYTRmY2Y4OTMyMzlmJ1xyXG5cclxuXHJcblxyXG5mdW5jdGlvbiBnZXRPYmplY3RWYWwoZGF0YSwgZmluZEtleSkge1xyXG4gICAgbGV0IHJlc3VsdCA9ICcnO1xyXG4gICAgZm9yIChsZXQga2V5IGluIGRhdGEpIHtcclxuICAgICAgICBpZiAoa2V5ID09IGZpbmRLZXkpXHJcbiAgICAgICAgICAgIHJldHVybiBkYXRhW2ZpbmRLZXldO1xyXG5cclxuICAgICAgICBpZiAoKHR5cGVvZiBkYXRhW2tleV0gPT09IFwib2JqZWN0XCIpICYmIChkYXRhW2tleV0gIT09IG51bGwpKSB7XHJcbiAgICAgICAgICAgIGlmIChrZXkgIT0gZmluZEtleSlcclxuICAgICAgICAgICAgICAgIHJlc3VsdCA9IGdldE9iamVjdFZhbChkYXRhW2tleV0sIGZpbmRLZXkpXHJcbiAgICAgICAgfVxyXG4gICAgfVxyXG5cclxuICAgIHJldHVybiByZXN1bHQgPyByZXN1bHQgOiBmYWxzZTtcclxufVxyXG5cclxuZnVuY3Rpb24gc2VhcmNoS2V5c0luT2JqKG9iaiwga2V5cyl7XHJcbiAgICBjb25zdCByZXN1bHQgPSBbXVxyXG4gICAgZm9yIChsZXQgaSA9IDA7IGkgPCBrZXlzLmxlbmd0aDsgaSsrKSB7XHJcbiAgICAgICAgY29uc3Qga2V5ID0gZ2V0T2JqZWN0VmFsKG9iaixrZXlzW2ldKVxyXG4gICAgICAgIGlmIChrZXkpIHJlc3VsdC5wdXNoKGtleSlcclxuICAgIH1cclxuICAgIGlmIChyZXN1bHQubGVuZ3RoID09PSBrZXlzLmxlbmd0aCkgcmV0dXJuIHRydWVcclxuXHJcbiAgICByZXR1cm4gZmFsc2VcclxufVxyXG5cclxubGV0IGRlZmF1bHRSb3V0ZXMgPSB7XHJcbiAgICBtb3ZpZXM6IHtcclxuICAgICAgICB0eXBlOlwiZmlsbVwiLFxyXG4gICAgICAgIHF1ZXJ5OiBmYWxzZVxyXG4gICAgfSxcclxuICAgIHNlcmlhbHM6IHtcclxuICAgICAgICB0eXBlOlwic2VyaWFsXCIsXHJcbiAgICAgICAgcXVlcnk6IGZhbHNlXHJcbiAgICB9LFxyXG4gICAgYW5pbWU6IHtcclxuICAgICAgICB0eXBlOlwiZmlsbVwiLFxyXG4gICAgICAgIHF1ZXJ5OiBbWydjYXQnXSxbJ9Cw0L3QuNC80LUnXV1cclxuICAgIH0sXHJcbn1cclxuXHJcbmZ1bmN0aW9uIGJ1aWxkZXJVcmwoKXtcclxuICAgIGxldCAkcGFyZW50ID0gJCgnLndyYXBwZXInKVxyXG4gICAgbGV0IHBhZ2UgPSAkcGFyZW50LmF0dHIoJ2RhdGEtcGFnZScpLCByb3V0ZSA9ICRwYXJlbnQuYXR0cignZGF0YS1yb3V0ZScpLCBxdWVyeSA9IFwiXCJcclxuICAgIGxldCBkYXRhID0gZ2V0T2JqZWN0VmFsKGRlZmF1bHRSb3V0ZXMsIHJvdXRlKVxyXG4gICAgaWYgKGRhdGEucXVlcnkpIGZvciAobGV0IGkgPSAwOyBpIDwgZGF0YS5xdWVyeVswXS5sZW5ndGg7IGkrKykgIHF1ZXJ5ICs9IGAmJHtkYXRhLnF1ZXJ5WzBdW2ldfT0ke2RhdGEucXVlcnlbMV1baV19YFxyXG4gICAgcmV0dXJuIGBodHRwczovL2Jhem9uLmNjL2FwaS9qc29uP3Rva2VuPSR7dG9rZW59JnR5cGU9JHtkYXRhLnR5cGV9JnBhZ2U9JHtwYWdlfSR7cXVlcnl9YFxyXG59XHJcblxyXG5mdW5jdGlvbiB1Y0ZpcnN0KHN0cikge1xyXG4gIGlmICghc3RyKSByZXR1cm4gc3RyO1xyXG5cclxuICByZXR1cm4gc3RyWzBdLnRvVXBwZXJDYXNlKCkgKyBzdHIuc2xpY2UoMSk7XHJcbn1cclxuXHJcbmZ1bmN0aW9uIHBhcnNlTGlzdChyZXEsa2V5cyl7XHJcbiAgICBjb25zdCByZXN1bHQgPSB7fVxyXG4gICAgbGV0IGN1cnJlbnQgPSAwLCB1bmlxID0gW10sIGRlbGV0ZWQgPSAwXHJcbiAgICBmb3IgKGxldCBpID0gMDsgaSA8IHJlcS5sZW5ndGg7IGkrKykgaWYgKHNlYXJjaEtleXNJbk9iaihyZXFbaV0sa2V5cykpIHJlc3VsdFtjdXJyZW50KytdID0gcmVxW2ldXHJcbiAgICByZXR1cm4gcmVzdWx0XHJcbn1cclxuXHJcblxyXG5cclxuYXN5bmMgZnVuY3Rpb24gcmVxdWVzdCh1cmwsIG1ldGhvZCA9ICdQT1NUJywgZGF0YSA9IG51bGwpIHtcclxuICAgIHRyeSB7XHJcbiAgICAgICAgY29uc3QgaGVhZGVycyA9IHt9XHJcbiAgICAgICAgbGV0IGJvZHlcclxuXHJcbiAgICAgICAgaWYgKGRhdGEpIHtcclxuICAgICAgICAgICAgaGVhZGVyc1snQ29udGVudC10eXBlJ10gPSAnYXBwbGljYXRpb24vanNvbidcclxuICAgICAgICAgICAgYm9keSA9IEpTT04uc3RyaW5naWZ5KGRhdGEpXHJcbiAgICAgICAgfVxyXG5cclxuICAgICAgICBjb25zdCByZXNwb25zZSA9IGF3YWl0IGZldGNoKHVybCwge1xyXG4gICAgICAgICAgICBtZXRob2QsXHJcbiAgICAgICAgICAgIGhlYWRlcnMsXHJcbiAgICAgICAgICAgIGJvZHlcclxuICAgICAgICB9KVxyXG5cclxuICAgICAgICByZXR1cm4gYXdhaXQgcmVzcG9uc2UuanNvbigpXHJcbiAgICB9IGNhdGNoIChlKSB7XHJcbiAgICAgICAgY29uc29sZS53YXJuKFwiRXJyb3IgXCIgKyBlLm1lc3NhZ2UpXHJcbiAgICB9XHJcbn1cclxuIiwiY29uc3QgQ29sbGVjdGlvbiA9IHtcclxuICAgIGRhdGEoKSB7XHJcbiAgICAgICAgcmV0dXJuIHtcclxuICAgICAgICAgICAgcGFnZU51bWJlcjogMCxcclxuICAgICAgICAgICAgY29udGVudHM6IFtdLFxyXG4gICAgICAgICAgICBwcm94eVNlYXJjaDogZmFsc2UsXHJcbiAgICAgICAgICAgIHByb3h5RXJyb3I6IGZhbHNlLFxyXG4gICAgICAgICAgICBzZWFyY2hlZDogZmFsc2UsXHJcbiAgICAgICAgfVxyXG4gICAgfSxcclxuICAgIGNyZWF0ZWQoKSB7XHJcbiAgICAgICAgdGhpcy5saXN0KClcclxuICAgIH0sXHJcbiAgICBtZXRob2RzOiB7XHJcbiAgICAgICAgYXN5bmMgbGlzdCgpIHtcclxuICAgICAgICAgICAgdGhpcy5wcm94eVNlYXJjaCA9IHRydWVcclxuICAgICAgICAgICAgY29uc3QgcmVxID0gYXdhaXQgcmVxdWVzdChidWlsZGVyVXJsKCkpXHJcbiAgICAgICAgICAgIHRoaXMucHJveHlTZWFyY2ggPSBmYWxzZVxyXG4gICAgICAgICAgICBpZiAoISgncmVzdWx0cycgaW4gcmVxKSB8fCAhQm9vbGVhbih0aGlzLmNvbnRlbnRzID0gcGFyc2VMaXN0KHJlcVsncmVzdWx0cyddLCBbJ2tpbm9wb2lza19pZCcsICd5ZWFyJywgJ3J1cycsICdyYXRpbmdfaW1kYicsICdwb3N0ZXInLCAncXVhbGl0eScsICdnZW5yZScsICd0cmFuc2xhdGlvbiddKSkpIHtcclxuICAgICAgICAgICAgICAgIHRoaXMucHJveHlFcnJvciA9IHRydWVcclxuICAgICAgICAgICAgfSBlbHNlIHtcclxuICAgICAgICAgICAgICAgIHRoaXMuc2VhcmNoZWQgPSAhdGhpcy5wcm94eUVycm9yXHJcbiAgICAgICAgICAgIH1cclxuICAgICAgICB9LFxyXG4gICAgfSxcclxufVxyXG5jb25zdCBjb2xsZWN0aW9uID0gVnVlLmNyZWF0ZUFwcChDb2xsZWN0aW9uKVxyXG5cclxuXHJcbmNvbGxlY3Rpb24uY29tcG9uZW50KCdkYXRhLWNvbGxlY3Rpb24nLCB7XHJcbiAgICBwcm9wczogWyd0aXRsZScsICdxdWFsaXR5JywgJ3JhdGluZycsICdpZCcsICd5ZWFyJywgJ3Bvc3RlcicsICdnZW5yZScsICd0cmFuc2xhdGlvbiddLFxyXG4gICAgdGVtcGxhdGU6IGBcclxuICAgICAgICA8ZGl2IGNsYXNzPVwiY29sbGVjdGlvblwiIDpkYXRhLWlkPVwiaWRcIj5cclxuICAgICAgICAgICAgPGEgY2xhc3M9XCJsaW5rX2NvbGxlY3Rpb25cIiA6aHJlZj1cIicvd2F0Y2gvJyArIGlkXCIgPlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInBvc3Rlcl9jb2xsZWN0aW9uXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPGltZyA6c3JjPVwicG9zdGVyXCIgbG9hZGluZz1cImxhenlcIiA6YWx0PVwidGl0bGVcIiA+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImluZm9fY29sbGVjdGlvbl9vbl9wb3N0ZXJcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cInJhaXRfY29sbGVjdGlvblwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJ0ZXh0X21vbnRcIj7QoNC10LnRgtC40L3QsyBJTURCIDxzcGFuPnt7cmF0aW5nfX08L3NwYW4+PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImF2ZXJhZ2VfY29sbGVjdGlvblwiPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPHA+PHNwYW4+e3txdWFsaXR5fX08L3NwYW4+PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImFib3V0X2NvbGxlY3Rpb25cIj5cclxuICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz1cImhlYWRsaW5lX2NvbGxlY3Rpb25cIj57e3RpdGxlfX08L3A+XHJcbiAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJkYXRlX2NvbGxlY3Rpb24gdGV4dF9tb250XCI+e3t5ZWFyfX0sIHt7IChnZW5yZS5zcGxpdChcIixcIilbMF0pWzBdLnRvVXBwZXJDYXNlKCkgKyBnZW5yZS5zcGxpdChcIixcIilbMF0uc2xpY2UoMSkgfX08L3A+XHJcbiAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgPC9hPlxyXG4gICAgICAgIDwvZGl2PlxyXG4gICAgYFxyXG59KVxyXG5cclxuY29sbGVjdGlvbi5jb21wb25lbnQoJ3BhZ2luYXRpb24nLCB7XHJcbiAgICBkYXRhKCkge1xyXG4gICAgICAgIHJldHVybntcclxuICAgICAgICAgICAgcGFnZTogMSxcclxuICAgICAgICAgICAgdHlwZTpcImZpbG1cIixcclxuICAgICAgICAgICAgZGlzYWJsZWRDbGFzczonbmF2aWdhdGlvbl9jb2xsZWN0aW9uX3BhZ2VfZGlzYWJsZWQnLFxyXG4gICAgICAgICAgICBkZWZhdWx0Q2xhc3M6J25hdmlnYXRpb25fY29sbGVjdGlvbl9wYWdlJyxcclxuICAgICAgICB9XHJcbiAgICB9LFxyXG4gICAgbWV0aG9kczp7XHJcbiAgICAgICAgZGVmaW5lUGFnaW5hdGFpb24oKXtcclxuICAgICAgICAgICAgdGhpcy5wYWdlID0gJCgnLndyYXBwZXInKS5hdHRyKFwiZGF0YS1wYWdlXCIpXHJcbiAgICAgICAgICAgIHRoaXMudHlwZSA9ICQoJy53cmFwcGVyJykuYXR0cihcImRhdGEtcm91dGVcIilcclxuICAgICAgICB9LFxyXG4gICAgfSxcclxuICAgIGNyZWF0ZWQoKSB7XHJcbiAgICAgICAgdGhpcy5kZWZpbmVQYWdpbmF0YWlvbigpXHJcbiAgICB9LFxyXG4gICAgdGVtcGxhdGU6IGBcclxuICAgIDxkaXYgY2xhc3M9XCJuYXZpZ2F0aW9uX2NvbGxlY3Rpb25cIj5cclxuICAgIFx0PGFcclxuICAgICAgICAgICAgOmhyZWY9XCInLycrIHR5cGUgKyc/cGFnZT0nICsgKHBhZ2UgPD0gMSA/IDEgOiBwYWdlIC0gMSlcIlxyXG4gICAgICAgICAgICA6Y2xhc3M9XCJbZGVmYXVsdENsYXNzLCAgKHBhZ2UgPD0gMSkgPyBkaXNhYmxlZENsYXNzIDogJyddXCI+XHJcbiAgICAgICAgICAgICAgICDQndCw0LfQsNC0XHJcbiAgICAgICAgPC9hPlxyXG5cclxuICAgICAgICA8YVxyXG4gICAgICAgICAgICA6aHJlZj1cIicvJysgdHlwZSArJz9wYWdlPScgKyAoTnVtYmVyKHBhZ2UpICsgMSlcIlxyXG4gICAgICAgICAgICA6Y2xhc3M9XCJbZGVmYXVsdENsYXNzLCAocGFnZSA+PSA0NjApID8gZGlzYWJsZWRDbGFzcyA6ICcnXVwiPlxyXG4gICAgICAgICAgICAgICAg0JLQv9C10YDQtdC0XHJcbiAgICAgICAgPC9hPlxyXG5cclxuICAgIDwvZGl2PlxyXG4gYFxyXG59KVxyXG5cclxuaWYgKCQoJyonKS5pcygnI2dhbGVyeScpKSBjb2xsZWN0aW9uLm1vdW50KCcjZ2FsZXJ5JylcclxuIiwiY29uc3QgU2VhcmNoID0ge1xyXG4gICAgZGF0YSgpIHtcclxuICAgICAgICByZXR1cm4ge1xyXG4gICAgICAgICAgICBjb250ZW50czogW10sXHJcbiAgICAgICAgICAgIHZhbFNlYXJjaDogXCJcIixcclxuICAgICAgICAgICAgcHJveHlTZWFyY2g6IGZhbHNlLFxyXG4gICAgICAgICAgICBzZWFyY2hpbmc6IGZhbHNlLFxyXG4gICAgICAgICAgICBwcm94eUVycm9yOiBmYWxzZSxcclxuICAgICAgICAgICAgc2VhcmNoZWQ6IGZhbHNlLFxyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbiAgICBtZXRob2RzOiB7XHJcbiAgICAgICAgYXN5bmMgc2VhcmNoKCkge1xyXG4gICAgICAgICAgICB0aGlzLmNvbnRlbnRzID0gW11cclxuICAgICAgICAgICAgdGhpcy5zZWFyY2hpbmcgPSB0cnVlXHJcbiAgICAgICAgICAgIHRoaXMuc2VhcmNoZWQgPSB0aGlzLnByb3h5RXJyb3IgPSBmYWxzZVxyXG4gICAgICAgICAgICBpZiAodGhpcy52YWxTZWFyY2gubGVuZ3RoID4gMCkge1xyXG4gICAgICAgICAgICAgICAgdGhpcy5wcm94eVNlYXJjaCA9IHRydWVcclxuICAgICAgICAgICAgICAgIGNvbnN0IHJlcSA9IGF3YWl0IHJlcXVlc3QoYGh0dHBzOi8vYmF6b24uY2MvYXBpL3NlYXJjaD90b2tlbj0ke3Rva2VufSZ0aXRsZT0ke3RoaXMudmFsU2VhcmNofWApXHJcbiAgICAgICAgICAgICAgICB0aGlzLnByb3h5U2VhcmNoID0gZmFsc2VcclxuICAgICAgICAgICAgICAgIGNvbnNvbGUubG9nKHJlcSlcclxuICAgICAgICAgICAgICAgIGlmICghKCdyZXN1bHRzJyBpbiByZXEpIHx8ICFCb29sZWFuKHRoaXMuY29udGVudHMgPSBwYXJzZUxpc3QocmVxWydyZXN1bHRzJ10sIFsna2lub3BvaXNrX2lkJywneWVhcicsJ3J1cycsJ3JhdGluZ19pbWRiJywncG9zdGVyJywncXVhbGl0eScsJ2dlbnJlJywndHJhbnNsYXRpb24nXSkpKSB7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5wcm94eUVycm9yID0gdHJ1ZVxyXG4gICAgICAgICAgICAgICAgfWVsc2V7XHJcbiAgICAgICAgICAgICAgICAgICAgdGhpcy5zZWFyY2hlZCA9ICAhdGhpcy5wcm94eUVycm9yXHJcbiAgICAgICAgICAgICAgICB9XHJcbiAgICAgICAgICAgIH1lbHNle1xyXG4gICAgICAgICAgICAgICAgdGhpcy5wcm94eUVycm9yID0gdHJ1ZVxyXG4gICAgICAgICAgICB9XHJcbiAgICAgICAgfSxcclxuXHJcbiAgICAgICAgdHlwZVNlYXJjaChldmVudCkge1xyXG4gICAgICAgICAgICB0aGlzLnZhbFNlYXJjaCA9IGV2ZW50LnRhcmdldC52YWx1ZVxyXG4gICAgICAgIH1cclxuICAgIH0sXHJcbn1cclxuY29uc3Qgc2VhcmNoID0gVnVlLmNyZWF0ZUFwcChTZWFyY2gpXHJcblxyXG5cclxuc2VhcmNoLmNvbXBvbmVudCgnbG9hZGVyLXNlYXJjaCcsIHtcclxuICAgIHRlbXBsYXRlOiBgXHJcbiAgICAgICAgPGRpdiBjbGFzcz1cInNwaW5uZXJfX2xvYWRlclwiPlxyXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVwic3Bpbm5lcl9fbG9hZGVyX19pbm5lcl9fY29udGVudFwiPjwvZGl2PlxyXG4gICAgICAgIDwvZGl2PlxyXG4gICAgYFxyXG59KVxyXG5cclxuc2VhcmNoLmNvbXBvbmVudCgnZGF0YS1zZWFyY2gnLCB7XHJcbiAgICBwcm9wczogWyd0aXRsZScsICdxdWFsaXR5JywncmF0aW5nJywgJ2lkJywgJ3llYXInLCAncG9zdGVyJywgJ2dlbnJlJywndHJhbnNsYXRpb24nXSxcclxuICAgIHRlbXBsYXRlOiBgXHJcbiAgICAgICAgPGEgOmhyZWY9XCInL3dhdGNoLycgKyBpZFwiPlxyXG4gICAgICAgICAgICA8ZGl2IGNsYXNzPVwiaGVhZGVyX2NvbnRlbnRfc2VhcmNoZWRcIj5cclxuICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJpbm5lcl9oZWFkZXJfY29udGVudF9zZWFyY2hlZFwiPlxyXG4gICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJoZWFkZXJfY29udGVudF9zZWFyY2hlZF9pbWdcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGltZyB2LWJpbmQ6c3JjPVwicG9zdGVyXCIgdi1iaW5kOmFsdD1cInRpdGxlXCI+XHJcbiAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImhlYWRlcl9jb250ZW50X3NlYXJjaGVkX2Fib3V0XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxoMz57eyB0aXRsZSB9fTwvaDM+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgIDxkaXYgY2xhc3M9XCJoZWFkZXJfY29udGVudF9zZWFyY2hlZF9hYm91dF9saXN0XCI+XHJcbiAgICAgICAgICAgICAgICAgICAgICAgICAgICA8cCBjbGFzcz1cImhlYWRlcl9jb250ZW50X3NlYXJjaGVkX2Fib3V0X2xpc3RfaXRlbVwiPnt7ICAoZ2VucmUuc3BsaXQoXCIsXCIpWzBdKVswXS50b1VwcGVyQ2FzZSgpICsgZ2VucmUuc3BsaXQoXCIsXCIpWzBdLnNsaWNlKDEpIH19PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJoZWFkZXJfY29udGVudF9zZWFyY2hlZF9hYm91dF9saXN0X2l0ZW1cIj57eyBxdWFsaXR5IH19PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICA8L2Rpdj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPGRpdiBjbGFzcz1cImhlYWRlcl9jb250ZW50X3NlYXJjaGVkX2Fib3V0X2xpc3RcIj5cclxuICAgICAgICAgICAgICAgICAgICAgICAgICAgIDxwIGNsYXNzPVwiaGVhZGVyX2NvbnRlbnRfc2VhcmNoZWRfYWJvdXRfbGlzdF9pdGVtXCI+e3sgcmF0aW5nIH19PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJoZWFkZXJfY29udGVudF9zZWFyY2hlZF9hYm91dF9saXN0X2l0ZW1cIj57eyB5ZWFyIH19PC9wPlxyXG4gICAgICAgICAgICAgICAgICAgICAgICAgICAgPHAgY2xhc3M9XCJoZWFkZXJfY29udGVudF9zZWFyY2hlZF9hYm91dF9saXN0X2l0ZW1cIj57eyB0cmFuc2xhdGlvbiB9fTwvcD5cclxuICAgICAgICAgICAgICAgICAgICAgICAgPC9kaXY+XHJcblxyXG4gICAgICAgICAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgICAgICAgICAgPC9kaXY+XHJcbiAgICAgICAgICAgIDwvZGl2PlxyXG4gICAgICAgIDwvYT5cclxuICAgIGBcclxufSlcclxuXHJcbnNlYXJjaC5tb3VudCgnI3NlYXJjaCcpXHJcbiJdfQ==
