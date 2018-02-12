<?php
session_start();
include_once '../../../vendor/autoload.php';
use App\About\AboutEntry\AboutEntry;
//$_POST['description'] = mysql_real_escape_string($_POST['description']);
$user = new AboutEntry();
$user->prepare($_POST);
$user->store();
