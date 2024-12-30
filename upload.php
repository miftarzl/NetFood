<?php
// Mendapatkan informasi file yang diunggah
$file = $_FILES['gambar'];
$fileName = $file['name'];
$fileTmpName = $file['tmp_name'];

// Tentukan direktori tujuan penyimpanan gambar
$uploadDir = 'C:\xampp\htdocs\phpnetfood\images\gambar_2.jpg';

// Pindahkan file yang diunggah ke direktori tujuan
$uploaded = move_uploaded_file($fileTmpName, $uploadDir . $fileName);

// Jika file berhasil diunggah, tambahkan informasi gambar ke database
if ($uploaded) {
  // Koneksi ke database
  $conn = mysqli_connect('localhost', 'username', '', 'netfoodphp');

  // Lakukan query untuk menyimpan informasi gambar ke database
  $query = "INSERT INTO menu_makanan (gambar) VALUES ('$fileName')";
  $result = mysqli_query($conn, $query);

  // Tutup koneksi ke database
  mysqli_close($conn);

  // Berikan pesan sukses kepada pengguna
  echo "Gambar berhasil diunggah dan disimpan di database.";
} else {
  // Jika terjadi kesalahan dalam proses upload, berikan pesan error kepada pengguna
  echo "Terjadi kesalahan dalam proses upload gambar.";
}
?>
