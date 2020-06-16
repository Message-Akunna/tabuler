<?php    
    include_once("../api-call.php");
    $department = callAPI('GET','department/list', false);
    $departmentStatus = $department['status'];
    $departmentListLength = $department['list_total'];
    $departmentData = $department['response'];
    foreach ($departmentData as $row) {
?>    
    <option value="<?php echo $row['id'];?>"><?=($row['department_name']);?></option>
<?php
    }
?>
