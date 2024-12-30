<?php
require_once("koneksi.php");

// Buat database jika belum ada
$sql_create_database = "CREATE DATABASE IF NOT EXISTS netfoodphp";
mysqli_query($koneksi, $sql_create_database);

// Pilih database
mysqli_select_db($koneksi, $database);

// Buat tabel menu_makanan
$sql_create_table = "CREATE TABLE IF NOT EXISTS menu_makanan (
  id INT(11) AUTO_INCREMENT PRIMARY KEY,
  nama VARCHAR(100) NOT NULL,
  detail TEXT,
  harga INT(11),
  stock INT(11),
  gambar VARCHAR(255)
)";

mysqli_query($koneksi, $sql_create_table);
?>
