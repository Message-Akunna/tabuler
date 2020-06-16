<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into timetable table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $period = $_POST['period'];
    $week_day = $_POST['week_day'];
    $course = $_POST['course'];
    $hall = $_POST['hall'];
    $lecturer = $_POST['lecturer'];

    if(strlen($period) < 1 || strlen($week_day) < 1 || strlen($course) < 1 || strlen($hall) < 1 || strlen($lecturer) < 1 ){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO timetable (id, period, week_day, course, hall, lecturer) VALUES (?,?,?,?,?,?)");
        $insertSQL->bind_param("iiiiii", $id, $period, $week_day, $course, $hall, $lecturer);
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
