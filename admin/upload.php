<?php
$ekstensi =  array('png','jpg','jpeg','gif','JPG');
$jumlahFile = count($_FILES['foto']['name']);


for($x=0; $x<$jumlahFile; $x++){
	$namafile = $_FILES['foto']['name'][$x];
	$tmp = $_FILES['foto']['tmp_name'][$x];
	$tipe_file = pathinfo($namafile, PATHINFO_EXTENSION);
	$ukuran = $_FILES['foto']['size'][$x];	
    if(!in_array($tipe_file, $ekstensi)){
        header("location:index.php?alert=gagal_ektensi");			
    }else{		
        move_uploaded_file($tmp, '../assets/santri/'.date('d-m-Y').'-'.$namafile);
        $x = date('d-m-Y').'-'.$namafile;
        mysqli_query($koneksi,"INSERT INTO gambar VALUES(NULL, '$x')");
        header("location:home.php?alert=simpan");
    }
}
?>