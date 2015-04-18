
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->
<section id="main-content">
  <section class="wrapper site-min-height">

    
  
  

    <!-- View Picker and Date Range Picker -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          
          <div id="view-selector-container"></div>
          <div id="date-range-selector-1-container"></div>
        </div><!-- /form-panel -->
      </div><!-- /col-lg-12 -->
    </div><!-- /row -->


    <div class="row mt">
      <div class="col-lg-12">

      
        <!-- LINE CHART PANELS -->
        <div class="row">

          <div class="col-md-4 col-sm-4 mb">          
            <div class="green-panel pn">
              <div class="green-header">
                <h5>PAGE VIEWS</h5>
              </div>
              <div id="chart-1-container" style="width: inherit; height: 180px; position: relative; margin: 0 10px 0 10px;"></div>
            </div>
          </div><!-- /col-md-4 -->
          

          <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
              <div class="darkblue-header">
                <h5>UNIQUE VISITORS</h5>
              </div>
              <h1 class="mt"><i class="fa fa-user fa-3x"></i></h1>
              <!--<p>+ 1,789 UV</p>-->
              <footer>
                <div class="centered">
                  <h1 id="num_users"><i class="fa fa-child"></i> ... </h1>
                </div>
              </footer>
            </div><! -- /darkblue panel -->
          </div><!-- /col-md-4 -->

          <div class="col-md-4 col-sm-4 mb">          
            <div class="white-panel pn">
              <div class="white-header">
                <h5>SESSIONS</h5>
              </div>
              <div id="chart-2-container" style="width: inherit; height: 180px; position: relative; margin: 0 10px 0 10px;"></div>
            </div>
          </div><!-- /col-md-4 -->

        </div><!-- /END LINE CHART PANELS -->


        <!-- CHART PANELS -->
        <div class="row">
          <div class="col-md-4 col-sm-4 mb">
            <div class="grey-panel pn donut-chart">
              <div class="grey-header"><h5>TOP 5 BROWSERS</h5></div>
              <div id="browserchart" style="width: inherit; height: 180px; position: relative; margin: 0 10px 0 10px;"></div>
              <!-- <div class="row">
                <div class="col-sm-6 col-xs-6 goleft"><p><br/>Increase:</p></div>
                <div class="col-sm-6 col-xs-6"><h2>21%</h2></div>
               </div>-->
            </div><! --/grey-panel -->
          </div><!-- /col-md-4-->


          <div class="col-md-4 col-sm-4 mb">
            <div class="darkblue-panel pn">
              <div class="darkblue-header"><h5>TOP 5 SOCIAL TRAFFIC</h5></div>
              <div id="socialchart" style="width: inherit; height: 180px; position: relative; margin: 0 10px 0 10px;"></div>
            </div><! -- /darkblue panel -->
          </div><!-- /col-md-4 -->

          <div class="col-md-4 col-sm-4 mb">
            <div class="green-panel pn">
              <div class="green-header"><h5>TOP 5 REFERRALS</h5></div>
              <div id="referralchart" style="width: inherit; height: 180px; position: relative; margin: 0 10px 0 10px;"></div>
            </div>
          </div><! --/col-md-4 -->
        </div><!-- /END CHART PANELS -->
        

        <!--TOP PAGES-->
        <div class="row">
          <div class="col-lg-12">
            <h4><i class="fa fa-signal"></i> TOP 10 ACTIVE PAGES</h4>
            <div id="top-pages-container" style="display: none;"></div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="toppages-tbl">
                  <thead>
                  <tr>
                      <th>Page Title</th>
                      <th class="numeric">Pageviews</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                      <td>...</td>
                      <td class="numeric">...</td>
                      
                  </tr>
                  </tbody>
              </table>
            </section>

          </div>
        </div>

        

      </div> <!--END div=col-lg-12 -->
    </div> <!--END div=row mt -->

    
    

  </section> <!--END WRAPPER-->
</section><!-- /MAIN CONTENT -->

<!--main content end-->


<script>

