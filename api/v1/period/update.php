<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update department table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    //parameters 
    $id = $_POST['id'];
    $period_name = $_POST['period_name'];
    $period_time = $_POST['period_time'];
    
    if(strlen($id) < 1 || strlen($period_name) < 1 || strlen($period_time) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE period SET period_name = ?, period_time = ? WHERE id =?");
        $updateSQL->bind_param("ssi", $period_name, $period_time, $id);
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
