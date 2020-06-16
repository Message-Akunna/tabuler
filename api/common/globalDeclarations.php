 <?php
    //define base url
    define('BASE_URL', 'http://localhost/tabuler');
    //define base url
    // define('BASE_URL', '');
    //define tabuler admin url
    define('API_URL_V1', BASE_URL.'/api/v1/');
    define('API_URL', BASE_URL.'/api/');

    $FOLDER ='';
    if($_SERVER['HTTP_HOST']) $DOMAIN = $_SERVER['HTTP_HOST']; else $DOMAIN = $_SERVER['SERVER_NAME'];
    if($_SERVER['HTTPS']) $SERV = "https"; else $SERV = "http";
    define("ABSPATH",$_SERVER["DOCUMENT_ROOT"]."/".$FOLDER);
?>
