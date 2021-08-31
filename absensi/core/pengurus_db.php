<?php
class pengurus_db extends Connection{
    public function Login($username, $password){
        $usernameID = $this->dbh->quote($username);
        $passwordID = $this->dbh->quote($password);

        $query = "SELECT * FROM `pengurus` WHERE `id_pengurus`=$usernameID AND `password_pengurus`=$passwordID";
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            return 0;
        }else{
            $_SESSION['jenis_kelamin'] = $result[0]['jenis_kelamin'];
            $_SESSION['id_pengurus'] = $result[0]['rh_kobong'];
            return 1;
        }
    }
    public function getData(){
        $jns = $_SESSION['jenis_kelamin'];
        $rh_kobong = $_SESSION['id_pengurus'];
        $query = "SELECT * FROM `anggota_kobong` WHERE `id_kobong`='$rh_kobong' AND `jenis_kelamin`='$jns'";
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            return 0;
        }else{
            return $result;
        }
    }
    public function getDataAbsen(){
        $jns = $_SESSION['jenis_kelamin'];
        $rh_kobong = $_SESSION['id_pengurus'];
        $query = "SELECT * FROM `absensi_santri` WHERE `owner_id_kobong`='$rh_kobong' AND `jenis_kelamin`='$jns'";
        $this->stmt = $this->dbh->prepare($query);
        $this->stmt->execute();
        $result = $this->stmt->fetchAll(PDO::FETCH_ASSOC);
        if(!$result){
            return 0;
        }else{
            return $result;
        }
    }
    public function inputAbsen($status_ngaji,$tanggal,$namaAnggota,$waktu,$keterangan){
        $rh_kobong = $_SESSION['id_pengurus'];
        $jns = $_SESSION['jenis_kelamin'];
        $status_ngaji1 = $this->dbh->quote($status_ngaji);
        $tanggal1 = $this->dbh->quote($tanggal);
        $namaAnggota1 = $this->dbh->quote($namaAnggota);
        $waktu1 = $this->dbh->quote($waktu);
        $keterangan1 = $this->dbh->quote($keterangan);
        $query = " INSERT INTO `absensi_santri` (`id`, `owner_id_kobong`,`status_ngaji`, `nama_yang_tidak_ngaji`, `tanggal_absen`, `waktu_ngaji`, `deskripsi`,`jenis_kelamin`) VALUES (NULL, '$rh_kobong', $status_ngaji1, $namaAnggota1, $tanggal1, $waktu1, $keterangan1,'$jns') ";
        $this->stmt = $this->dbh->prepare($query);
        $exec = $this->stmt->execute();
        if (!$exec){
            return 0;
        }else{
            return 1;
        }
    }
    public function inputAnggota($nama,$kelas){
        $rh_kobong = $_SESSION['id_pengurus'];
        $jns = $_SESSION['jenis_kelamin'];
        $namaAnggota = $this->dbh->quote($nama);
        $kelasAnggota = $this->dbh->quote($kelas);
        $createIdNama = $rh_kobong.'_'.$nama;
        $idNama = $this->dbh->quote($createIdNama);
        $query = " INSERT INTO `anggota_kobong` (`id`, `id_nama`, `id_kobong`, `nama_anggota`, `jenis_kelamin`, `kelas_anggota`) VALUES (NULL, $idNama, '$rh_kobong', $namaAnggota, '$jns', $kelasAnggota) ";
        $this->stmt = $this->dbh->prepare($query);
        $exec = $this->stmt->execute();
        if (!$exec){
            return 0;
        }else{
            return 1;
        }
    }
    public function hapusAnggota($idNama){
        $quoteId = $this->dbh->quote($idNama);
        $query = " DELETE FROM `anggota_kobong` WHERE `anggota_kobong`.`id_nama` = $quoteId ";
        $this->stmt = $this->dbh->prepare($query);
        $exec = $this->stmt->execute();
        if (!$exec){
            return 0;
        }else{
            return 1;
        }
    }
}