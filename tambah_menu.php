<?php
require_once("koneksi.php");

// Pastikan file tambah_menu.php terhubung dengan database menggunakan koneksi.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil nilai dari form
    $idMakanan = $_POST['tambah_id'];
    $namaMakanan = $_POST['tambah_nama'];
    $detailMakanan = $_POST['tambah_detail'];
    $hargaMakanan = $_POST['tambah_harga'];
    $stockMakanan = $_POST['tambah_stock'];
    $gambarMakanan = $_POST['tambah_gambar'];
    $buttonMakanan = $_POST['tambah_button'];

    // Lakukan operasi penambahan menu ke dalam database
    $sqlInsert = "INSERT INTO menu_makanan (id_makanan, nama_makanan, detail_makanan, harga, stock, gambar, button) VALUES ('$idMakanan', '$namaMakanan', '$detailMakanan', '$hargaMakanan', '$stockMakanan', '$gambarMakanan', '$buttonMakanan')";

    // Eksekusi query
    if (mysqli_query($koneksi, $sqlInsert)) {
        // Menu berhasil ditambahkan
        echo "Menu berhasil ditambahkan.";
    } else {
        // Terjadi kesalahan saat menambahkan menu
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }

    // Tutup koneksi ke database
    mysqli_close($koneksi);
}
?>
