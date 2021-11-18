<?php
namespace Databases;
require_once __DIR__. 'config.php';
use function Configs\getConfig;
use PDO;
class Database{
    private static ?\PDO $dbh = null;
    private static $stmt;

    public function __construct()
    {
        $config = getConfig();
        $username = $config['username'];
        $passwordDB = $config['password'];
        $databaseDB = $config['db'];
        $driverDB = $config['driver'];
        $hostDB = $config['host'];
        $dsn = "$driverDB:host=$hostDB;dbname=$databaseDB";
        try {
            if (self::$dbh == null){
                self::$dbh = new PDO(
                    $dsn,$username,$passwordDB
                );
            }else {
                return self::$dbh;
            }
        }catch (\PDOException $e){
            echo "Connection Error";
            print_r($e);
        }

    }

    public static function getDataByNameAndPassword(string $username, string $password):bool|array
    {
        self::$stmt = self::$dbh->prepare("SELECT * FROM `data_users` WHERE `username`='$username' AND `password`='$password'");
        self::$stmt->execute();
        $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            return $result;
        }else{
            return false;
        }


    }
    public static function getDataGuruAll():bool|array{
        self::$stmt = self::$dbh->prepare("SELECT * FROM `data_guru`");
        self::$stmt->execute();
        $result = self::$stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($result){
            return $result;
        }else{
            return false;
        }
    }
    public static function addDataGuru(string $nama, string $pt, string $ttl):string|bool|array{
        $createId = str_replace(" ","_",$nama);
        $finalId = "pons_".$createId;
        $query = "INSERT INTO `data_guru` (`id`, `id_guru`,`nama_guru`, `pendidikan_terakhir`, `tanggal_lahir`) VALUES (NULL,'$finalId' ,'$nama', '$pt', '$ttl')";

        self::$stmt = self::$dbh->prepare($query);
        $exe = self::$stmt->execute();
        if($exe){
            return "berhasil";
        }else{
            return "gagal";
        }

    }
}