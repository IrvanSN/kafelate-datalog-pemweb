<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Detail Label";
$selected = "label";
?>

<?php include '../../../parts/header.php';?>
<body>
<?php include '../../../parts/navbar.php';?>
<?php include '../../../parts/sidebar.php';?>

<?php
    $servername = "mysql.duakaryadigital.com";
    $username = "root";
    $password = "123hore";
    $dbname = "new_katalog_app";

    $id_label = $_GET['id'];

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM label WHERE id_label=?;";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_label]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/label" class="text-lg font-bold hover:underline hover:underline-offset-1">Label</a>
        >
        <a href="/admin/label/<?php echo $row['id_label'] ?>" class="text-lg font-bold hover:underline hover:underline-offset-1"><?php echo $row['nama_label'] ?></a>
    </div>
</div>

<div class="flex flex-col h-screen justify-between font-poppins lg:ml-72">
    <div class="h-auto m-[30px] bg-white rounded-md shadow-md overflow-hidden">
        <?php
        if (empty($_COOKIE["message_data"])) {
            echo '';
        } else {
        ?>
        <div class="h-auto col-span-12 mt-2 p-2 rounded-md shadow-md bg-<?php echo $_COOKIE["message_color"]; ?>-500">
            <p class="text-white text-center"><?php echo $_COOKIE["message_data"]; ?></p>
        </div>
        <?php } ?>
        <div class="h-auto bg-gray-800 shadow-sm mt-2 p-4">
            <h2 class="text-white font-bold">Data Label <?php echo $row['nama_label'] ?></h2>
        </div>
        <?php if ($row) { ?>
        <form method="post" action="/admin/label/view/update.php">
            <div class="h-auto p-4">
                <div class="h-auto flex flex-col mb-3">
                    <label class="mb-1" for="<?php echo $row['id_label'] ?>">ID Label</label>
                    <input type="text" class="border rounded-md border-gray-500 p-1 pl-2 font-thin text-sm bg-gray-300" disabled value="<?php echo $row['id_label'] ?>">
                    <input name="id_label" type="text" class="border rounded-md border-gray-500 p-1 pl-2 font-thin text-sm bg-gray-300" hidden value="<?php echo $row['id_label'] ?>">
                </div>
                <div class="h-auto flex flex-col mb-3">
                    <label class="mb-1" for="<?php echo $row['nama_label'] ?>">Nama Label</label>
                    <input name="nama_label" type="text" value="<?php echo $row['nama_label'] ?>" class="border rounded-md border-gray-500 p-1 pl-2 font-thin text-sm" placeholder="Masukkan nama kategori..">
                </div>
            </div>
            <div class="h-auto bg-gray-200 p-2 flex justify-end">
                <button type="button" class="px-3 py-2 rounded-md border border-red-500 text-red-500 mr-2 text-sm hover:bg-red-500 hover:text-white transition duration-200"><a href="/admin/label/view/delete.php?id_label=<?php echo $row['id_label'] ?>&nama_label=<?php echo $row['nama_label'] ?>">Hapus Kategori</a></button>
                <button type="submit" class="bg-gray-700 px-3 py-2 rounded-md hover:bg-gray-900 hover:shadow-md text-white transition text-sm">Ubah Data</button>
            </div>
        </form>
        <?php 
          } else {
            echo "No record found.";
          }

          $conn = null;
        ?>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>


</body>
<?php include '../../../parts/script.php';?>