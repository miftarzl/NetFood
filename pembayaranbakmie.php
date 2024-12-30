<!DOCTYPE html>
<html>
<head>
    <title>Metode Pembayaran</title>
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon-32x32.png">
    <link rel="apple-touch-icon" href="images/favicon-32x32.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="stylesheet" type="text/css" href="css/stylepembayaran.css">

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Ambil elemen select untuk metode pembayaran
            var paymentMethodRadios = document.querySelectorAll('input[name="payment-method"]');
            var transactionIdInput = document.getElementById('transaction-id');

            // Tambahkan event listener untuk mendeteksi perubahan pada radio button
            paymentMethodRadios.forEach(function(radio) {
                radio.addEventListener('change', function() {
                    if (radio.value === 'ovo') {
                        transactionIdInput.value = '085811111237';
                    } else if (radio.value === 'dana') {
                        transactionIdInput.value = '085770078767';
                    } else if (radio.value === 'gopay') {
                        transactionIdInput.value = '082211689678';
                    } else {
                        transactionIdInput.value = '';
                    }
                });
            });
        });
    </script>
</head>
<body>
   
    <form action="simpan_order.php" method="POST" onsubmit="return validateForm()">
        <?php
        $host = "localhost:3305";
        $username = "root";
        $password = "";
        $database = "netfoodphp";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        $id_makanan = 2; // Ubah dengan ID makanan yang diinginkan (Bakso)

        // Mengubah query untuk mengambil makanan berdasarkan id_makanan
        $sql_get_food = "SELECT nama_makanan, harga, stock FROM menu_makanan WHERE id = $id_makanan";
        $result_get_food = $conn->query($sql_get_food);

        if ($result_get_food->num_rows > 0) {
            $row_get_food = $result_get_food->fetch_assoc();
            $namaMakanan = $row_get_food['nama_makanan'];
            $hargaMakanan = $row_get_food['harga'];
            $stock = $row_get_food['stock'];
        } else {
            echo "Makanan tidak ditemukan.";
            $conn->close();
            exit();
        }

        $conn->close();
        ?>

        <label for="food-type">Makanan Yang Kamu Pesan Saat Ini</label>
        <input type="text" name="food-type" id="food-type" value="<?php echo $namaMakanan; ?>" readonly required>
        <label for="name">Nama Lengkap</label>
        <input type="text" name="name" id="name" required>
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required>
        <label for="phone">Nomor Telepon</label>
        <input type="text" name="phone" id="phone" required>
        <label for="address">Alamat Lengkap</label>
        <textarea name="address" id="address" required></textarea>
        <label for="payment-method">Metode Pembayaran</label>
        <div class="payment-methods">
            <div class="payment-method">
                <input type="radio" name="payment-method" id="ovo" value="ovo" required>
                <label for="ovo"><img src="https://1.bp.blogspot.com/-0SdS17Lin94/XzNZG9NtYDI/AAAAAAAAHA8/Bh-7qbPAB1U93mqmtbbXtR2TToLC6XqSgCLcBGAsYHQ/s1000/logo-ovo-pay.png" alt="OVO Logo">OVO</label>
            </div>
            <div class="payment-method">
                <input type="radio" name="payment-method" id="dana" value="dana">
                <label for="dana"><img src="https://clipground.com/images/dana-logo-1.png" alt="Dana Logo">Dana</label>
            </div>
           <div class="payment-method">
                <input type="radio" name="payment-method" id="gopay" value="gopay">
                <label for="gopay"><img src="https://logos-download.com/wp-content/uploads/2019/11/GoPay_Logo.png" alt="Gopay Logo">Gopay</label>
            </div>
        </div>

        <label for="item-quantity">Jumlah <span id="available-stock">Tersedia = <?php echo $stock; ?></span></label>
        <input type="number" name="item-quantity" id="item-quantity" value="1" min="1" max="<?php echo $stock; ?>" required>
        <label for="item-total-price">Total IDR Harga</label>
        <input type="number" name="item-total-price" id="item-total-price" value="<?php echo $hargaMakanan; ?>" readonly>

        <label for="transaction-id">Nomor Transaksi</label>
        <input type="text" name="transaction-id" id="transaction-id" required>

        <button type="submit">Bayar</button>
    </form>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var itemQuantityInput = document.getElementById('item-quantity');
            var itemTotalPriceInput = document.getElementById('item-total-price');
            var totalPrice = <?php echo $hargaMakanan; ?>;

            itemQuantityInput.addEventListener('change', function() {
                var quantity = itemQuantityInput.value;
                totalPrice = <?php echo $hargaMakanan; ?> * quantity;
                itemTotalPriceInput.value = totalPrice;
            });
        });

        function validateForm() {
            const nameInput = document.getElementById('name');
            const phoneInput = document.getElementById('phone');
            const transactionIdInput = document.getElementById('transaction-id');

            if (!/^[A-Za-z\s]+$/.test(nameInput.value)) {
                alert('Nama lengkap hanya boleh berisi huruf dan spasi.');
                nameInput.focus();
                return false;
            }

            const phoneNumber = phoneInput.value;
            if (!/^\d+$/.test(phoneNumber)) {
                alert('Nomor telepon hanya boleh berisi angka.');
                phoneInput.focus();
                return false;
            }
                        if (phoneNumber.length > 12) {
                alert('Nomor telepon tidak boleh lebih dari 12 digit.');
                phoneInput.focus();
                return false;
            }

            const transactionId = transactionIdInput.value;
            if (!/^\d+$/.test(transactionId)) {
                alert('Nomor transaksi hanya boleh berisi angka.');
                transactionIdInput.focus();
                return false;
            }

            return true;
        };
    </script>
</body>
</html>

