<?php
session_start();
session_destroy();
header("Location: index.html"); // Ganti index.php dengan halaman Anda sendiri
exit;
?>
