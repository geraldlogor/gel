<?php

//========== Connect to database ============//
$servername = "localhost";
$username = "k9425962_dbuser2";
$password = "gelytics";
$dbname = "k9425962_db";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
//========================================//



//========= Connect to GA ===================//
require_once 'http://gelytics.com/dashboard//google-api-php-client/autoload.php';


$client_id = '424526162298-eb5c6h3jjkacuku52a2pbvegba40gbr7.apps.googleusercontent.com'; //Client ID
$service_account_name = '424526162298-eb5c6h3jjkacuku52a2pbvegba40gbr7@developer.gserviceaccount.com'; //Email Address
$key_file_location = 'http://gelytics.com/dashboard/google-api-php-client/key/gelytics-ad2278397384.p12'; //key.p12


$client = new Google_Client();
$client->setApplicationName("gelytics");
$service = new Google_Service_Analytics($client);

if (isset($_SESSION['service_token'])) {
  $client->setAccessToken($_SESSION['service_token']);
}


$key = file_get_contents($key_file_location);
$cred = new Google_Auth_AssertionCredentials(
    $service_account_name,
    array('https://www.googleapis.com/auth/analytics'),
    $key
);
$client->setAssertionCredentials($cred);
if ($client->getAuth()->isAccessTokenExpired()) {
  $client->getAuth()->refreshTokenWithAssertion($cred);
}
$_SESSION['service_token'] = $client->getAccessToken();




//Usage:: get($ids, $metrics, $optParams = array())
//Doc::
/**
   * Returns real time data for a view (profile). (realtime.get)
   *
   * @param string $ids Unique table ID for retrieving real time data. Table ID is
   * of the form ga:XXXX, where XXXX is the Analytics view (profile) ID.
   * @param string $metrics A comma-separated list of real time metrics. E.g.,
   * 'rt:activeUsers'. At least one metric must be specified.
   * @param array $optParams Optional parameters.
   *
   * @opt_param int max-results The maximum number of entries to include in this
   * feed.
   * @opt_param string sort A comma-separated list of dimensions or metrics that
   * determine the sort order for real time data.
   * @opt_param string dimensions A comma-separated list of real time dimensions.
   * E.g., 'rt:medium,rt:city'.
   * @opt_param string filters A comma-separated list of dimension or metric
   * filters to be applied to real time data.
   * @return Google_Service_Analytics_RealtimeData
   */
$results = $service->realtime->get('ga:70853735', 'rt:activeUsers');





foreach ($results as $item) {
	echo $item."\n";
}



//===========================================//

//========= Start processes ===============//
// foreach ($gaid in $listgaid){
// 	capture_active_users($conn, $gaid);
// 	capture_active_pages($conn, $gaid);
// 	capture_active_sources($conn, $gaid);	
// }

//=======================================//


//========== Commit & Closing DBConn ==============//
$conn->commit();
$conn->close();
//=======================================//



function capture_active_users($conn){

}

function capture_active_pages($conn){

}

function capture_active_sources($conn){

}

?>

