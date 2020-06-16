<?php    
    include_once("../api-call.php");
    $course = callAPI('GET','course/list', false);
    $courseStatus = $course['status'];
    $courseListLength = $course['list_total'];
    $courseData = $course['response'];
    foreach ($courseData as $row) {
?>    
    <option value="<?=($row['id']);?>"><?=($row['name']);?></option>
<?php
    }
?>
