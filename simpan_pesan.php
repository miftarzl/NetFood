<?php
// Mengambil data dari formulir
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// Menghubungkan ke database XAMPP
$servername = "localhost:3305";
$username = "root";
$password = "";
$dbname = "netfoodphp"; // Ganti dengan nama database Anda

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi database
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}

// Menyimpan data pesan ke database
$sql = "INSERT INTO pesan (name, email, message) VALUES ('$name', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
    echo "Pesan dan masukan anda berhasil dikirim";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Menutup koneksi database
$conn->close();
?>
