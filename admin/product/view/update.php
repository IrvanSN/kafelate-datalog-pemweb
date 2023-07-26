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

  $oldFoto = $_POST['oldFoto'];
  $id_produk = $_POST['id_produk'];

  $nama_produk = $_POST['name'];
  $id_label = $_POST['label'] == "null" ? NULL : $_POST['label'];
  $id_kategori = $_POST['category'];
  $status = intval($_POST['status']);
  $deskripsi = $_POST['description'];
  $stok = $_POST['stock'];
  $harga = $_POST['price'];
  $foto = $_FILES['foto']['name'];

  $target_dir = "../../../public/uploads/";

  $file_tmp_name = $_FILES["foto"]["tmp_name"]; 
  $file_ext = pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION); 

  $new_file_name = ($_FILES['foto']['error'] !== UPLOAD_ERR_NO_FILE) ? uniqid() . "." . $file_ext : $oldFoto;
  $target_file = $target_dir . $new_file_name; 

  move_uploaded_file($file_tmp_name, $target_file);

  $sql = "UPDATE produk
  SET id_kategori=?, id_label=?, nama=?, deskripsi=?, status=?, stok=?, foto=?, harga=?
  WHERE id_produk=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$id_kategori, $id_label, $nama_produk, $deskripsi, $status, $stok, $new_file_name, $harga, $id_produk]);

  if ($stmt->rowCount() > 0) {
    setcookie("message_color", 'green', time() + 1, '/admin/product/view');
    setcookie("message_data", 'Berhasil mengubah data produk "' . $nama_produk . '"', time() + 1, '/admin/product/view');
    header("Location: /admin/product/view?id=" . $id_produk);
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/product/view');
    setcookie("message_data", 'Gagal mengubah data produk "' . $nama_produk . '"', time() + 1, '/admin/product/view');
    header("Location: /admin/product/view?id=" . $id_produk);
  }

  $conn = null;
} catch(PDOException $e) {
  echo $e;
  setcookie("message_color", 'red', time() + 1, '/admin/product/view');
  setcookie("message_data", 'Gagal mengubah data produk "' . $nama_produk . '"', time() + 1, '/admin/product/view');
  // header("Location: /admin/product/view?id=" . $id_produk);
}
?>