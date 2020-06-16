<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update department table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $department_name = $_POST['department_name'];
    $id = $_POST['id'];

    if(strlen($department_name) < 1 || strlen($id) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE department SET department_name = ? WHERE id =?");
        $updateSQL->bind_param("si", $department_name, $id);
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
