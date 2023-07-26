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

  $id_kategori = $_POST['id_kategori'];
  $nama_kategori = $_POST['nama_kategori'];

  $sql = "UPDATE kategori SET nama_kategori=? WHERE id_kategori=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$nama_kategori, $id_kategori]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/category/view/');
    setcookie("message_data", 'Berhasil mengubah data kategori!', time() + 1, '/admin/category/view/');
    header("Location: /admin/category/view/?id=" . $id_kategori);
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/category/view/');
    setcookie("message_data", 'Gagal mengubah data kategori!', time() + 1, '/admin/category/view/');
    header("Location: /admin/category/view/?id=" . $id_kategori);
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/category/view/');
  setcookie("message_data", 'Gagal mengubah data kategori!', time() + 1, '/admin/category/view/');
  header("Location: /admin/category/view/?id=" . $id_kategori);
}
?>