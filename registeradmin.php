<?php
session_start();

// Koneksi ke database
$conn = mysqli_connect("localhost:3305", "root", "", "admin_db");


// Cek koneksi
if (!$conn) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

// Cek apakah form registrasi telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Enkripsi password sebelum disimpan ke database
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Simpan data admin ke database
    $query = "INSERT INTO register (username, password) VALUES ('$username', '$hashedPassword')";
    if (mysqli_query($conn, $query)) {
        // Redirect ke halaman loginadmin.php setelah berhasil registrasi
        header("Location: loginadmin.php");
        exit;
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($conn);
    }
}

// Tutup koneksi
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrasi Admin</title>
</head>
<body>
    <h2>Registrasi Admin</h2>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <input type="submit" value="Register">
    </form>
</body>
</html>
