<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update department table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_POST['id'];
    $department = $_POST['department']; 
    $course = $_POST['course']; 
    $reg_no = $_POST['reg_no']; 

    if(strlen($id) < 1 || strlen($department) < 1  || strlen($course) < 1  || strlen($reg_no) < 1 ){  
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE lecturer SET department = ?, course = ?, reg_no = ? WHERE id =?");
        $updateSQL->bind_param("iiii", $department, $course, $reg_no, $id);
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
