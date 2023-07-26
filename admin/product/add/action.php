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

  $nama_produk = $_POST['name'];
  $id_label = $_POST['label'];
  $id_kategori = $_POST['category'];
  $status = intval($_POST['status']);
  $deskripsi = $_POST['description'];
  $stok = $_POST['stock'];
  $harga = $_POST['price'];
  $foto = $_FILES['foto']['name'];

  $target_dir = "../../../public/uploads/";

  $file_tmp_name = $_FILES["foto"]["tmp_name"]; 
  $file_ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); 

  $new_file_name = uniqid() . "." . $file_ext; 
  $target_file = $target_dir . $new_file_name; 

  move_uploaded_file($file_tmp_name, $target_file);

  $sql = "INSERT INTO produk(id_label, id_kategori, nama, deskripsi, status, stok, foto, harga) 
  VALUES (?, ?, ?, ?, ?, ?, ?, ?);";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_label, $id_kategori, $nama_produk, $deskripsi, $status, $stok, $new_file_name, $harga]);

  echo $stmt->rowCount();

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/product');
    setcookie("message_data", 'Berhasil menambahkan produk "' . $nama_produk . '"', time() + 1, '/admin/product');
    header("Location: /admin/product");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/product');
    setcookie("message_data", 'Gagal menambahkan produk "' . $nama_produk . '"', time() + 1, '/admin/product');
    header("Location: /admin/product");
  }

  $conn = null;
} catch(PDOException $e) {
  echo $e;
  setcookie("message_color", 'red', time() + 1, '/admin/product');
  setcookie("message_data", 'Gagal menambahkan produk "' . $nama_produk . '"', time() + 1, '/admin/product');
  header("Location: /admin/product");
}
?>