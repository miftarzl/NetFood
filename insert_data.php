<?php
require_once("koneksi.php");

// Memasukkan data ke dalam tabel menu_makanan
$sql_insert_data = "INSERT INTO menu_makanan (nama, detail, harga, stock, gambar) VALUES
  ('Nasi Goreng', 'Nasi goreng dengan telur, ayam, dan sayuran', 20000, 10, 'img/gambar.jpg'),
  ('Bakmie', 'Mie goreng dengan telur, ayam, dan sayuran', 15000, 5, 'img/gambar_2.jpg'),
  ('Bebek Bakar', 'Bebek goreng dengan bumbu kecap', 10000, 8, 'img/gambar_3.jpg'),
  ('Bakso Urat', 'Bakso dengan mie, kuah, dan sayuran', 16000, 15, 'img/gambar_4.jpeg')
";

mysqli_query($koneksi, $sql_insert_data);
?>
