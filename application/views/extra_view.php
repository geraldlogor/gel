
<!-- **********************************************************************************************************************************************************
MAIN CONTENT
*********************************************************************************************************************************************************** -->
<!--main content start-->

<section id="main-content">
  <section class="wrapper site-min-height">
    
    <div class="row mt">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container1"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container1" style="display: none;"></div>
                <div class="big-realtimetext1">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container2"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container2" style="display: none;"></div>
                <div class="big-realtimetext2">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container3"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container3" style="display: none;"></div>
                <div class="big-realtimetext3">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->


        </div> <!--END div=row-->
      </div> <!--END div=col-lg-12 -->
    </div><!-- /row mt-->

    <div class="row mt">
      <div class="col-lg-12">
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container4"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container4" style="display: none;"></div>
                <div class="big-realtimetext4">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container5"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container5" style="display: none;"></div>
                <div class="big-realtimetext5">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-4 mb">
              <div class="form-panel"><div id="view-selector-container6"></div></div>
              <div class="weather-3 pn2 centered">
                <i class="fa fa-users"></i>
                <div id="active-users-container6" style="display: none;"></div>
                <div class="big-realtimetext6">...</div>
                <div class="info">
                  <div class="row">
                      <h3 class="centered">active users</h3>
                  </div>
                </div>
              </div>
            </div><! --/col-md-4 -->


        </div> <!--END div=row-->
      </div> <!--END div=col-lg-12 -->
    </div><!-- /row mt-->


    

  </section> <!--END WRAPPER-->
</section><!-- /MAIN CONTENT -->
<!--main content end-->




<script>


// == NOTE ==
// This code uses ES6 promises. If you want to use this code in a browser
// that doesn't supporting promises natively, you'll have to include a polyfill.

gapi.analytics.ready(function() {

  var realtime_interval = 5; //interval in 5 seconds

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
  function composeActiveUsersWidget(containerName, bigRealTimeText, viewSelectorContainer){
      var activeUsers = new gapi.analytics.ext.ActiveUsers({
        container: containerName,
        pollingInterval: realtime_interval
      });

      activeUsers.once('success', function() {
        this.on('change', function(data) {
            var val = $('#'+containerName+' .ActiveUsers-value').text();
            $(bigRealTimeText).text(val);
        });
      });

      var viewSelector = new gapi.analytics.ext.ViewSelector2({
        container: viewSelectorContainer,
      })
      .execute();

      viewSelector.on('viewChange', function(data) {
        activeUsers.set(data).execute();
      });
  }

  for(int i=1;i<=6;i++){
    composeActiveUsersWidget('active-users-container'+i, '.big-realtimetext'+i, 'view-selector-container'+i);
  }
  **/

  
//===============================================================//

  var activeUsers1 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container1',
    pollingInterval: realtime_interval
  });

  activeUsers1.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container1 .ActiveUsers-value').text();
        $('.big-realtimetext1').text(val);
    });
  });

  var viewSelector1 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container1',
  })
  .execute();

  viewSelector1.on('viewChange', function(data) {
    activeUsers1.set(data).execute();
  });


//===============================================================//

  
  var activeUsers2 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container2',
    pollingInterval: realtime_interval
  });


  activeUsers2.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container2 .ActiveUsers-value').text();
        $('.big-realtimetext2').text(val);
    });
  });


  var viewSelector2 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container2',
  })
  .execute();


  viewSelector2.on('viewChange', function(data) {
    activeUsers2.set(data).execute();
  });

//===============================================================//

  
  var activeUsers3 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container3',
    pollingInterval: realtime_interval
  });


  activeUsers3.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container3 .ActiveUsers-value').text();
        $('.big-realtimetext3').text(val);
    });
  });


  var viewSelector3 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container3',
  })
  .execute();


  viewSelector3.on('viewChange', function(data) {
    activeUsers3.set(data).execute();
  });

//===============================================================//

  
  var activeUsers4 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container4',
    pollingInterval: realtime_interval
  });


  activeUsers4.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container4 .ActiveUsers-value').text();
        $('.big-realtimetext4').text(val);
    });
  });


  var viewSelector4 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container4',
  })
  .execute();


  viewSelector4.on('viewChange', function(data) {
    activeUsers4.set(data).execute();
  });

//===============================================================//

  
  var activeUsers5 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container5',
    pollingInterval: realtime_interval
  });


  activeUsers5.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container5 .ActiveUsers-value').text();
        $('.big-realtimetext5').text(val);
    });
  });


  var viewSelector5 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container5',
  })
  .execute();


  viewSelector5.on('viewChange', function(data) {
    activeUsers5.set(data).execute();
  });

//===============================================================//

  
  var activeUsers6 = new gapi.analytics.ext.ActiveUsers({
    container: 'active-users-container6',
    pollingInterval: realtime_interval
  });


  activeUsers6.once('success', function() {
    this.on('change', function(data) {
        var val = $('#active-users-container6 .ActiveUsers-value').text();
        $('.big-realtimetext6').text(val);
    });
  });


  var viewSelector6 = new gapi.analytics.ext.ViewSelector2({
    container: 'view-selector-container6',
  })
  .execute();


  viewSelector6.on('viewChange', function(data) {
    activeUsers6.set(data).execute();
  });

//===============================================================//

  


  

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