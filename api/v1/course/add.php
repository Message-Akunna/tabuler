<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into course table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $name = $_POST['name'];
    $course_code = $_POST['course_code'];
    $department = $_POST['department'];
    
    if(strlen($name) < 1 || strlen($course_code) < 1 || strlen($department) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO course (id, name, course_code, department) VALUES (?,?,?,?)");
        $insertSQL->bind_param("issi", $id, $name, $course_code, $department);
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
