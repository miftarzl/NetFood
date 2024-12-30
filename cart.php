<?php
session_start();

// Cek apakah keranjang ada dalam session
if (!isset($_SESSION['keranjang']) || empty($_SESSION['keranjang'])) {
  echo "Keranjang masih kosong.";
} else {
  echo "<h2>Isi Keranjang</h2>";
  echo "<table>";
  echo "<thead><tr><th>ID Makanan</th><th>Nama Makanan</th><th>Jumlah</th></tr></thead>";
  echo "<tbody>";
  foreach ($_SESSION['keranjang'] as $item) {
    echo "<tr>";
    echo "<td>" . $item['id_makanan'] . "</td>";
    echo "<td>" . $item['nama_makanan'] . "</td>";
    echo "<td>" . $item['jumlah'] . "</td>";
    echo "</tr>";
  }
  echo "</tbody>";
  echo "</table>";
}
?>