gapi.analytics.ready(function() {

  /**
   * Authorize the user immediately if the user has already granted access.
   * If no access has been created, render an authorize button inside the
   * element with the ID "embed-api-auth-container".
   */
  gapi.analytics.auth.authorize({
    container: 'embed-api-auth-container',
    clientid: '424526162298-1d016pdrud94gf63r37rj309mfss76f0.apps.googleusercontent.com',
    userInfoLabel: 'Hello, '
  });

  /** Custom Sign-in Button **/
  $('.gapi-analytics-auth-styles-signinbutton').css({
        "background-color":"#53B2C0"
  });

  $('.gapi-analytics-auth-styles-signinbutton-image').css({
    "border-right" : "#fff 1px solid"
  });

  $(".gapi-analytics-auth-styles-signinbutton").mouseover(function() {
      $(this).css("background-color","#428E9A");
  }).mouseout(function() {
      $(this).css("background-color","#53B2C0");
  });
  /** ********************** **/

  
  gapi.analytics.auth.on('success', function(response) {
    var htmlStr = '<button type="button" id="logout_bt" class="btn btn-default btn-xs" onclick="logOut();" style="float: right; margin: 2px 0 5px 0"> Logout</button>';
    $('#embed-api-auth-container > div:nth-child(2)').after(htmlStr);  

    $.getJSON('https://www.googleapis.com/oauth2/v1/userinfo?alt=json&access_token='+response.access_token, function(data) {
        var usremail = data.email;
        $.ajax({
          type: "POST",
          url: "checkuser.php",
          data: { value : usremail },
          success: function(data) {
            if(data == 'EXPIRED'){
              alert("Sorry, your free trial has expired. Thank you for trying out. Contact gerald.logor@gmail.com for registration.");
              location.href='http://gelytics.com';
              logOut();
            } else if(data == 'NEW'){
              $.ajax({
                type: "POST",
                url: "insertuser.php",
                data: { value : usremail }
              });
            } 
          }
        });
    });//end getJSON

  });


  /**
   * Store a set of common DataChart config options since they're shared by
   * both of the charts we're about to make.
   */
  var commonConfig = {
    query: {
      metrics: 'ga:pageviews',
      dimensions: 'ga:date'
    },
    chart: {
      type: 'LINE',
      options: {
        width: '100%'
      }
    }
  };

  
  var gaid;
  
  var dateRange = {
    'start-date': '7daysAgo',
    'end-date': 'yesterday'
  };


  /**
   * Create a new ViewSelector2 instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container',
  })
  .set(dateRange)
  .execute();


  /**
   * Create a new DateRangeSelector instance to be rendered inside of an
   * element with the id "date-range-selector-1-container", set its date range
   * and then render it to the page.
   */
  var dateRangeSelector1 = new gapi.analytics.ext.DateRangeSelector({
    container: 'date-range-selector-1-container'
  })
  .set(dateRange)
  .execute();


  


  /**
   * Register a handler to run whenever the user changes the view.
   * The handler will update both dataCharts as well as updating the title
   * of the dashboard.
   */
  viewSelector.on('viewChange', function(data) {
    console.log("viewSelector.viewChange:::");

    gaid = data.ids;

    renderPageviewsChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderUniqueVisitorChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderSessionsChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopBrowsersChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopSocialTrafficSource(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopReferralTrafficSource(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopPages(gaid, dateRange['start-date'], dateRange['end-date']);

  });


  /**
   * Register a handler to run whenever the user changes the date range from
   * the first datepicker. The handler will update the first dataChart
   * instance as well as change the dashboard subtitle to reflect the range.
   */
  dateRangeSelector1.on('change', function(data) {
    console.log("dateRangeSelector1.viewChange:::");

    dateRange = {
      "start-date" : data['start-date'],
      "end-date" : data['end-date']

    };

    renderPageviewsChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderUniqueVisitorChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderSessionsChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopBrowsersChart(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopSocialTrafficSource(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopReferralTrafficSource(gaid, dateRange['start-date'], dateRange['end-date']);
    renderTopPages(gaid, dateRange['start-date'], dateRange['end-date']);

  });



  /** UNNECESSARY HACK, MAYBE? **/
  /** Due to this when resizing: Uncaught TypeError: Cannot read property 'clientWidth' of null  **/
  $(window).resize(function() {
    if(this.resizeTO) clearTimeout(this.resizeTO);
    this.resizeTO = setTimeout(function() {
        $(this).trigger('resizeEnd');
    }, 350);
  });

  $(window).bind('resizeEnd', function() {
      renderPageviewsChart(gaid, dateRange['start-date'], dateRange['end-date']);
      renderSessionsChart(gaid, dateRange['start-date'], dateRange['end-date']);
  });
  /**=================================================**/


  

  /**
   * Draw the a chart.js line chart with data from the specified view that
   * overlays session data for the current week over session data for the
   * previous week.
   */
  function renderPageviewsChart(ids, startDate, endDate) {
    console.log("renderPageviewsChart:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    var thisWeek = query({
      'ids': ids,
      'dimensions': 'ga:date,ga:nthDay',
      'metrics': 'ga:pageviews',
      'start-date': startDate,
      'end-date': endDate
    });

    

    Promise.all([thisWeek]).then(function(results) {
      var data1 = results[0].rows.map(function(row) { return +row[2]; });
      var labels = results[0].rows.map(function(row) { return +row[0]; });

      labels = labels.map(function(label) {
        return moment(label, 'YYYYMMDD').format('MM/DD');
      });

      var data = {
        labels : labels,
        datasets : [
         
          {
            label: 'Selected Period',
            fillColor : "rgba(220,220,220,0.5)",
            strokeColor : "rgba(220,220,220,1)",
            pointColor : "rgba(220,220,220,1)",
            pointStrokeColor : "#fff",
            data : data1
          }
        ]
      };

      new Chart(makeCanvas('chart-1-container')).Line(data);
      
    });
  }



  function renderUniqueVisitorChart(ids, startDate, endDate) {
    console.log("renderUniqueVisitorChart:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    var thisWeek = query({
      'ids': ids,
      'metrics': 'ga:users',
      'start-date': startDate,
      'end-date': endDate
    });

    Promise.all([thisWeek]).then(function(results) {
      var data1 = results[0].rows.map(function(row) { return +row[0]; });
      $('#num_users').html('<i class="fa fa-child"></i> '+data1.toLocaleString());
    });
  }

  /**
   * Draw the a chart.js line chart with data from the specified view that
   * overlays session data for the current week over session data for the
   * previous week.
   */
  function renderSessionsChart(ids, startDate, endDate) {
    console.log("renderSessionsChart:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    var thisWeek = query({
      'ids': ids,
      'dimensions': 'ga:date,ga:nthDay',
      'metrics': 'ga:sessions',
      'start-date': startDate,
      'end-date': endDate
    });

    

    Promise.all([thisWeek]).then(function(results) {
      var data1 = results[0].rows.map(function(row) { return +row[2]; });
      var labels = results[0].rows.map(function(row) { return +row[0]; });

      labels = labels.map(function(label) {
        return moment(label, 'YYYYMMDD').format('MM/DD');
      });

      var data = {
        labels : labels,
        datasets : [
         {
            label: 'This Week',
            fillColor : "rgba(151,187,205,0.5)",
            strokeColor : "rgba(151,187,205,1)",
            pointColor : "rgba(151,187,205,1)",
            pointStrokeColor : "#fff",
            data : data1
          }
        ]
      };

      new Chart(makeCanvas('chart-2-container')).Bar(data);
      
    });
  }
  

  /**
   * Draw the a chart.js doughnut chart with data from the specified view that
   * show the top 5 browsers over the selected period
   */
  function renderTopBrowsersChart(ids, startDate, endDate) {
    console.log("renderTopBrowsersChart:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    query({
      'ids': ids,
      'dimensions': 'ga:browser',
      'metrics': 'ga:pageviews',
      'sort': '-ga:pageviews',
      'start-date': startDate,
      'end-date': endDate,
      'max-results': 5
    })
    .then(function(response) {
      if(response.totalResults > 0){        

        var data = [];
        var colors = ['#E5FCC2','#9DE0AD','#45ADA8','#547980','#594F4F'];

        response.rows.forEach(function(row, i) {
          data.push({ value: +row[1], color: colors[i], label: row[0] });
        });

        new Chart(makeCanvas("browserchart")).Doughnut(data);
      }
      else document.getElementById('browserchart').innerHTML = '<b>NO DATA</b>';

    });
  }



  /**
   * Draw the a chart.js doughnut chart with data from the specified view that
   * show the top 5 top social traffic over the selected period
   */
  function renderTopSocialTrafficSource(ids, startDate, endDate) {
    console.log("renderTopSocialTrafficSource:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    query({
      'ids': ids,
      'dimensions': 'ga:socialNetwork',
      'metrics': 'ga:pageviews',
      'sort': '-ga:pageviews',
      'filters': 'ga:socialNetwork!@not',
      'start-date': startDate,
      'end-date': endDate,
      'max-results': 5
    })
    .then(function(response) {

      if(response.totalResults > 0){        
        var data = [];
        var colors = ['#E5FCC2','#9DE0AD','#45ADA8','#547980','#594F4F'];

        response.rows.forEach(function(row, i) {
          data.push({ value: +row[1], color: colors[i], label: row[0] });
        });
        new Chart(makeCanvas("socialchart")).Pie(data);
      }
      
      else document.getElementById('socialchart').innerHTML = '<b>NO DATA</b>';

    });
  }


  /**
   * Draw the a chart.js doughnut chart with data from the specified view that
   * show the top 5 top referral traffic over the selected period
   */
  function renderTopReferralTrafficSource(ids, startDate, endDate) {
    console.log("renderTopReferralTrafficSource:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    query({
      'ids': ids,
      'dimensions': 'ga:source',
      'metrics': 'ga:pageviews',
      'sort': '-ga:pageviews',
      'start-date': startDate,
      'end-date': endDate,
      'max-results': 5
    })
    .then(function(response) {

      if(response.totalResults > 0){        

        var data = [];
        var colors = ['#E5FCC2','#9DE0AD','#45ADA8','#547980','#594F4F'];

        response.rows.forEach(function(row, i) {
          data.push({ value: +row[1], color: colors[i], label: row[0] });
        });

        new Chart(makeCanvas("referralchart")).Doughnut(data);
      }
      else document.getElementById('referralchart').innerHTML = '<b>NO DATA</b>';

    });
  }

  function renderTopPages(ids, startDate, endDate) {
    console.log("renderTopPages:::"+ids+"::[startDate]"+startDate+"::[endDate]"+endDate);

    query({
      'ids': ids,
      'dimensions': 'ga:pageTitle',
      'metrics': 'ga:pageviews',
      'sort': '-ga:pageviews',
      'start-date': startDate,
      'end-date': endDate,
      'max-results': 10
    })
    .then(function(response) {
      var len = response.rows.length;
      var str = "";
      var container = document.getElementById('toppages-tbl');

      if(len > 0){        
        for(i=0;i<len;i++){
          var currPgTitle = response.rows[i][0];
          var currPgView = response.rows[i][1];

          str += 
          '<tr>'+
          '<td>'+currPgTitle+'</td>'+
          '<td class="numeric">'+currPgView+'</td>'+
          '</tr>';

        }

      container.innerHTML = 
        '<thead>'+
        '<tr>'+
        '<th>Page Title</th>'+
        '<th class="numeric">Pageviews</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody>'+
        str+
        '</tbody>';        
      }
      else{
        container.innerHTML = 
        '<thead>'+
        '<tr>'+
        '<th>Page Title</th>'+
        '<th class="numeric">Pageviews</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody>'+
        '<tr>'+
        '<th>Page Title</th>'+
        '<th class="numeric">Pageviews</th>'+
        '</tr>'+
        '</thead>'+
        '<tbody>'+
        '<tr>'+
        '<td>NO DATA</td>'+
        '<td class="numeric">NO DATA</td>'+
        '</tr>'+
        '</tbody>';        
      } 

    });


  }



  /**
   * Extend the Embed APIs `gapi.analytics.report.Data` component to
   * return a promise the is fulfilled with the value returned by the API.
   * @param {Object} params The request parameters.
   * @return {Promise} A promise.
   */
  function query(params) {
    return new Promise(function(resolve, reject) {
      var data = new gapi.analytics.report.Data({query: params});
      data.once('success', function(response) { resolve(response); })
          .once('error', function(response) { reject(response); })
          .execute();
    });
  }


  /**
   * Create a new canvas inside the specified element. Set it to be the width
   * and height of its container.
   * @param {string} id The id attribute of the element to host the canvas.
   * @return {RenderingContext} The 2D canvas context.
   */
  function makeCanvas(id) {
    var container = document.getElementById(id);
    var canvas = document.createElement('canvas');
    var ctx = canvas.getContext('2d');

    container.innerHTML = '';

    canvas.width = container.offsetWidth;
    canvas.height = container.offsetHeight;
    container.appendChild(canvas);

    return ctx;
  }



   // Set some global Chart.js defaults.
  Chart.defaults.global.animationSteps = 60;
  Chart.defaults.global.animationEasing = 'easeInOutQuart';
  Chart.defaults.global.responsive = true;
  Chart.defaults.global.maintainAspectRatio = false;


  
  

});

function logOut(){
  document.getElementById('logout_bt').remove();
  gapi.auth.signOut();
}

</script>
