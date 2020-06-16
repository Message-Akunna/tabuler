<?php
 function callAPI($method, $url, $data, $raw_url=false){
    $curl = curl_init();

    if(!$raw_url){
        $url = strstr(getBaseUrl(), 'api', true).'/api/v1/'.$url;
    }

    switch ($method){
        case "POST":
        curl_setopt($curl, CURLOPT_POST, 1);
        if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
        break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
        if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);                              
        break;
        default:
            if ($data)
                $url = sprintf("%s?%s", $url, http_build_query($data));
            curl_setopt($curl, CURLOPT_HTTPHEADER, array(
                'Content-Type: application/json'
            ));
    }

    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $url);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl,CURLOPT_FOLLOWLOCATION,true);

    // EXECUTE:
    $result = curl_exec($curl);
    if(!$result){die("Connection Failure");}
    curl_close($curl);
    
    return json_decode($result, true);

}

function trimWords($s, $dirt, $case_insensitive=false, $min_abbrev = 3){
    $ss = substr($dirt, $min_abbrev);
    $arr = str_split($ss);
    $patt = '(?>(?<last>'.array_pop($arr).'))?';
    $i = count($arr);
    while ($i)
        $patt = '(?>'.$arr[--$i].$patt.')?';
    $patt = '#^'.substr($dirt, 0, $min_abbrev).$patt.'(?(last)|\.)#';
    $patt .= $case_insensitive ? 'i' : null;
    return trim(preg_replace($patt, '', $s));
}

function getBaseUrl() {
    // output: /myproject/index.php
    $currentPath = $_SERVER['PHP_SELF']; 
    // echo $currentPath;

    // output: Array ( [dirname] => /myproject [basename] => index.php [extension] => php [filename] => index ) 
    $pathInfo = pathinfo($currentPath); 

    // output: localhost
    $hostName = $_SERVER['HTTP_HOST']; 

    // output: http://
    $protocol = strtolower(substr($_SERVER["SERVER_PROTOCOL"],0,5))=='https'?'https':'http';

    // return: http://localhost/myproject/
    $Baseurl = $protocol.'://'.$hostName.$pathInfo['dirname']."/";

    return str_replace("app","api",$Baseurl);
    //return

  }
?>