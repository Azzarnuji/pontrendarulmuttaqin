<?php
include "classes/class.phpmailer.php";
$email_pengirim = $_POST['email'];
$nama_pengirim = $_POST['name'];
$judul = $_POST['judul'];
$nohp = $_POST['number'];
$msg = $_POST['msg'];
$pesan = "Nama Pengirim:$nama_pengirim<br>Email Pengirim : $email_pengirim<br>Nomor Hape Pengirim : $nohp<br>Pesan Pengirim : $msg";
$mail = new PHPMailer; 
$mail->IsSMTP();
$mail->SMTPSecure = 'ssl'; 
$mail->Host = "smtp.gmail.com"; //host masing2 provider email
$mail->SMTPDebug = 0;
$mail->Port = 465;
$mail->SMTPAuth = true;
$mail->Username = "azzarnuji93@pontrendarulmuttaqin.com"; //user email
$mail->Password = "2002-10-19"; //password email 
$mail->SetFrom("$email_pengirim","$nama_pengirim (Messages From Yapida Webmaster Automatic)"); //set email pengirim
$mail->Subject = $judul; //subyek email
$mail->AddAddress("yapidacibarusah@gmail.com","yapidacibarusah@gmail.com");  //tujuan email
$mail->MsgHTML($pesan);
if ($mail->Send()){
    $mail->SmtpClose;
    header("Location:index.php?statuscode=B");
}else{
    $mail->SmtpClose;
    header("Location:index.php?statuscode=G");;
    
}
?>