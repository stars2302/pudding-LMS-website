<?php

$hostname = 'localhost';
$dbuserid = 'pudding';
$dbpasswd = '1111';
$dbname = 'pudding';

$mysqli = new mysqli($hostname, $dbuserid, $dbpasswd, $dbname);

// Check connection
if ($mysqli -> connect_errno) {
  echo "연결실패" . $mysqli -> connect_error;
  exit();
}else{
  echo "연결성공"; 
}



?>
