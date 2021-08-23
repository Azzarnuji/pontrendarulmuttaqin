<?php
include "classes/class.phpmailer.php";
$nama_pengirim = $_POST['email'];
$msg = $_POST['msg'];
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 2;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "azzarnuji93@pontrendarulmuttaqin.com"; //user email
$mail->Password = "2002-10-19"; //password email 
$mail->SetFrom($nama_pengirim,"Nama pengirim"); //set email pengirim
$mail->Subject = "Testing"; //subyek email
$mail->AddAddress("yapidacibarusah@gmail.com","nama email tujuan");  //tujuan email
$mail->MsgHTML("Testing...");
if($mail->Send()) echo "Message has been sent";
else echo "Failed to sending message";
?>