<?php
session_start();
require_once("koneksi.php");

// Cek apakah admin sudah login atau belum
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: loginadmin.php");
    exit();
}

// Proses hapus data jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['hapus_menu_id'])) {
    $hapusMenuId = $_POST['hapus_menu_id'];

    // Hapus data menu makanan
    $sqlDelete = "DELETE FROM menu_makanan WHERE id = $hapusMenuId";
    if (mysqli_query($koneksi, $sqlDelete)) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

// Proses tambah data jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah'])) {
    $idTambah = $_POST['tambah_id'];
    $namaTambah = $_POST['tambah_nama'];
    $detailTambah = $_POST['tambah_detail'];
    $hargaTambah = $_POST['tambah_harga'];
    $stockTambah = $_POST['tambah_stock'];
    $gambarTambah = $_POST['tambah_gambar'];

    // Tambah data menu makanan
    $sqlInsert = "INSERT INTO menu_makanan (id, nama_makanan, detail_makanan, harga, stock, gambar) VALUES ($idTambah, '$namaTambah', '$detailTambah', $hargaTambah, $stockTambah, '$gambarTambah')";
    if (mysqli_query($koneksi, $sqlInsert)) {
        echo "Data berhasil ditambahkan.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}

// Proses edit data jika form di-submit
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['edit'])) {
    $idEdit = $_POST['edit_id'];
    $namaEdit = $_POST['edit_nama'];
    $detailEdit = $_POST['edit_detail'];
    $hargaEdit = $_POST['edit_harga'];
    $stockEdit = $_POST['edit_stock'];
    $gambarEdit = $_POST['edit_gambar'];
    $buttonEdit = $_POST['edit_button'];

    // Edit data menu makanan
    $sqlUpdate = "UPDATE menu_makanan SET nama_makanan = '$namaEdit', detail_makanan = '$detailEdit', harga = $hargaEdit, stock = $stockEdit, gambar = '$gambarEdit', button = '$buttonEdit' WHERE id = $idEdit";
    if (mysqli_query($koneksi, $sqlUpdate)) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }
}


// Ambil data menu makanan dari database
$sqlSelectMenu = "SELECT * FROM menu_makanan ORDER BY id DESC";
$result = mysqli_query($koneksi, $sqlSelectMenu);
$menuMakanan = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Tutup koneksi
mysqli_close($koneksi);
?>
  <!DOCTYPE html>
  <html>

  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" type="text/css" href="css/styletable.css">
    <link rel="stylesheet" type="text/css" href="css/admin.css">
    <title>NetFood - Admin Panel</title>
    <link rel="shortcut icon" type="image/x-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">
    <link rel="apple-touch-icon" href="https://d1pkn64wtleuxl.cloudfront.net/com/images/how-2.svg">



    <style>
