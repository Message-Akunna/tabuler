<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update timetable table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_POST['id'];
    $period = $_POST['period'];
    $week_day = $_POST['week_day'];
    $course = $_POST['course'];
    $hall = $_POST['hall'];
    $lecturer = $_POST['lecturer'];
    //id	period	week_day	course	hall	lecturer

    if(strlen($id) < 1 || strlen($period) < 1 || strlen($week_day) < 1 || strlen($course) < 1 || strlen($hall) < 1 || strlen($lecturer) < 1 ){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE timetable SET period = ?, week_day = ?, course = ?, hall = ?, lecturer = ?  WHERE id =?");
        $updateSQL->bind_param("iiiiii", $period, $week_day, $course, $hall, $lecturer, $id);
        $updateSQL->execute();
        if($updateSQL->affected_rows == 1 OR $updateSQL->errno == 0){
            echo '{"status":"Success","response":{},"message":"record updated successfully."}';
            $status = 'success';
            $message = "success";
        }else{
            echo '{"status":"Failure","response":{},"message":"record not updated"}';
            $status = 'failure';
            $message = 'record could not be updated';
        }
        $updateSQL->close();
    }
    $con->close();  
?>
