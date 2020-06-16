<?php

    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Delete from calender table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_GET['id']; 
    $column = $_GET['column'];

    if(strlen($id) < 1 )
    {   //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        if (strlen($column) < 1) {
            $column = "id";
        }

        $id_palaceHolder="i";
        
        if (is_string($id)) {
            $id_palaceHolder = "s";
        }

        $deleteSQL = $con->prepare("DELETE from calender WHERE $column=?");
        $deleteSQL->bind_param($id_palaceHolder, $id);
        $deleteSQL->execute();
        
        if($deleteSQL->affected_rows > 0){
            echo '{"status":"Success","response":{},"message":"record deleted successfully."}';
            $status = 'success';
            $message = "success";
        }else{
            echo '{"status":"Failure","response":{},"message":"Failed to delete record, please ensure all related data are deleted first."}';
            $status = 'failure';
            $message = $deleteSQL->error;
        }
        $deleteSQL->close();
    }

    $con->close();  
?>