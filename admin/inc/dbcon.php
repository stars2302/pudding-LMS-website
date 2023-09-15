<?php
$hostname = 'localhost';
$dbuserid = 'admin';
$dbpasswd = '1111';
$dbname = 'admin';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

if ($mysqli->connect_errno) {
  die('mysqli connection error: ' . $mysqli->connect_error);
}
?>