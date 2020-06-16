<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: Add into user table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $other_names = $_POST['other_names'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    if(strlen($first_name) < 1 || strlen($last_name) < 1 || strlen($gender) < 1 || strlen($phoneno) < 1 || strlen($email) < 1 || strlen($password) < 1 || strlen($user_type) < 1 ){   
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else if($con->check_user_email($email)){
        echo '{"status":"Failure","response":{},"message":"Email is already registered with an account."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $insertSQL = $con->prepare("INSERT INTO user(id, first_name, last_name, other_names, gender, address, phoneno, email, password, user_type) VALUES (?,?,?,?,?,?,?,?,?,?)");
        $insertSQL->bind_param("isssssssss", $id, $first_name, $last_name, $other_names, $gender, $address, $phoneno, $email, $password, $user_type);
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
