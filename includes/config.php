<?php
session_start();
// connect to database
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$db = 'tasks';
$con = mysqli_connect($dbhost, $dbuser, $dbpass, $db);

if (!$con) {
  echo 'Sql Error' . mysqli_error($con);
}