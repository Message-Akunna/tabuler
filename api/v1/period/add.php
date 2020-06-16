<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into period table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters 
    $id = null;
    $period_name = $_POST['period_name'];
    $period_time = $_POST['period_time'];

    // 
    if(strlen($period_name) < 1 || strlen($period_time) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO period (id, period_name, period_time) VALUES (?,?,?)");
        $insertSQL->bind_param("iss", $id, $period_name, $period_time);
        $insertSQL->execute();

        if($insertSQL->affected_rows == 1){
            echo '{"status":"Success","response":{},"message":"record is added successfully."}';
            $status = 'success';
            $message = "success";
        }else{
            echo '{"status":"Failure","response":{},"message":"Failed to insert record."}';
            $status = 'failure';
            $message = $insertSQL->error;
        }
        $insertSQL->close();
    }
    $con->close();  
?>
