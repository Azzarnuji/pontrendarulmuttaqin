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
            // var_dump($_REQUEST['action']);
            $key = checkKey($_REQUEST['key']);
            if ($key != true){
                echo "ERROR KEY NOT ALLOWED";
                return false;
            }
            $cek = checkAction($_REQUEST['action']);
            if ($cek == "Login"){
                // echo $cek;
                unset($_REQUEST['action']);
                $log = LogIn($_REQUEST['name'],$_REQUEST['password']);
                echo json_encode($log);
            }
            break;
        case "OPTIONS":
            var_dump($_REQUEST);
            echo "OPTIONS";
            break;

    }
}else{
    echo "NO CONNECTION";
}




function checkKey($key){
    if ($key == KEY){
        return true;
    }else{
        return false;
    }
}

function checkAction($action){
    switch ($action){
        case "login";
            return "Login";
    }
}

function LogIn($username,$password){
    global $query;
    $Login = $query->Login($username,$password);
    return $Login;
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