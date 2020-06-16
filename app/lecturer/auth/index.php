<?php
    include_once('../session.php');
    /* 
    *
    *  Author: Akunna Message
    *  Created at: 3RD, June 2020
    *  Description: User Validation script
    *
    */
    if(!isset($_SESSION['user_type'])){
        header('Location:../logout.php');
    }else if($_SESSION['user_type'] != 'lecturer'){
        header('Location:../logout.php');
    }else{
        $userType = $_SESSION['user_type'];
        $userData = $_SESSION['user_details'];
        $userName = $userData->first_name.' '.$userData->last_name;
        $accessRights = ucwords($userType);

        if (empty($_SESSION['email'])) {
           header('Location:../logout.php');
        }

    }
?>