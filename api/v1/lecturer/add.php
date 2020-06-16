<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into lecturer table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $department = $_POST['department']; 
    $course = $_POST['course']; 
    $reg_no = $_POST['reg_no']; 

    if(strlen($department) < 1  || strlen($course) < 1  || strlen($reg_no) < 1 ){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO lecturer (id, department, course, reg_no) VALUES (?,?,?,?)");
        $insertSQL->bind_param("iiii", $id, $department, $course, $reg_no);
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
