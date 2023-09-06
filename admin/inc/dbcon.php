<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/pudding-LMS-website/admin/inc/admin_check.php';

$hostname = 'localhost';
$dbuserid = 'pudding';
$dbpasswd = '1111';
$dbname = 'pudding';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
}
?>