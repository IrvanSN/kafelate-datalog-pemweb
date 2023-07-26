<?php
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: /admin/dashboard");
}
?>

<?php 
session_start();
 
if (isset($_SESSION['username'])) {
  header("Location: /admin/dashboard");
}

$username_input = $_POST['username'];
$password_input = $_POST['password'];
 
$servername = "mysql.duakaryadigital.com";
$username = "root";
$password = "123hore";
$dbname = "new_katalog_app";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $sql = "SELECT * FROM admin WHERE username=? AND password=?;";

  $stmt = $conn->prepare($sql);
  $stmt->execute([$username_input, $password_input]);

  echo $stmt->rowCount();
  
  if ($stmt->rowCount() > 0) {
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    $_SESSION['username'] = $row['username'];
    header("Location: /admin/dashboard");
  } else {
    setcookie("message_color", 'red', time() + 1, '/admin/login');
    setcookie("message_data", 'Username atau password salah!', time() + 1, '/admin/login');
    header("Location: /admin/login");
  }

  $conn = null;
} catch(PDOException $e) {
  echo $e;
  setcookie("message_color", 'red', time() + 1, '/admin/login');
  setcookie("message_data", 'Gagal melakukan login!', time() + 1, '/admin/login');
  header("Location: /admin/login");
}
?>