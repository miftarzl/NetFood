<?php
require_once("koneksi.php");
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <link rel="stylesheet" type="text/css" href="css/styletable.css">
  <title>NetFood</title>
  <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
  <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
  <style>
    /* CSS styles for the table and other elements */
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: #313742;
    }

    .navbar {
      width: 100%;
      background-color: #3b424f;
      overflow: auto;
    }

    .navbar a {
      float: left;
      padding: 12px;
      color: white;
      text-decoration: none;
      font-size: 17px;
      border-radius: 4px;
    }

    .navbar a:hover {
      background-color: #142c57;
    }

    .active {
      background-color:#82a5e3;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      background-color: #3b424f;
      text-decoration-color: white;
      font-family: arial;
      color: #4040ff;
    }

    th {
      padding: 8px;
      text-align: left;
      background-color: #6495ed;
      color: white;
    }

    td {
      padding: 8px;
      text-align: left;
      border-bottom: 1px solid black;
    }

    .bold-text {
      color: #cfcfcf;
    }

    tr:hover {
      background-color: #09152a;
    }

    h2 {
      color: #333;
      font-family: Arial, sans-serif;
      text-align: center;
      margin: 0.6% auto;
      color: white;
    }

    /* Membuat teks menjadi responsif */
    @media screen and (max-width: 20%) {
      h2 {
        margin: 20px auto;
        font-size: 24px;
      }
    }

    /* CSS untuk membuat tombol login floating di pojok kanan atas */
    .login-button {
      position: fixed;
      top: 10px;
      right: 10px;
      background-color: #5353ec;
      color: white;
      padding: 7px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .login-button:hover {
      background-color: #5353ec;
      text-decoration: none;
    }
.title-underline {
  display: inline-block;
  padding-bottom: 2px;
  width: auto;
  background: linear-gradient(to right, rgba(0, 255, 0, 1) 50%, rgba(230, 69, 25, 1) 50%);
  border: none; /* Hilangkan border sebelumnya */
  position: relative;
  overflow: hidden;
}

.title-underline::after {
  content: '';
  position: absolute;
  bottom: 0;
  left: -100%;
  width: 100%;
  height: 3px;
  background: linear-gradient(to right, rgba(0, 255, 0, 1), rgba(230, 69, 25, 1));
  animation: glowAnimation 1s linear infinite;
}

@keyframes glowAnimation {
  0% {
    left: -100%;
  }
  100% {
    left: 100%;
  }
}



  .cart-icon {
    position: fixed;
    top: 10px;
    right: 10px;
    width: 30px;
    height: 30px;
    background-color: #ff7d3a;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 16px;
    font-weight: bold;
    cursor: pointer;
  }

h2.title-underline {
 
  background: linear-gradient(to right, #00ff00, #00ff00, transparent);
  background-repeat: repeat-x;
  background-size: 200% auto;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00;
  animation: glow-pulse 1.5s infinite;
}

@keyframes glow-pulse {
  0% {
    text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00;
  }
  50% {
    text-shadow: none;
  }
  100% {
    text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00;
  }
}





  </style>
</head>
<body>

</a>

<div class="navbar">
  <a class="active" href="contact from php1.php" target="_blank"><i class="fa fa-fw fa-envelope"></i>Contact</a> 
  <a href="logout.php"><i class="fa fa-fw fa-user"></i>Logout</a>
</div>
<br>
<center><h2 class="title-underline">Data Menu Makanan</h2></center>
<br>

<table style="color: white;">
    <thead>
      <tr>
        <th><center>Nama Makanan</center></th>
        <th>Detail Makanan</th>
        <th>Harga</th>
        <th><center>Tambah ke Keranjang</center></th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql_select_menu = "SELECT * FROM menu_makanan";
      $result = mysqli_query($koneksi, $sql_select_menu);
      while ($row = mysqli_fetch_assoc($result)) {
        $nama = $row['nama_makanan'];
        $detail = $row['detail_makanan'];
        $harga = $row['harga'];
        $button = $row['button'];
      ?>
        <tr>
          <td>
            <center><img src="<?php echo $row['gambar']; ?>" alt="Gambar Makanan" width="100" height="60"></center>
            <center><strong><?php echo $nama; ?></strong></center>
          </td>
          <td><div class="bold-text"><?php echo $detail; ?></div></td>
          <td>Rp <?php echo number_format($harga, 0, ',', '.'); ?></td>
          <td>
            <center>
              <?php if ($row['stock'] > 0) { ?>
                <a href="<?php echo $button; ?>">
                  <img src="img/cart.png" style="width: 28x; height: 28px;">
                </a>
              <?php } else { ?>
                <span style="font-size: 27px; color: #bfbfbf; font-family: Arial; font-style: italic;">Sold !!</span>
              <?php } ?>
            </center>
          </td>
        </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

</body>
</html>
