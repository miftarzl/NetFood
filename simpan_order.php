<?php
require_once("koneksi.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foodType = $_POST["food-type"];
    $quantity = $_POST["item-quantity"];
    $namaPembeli = $_POST["name"];
    $noTelp = $_POST["phone"];

    // Mengurangi stok
    $sql_update_stock = "UPDATE menu_makanan SET stock = stock - $quantity WHERE nama_makanan = '$foodType'";
    $result_update_stock = mysqli_query($koneksi, $sql_update_stock);

    if ($result_update_stock) {
        // Mengambil harga dari database
        $sql_get_price = "SELECT harga FROM menu_makanan WHERE nama_makanan = '$foodType'";
        $result_get_price = mysqli_query($koneksi, $sql_get_price);
        $row_get_price = mysqli_fetch_assoc($result_get_price);
        $harga = $row_get_price['harga'];

        // Mengubah harga ke tipe data decimal dengan 2 digit desimal
        $harga = (float) $harga;

        // Mengalikan harga dengan jumlah barang
        $totalHarga = $harga * $quantity;

        // Mengambil data pengguna dari form
        $nama = $_POST["name"];
        $email = $_POST["email"];
        $telepon = $_POST["phone"];
        $alamat = $_POST["address"];
        $paymentMethod = $_POST["payment-method"];
        $transactionId = $_POST["transaction-id"];

        $sql_insert_order = "INSERT INTO orders (name, email, phone, payment_method, quantity, total_price, transaction_id, food_type, address) VALUES ('$nama', '$email', '$telepon', '$paymentMethod', '$quantity', " . number_format($totalHarga, 2, '.', '') . ", '$transactionId', '$foodType', '$alamat')";
        $result_insert_order = mysqli_query($koneksi, $sql_insert_order);

        if ($result_insert_order) {
            // Memulai session
            session_start();

            // Menyimpan data ke session
            $_SESSION['namaPembeli'] = $namaPembeli;
            $_SESSION['noTelp'] = $noTelp;
            $_SESSION['harga'] = $totalHarga;
            $_SESSION['foodType'] = $foodType;
            $_SESSION['quantity'] = $quantity;

            echo "Pesanan berhasil disimpan.";
        } else {
            echo "Gagal menyimpan pesanan.";
        }
    } else {
        echo "Gagal mengurangi stok.";
    }
} else {
    echo "Invalid request";
}
header("Location: kwitansi.php");
exit();

?>
