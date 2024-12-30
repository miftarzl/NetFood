<?php
require_once("koneksi.php");

if (isset($_GET['id'])) {
    $menuId = $_GET['id'];
    $sql = "SELECT * FROM menu_makanan WHERE id = $menuId";
    $result = mysqli_query($koneksi, $sql);
    $menu = mysqli_fetch_assoc($result);
    echo json_encode($menu);
}

mysqli_close($koneksi);
?>
