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

  $id_kategori = $_GET['id_kategori'];
  $nama_kategori = $_GET['nama_kategori'];

  $sql = "DELETE FROM kategori WHERE id_kategori=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_kategori]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/category');
    setcookie("message_data", 'Berhasil menghapus kategori "' . $nama_kategori . '"', time() + 1, '/admin/category');
    header("Location: /admin/category");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/category');
    setcookie("message_data", 'Gagal menghapus kategori "' . $nama_kategori . '"', time() + 1, '/admin/category');
    header("Location: /admin/category");
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/category');
  setcookie("message_data", 'Gagal menghapus kategori "' . $nama_kategori . '"', time() + 1, '/admin/category');
  header("Location: /admin/category");
}
?>