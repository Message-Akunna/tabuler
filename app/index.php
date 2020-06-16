<?php
  include_once("session.php");
  /* 
  *
  *  Author: Akunna Message
  *  Created at: 3RD, June 2020
  *  Description: User Validation script
  *
  */

  if(isset($_POST['json'])){
    $userDetails = json_decode($_POST['json']);
  
    $userType = $userDetails[0]->user_type[0]->user_type;

    $_SESSION['email'] = $userDetails[0]->email;
    $_SESSION['user_type'] = $userType;
    $_SESSION['user_details'] = $userDetails[0];

    echo($userType);
  }else{
    echo('Error');
  }
  
  
?>