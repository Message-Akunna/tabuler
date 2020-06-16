<?php
    //Author: Akunna Message
    //Created at: 8, June 2020
    //Description: Add bulk data into timetable table

    require('../../common/dbCredentials.php'); 

    //start connection
    $con = new Database();

    //parameters
    $id = null;
    $dataArray = json_decode($_POST['data']);

    // // // // // // // // // //
    if(strlen($_POST['data']) > 0){
        $insertionFailure=0;
        foreach ($dataArray as $data) {
            $period = $data->period;
            $week_day = $data->week_day;
            $course = $data->course;
            $lecture_halls = $data->lecture_halls;
            $lecturerArray = $con->get_course_lecturer_data($data->course);
            $lecturer = (is_array($lecturerArray) ? $lecturerArray[0]["reg_no"] : null);

            // run query period week_day course hall lecturer
            $insertSQL = $con->prepare("INSERT INTO timetable (period, week_day, course, hall, lecturer) VALUES (?,?,?,?,?)");
            $insertSQL->bind_param("iiiii", $period, $week_day, $course, $lecture_halls, $lecturer);
            $insertSQL->execute();
            if($insertSQL->affected_rows == 1){
                /*echo '{"status":"Success","response":{},"message":"record is added successfully."}';
                $status = 'success';
                $message = "success";*/
                $insertionSuccess += 1;
            }
        }
        echo '{"status":"Success","response":{},"message":" '.$insertionSuccess.' school record(s) inserted successfully."}';
        $status = 'success';
        $message = "success";

        $insertSQL->close();
    }else{
        echo '{"status":"Failure","response":{},"message":"Failed to insert record. No record found"}';
        $status = 'failure';
        $message = "Failed to insert record. No record found";
    }
    $con->close();
?>