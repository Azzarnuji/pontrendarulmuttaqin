<?php

class Connection extends config{
    protected $dbh;
    protected $stmt;
    public $status;
    public $otoritas;
    public function __construct()
    {
        $usernameDB = $this->dataDb['username'];
        $passwordDB = $this->dataDb['password'];
        $databaseDB = $this->dataDb['db'];
        $driverDB = $this->dataDb['driver'];
        $hostDB = $this->dataDb['host'];
        $dsn = "$driverDB:host=$hostDB;dbname=$databaseDB";
    
        try{
            $this->dbh = new PDO($dsn,$usernameDB,$passwordDB);
        }catch(PDOException $e){
            die($e);
        }
    }
}