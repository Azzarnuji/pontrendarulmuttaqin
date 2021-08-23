<?php
$to = "yapidacibarusah@gmail.com";;
$subject = "PONPES DARUL MUTTAQIN";
$msg = $_POST['msg'];
$headers = "From: ". $_POST['email']. "\r\n" .
"CC: somebodyelse@example.com";

mail($to,$subject,$msg,$headers);
?>