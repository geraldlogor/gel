<?php
  ini_set("auto_detect_line_endings", true);
  $email = $_REQUEST['value'];
  $today = date('Y/m/d', strtotime('today'));
  $list = array (
    array($email, $today)
  );
  
  if (($handle = fopen("user.csv", "a")) !== FALSE) {
      foreach ($list as $fields) fputcsv($handle, $fields);
      fclose($handle);
      echo 'INSERT SUCCESS';
  }
  else{
    echo 'INSERT ERROR';
  }
  
?>