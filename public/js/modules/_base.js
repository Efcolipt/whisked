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
