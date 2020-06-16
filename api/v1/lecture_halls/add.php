<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into lecture hall table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $hall_name = $_POST['hall_name'];
    $capacity = $_POST['capacity'];

    if(strlen($hall_name) < 1 || strlen($capacity) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO lecture_halls(id, hall_name, capacity) VALUES (?,?,?)");
        $insertSQL->bind_param("isi", $id, $hall_name, $capacity);
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
