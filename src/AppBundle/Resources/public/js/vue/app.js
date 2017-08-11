  // create constructor
  var GameStatListing = Vue.extend({
      template: `
          <div>
            <table>
              <tr>
                <th>Game Name</th>
                <th>Times Played</th>
                <th>Top Player</th>
                <th>Top Score</th>
                <th>Last Update</th>
               </tr>

              <tr v-for="(gamestat,index) in data">
                <td >
                  <span v-if="gamestat.id">
                    <a v-bind:href="'/game/' + gamestat.id">View Game Details</a>
                  </span>
                </td>
                <td>
                  <span v-if="gamestat.game_name"> {{gamestat.game_name }} </span>
                </td>
                <td>
                  <span v-if="gamestat.times_played"> {{gamestat.times_played }} Played </span>
                </td>
                 <td>
                  <span v-if="gamestat.top_player"> {{gamestat.top_player }}  </span>
                </td>
                <td>
                  <span v-if="gamestat.top_score"> {{gamestat.top_score }}  </span>
                </td>
                <td>
                  <span v-if="gamestat.last_updated"> {{gamestat.last_updated }}  </span>
                </td>
              </tr>
            </table>
          </div>
      `,
      data: function () {

          let vueAppState = gamestats;
          return vueAppState;
      },

  });


  // create an instance of ApartmentListing and mount it on an element
  new GameStatListing().$mount('#vue-app');
