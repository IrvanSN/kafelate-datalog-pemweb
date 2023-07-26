<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}
?>

<?php
$servername = "mysql.duakaryadigital.com";
$username = "root";
$password = "123hore";
$dbname = "new_katalog_app";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $id_produk = $_GET['id_produk'];
  $nama_produk = $_GET['nama_produk'];

  $sql = "DELETE FROM produk WHERE id_produk=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_produk]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/product/');
    setcookie("message_data", 'Berhasil menghapus produk "' . $nama_produk . '"', time() + 1, '/admin/product/');
    header("Location: /admin/product/");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/product/');
    setcookie("message_data", 'Gagal menghapus produk "' . $nama_produk . '"', time() + 1, '/admin/product/');
    header("Location: /admin/product/");
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/product/');
  setcookie("message_data", 'Gagal menghapus produk "' . $nama_produk . '"', time() + 1, '/admin/product/');
  header("Location: /admin/product/");
}
?>