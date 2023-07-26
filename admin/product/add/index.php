<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Tambah Data Produk";
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
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/product" class="text-lg font-bold hover:underline hover:underline-offset-1">Produk</a>
        >
        <a href="/admin/product/add" class="text-lg font-bold hover:underline hover:underline-offset-1">Buat Produk Baru</a>
    </div>
</div>

<div class="flex flex-col h-screen justify-between font-poppins lg:ml-72">
    <div class="h-auto m-[30px] bg-white rounded-md shadow-md overflow-hidden">
        <form action="/admin/product/add/action.php" enctype="multipart/form-data" method="post">
            <div class="h-auto bg-gray-800 shadow-sm p-4">
                 <h2 class="text-white font-bold">Buat produk baru</h2>
            </div>

            <div class="p-4 md:grid md:grid-cols-12 md:gap-2">
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="name">Nama Produk</label>
                    <input type="text" name="name" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
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
                        ?>
                        <option value="<?php echo $row['id_label'] ?>"><?php echo $row['nama_label'] ?></option>
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
                        <option value="1">Tersedia</option>
                        <option value="0">Habis</option>
                    </select>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-12">
                    <label class="mb-1" for="description">Deskripsi</label>
                    <textarea type="text" name="description" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                              placeholder="Masukkan deskripsi produk.."></textarea>
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
                        ?>
                        <option value="<?php echo $row['id_kategori'] ?>"><?php echo $row['nama_kategori'] ?></option>
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
                        <input id="stock" type="number" name="stock" value="0" min="0" class="border border-gray-400 p-1 pl-2 font-thin text-sm text-center w-full">
                        <button type="button" id="plus" class="border-y border-r border-gray-400 rounded-r-md p-1" >
                <svg class="w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path></svg>
              </button>
                    </div>
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-4">
                    <label class="mb-1" for="price">Harga</label>
                    <input type="number" name="price" class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                           placeholder="Masukkan harga produk..">
                </div>
                <div class="h-auto flex flex-col mb-3 md:col-span-12">
                    <label class="mb-1" for="foto">Foto produk</label>
                    <input type="file" name="foto" class="border rounded-md border-gray-400 p-1 font-thin text-sm" accept="image/png, image/jpeg, image/jpg" required>
                </div>
            </div>

            <div class="h-auto bg-gray-200 p-2 flex justify-end">
                <button class="bg-gray-700 px-3 py-2 rounded-md hover:bg-gray-900 hover:shadow-md text-white transition text-sm">Submit</button>
            </div>
        </form>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>


</body>
<?php include '../../../parts/script.php';?>