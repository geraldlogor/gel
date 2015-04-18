<?php


  $email = $_REQUEST['value'];
  $row = 1;
  $found = false;
  $date_str = '';
  
  //read the CSV
  if (($handle = fopen("user.csv", "r")) !== FALSE) {
      while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
        if($data[0]==$email){$found = true; $date_str = $data[1]; break;}
        $row++;        
      }
      fclose($handle);
  }

  if($found){
    //check if today is still in the range of 14 days trial
    $today = date('Y/m/d');
    $limitdate = date('Y/m/d',strtotime("+15 days", strtotime($date_str)));
    // echo '[today]'.$today.'[limitdate]'.$limitdate;  
    if($today > $limitdate) echo 'EXPIRED';
    else echo 'OK';
  }
  else echo 'NEW';
  
?>