<?php
session_start();
require_once("koneksi2.php");

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Periksa apakah username dan password valid
    $username = $_POST["username"];
    $password = $_POST["password"];

    if ($username == "admin" && $password == "admin") {
        // Jika username dan password adalah admin, redirect ke halaman admineditor.php
        $_SESSION['admin_logged_in'] = true;
        header("Location: admineditor.php");
        exit;
    } else {
        // Jika username dan password bukan admin, redirect ke halaman index1.php
        header("Location: index1.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Netfood</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/login.css" />
    <link rel="stylesheet" href="css/style3.css" />
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            if (passwordInput.type === "password") {
                passwordInput.type = "text";
            } else {
                passwordInput.type = "password";
            }
        }
    </script>
    <style>
        body{
            background-color: #313742;
        }
        /* Style untuk container */
        .container {
            margin-top: 50px;
        }
        /* Style untuk judul */
        h4 {
            font-weight: bold;
            color: white;
        }
        /* Style untuk link kembali ke home */
        a {
            color: yellowgreen;
        }
        /* Style untuk form login */
        form {
            background-color: #d9d9d9;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0px 0px 10px #ddd;
        }
        /* Style untuk label */
        label {
            font-weight: bold;
            color: black;
        }
        /* Style untuk input field */
        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-bottom: 20px;
        }
        /* Style untuk tombol login */
        input[type="submit"] {
            background-color: #e64519;
            color: #fff;
            padding: 10px;
            border-radius: 5px;
            border: none;
            cursor: pointer;
        }
        /* Style untuk tombol login saat di-hover */
        input[type="submit"]:hover {
            background-color: #31ce31;
        }
        p{
            color: white;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <p>&larr; <a href="index.html">Home</a></p>
                <h4>Masuk ke NetFood</h4>
                <p>Belum punya akun? <a href="register.php">Daftar di sini</a></p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username atau email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" onclick="togglePasswordVisibility()">
                                    <img src="img/eye.png" style="width: 19px; height: 19px;">
                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="login" value="Masuk" />
                </form>
            </div>
            <div class="col-md-6">
                <!-- isi dengan sesuatu di sini -->
            </div>
        </div>
    </div>
</body>
</html>
