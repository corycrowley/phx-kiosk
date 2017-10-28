import Vue from 'vue'
import Axios from 'axios'

let eventsApiURL = 'https://phxuniversity.wpengine.com/wp-json/wp/v2/events/?_embed&per_page=10'
let postsApiUrl = 'https://phxuniversity.wpengine.com/wp-json/wp/v2/posts/?_embed&per_page=10'

new Vue( {
    el: '#app',

    data: {
        eventLocation: '9',
        eventCategory: '',
        eventsCount: '',
        events: {},
        posts: {}
    },

    created() {
        this.fetchEvents()
        this.fetchPosts()
    },

    computed: {
        hasEvents() {
            return this.events.length
        },

        hasPosts() {
            return this.posts.length
        }
    },

    methods: {
        fetchEvents() {
            if ( this.eventLocation ) {
                eventsApiURL += `&event-location=${this.eventLocation}`
            }

            if ( this.eventCategory ) {
                eventsApiURL += `&event-category=${this.eventCategory}`
            }

            Axios.get( eventsApiURL ).then( ( { data } ) => {
                let eventsData = data

                for ( let i = 0; i < eventsData.length; i++ ) {
                    let locations = eventsData[i]._embedded['wp:term'][0]
                    let categories = eventsData[i]._embedded['wp:term'][1]

                    if ( locations[0] ) {
                        eventsData[i].location = locations[0].name;
                    }

                    if ( categories[0] ) {
                        eventsData[i].category = categories[0].name;
                    }
                }

                this.events = eventsData
                this.eventsCount = this.events.length
            } );
        },

        fetchPosts() {
            Axios.get( postsApiUrl ).then( ( { data } ) => this.posts = data )
        }
    }
} )