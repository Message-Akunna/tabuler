<?php

//Author: Ruchita
//Created at: 11 April, 2018
//Modified at: 11 April, 2018
//Description: Common Functions

function unique_md5() 
{
	//generate random string (token)
	mt_srand(microtime(true)*100000 + memory_get_usage(true));
	return md5(uniqid(mt_rand(), true));
}

function rand_string( $length ) {
	//user_hashed
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    return substr(str_shuffle($chars),0,$length);
}

function getAge($dob) {
	//calculate age on teh basis of birth date
  $today = date("Y-m-d");
  $diff = date_diff(date_create($dob), date_create($today));
  return $diff->format('%y');
}

//GETTING Number's Ordinal
function getOrdinal($number) {
    $ends = array('th','st','nd','rd','th','th','th','th','th','th');
    if ((($number % 100) >= 11) && (($number%100) <= 13))
        return $number. 'th';
    else
        return $number. $ends[$number % 10];
}

//sorting of multidimensional array
function array_sort($array, $on, $order=SORT_ASC)
{//for ascending order = SORT_ASC and for descending order = SORT_DESC

	    $new_array = array();
	    $sortable_array = array();

	    if (count($array) > 0) {
		foreach ($array as $k => $v) {
		    if (is_array($v)) {
		        foreach ($v as $k2 => $v2) {
		            if ($k2 == $on) {
		                $sortable_array[$k] = $v2;
		            }
		        }
		    } else {
		        $sortable_array[$k] = $v;
		    }
		}

		switch ($order) {
		    case SORT_ASC:
		        asort($sortable_array);
		        break;
		    case SORT_DESC:
		        arsort($sortable_array);
		        break;
		}

		foreach ($sortable_array as $k => $v) {
		    //$new_array[$k] = $array[$k];
			array_push($new_array,$array[$k]);
		}
	    }

	    return $new_array;
}

function randomPassword($len = 6) {

    //enforce min length 8
    if($len < 6)
        $len = 6;

    //define character libraries - remove ambiguous characters like iIl|1 0oO
    $sets = array();
    $sets[] = 'ABCDEFGHJKLMNPQRSTUVWXYZ';
    $sets[] = 'abcdefghjkmnpqrstuvwxyz';
    $sets[] = '123456789';

    $password = '';
    
    //append a character from each set - gets first 4 characters
    foreach ($sets as $set) {
        $password .= $set[array_rand(str_split($set))];
    }

    //use all characters to fill up to $len
    while(strlen($password) < $len) {
        //get a random set
        $randomSet = $sets[array_rand($sets)];
        
        //add a random char from the random set
        $password .= $randomSet[array_rand(str_split($randomSet))]; 
    }
    
    //shuffle the password string before returning!
    return str_shuffle($password);
}

function strip_tags_content($string) { 
    // ----- remove HTML TAGs ----- 
    $string = preg_replace ('/<[^>]*>/', ' ', $string); 
    // ----- remove control characters ----- 
    $string = str_replace("\r", '', $string);
    $string = str_replace("\n", ' ', $string);
    $string = str_replace("\t", ' ', $string);
    // ----- remove multiple spaces ----- 
    $string = trim(preg_replace('/ {2,}/', ' ', $string));
    return $string; 

}

function human_filesize($bytes, $decimals = 2) {
    
  $size = array('B','kB','MB','GB','TB','PB','EB','ZB','YB');
    $factor = floor((strlen($bytes) - 1) / 3);
    return sprintf("%.{$decimals}f", $bytes / pow(1024, $factor)) . @$size[$factor];
}

?>
