
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
          
          <div id="view-selector-container1"></div>
        </div><!-- /form-panel -->
      </div><!-- /col-lg-12 -->


      <div class="col-lg-12">
        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container1" style="display: none;"></div>
                <div class="big-realtimetext1">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">CURRENT ACTIVE USERS</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->
          


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <h4><i class="fa fa-signal"></i> TOP 5 ACTIVE PAGES</h4>
            <div id="active-pages-container1" style="display: none;"></div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="activepage-tbl-1">
                  <thead>
                  <tr>
                      <th>Page Path</th>
                      <th class="numeric">Active Users</th>
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
                
          </div><! --/col-md-4 -->


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <h4><i class="fa fa-share"></i> TOP 5 SOURCE</h4>
            <div id="active-sources-container1" style="display: none;"></div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="activesource-tbl-1">
                  <thead>
                  <tr>
                      <th>Source</th>
                      <th class="numeric">Active Users</th>
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
                
          </div><! --/col-md-4 -->


          
        </div> <!--END div=row-->

      </div> <!--END div=col-lg-12 -->
    </div><!-- /row -->










    <!-- View Picker and Date Range Picker -->
    <div class="row mt">
      <div class="col-lg-12">
        <div class="form-panel">
          
          <div id="view-selector-container2"></div>
        </div><!-- /form-panel -->
      </div><!-- /col-lg-12 -->

      <div class="col-lg-12">

      
        <div class="row">


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container2" style="display: none;"></div>
                <div class="big-realtimetext2">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">CURRENT ACTIVE USERS</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->
          


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <h4><i class="fa fa-signal"></i> TOP 5 ACTIVE PAGES</h4>
            <div id="active-pages-container2" style="display: none;"></div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="activepage-tbl-2">
                  <thead>
                  <tr>
                      <th>Page Path</th>
                      <th class="numeric">Active Users</th>
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
                
          </div><! --/col-md-4 -->


          <div class="col-lg-4 col-md-4 col-sm-4 mb">
            <h4><i class="fa fa-share"></i> TOP 5 SOURCE</h4>
            <div id="active-sources-container2" style="display: none;"></div>
            <section id="unseen">
                <table class="table table-bordered table-striped table-condensed" id="activesource-tbl-2">
                  <thead>
                  <tr>
                      <th>Source</th>
                      <th class="numeric">Active Users</th>
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
                
          </div><! --/col-md-4 -->

          
        </div> <!--END div=row-->

      </div> <!--END div=col-lg-12 -->
    </div><!-- /row -->

    

  </section> <!--END WRAPPER-->
</section><!-- /MAIN CONTENT -->
<!--main content end-->




<script>

alert("The interval polling is set to 1 minute. Contact me if you want to have it more frequent.");


// == NOTE ==
// This code uses ES6 promises. If you want to use this code in a browser
// that doesn't supporting promises natively, you'll have to include a polyfill.

gapi.analytics.ready(function() {

  var realtime_interval = 60; //interval in 60 seconds

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
   * Create a new ActiveUsers instance to be rendered inside of an
   * element with the id "active-users-container" and poll for changes every
   * 'pollingInterval' seconds.
   */
  var activeUsers1 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container1',
    pollingInterval: realtime_interval
  });


  /**
   * Add CSS animation to visually show the when users come and go.
   */
  activeUsers1.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container1 .ActiveUsers-value').text();
        $('.big-realtimetext1').text(val);
    });
  });



  var activePages1 = new gapi.analytics.ext.ActivePages({
    container: 'active-pages-container1',
    pollingInterval: realtime_interval

  });

  activePages1.once('success', function() {
    this.on('change', function(data) {
        refreshActivePagesTbl(data, 'activepage-tbl-1');
    });
  });

  var activeSources1 = new gapi.analytics.ext.ActiveSources({
    container: 'active-sources-container1',
    pollingInterval: realtime_interval

  });

  activeSources1.once('success', function() {
    this.on('change', function(data) {
        refreshActiveSourcesTbl(data, 'activesource-tbl-1');
    });
  });


  /**
   * Create a new ViewSelector2 instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector1 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container1',
  })
  .execute();


  /**
   * Update the activeUsers component, the Chartjs charts, and the dashboard
   * title whenever the user changes the view.
   */
  viewSelector1.on('viewChange', function(data) {
    activeUsers1.set(data).execute();
    activePages1.set(data).execute();
    activeSources1.set(data).execute();
  });


  

  var activeUsers2 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container2',
    pollingInterval: realtime_interval
  });


  /**
   * Add CSS animation to visually show the when users come and go.
   */
  activeUsers2.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container2 .ActiveUsers-value').text();
        var prop = $('#ViewSelector2-item').text();
        $('.big-realtimetext2').text(val);
    });
  });


  var activePages2 = new gapi.analytics.ext.ActivePages({
    container: 'active-pages-container2',
    pollingInterval: realtime_interval

  });

  activePages2.once('success', function() {
    this.on('change', function(data) {
        refreshActivePagesTbl(data, 'activepage-tbl-2');
    });
  });


  var activeSources2 = new gapi.analytics.ext.ActiveSources({
    container: 'active-sources-container2',
    pollingInterval: realtime_interval

  });

  activeSources2.once('success', function() {
    this.on('change', function(data) {
        refreshActiveSourcesTbl(data, 'activesource-tbl-2');
    });
  });


  /**
   * Create a new ViewSelector2 instance to be rendered inside of an
   * element with the id "view-selector-container".
   */
  var viewSelector2 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container2',
  })
  .execute();


  /**
   * Update the activeUsers component, the Chartjs charts, and the dashboard
   * title whenever the user changes the view.
   */
  viewSelector2.on('viewChange', function(data) {
    activeUsers2.set(data).execute();
    activePages2.set(data).execute();
    activeSources2.set(data).execute();
  });



  function refreshActivePagesTbl(data, tablecontainer){
    var container = document.getElementById(tablecontainer);
    
    var str = "";

    var len = data.activePages.length;

    if(len == 0){
      str = '<tr><td>...</td><td class="numeric">...</td></tr>';
    }
    else{
      for(i=0;i<len;i++){
        var currActivePg = data.activePages[i][0];
        var currActivePgNum = data.activePages[i][1];

        str += 
        '<tr>'+
        '<td>'+currActivePg+'</td>'+
        '<td class="numeric">'+currActivePgNum+'</td>'+
        '</tr>';

      }
    }

    container.innerHTML = 
    '<thead>'+
    '<tr>'+
    '<th>Page Path</th>'+
    '<th class="numeric">Active Users</th>'+
    '</tr>'+
    '</thead>'+
    '<tbody>'+
    str+
    '</tbody>';

  }


  function refreshActiveSourcesTbl(data, tablecontainer){
    var container = document.getElementById(tablecontainer);
    
    var str = "";

    var len = data.activeSources.length;

    if(len == 0){
      str = '<tr><td>...</td><td class="numeric">...</td></tr>';
    }
    else{
      for(i=0;i<len;i++){
        var currActiveSrc = data.activeSources[i][0];
        var currActiveSrcNum = data.activeSources[i][1];

        str += 
        '<tr>'+
        '<td>'+currActiveSrc+'</td>'+
        '<td class="numeric">'+currActiveSrcNum+'</td>'+
        '</tr>';

      }  
    }
    

    container.innerHTML = 
    '<thead>'+
    '<tr>'+
    '<th>Traffic Source</th>'+
    '<th class="numeric">Active Users</th>'+
    '</tr>'+
    '</thead>'+
    '<tbody>'+
    str+
    '</tbody>';

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