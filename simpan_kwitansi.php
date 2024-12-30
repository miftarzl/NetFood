<?php
// Mendapatkan data dari form
$nama = $_POST['name'];
$harga = $_POST['item-total-price'];
$noTelp = $_POST['phone'];
$tanggal = date('d F Y');

// Simpan data di session untuk diakses di halaman kwitansi
session_start();
$_SESSION['nama'] = $nama;
$_SESSION['harga'] = $harga;
$_SESSION['noTelp'] = $noTelp;
$_SESSION['tanggal'] = $tanggal;
?>
