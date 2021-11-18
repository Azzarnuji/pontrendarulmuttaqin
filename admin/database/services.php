<?php
namespace Services;
require_once 'src/JWT.php';
require_once 'database.php';
use Firebase\JWT\JWT;
use Databases\Database;
use MongoDB\Driver\Exception\Exception;

$db = new Database();
class Session{
    public function __construct(public string $username, public string $role, public string $status)
    {
    }
}
class Data{
    public function __construct(public $data, public string $status)
    {
    }
}

class ServicesManager{
    protected static string $BASE_URL = "http://localhost/belajar-jwt";
    protected static string $SECRET_KEY = "qwqwwewererttytnvdjnfjsdjsdijkmcsmms";
    public static function login(string $username, string $password):bool|array{
        if (Database::getDataByNameAndPassword($username,$password)){
            $payload = [
                "username"=>$username,
                "role"=>"admin",
                "status"=>"logged"
            ];

            $jwt = JWT::encode($payload, ServicesManager::$SECRET_KEY, 'HS256');
            setcookie("X-ZR-CODE",$jwt, httponly: true);
            return true;
        }else{
//            var_dump($LogIn);
            return false;
        }
    }
    public static function getCurrentSession(): Session{
        if (isset($_COOKIE['X-ZR-CODE'])){
            $jwt = $_COOKIE['X-ZR-CODE'];
            try {
                $payload = JWT::decode($jwt, ServicesManager::$SECRET_KEY, ['HS256']);
                return new Session(username: $payload->username, role: $payload->role, status:$payload->status);
            }catch (Exception $exception){
                return new Session("User Not Login","None", "logout");
            }
        }else{
            return new Session("User Not Login","None" , "logout");
        }
    }

    public static function getDataGuruAll():Data{
        $getData = Database::getDataGuruAll();
        if ($getData){
            return new Data(data: $getData, status: "Berhasil");
        }else{
            return new Data(data:"None", status: "Gagal");
        }
    }

    public static function addDataGuru(string $nama,string $pt, string $ttl):string{
        $add = Database::addDataGuru($nama,$pt,$ttl);
        if($add){
            $data = new Data(data: "Berhasil Tambah", status: "Berhasil");
            header("Location: ../admin/data_guru.php?message=".$data->data);
        }else{
            return new Data(data:"Data None", status: "Gagal");
        }
    }

    public static function deleteData(string $id):string{
        $delete = Database::deleteData($id);
        if($delete){
            $data = new Data(data: "Berhasil Hapus", status: "Berhasil");
            header("Location: ../admin/data_guru.php?message=".$data->data);
        }else{
            return "Gagal $delete";
        }
    }
}