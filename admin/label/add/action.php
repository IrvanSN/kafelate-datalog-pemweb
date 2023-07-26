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

  $nama_label = $_POST['nama_label'];

  $sql = "INSERT INTO label(nama_label) VALUES (?);";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$nama_label]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/label');
    setcookie("message_data", 'Berhasil menambahkan label "' . $nama_label . '"', time() + 1, '/admin/label');
    header("Location: /admin/label");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/label');
    setcookie("message_data", 'Gagal menambahkan label "' . $nama_label . '"', time() + 1, '/admin/label');
    header("Location: /admin/label");
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/label');
  setcookie("message_data", 'Gagal menambahkan label "' . $nama_label . '"', time() + 1, '/admin/label');
  header("Location: /admin/label");
}
?>