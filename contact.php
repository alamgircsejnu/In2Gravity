<?php
//print_r($_POST);
//die();
$ToEmail = 'info@in2gravity.com';
$EmailSubject = $_POST['subject'];
$mailheader = "From: ".$_POST["email"]."\r\n";
$mailheader .= "Reply-To: ".$_POST["email"]."\r\n";
$mailheader .= "Content-type: text; charset=iso-8859-1\r\n";
$MESSAGE_BODY = "Name: ".$_POST["name"]."\r\n";
$MESSAGE_BODY .= "Email: ".$_POST["email"]."\r\n\r\n";
$MESSAGE_BODY .= "Message: ".nl2br($_POST["message"])."\r\n";
mail($ToEmail, $EmailSubject, $MESSAGE_BODY, $mailheader) or die ("Failure");
header('Location:index.php');