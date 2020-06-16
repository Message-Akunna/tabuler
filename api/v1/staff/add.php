<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into staff table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $reg_no = $_POST['reg_no'];

    if(strlen($reg_no) < 1 ){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO staff (id, reg_no) VALUES (?,?)");
        $insertSQL->bind_param("ii", $id, $reg_no);
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
