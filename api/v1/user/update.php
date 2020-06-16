<?php
    //Author: Message Akunna
    //Created at: 26, May 2020
    //Description: Update department table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_POST['id'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $other_names = $_POST['other_names'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    if(strlen($id) < 1 || strlen($first_name) < 1 || strlen($last_name) < 1 || strlen($gender) < 1 || strlen($address) < 1 || strlen($phoneno) < 1 || strlen($email) < 1 || strlen($password) < 1 || strlen($user_type) < 1 ){   
        //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        //
        $updateSQL = $con->prepare("UPDATE user SET first_name = ?, last_name = ?, other_names = ?, gender = ?, address = ?, phoneno = ?, email = ?, password = ?, user_type = ? WHERE id =?");
        $updateSQL->bind_param("sssssssssi", $first_name, $last_name, $other_names, $gender, $address, $phoneno, $email, $password, $user_type, $id);
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
