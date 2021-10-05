<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: text/html; charset=UTF-8");
header("Access-Control-Allow-Methods: GET,POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
require_once "function/Init.php";
$query = new pengurus_db;
if (isset($_REQUEST['conn'])){
    switch ($_SERVER['REQUEST_METHOD']){
        case "GET":
            echo "GET";
            break;
        case "POST":
            unset($_REQUEST['conn']);
            var_dump($_REQUEST[1]);
            break;
        default:
            echo "Method Not Allowed";
            break;

    }
}else{
    echo "NO CONNECTION";
}
// if ($_SERVER['REQUEST_METHOD'] == "GET"){
//     echo "GET";
// }elseif ($_SERVER['REQUEST_METHOD'] == "POST"){
//     var_dump($_REQUEST['nama']);
// }
// if ($_SERVER['REQUEST_METHOD']=='GET'){
//     if (isset($_GET['conn'])){
//         if ($_GET['conn'] == "Open"){
//             $test = $query->test();
//             echo $test;
//         }
//     }
// }elseif ($_SERVER['REQUEST_METHOD']=='POST'){
//     $pos = $query->posting($_REQUEST['nama']);
//     echo $pos;
// }
?>