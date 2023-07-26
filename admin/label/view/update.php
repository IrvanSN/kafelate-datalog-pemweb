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

  $id_label = $_POST['id_label'];
  $nama_label = $_POST['nama_label'];

  $sql = "UPDATE label SET nama_label=? WHERE id_label=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$nama_label, $id_label]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/label/view/');
    setcookie("message_data", 'Berhasil mengubah data label!', time() + 1, '/admin/label/view/');
    header("Location: /admin/label/view/?id=" . $id_label);
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/label/view/');
    setcookie("message_data", 'Gagal mengubah data label!', time() + 1, '/admin/label/view/');
    header("Location: /admin/label/view/?id=" . $id_label);
  }

  $conn = null;
} catch(PDOException $e) {
  setcookie("message_color", 'red', time() + 1, '/admin/label/view/');
  setcookie("message_data", 'Gagal mengubah data label!', time() + 1, '/admin/label/view/');
  header("Location: /admin/label/view/?id=" . $id_label);
}
?>