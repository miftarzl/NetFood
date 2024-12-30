
 
</script>
<!DOCTYPE html>
<html>
<head>
	<title>Metode Pembayaran</title>
	  <link rel="shortcut icon" type="image/x-icon" href="images/favicon-32x32.png">
  <link rel="apple-touch-icon" href="images/favicon-32x32.png">
	<link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
  <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
<link rel="stylesheet" type="text/css" href="css/stylepembayaran.css">
<script src="js/pembayaran.min.js"></script>

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
	
	<body>
 

  <form action="simpan_order.php" method="POST">
  	  <label for="food-type">Makanan Yang Kamu Pesan Saat Ini</label>
    <input type="text" name="food-type" id="food-type" value="Bebek Bakar" readonly required>
   
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
       <?php
        $host = "localhost:3305";
        $username = "root";
        $password = "";
        $database = "netfoodphp";

        $conn = new mysqli($host, $username, $password, $database);
        if ($conn->connect_error) {
            die("Koneksi database gagal: " . $conn->connect_error);
        }

        $id_makanan = 3; // Ubah dengan ID makanan yang diinginkan

        // Mengubah query untuk mengambil stok berdasarkan id_makanan
$sql_stock = "SELECT stock FROM menu_makanan WHERE id = $id_makanan";
$result_stock = $conn->query($sql_stock);


        $stock = 0;
        if ($result_stock->num_rows > 0) {
            $row_stock = $result_stock->fetch_assoc();
            $stock = $row_stock['stock'];
        }

        $conn->close();
        ?>

		<label for="item-quantity">Jumlah <span id="available-stock">Tersedia = <?php echo $stock; ?></span></label>

		<input type="number" name="item-quantity" id="item-quantity" value="1" min="1" max="<?php echo $stock; ?>" required>

    <label for="item-total-price">Total IDR Harga</label>
    <input type="number" name="item-total-price" id="item-total-price" value="10000" readonly>

    <label for="transaction-id">Nomor Transaksi</label>
    <input type="text" name="transaction-id" id="transaction-id" required>

    <button type="submit">Bayar</button>

  </form>
<script>

		document.addEventListener('DOMContentLoaded', function() {
			var itemQuantityInput = document.getElementById('item-quantity');
			var itemTotalPriceInput = document.getElementById('item-total-price');
			var totalPrice = 10000; // Harga awal

		itemQuantityInput.addEventListener('change', function() {
    var quantity = itemQuantityInput.value;

    // Kalikan harga dengan jumlah makanan
    totalPrice = 10000 * quantity; // Kalikan dengan nilai jumlah makanan
    itemTotalPriceInput.value = totalPrice;
});

		});

		function validateForm() {
			const nameInput = document.getElementById('name');
			const phoneInput = document.getElementById('phone');
			const transactionIdInput = document.getElementById('transaction-id');

			// Validasi nama lengkap
			if (!/^[A-Za-z\s]+$/.test(nameInput.value)) {
				alert('Nama lengkap nya itu disini cuma boleh spasi ama angka mas bro');
				nameInput.focus();
				return false;
			}

			// Validasi nomor telepon
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

			// Validasi nomor rekening
			if (!/^\d+$/.test(transactionIdInput.value)) {
				alert('Nomor rekening hanya boleh berisi angka.');
				transactionIdInput.focus();
				return false;
			}

			return true;
		}
	</script>
</body>
</html>
