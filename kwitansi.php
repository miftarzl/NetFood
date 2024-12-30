<?php
// Memulai session
session_start();

require_once("koneksi.php");

if (isset($_SESSION['foodType']) && !empty($_SESSION['foodType'])) {
    $foodType = $_SESSION['foodType'];

    // Mendapatkan harga makanan satuan dari database
    $sql_get_price = "SELECT harga FROM menu_makanan WHERE nama_makanan = '$foodType'";
    $result_get_price = mysqli_query($koneksi, $sql_get_price);
    $row_get_price = mysqli_fetch_assoc($result_get_price);
    $hargaMakananSatuan = $row_get_price['harga'];
} else {
    $foodType = "Belum diisi";
    $hargaMakananSatuan = 0;
}

if (isset($_SESSION['namaPembeli']) && !empty($_SESSION['namaPembeli'])) {
    $namaPembeli = $_SESSION['namaPembeli'];
} else {
    $namaPembeli = "Belum diisi";
}

if (isset($_SESSION['noTelp']) && !empty($_SESSION['noTelp'])) {
    $noTelp = $_SESSION['noTelp'];
} else {
    $noTelp = "Belum diisi";
}

if (isset($_SESSION['harga']) && !empty($_SESSION['harga'])) {
    $harga = $_SESSION['harga'];
} else {
    $harga = "Belum diisi";
}

if (isset($_SESSION['quantity']) && !empty($_SESSION['quantity'])) {
    $quantity = $_SESSION['quantity'];
} else {
    $quantity = "Belum diisi";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #1d1924;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #1d1924;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
            color: white;
        }

        .info {
            margin-top: 20px;
            color: #555;
        }

        .info p {
            margin: 5px 0;
            color: #cccccc;
        }

        .info label {
            font-weight: bold;
            color: white;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            color: #cccccc;
        }

        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }

        .total {
            margin-top: 20px;
            text-align: right;
            font-weight: bold;
            color: #cccccc;
        }

        .total span {
            color: #f00;
        }
    </style>
</head>
<body>
    <BR><br><br>
    <div class="container">
        <h1>KWITANSI</h1>
        <div class="info">
            <table>
                <tr>
                    <td><label>Nama Pembeli:</label></td>
                    <td><?php echo $namaPembeli; ?></td>
                </tr>
                <tr>
                    <td><label>Tanggal:</label></td>
                    <td><?php echo date('Y-m-d'); ?></td>
                </tr>
                <tr>
                    <td><label>No. Telepon:</label></td>
                    <td><?php echo $noTelp; ?></td>
                </tr>
                <tr>
                    <td><label>Makanan Anda:</label></td>
                    <td><?php echo $foodType; ?></td>
                </tr>
            </table>
        </div>
        <table>
            <tr>
                <th>Deskripsi</th>
                <th><center>Jumlah</th></center>
            </tr>
            <tr>
                <td>Total Barang</td>
                <td><center><?php echo $quantity; ?></td></center>
            </tr>
            <tr>
                <td>Harga makanan satuan</td>
                <td><center>Rp <?php echo number_format($hargaMakananSatuan, 0, ',', '.'); ?></td></center>
            </tr>
        </table>
        <div class="total">
            Total: Rp <span><?php echo number_format($harga, 0, ',', '.'); ?></span>
        </div>
         <a href="javascript:history.back()" style="position: fixed; bottom: 10px; left: 10px; color: white;">Back</a>
    </div>
</body>
</html>