h2.title-underline {
  color: black;
  background: linear-gradient(to right, #00ff00, #00ff00, transparent);
  background-repeat: repeat-x;
  background-size: 200% auto;
  -webkit-background-clip: text;
  -webkit-text-fill-color: transparent;
  animation: glow-pulse 1.5s infinite linear;
}

@keyframes glow-pulse {
  0% {
    text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00;
    background-position: 0 0;
  }
  50% {
    text-shadow: none;
    background-position: -100% 0;
  }
  100% {
    text-shadow: 0 0 5px #00ff00, 0 0 10px #00ff00, 0 0 15px #00ff00;
    background-position: -200% 0;
  }
}



</style> </head>

  <body>
    <div class="navbar"> <a class="active" href="logout.php" target="_blank"><i class="fa fa-fw fa-user"></i>Logout</a>    <br>
    <center>
      <h2 class="title-underline">Data Menu Makanan Admin Mode</h2></center>
    <button class="tambah-button" onclick="tambahMenu()">Tambah Menu</button>
    <br>
    <table style="color: white;">
      <thead>
        <tr>
          <th>
            <center>Gambar</center>
          </th>
          <th>
            <center>Nama Makanan</center>
          </th>
          <th>
            <center>Detail Makanan</center>
          </th>
          <th>
            <center>Harga</center>
          </th>
          <th>
            <center>Stok</center>
          </th>
          <th>
            <center>Aksi</center>
          </th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($menuMakanan as $menu) { ?>
          <tr>
            <td>
              <center><img src="<?php echo $menu['gambar']; ?>" alt="Gambar Makanan" width="100" height="60"></center>
            </td>
            <td>
              <?php echo $menu['nama_makanan']; ?>
            </td>
            <td>
              <?php echo $menu['detail_makanan']; ?>
            </td>
            <td>Rp
              <?php echo number_format($menu['harga'], 0, ',', '.'); ?>
            </td>
            <td>
              <?php echo $menu['stock']; ?>
            </td>
            <td>
              <center>
                <button class="edit-button" onclick="editMenu(<?php echo $menu['id']; ?>, '<?php echo $menu['nama_makanan']; ?>', '<?php echo $menu['detail_makanan']; ?>', <?php echo $menu['harga']; ?>, <?php echo $menu['stock']; ?>, '<?php echo $menu['gambar']; ?>')">Edit</button>
                <form method="POST" action="">
                  <br>
                  <input type="hidden" name="hapus_menu_id" value="<?php echo $menu['id']; ?>">
                  <button class="delete-button" onclick="deleteMenu(<?php echo $menu['id']; ?>)">Delete</button>
                </form>
              </center>
            </td>
          </tr>
          <?php } ?>
      </tbody>
    </table>
    <!-- Modal Tambah -->
    <div id="tambahModal" class="modal">
      <div class="modal-content"> <span class="close" onclick="closeTambahMenu()">&times;</span>
        <h3>Tambah Menu Makanan</h3>
        <form id="tambahForm" method="POST" action="">
          <label for="tambah_id">ID Makanan:</label>
          <input type="text" id="tambah_id" name="tambah_id" value="" required>
          <label for="tambah_nama">Nama Makanan:</label>
          <input type="text" id="tambah_nama" name="tambah_nama" value="" required>
          <label for="tambah_detail">Detail Makanan:</label>
          <textarea id="tambah_detail" name="tambah_detail" required></textarea>
          <label for="tambah_harga">Harga:</label>
          <input type="text" id="tambah_harga" name="tambah_harga" value="" required>
          <label for="tambah_stock">Stok:</label>
          <input type="text" id="tambah_stock" name="tambah_stock" value="" required>
          <label for="tambah_gambar">URL Gambar:</label>
          <input type="text" id="tambah_gambar" name="tambah_gambar" value="" required>
          <label for="tambah_button">URL Button:</label>
          <input type="text" id="tambah_button" name="tambah_button" value="" required>
          <input type="submit" name="tambah" value="Tambah"> </form>
      </div>
    </div>
    <!-- Modal Edit -->
<div id="editModal" class="modal">
  <div class="modal-content">
    <span class="close" onclick="closeEditMenu()">&times;</span>
    <h3>Edit Menu Makanan</h3>
    <form id="editForm" method="POST" action="">
      <label for="edit_id">ID Makanan:</label>
      <input type="text" id="edit_id" name="edit_id" value="" required>
      <label for="edit_nama">Nama Makanan:</label>
      <input type="text" id="edit_nama" name="edit_nama" value="" required>
      <label for="edit_detail">Detail Makanan:</label>
      <textarea id="edit_detail" name="edit_detail" required></textarea>
      <label for="edit_harga">Harga:</label>
      <input type="text" id="edit_harga" name="edit_harga" value="" required>
      <label for="edit_stock">Stok:</label>
      <input type="text" id="edit_stock" name="edit_stock" value="" required>
      <label for="edit_gambar">URL Gambar:</label>
      <input type="text" id="edit_gambar" name="edit_gambar" value="" required>
      <label for="edit_button">URL Button:</label>
      <input type="text" id="edit_button" name="edit_button" value="" required>
      <input type="submit" name="edit" value="Simpan">
    </form>
  </div>
</div>
    <script>
    // Fungsi untuk menampilkan modal tambah menu
    function tambahMenu() {
      var modal = document.getElementById("tambahModal");
      modal.style.display = "block";
    }
    // Fungsi untuk menutup modal tambah menu
    function closeTambahMenu() {
      var modal = document.getElementById("tambahModal");
      modal.style.display = "none";
    }
    // Fungsi untuk menampilkan modal edit menu
    function editMenu(id) {
      var modal = document.getElementById("editModal");
      modal.style.display = "block";
      // Mengisi nilai form dengan data menu yang akan diedit
      var menu = <?php echo json_encode($menuMakanan); ?>;
      var selectedMenu = menu.find(function(item) {
        return item.id === id;
      });
      // Mengisi nilai input field dengan data menu yang dipilih
      document.getElementById("edit_id").value = selectedMenu['id'];
      document.getElementById("edit_nama").value = selectedMenu['nama_makanan'];
      document.getElementById("edit_detail").value = selectedMenu['detail_makanan'];
      document.getElementById("edit_harga").value = selectedMenu['harga'];
      document.getElementById("edit_stock").value = selectedMenu['stock'];
      document.getElementById("edit_gambar").value = selectedMenu['gambar'];
    }

    function editMenu(id, nama, detail, harga, stok, urlGambar, urlButton) {
    var modal = document.getElementById("editModal");
    modal.style.display = "block";

    // Mengisi nilai input field dengan data menu yang dipilih
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_nama").value = nama;
    document.getElementById("edit_detail").value = detail;
    document.getElementById("edit_harga").value = harga;
    document.getElementById("edit_stock").value = stok;
    document.getElementById("edit_gambar").value = urlGambar;
    document.getElementById("edit_button").value = urlButton;
  }
    // Fungsi untuk menutup modal edit menu
    function closeEditMenu() {
      var modal = document.getElementById("editModal");
      modal.style.display = "none";
    }
    // Mengirim data menu yang baru ditambahkan ke server menggunakan AJAX
    function submitTambahMenu(event) {
      event.preventDefault(); // Mencegah pengiriman form bawaan
      var form = document.getElementById("tambahForm");
      var data = new FormData(form);
      // Kirim data menggunakan AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("POST", form.action, true);
      xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText); // Tampilkan respons dari server (untuk debug)
          // Tambahkan logika lain yang diperlukan setelah berhasil menambahkan menu
          // misalnya menampilkan notifikasi atau memperbarui tampilan menu
        }
      };
      xhr.send(data);
    }
    // Mengirim data menu yang diedit ke server menggunakan AJAX
    function submitEditMenu(event) {
      event.preventDefault(); // Mencegah pengiriman form bawaan
      var form = document.getElementById("editForm");
      var data = new FormData(form);
      // Kirim data menggunakan AJAX
      var xhr = new XMLHttpRequest();
      xhr.open("POST", form.action, true);
      xhr.onreadystatechange = function() {
        if(xhr.readyState === 4 && xhr.status === 200) {
          console.log(xhr.responseText); // Tampilkan respons dari server (untuk debug)
          // Tambahkan logika lain yang diperlukan setelah berhasil mengedit menu
          // misalnya menampilkan notifikasi atau memperbarui tampilan menu
        }
      };
      xhr.send(data);
    }
    </script>
  </body>

  </html>