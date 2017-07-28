  // create constructor
  var RedditListing = Vue.extend({
      template: `
          <div>
            <table>
              <tr v-for="(feed,index) in data.children">
                <td>
                  <span v-if="paginator.page == 1"> {{index + 1}} </span>
                  <span v-else>
                    {{(paginator.page - 1) * 25  + (index + 1)}}
                  </span>
                </td>
                <td>
                  <span v-if="feed.data.score >1000"> {{feed.data.score / 1000}}K </span>
                  <span v-else>
                    {{feed.data.score}}
                 </span>
                </td>
                <td>
                 <span v-if="feed.data.thumbnail=='default' || feed.data.thumbnail=='nsfw'|| feed.data.thumbnail=='image'|| feed.data.thumbnail=='img'|| feed.data.thumbnail=='self'">
                    <img class="default_thumbnail" /> 
                 </span>
                 <span v-else>
                  <img v-bind:src="feed.data.thumbnail" /> 
                 </span>
                </td>
                <td>
                  <span v-if="feed.data.author" class="author">Submitted By
                    <a v-bind:href="'https://www.reddit.com/user/' + feed.data.author">{{feed.data.author}}</a>
                      to 
                    <a v-bind:href="'https://www.reddit.com/' + feed.data.subreddit_name_prefixed">{{feed.data.subreddit_name_prefixed}}</a>
                  </span> </br>
                  <span>
                    <a v-bind:href="'https://www.reddit.com/' + feed.data.permalink">{{feed.data.title}}</a> 
                    (<a v-bind:href="'https://www.reddit.com/domain/' + feed.data.domain">{{feed.data.domain}}</a>)
                    </br>
                  </span>
                  <span v-if="feed.data.body_html">{{feed.data.body_html}}</span> </br>
                  <span v-if="feed.data.secure_media">
                    <span v-if="feed.data.secure_media.oembed">{{feed.data.secure_media.oembed.description}}</span>
                  </span>
                  <span>{{feed.data.num_comments}} Comments</span>
                <td>
                  <a v-bind:href="'https://www.reddit.com/' + feed.data.permalink">View link</a>
              </tr>
            </table>
          </div>
      `,
      data: function () {

          let vueAppState = initialFeedsState;
          return vueAppState;
      },

      created: function () {
        var that = this;
        axios.get('/feeds?category='+ category.category)
            .then(function (response) {
                //updating the paginator
                paginator.after = response.data.feeds.data.after;
                paginator.before = response.data.feeds.data.before;

                //updating the feeds
                for (var i in response.data.feeds.data.children) {
                  initialFeedsState.data.children.push(response.data.feeds.data.children[i]);
                }
            })
            .catch(function (error) {
                console.log(error);
            });
      }
  });

  //template for the breadcrumb
  var breadcrumbValue = Vue.extend({
      template: `
        <a v-bind:href="'/category/' + category">{{category}}</a>
      `,
      data: function () {
          let vueAppState = category;
          return vueAppState;
      },
  });

  var paginatorPreviousPageComponent = new Vue({
    el: '#paginator-previous-page',
    data: {
      name: 'Vue.js'
    },
    // define methods under the `methods` object
    methods: {
      load: function (event) {
        var that = this;
        var url = '/feeds?category='+ category.category+'&count=25&previous=';
        if (paginator.after != paginator.initial ){
          url += paginator.before;
          if (paginator.page >= 1 ){
            paginator.page = paginator.page - 1;  
          }
        } else {
          this.$el.style.display="none";
        }
        axios.get(url)
          .then(function (response) {
            //updating the paginator
            paginator.after = response.data.feeds.data.after;
            paginator.before = response.data.feeds.data.before;

            //updating the feeds
            initialFeedsState.data.children = [];
            for (var i in response.data.feeds.data.children) {
              initialFeedsState.data.children.push(response.data.feeds.data.children[i]);
            }
          })
          .catch(function (error) {
             console.log(error);
          });
      }
    }
  });

  var paginatorNextPageComponent = new Vue({
    el: '#paginator-next-page',
    data: {
      name: 'Vue.js'
    },
    // define methods under the `methods` object
    methods: {
      load: function (event) {
        var that = this;
        var url = '/feeds?category='+ category.category+'&count=25&after=';
        if (paginator && paginator.after){
          url += paginator.after;
          paginator.page = paginator.page + 1;  
        }
        axios.get(url)
          .then(function (response) {
            //updating the paginator
            paginatorPreviousPageComponent.$el.style.display = "";
            paginator.after = response.data.feeds.data.after;
            paginator.before = response.data.feeds.data.before;

            //updating the feeds
            initialFeedsState.data.children = [];
            for (var i in response.data.feeds.data.children) {
              initialFeedsState.data.children.push(response.data.feeds.data.children[i]);
            }
          })
          .catch(function (error) {
             console.log(error);
          });
      }
    }
  });
  var searchTextBoxComponent = new Vue({
    el: '#search-box',
    data: {
      name: 'Vue.js'
    },
  });
  var searchComponent = new Vue({
    el: '#search',
    data: {
      name: 'Vue.js'
    },
    // define methods under the `methods` object
    methods: {
      load: function (event) {
        var that = this;
        var query = searchTextBoxComponent.$el.value;
        if (query.length == 0 ){
          alert("Please insert a value.");
          return;
        }
        var url = '/search?q='+ query +'&restrict_sr=&sort=relevance&t=all';
        axios.get(url)
          .then(function (response) {
            //updating the paginator
            initialFeedsState.data.children = [];
            for (var i in response.data.feeds.data.children) {
              initialFeedsState.data.children.push(response.data.feeds.data.children[i]);
            }
          })
          .catch(function (error) {
             console.log(error);
          });
      }
    }
  })

  // create an instance of ApartmentListing and mount it on an element
  new RedditListing().$mount('#vue-app');
  new breadcrumbValue().$mount('#bc-vue-app');