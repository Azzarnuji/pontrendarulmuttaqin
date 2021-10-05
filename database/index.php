<?php
require_once "function/Init.php";
var_dump($_SERVER);
$query = new pengurus_db;
if (isset($_REQUEST['conn'])){
    switch ($_SERVER['REQUEST_METHOD']){
        case "GET":
            echo "GET";
            break;
        case "POST":
            unset($_REQUEST['conn']);
            var_dump($_REQUEST);
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