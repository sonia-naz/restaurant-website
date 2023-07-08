<?php
$to =$name =$email =$subject =$message ="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$to =  'mahnooralam067@gmail.com';
$name = $_POST['name'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
 
$headers .= "From: '".$from_email."' ";
 
 if(mail($to,$subject,$message,$headers)){
  echo 'Email Send Succcessfully';
 }
 else{
  echo 'Email does not send';
 }
}

?>
