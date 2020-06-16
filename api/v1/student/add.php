<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into student table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $session = $_POST['session'];
    $department = $_POST['department'];
    $reg_no = $_POST['reg_no'];
    $level = $_POST['level'];

    if(strlen($session) < 1 || strlen($department) < 1 || strlen($reg_no) < 1 || strlen($level) < 1 ){   
        //validating parameters 
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO student (id, session, reg_no, department, level ) VALUES (?,?,?,?,?)");
        $insertSQL->bind_param("isiii", $id, $session, $reg_no, $department, $level);
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
