<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register Netfood</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link rel="stylesheet" href="css/register.css" />
    <link rel="stylesheet" href="css/style3.css" />
    <style>
  .img-responsive {
    display: block;
    max-width: 100%;
    height: auto;
}
    </style>
   
</head>
<body style="background-color: #313742;">
    <div class="container mt-5" style="overflow-y: auto; max-height: 100%;">
        <div class="row">
            <div class="col-md-6" >
                <p>&larr; <a href="index.html">Home</a></p>
                <h4>Bergabunglah bersama ribuan orang lainnya...</h4>
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
                <form action="" method="POST">
                    <div class="form-group">
                        <label for="name">Nama Lengkap</label>
                        <input class="form-control" type="text" name="name" placeholder="Nama kamu"/>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" />
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" placeholder="Alamat Email" />
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Password" />
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="button" id="showPasswordBtn" onclick="togglePasswordVisibility()">
                                     <img src="img/eye.png" style="width: 19px; height: 19px;">
                                </button>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-success btn-block" name="register" value="Daftar" />
                </form>
            </div>
        
        </div>
    </div>
</body>
 <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
    <script>
        function togglePasswordVisibility() {
            var passwordInput = document.getElementById("password");
            var eyeIcon = document.getElementById("eyeIcon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                eyeIcon.classList.remove("fa-eye");
                eyeIcon.classList.add("fa-eye-slash");
            } else {
                passwordInput.type = "password";
                eyeIcon.classList.remove("fa-eye-slash");
                eyeIcon.classList.add("fa-eye");
            }
        }
    </script>
</html>
<?php

require_once("config.php");

if(isset($_POST['register'])){

    // filter data yang diinputkan
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

    $error = "";

// validasi email

if(!preg_match('/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/', $email)) {
    $error = "waduh bos email nya typo/blom diisi kaya nya tuh wkwkwk";
}
    
    // validasi username
if(empty($username)) {
    $error = "Waduh Username Nya Ketinggalan Bos? atau typo tadi? ";
}

    
    // validasi nama lengkap
    if (!preg_match('/^[a-zA-Z ]+$/', $name)) {
        $error = "bos masa nama lengkap ada angka nya? lawak lawak wwkwk";
    }

    // mengecek panjang password
    if(strlen($_POST["password"]) < 6) {
        $error = "Peraturan nya disini pw harus 6 karakter boss maap maap nih";
    }

    if(!empty($error)) {
        // Menampilkan pesan error dan perintah kepada user
        echo "<script>alert('$error');window.location.href='register.php';</script>";
    } else {
        // menyiapkan query
        $sql = "INSERT INTO users (name, username, email, password) 
                VALUES (:name, :username, :email, :password)";
        $stmt = $db->prepare($sql);

        // bind parameter ke query
        $params = array(
            ":name" => $name,
            ":username" => $username,
            ":password" => $password,
            ":email" => $email
        );

        // eksekusi query untuk menyimpan ke database
        $saved = $stmt->execute($params);

        // jika query simpan berhasil, maka user sudah terdaftar
        // maka alihkan ke halaman login
        if($saved) header("Location: login.php");
    }
}

?>
