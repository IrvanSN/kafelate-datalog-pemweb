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

  $categoryName = $_POST['nama_kategori'];

  $sql = "INSERT INTO kategori(nama_kategori) VALUES (?);";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$categoryName]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/category');
    setcookie("message_data", 'Berhasil menambahkan kategori "' . $categoryName . '"', time() + 1, '/admin/category');
    header("Location: /admin/category");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/category');
    setcookie("message_data", 'Gagal menambahkan kategori "' . $categoryName . '"', time() + 1, '/admin/category');
    header("Location: /admin/category");
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/category');
  setcookie("message_data", 'Gagal menambahkan kategori "' . $categoryName . '"', time() + 1, '/admin/category');
  header("Location: /admin/category");
}
?>