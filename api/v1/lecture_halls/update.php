<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update lecture halls table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_POST['id'];
    $hall_name = $_POST['hall_name'];
    $capacity = $_POST['capacity'];

    if(strlen($id) < 1 || strlen($hall_name) < 1 || strlen($capacity) < 1){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $updateSQL = $con->prepare("UPDATE lecture_halls SET hall_name = ?, capacity = ?  WHERE id =?");
        $updateSQL->bind_param("sii", $hall_name, $capacity, $id);
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
