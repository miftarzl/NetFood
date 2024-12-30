<?php
$host = "localhost:3305"; // Ganti dengan host database Anda jika berbeda
$username = "root"; // Ganti dengan username database Anda jika berbeda
$password = ""; // Ganti dengan password database Anda jika berbeda
$database = "admin_db"; // Sesuaikan dengan nama database yang Anda buat sebelumnya

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>
