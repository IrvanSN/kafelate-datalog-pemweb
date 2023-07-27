<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Detail Produk";
$selected = "produk";
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

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $id_produk = $_GET['id'];

    $sql = "SELECT * FROM produk WHERE id_produk=?;";
    
    $stmt = $conn->prepare($sql);
    $stmt->execute([$id_produk]);
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    
    $id_label = $row['id_label'];
    $id_kategori = $row['id_kategori'];
    $id_produk = $row['id_produk'];
    $nama_produk = $row['nama'];
    $deskripsi = $row['deskripsi'];
    $foto = $row['foto'];
    $stok = $row['stok'];
    $harga = $row['harga'];
    $available_selected = ($row['status'] == 1) ? "selected" : "";
    $unavailable_selected = ($row['status'] == 1) ? "" : "selected";
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/product" class="text-lg font-bold hover:underline hover:underline-offset-1">Produk</a>
        >
        <a href="/admin/product/view?id=<?php echo $row['id_produk'] ?>" class="text-lg font-bold hover:underline hover:underline-offset-1">Produk <?php echo $row['nama'] ?></a>
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
        <form action="/admin/product/view/update.php" enctype="multipart/form-data" method="post">
            <div class="h-auto bg-gray-800 shadow-sm mt-2 p-4">
                 <h2 class="text-white font-bold">Data Produk <?php echo $row['nama'] ?></h2>
            </div>

            <div class="h-auto p-4 md:grid md:grid-cols-12 md:gap-2">
              <input type="text" name="id_produk" value="<?php echo $id_produk ?>" hidden>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="name">Nama Produk</label>
                    <input type="text" name="name" value="<?php echo $row['nama'] ?>" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                           placeholder="Masukkan nama produk..">
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="label">Label Produk</label>
                    <select type="text" name="label" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm" required>
                        <option value="null">Tidak Ada</option>
                        <?php
                        $sql = "SELECT * FROM label;";
                        $result = $conn->query($sql);
                        if ($result->rowCount() > 0) {
                            $counter = 1;

                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                              $selected = ($id_label == $row['id_label']) ? "selected" : "";
                        ?>
                        <option <?php echo $selected ?> value="<?php echo $row['id_label'] ?>"><?php echo $row['nama_label'] ?></option>
                        <?php
                                $counter++;
                            }
                        } else {
                            echo '<option value="Error">Gagal memuat label</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="status">Status</label>
                    <select type="text" name="status" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm" required>
                      <option value="1" <?php echo $available_selected; ?>>Tersedia</option>
                      <option value="0" <?php echo $unavailable_selected; ?>>Habis</option>
                    </select>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-12">
                    <label class="mb-1" for="description">Deskripsi</label>
                    <textarea type="text" name="description" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                              placeholder="Masukkan deskripsi produk.."><?php echo $deskripsi ?></textarea>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="category">Kategori Produk</label>
                    <select value="2" type="text" name="category" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm" required>
                        <?php
                        $sql = "SELECT * FROM kategori;";
                        $result = $conn->query($sql);
                        if ($result->rowCount() > 0) {
                            $counter = 1;

                            while($row = $result->fetch(PDO::FETCH_ASSOC)) {
                              $selected = ($id_kategori == $row['id_kategori']) ? "selected" : "";
                        ?>
                              <option value="<?php echo $row['id_kategori'] ?>" <?php echo $selected ?>><?php echo $row['nama_kategori'] ?></option>
                        <?php
                                $counter++;
                            }
                        } else {
                            echo '<option value="Error">Gagal memuat kategori</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="stock">Stok Produk</label>
                    <div class="flex flex-row justify-between">
              <button type="button" id="minus" class="border-y border-l border-gray-400 rounded-l-md p-1">
                <svg class="w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H4"></path></svg>
              </button>
                        <input id="stock" type="number" name="stock" value="<?php echo $stok ?>" min="0" class="border border-gray-400 p-1 pl-2 font-thin text-sm text-center w-full">
                        <button type="button" id="plus" class="border-y border-r border-gray-400 rounded-r-md p-1" >
                <svg class="w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
                    </div>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="price">Harga</label>
                    <input value="<?php echo $harga ?>" type="number" name="price" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                           placeholder="Masukkan harga produk..">
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-12">
                    <label class="mb-1" for="foto">Foto produk</label>
                    <img width="120px" class="mb-3 rounded-lg object-cover" src="/public/uploads/<?php echo $foto ?>" alt="product-image">
                    <input type="text" name="oldFoto" value="<?php echo $foto ?>" hidden>
                    <input type="file" name="foto" class="border rounded-md border-gray-400 p-1 font-thin text-sm" accept="image/png, image/jpeg, image/jpg">
                </div>
            </div>

            <div class="h-auto bg-gray-200 p-2 flex justify-end">
              <button id="hapusProdukBtn" type="button" class="px-3 py-2 rounded-md border border-red-500 text-red-500 mr-2 text-sm hover:bg-red-500 hover:text-white transition duration-200">Hapus Produk</button>
              <button type="submit" class="bg-gray-700 px-3 py-2 rounded-md hover:bg-gray-900 hover:shadow-md text-white transition text-sm">Ubah Data</button>
            </div>
        </form>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>
 
<script>
    function confirmDelete() {
        var result = confirm("Apakah Anda yakin ingin menghapus produk ini?");
        if (result) {
            var id_produk = <?php echo $id_produk ?>;
            var nama_produk = <?php echo json_encode($nama_produk); ?>;
            var deleteUrl = "/admin/product/view/delete.php?id_produk=" + id_produk + "&nama_produk=" + encodeURIComponent(nama_produk);
            window.location.href = deleteUrl;
        }
    }

    var hapusProdukBtn = document.getElementById("hapusProdukBtn");
    hapusProdukBtn.addEventListener("click", confirmDelete);
</script>
</body>
<?php include '../../../parts/script.php';?>