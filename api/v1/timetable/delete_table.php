<?php

    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Delete from timetable table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    //None
    $deleteSQL = $con->prepare("TRUNCATE TABLE timetable");
    $deleteSQL->execute();
    $deleteSQL->store_result();
    
    if($deleteSQL->num_rows() == 0){
        echo '{"status":"Success","response":{},"message":"record deleted successfully."}';
        $status = 'success';
        $message = "success";
    }else{
        echo '{"status":"Failure","response":{},"message":"Failed to delete record."}';
        $status = 'failure';
        $message = $deleteSQL->error;
    }
    
    $deleteSQL->close();

    $con->close();  
?>