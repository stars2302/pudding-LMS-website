<?php
$hostname = 'localhost';
$dbuserid = 'pudding';
$dbpasswd = '1111';
$dbname = 'pudding';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
}
?>