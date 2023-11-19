<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "db_kelas_c";

$koneksi =  mysqli_connect($hostname, $username, $password, $database);

if (!$koneksi) {
  echo "Koneksi Gagal";
}