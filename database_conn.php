<?php

// database_conn.php

$hostname = 'localhost'; // hostname
$database_username = 'root';  // database username
$database_password = '';  // database password
$database_name = 'tutorial_crud'; // database name

// koneksi ke database
$db_connect = mysqli_connect($hostname, $database_username, $database_password, $database_name);
if(!$db_connect){
  die('Tidak dapat terhubung ke database:' .mysql_error());
}