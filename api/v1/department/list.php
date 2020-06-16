<?php
    //Author: Akunna Message
    //Created at: 26, May 2020
    //Description: List department table

    require('../../common/dbCredentials.php');

    //start connection
    $con = new Database();

    //parameters
    $id = $_GET['id'];
    $currPage = $_GET["curr_page"];
    $perPage = $_GET["per_page"];
    $srchKeyword = $_GET["keyword"];
    $srchColumn = $_GET["column"];


    if(strlen($perPage) < 1 ){
        $perPage=10000;
    }

    if(strlen($currPage) < 1 ){
        $currPage=1;
    }

    if(strlen($srchKeyword)>0 AND strlen($srchColumn)>0){
        $KeywordParse = "$srchKeyword";
        if (is_string($srchKeyword)) {
            $KeywordParse = "'$srchKeyword'";
        }
        $queryCondition = " WHERE $srchColumn = $KeywordParse";
    }

    $WHERE_CLAUSE="";
    //LOADING RECORDS
    if(strlen($id) > 0 ){
        $WHERE_CLAUSE =" WHERE id = ".$id." ";

        if(strlen($srchKeyword)>0 AND strlen($srchColumn)>0){
            $WHERE_CLAUSE =" WHERE id = ".$id." AND $srchColumn = $KeywordParse ";
        }
        $queryCondition="";
    }

    $array_return = array();
    
    $listCountSQL = $con->prepare("SELECT count(id) FROM department $WHERE_CLAUSE $queryCondition");
    $listCountSQL->execute();
    $listCountSQL->bind_result($totalRecordsCount);
    $listCountSQL->store_result();
    if($listCountSQL->num_rows() >= 1 && $listCountSQL->errno == 0){
        $listCountSQL->fetch();
        
        $totalCount = (int)$totalRecordsCount; 
        $pages = ceil($totalCount/$perPage);    
        if($pages == 0){
            $pages = 1;
        }
        if($currPage==1){
            $offset = 0;
        }
        else{
            $offset = ($currPage - 1) * $perPage ;
        }
        
        if($currPage<>"" || $perPage<>""){
            $limit = "LIMIT $offset,$perPage";
        }
        else{
            $limit ="";
        }
        
        
        $listSQL = $con->prepare("SELECT department_name, id FROM department $WHERE_CLAUSE $queryCondition $limit");
        $listSQL->execute();
        $listSQL->bind_result( $department_name, $id);
        $listSQL->store_result();
        if($listSQL->num_rows() >= 1 && $listSQL->errno == 0)
        {
            while($listSQL->fetch()) 
            {
                $result['department_name'] = (string)$department_name; 
                $result['id'] = (string)$id; 
                                    
                array_push($array_return,$result);
            }
            
            echo '{"status":"Success","response":';
            echo json_encode($array_return);
            echo ',"list_total":"'.$totalRecordsCount.'","pages":"'.$pages.'","message":""}';
            $status = 'success';
            $message = 'success';		
        }	
        else
        {
            $totalRecordsCount = 0;
            echo '{"status":"NoResult","response":{},"message":"No record.","list_total":"'.$totalRecordsCount.'","pages":"'.$pages.'"}';
            $status = 'no result';
            $message = "No record found.";
        }	
        $listSQL->close();
    }
    else
    {
        echo '{"status":"NoResult","response":{},"message":"No record."}';
        $status = 'no result';
        $message = "No record found.";
    }
    $listCountSQL->close();

            

    $con->close();  
?>
