<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>:: Dashboard ::</title>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url().'assets/css/bootstrap.css';?>" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url().'assets/font-awesome/css/font-awesome.css';?>" rel="stylesheet" />
    
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url().'assets/css/style.css';?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/css/style-responsive.css';?>" rel="stylesheet">
    <link href="<?php echo base_url().'assets/js/gritter/css/jquery.gritter.css';?>" rel="stylesheet">
    <!--<link href="<?php echo base_url().'assets/lineicons/style.css';?>" rel="stylesheet">-->

    <! -- Custom DateRangeSelector and ViewPicker from Embed API -->
    <link href="<?php echo base_url().'assets/css/embedmain.css';?>" rel="stylesheet">

    <script src="<?php echo base_url().'assets/js2/Chart.min.js';?>"></script>
    <script src="<?php echo base_url().'assets/js2/moment.min.js';?>"></script>
    
    
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-57009206-1', 'auto');
      ga('send', 'pageview');

    </script>

    <script>
      (function(w,d,s,g,js,fs){ 
        g=w.gapi||(w.gapi={});g.analytics={q:[],ready:function(f){this.q.push(f);}};
        js=d.createElement(s);fs=d.getElementsByTagName(s)[0];  
        js.src='https://apis.google.com/js/platform.js';
        fs.parentNode.insertBefore(js,fs);js.onload=function(){g.load('analytics');};
      }(window,document,'script'));
    </script>
    <script src="<?php echo base_url().'assets/js2/view-selector2.js';?>"></script>
    <script src="<?php echo base_url().'assets/js2/date-range-selector.js';?>"></script>
    <script src="<?php echo base_url().'assets/js2/active-users.js';?>"></script>
    <script src="<?php echo base_url().'assets/js2/active-pages.js';?>"></script>
    <script src="<?php echo base_url().'assets/js2/active-sources.js';?>"></script>

  </head>

  <body>
  
  



  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href='<?php echo base_url().'home/index';?>' class="logo"><b>GELYTICS</b> Dashboard</a>
            <!--logo end-->
            
            <div id="embed-api-auth-container" style="float: right; margin-top: 7px; color: #fff;"></div>
            
        </header>
      <!--header end-->