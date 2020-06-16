<?php
    include_once('session.php');
    /* 
    *
    *  Author: Akunna Message
    *  Created at: 26, May 2020
    *  Description: User Validation script
    *
    */

    /* 
    *  Remove all session variables
    */
    session_unset();

    /* 
    *  Destroy the session
    */
    session_destroy();
    
    /* 
    *  Redirect to login page
    */
    header('Location:../login.php');
?>