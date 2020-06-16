<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update lecture halls table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_POST['id'];
    $name = $_POST['name'];
    $course_code = $_POST['course_code'];
    $department = $_POST['department'];

    if(strlen($id) < 1 || strlen($name) < 1 || strlen($course_code) < 1 || strlen($department) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE course SET name = ?, course_code = ?, department = ? WHERE id =?");
        $updateSQL->bind_param("ssii", $name, $course_code, $department, $id);
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
