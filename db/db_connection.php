<?php
require_once('mysql.php');

$serverhost = "localhost";
$serveruser = "";
$serverpwd  = "";
$dbname     = "";

$MyDb       = new cMysqlDB($serverhost,$serveruser,$serverpwd,$dbname);
?>
