<?php
$servername = "mysql.duakaryadigital.com";
$username = "root";
$password = "123hore";
$dbname = "new_katalog_app";

$nama = $_POST['nama'];
$deskripsi = $_POST['deskripsi'];

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "INSERT INTO review(nama, deskripsi) VALUES (?, ?);";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$nama, $deskripsi]);

  if ($stmt->rowCount() > 0) {
    header("Location: /review");
  } else {
    header("Location: /review/error");
  }

  $conn = null;
} catch(PDOException $e) {
  header("Location: /review/error");
}
?>