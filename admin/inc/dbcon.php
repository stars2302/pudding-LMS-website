<?php
$hostname = 'localhost';
$dbuserid = 'pudding0906';
$dbpasswd = 'sesame5959!';
$dbname = 'pudding0906';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
}
?>