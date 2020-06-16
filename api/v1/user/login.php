<?php
    //Author: Message Akunna
    //Created at: 28, May 2020
    //Description: user login

    require("../../common/dbCredentials.php");
    require("../../common/globalDeclarations.php");

    // start connection
    $con = new Database();

    // Get login details
    $email = $_POST['email'];
    $password = $_POST['password'];

    if(strlen($email) < 1 || strlen($password) < 1 ){   //validating parameters
        echo '{"status":"Failure","response":{},"message":"Please enter all parameters."}';
        $status = "Failure";
        $message = "Invalid parameters.";
    }else{
        $array_return = array();
        $USER_TYPE = "";
        $listSQL = $con->prepare("SELECT * FROM user WHERE email = ? AND password = ?");
        $listSQL->bind_param("ss", $email, $password);
        $listSQL->execute();
        $listSQL->bind_result($id, $first_name, $last_name, $other_names, $gender, $address, $phoneno, $email, $password, $user_type);
        $listSQL->store_result();
        if($listSQL->num_rows() >= 1 && $listSQL->errno == 0){
            while($listSQL->fetch()){
                $USER_TYPE = (string)$user_type;
                $result['id'] = (string)$id; 
                $result['first_name'] = (string)$first_name; 
                $result['last_name'] = (string)$last_name; 
                $result['other_names'] = (string)$other_names; 
                $result['gender'] = (string)$gender; 
                $result['address'] = (string)$address; 
                $result['phoneno'] = (string)$phoneno; 
                $result['email'] = (string)$email; 
                $result['password'] = (string)$password; 
                $result['user_type'] = $con->get_user_type_data($user_type, $id); 
                                    
                array_push($array_return,$result);
            }
            echo '{"status":"Login Successful!","response":';
            echo json_encode($array_return);
            echo ',"list_total":"'.$totalRecordsCount.'","pages":"1","user_type":"'.$USER_TYPE.'","message":""}';
            $status = 'success';
            $message = 'success';		
        }else{
            $totalRecordsCount = 0;
            echo '{"status":"Failure","response":{},"message":"Incorrect login details.","list_total":"'.$totalRecordsCount.'","pages":"1"}';
            $status = 'Failure';
            $message = "Incorrect login details.";
        }	
        $listSQL->close();   
    }
?>