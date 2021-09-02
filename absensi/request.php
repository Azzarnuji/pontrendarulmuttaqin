<?php
session_start();
require_once 'core/Init.php';
$db = new pengurus_db;
if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $request = $db->Login($username,$password);
    if ($request == 1){
        $_SESSION['login']="Logged";
        $_SESSION['nama']=$username;
        header("Location: pengurus/");
    }else{
        header("Location:index.php?login=gagal");
    }
}
if(isset($_GET['request'])){
    if($_GET['request']=='logout'){
        session_reset();
        session_destroy();
        header("Location:index.php?status=logout");
    }elseif($_GET['request']=='absen'){
        $sts = $_POST['status_ngaji'];
        $absen = $db->inputAbsen($sts,$_POST['tanggal'],$_POST['nama_anggota'],$_POST['tidak_ngaji'],$_POST['keterangan']);
        if ($absen == 1){
            header("Location: pengurus/?status=berhasil");
        }else{
            header("Location:index.php?login=gagal");
        }
    }elseif($_GET['request']=='inputanggota'){
        $inputAnggota = $db->inputAnggota($_POST['nama_anggota'],$_POST['kelas']);
        if ($inputAnggota == 1){
            header("Location: pengurus/?status=inputberhasil");
        }else{
            header("Location:index.php?login=inputgagal");
        }
    }elseif($_GET['request']=='delete'){
        $idNama = $_GET['id'];
        $hapus = $db->hapusAnggota($idNama);
        if ($hapus == 1){
            header("Location: pengurus/?status=hapusberhasil");
        }else{
            header("Location:index.php?login=hapusgagal");
        }
    }elseif ($_GET['request']=='api'){
        $apiKey = "Yapida1993DarulMuttaqin";
        if ($_GET['apikey'] != "$apiKey"){
            header("Location:index.php?status=apigagal");
        }else{
            $jenis_kelamin = $_GET['jenis_kelamin'];
            $kobong = $_GET['kobong'];
            $_SESSION['apistatus'] = "diberiakses";
            header("Location:api/singel.php?jenis_kelamin=$jenis_kelamin&kobong=$kobong");
        }
    }
}

?>