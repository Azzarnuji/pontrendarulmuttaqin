<?php
include "classes/class.phpmailer.php";
$email_pengirim = $_POST['email'];
$nama_pengirim = $_POST['name'];
$judul = $_POST['judul'];
$nohp = $_POST['number'];
$msg = $_POST['msg'];
$pesan = "Nama Pengirim:".$nama_pengirim."\r\n"."Email Pengirim:".$email_pengirim."\r\n"."Nomor Hape Pengirim:".$nohp."\r\n"."Pesan Pengirim : ".$msg;
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "azzarnuji93@pontrendarulmuttaqin.com"; //user email
$mail->Password = "2002-10-19"; //password email 
$mail->SetFrom($nama_pengirim,"Yapida Webmaster Automatic"); //set email pengirim
$mail->Subject = $judul; //subyek email
$mail->AddAddress("yapidacibarusah@gmail.com","yapidacibarusah@gmail.com");  //tujuan email
$mail->MsgHTML($pesan);
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>