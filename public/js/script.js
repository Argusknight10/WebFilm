
const BASEIMGURL = 'https://image.tmdb.org/t/p/w500'
const APIKEY = 'api_key=6fdeacccd4e3e958ad89c3500dd85180'
const BASEURL= 'https://api.themoviedb.org/3'
const TOKEN = 'eyJhbGciOiJIUzI1NiJ9.eyJhdWQiOiI2ZmRlYWNjY2Q0ZTNlOTU4YWQ4OWMzNTAwZGQ4NTE4MCIsInN1YiI6IjY0NWY4YmEyOGM0NGI5MDBlMTY0ZTRjNiIsInNjb3BlcyI6WyJhcGlfcmVhZCJdLCJ2ZXJzaW9uIjoxfQ.hkYnNfdOZN1WI5h0nuNN6-3Cj7eA2yEvmAX7imb3z-I'

const APPEND_MOVIE = BASEURL + '/discover/movie' + APIKEY 

get
function getMovie(url) {
    fetch(url).then(res =>res.json).then(data => {
        console.log(data);
    })
}