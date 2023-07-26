<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Produk";
$selected = "produk";
?>

<?php include '../../parts/header.php';?>
<body>
<?php include '../../parts/navbar.php';?>
<?php include '../../parts/sidebar.php';?>

<?php
    $servername = "mysql.duakaryadigital.com";
    $username = "root";
    $password = "123hore";
    $dbname = "new_katalog_app";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT p.foto, p.id_produk, p.nama AS nama_produk, IFNULL(k.nama_kategori, 'Tidak Ada') AS nama_kategori, IFNULL(l.nama_label, 'Tidak Ada') AS nama_label, p.stok, p.status, p.harga
        FROM produk p
        LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
        LEFT JOIN label l ON p.id_label = l.id_label";

    if(isset($_GET['nama'])) {
        $sql .= " WHERE p.nama LIKE CONCAT('%', ?, '%')";
    }

    $stmt = $conn->prepare($sql);

    if(isset($_GET['nama'])) {
        $stmt->bindValue(1, '%' . $_GET['nama'] . '%', PDO::PARAM_STR);
    }

    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $valueSearchInput = isset($_GET['nama']) ? $_GET['nama'] : '';
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/product" class="text-lg font-bold hover:underline hover:underline-offset-1">Produk</a>
    </div>
</div>

<div class="flex flex-col h-screen justify-between font-poppins lg:ml-72">
    <div class="grid grid-cols-12 gap-4 p-[30px]">
        <?php
        if (empty($_COOKIE["message_data"])) {
            echo '';
        } else {
        ?>
        <div class="h-auto col-span-12 mt-2 p-2 rounded-md shadow-md bg-<?php echo $_COOKIE["message_color"]; ?>-500">
            <p class="text-white text-center"><?php echo $_COOKIE["message_data"]; ?></p>
        </div>
        <?php } ?>
        <div class="h-auto col-span-12 mt-2 p-4 rounded-md shadow-md">
            <form action="/admin/product">
                <div class="flex flex-row justify-between">
                    <div class="flex">
                        <div class="flex-none py-2 w-[10px] bg-slate-600 rounded-md"></div>
                        <h1 class="flex-none ml-3 my-auto">Produk</h1>
                    </div>
                    <div class="flex">
                        <input name="nama" value="<?php echo $valueSearchInput ?>" placeholder="Cari nama produk" class="border-t border-l border-b rounded-bl-md rounded-tl-md border-gray-400 px-3 font-thin text-sm" type="text">
                        <button type="submit" class="rounded-br-md rounded-tr-md bg-gray-700 p-3 hover:bg-gray-900 hover:shadow-md text-white transition text-sm">
                            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>
                        </button>
                        <button class="ml-3 bg-green-600 px-3 py-2 rounded-md hover:bg-green-800 hover:shadow-md text-white transition text-sm"><a href="/admin/product/add">Buat Produk Baru</a></button>
                    </div>
                </div>
            </form>

            <div class="overflow-hidden flex flex-col">
                <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                    <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="overflow-hidden shadow-md rounded-md">
                            <table class="min-w-full">
                                <thead class="bg-gray-300">
                                    <tr>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            ID
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Foto
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Nama
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Kategori
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Label
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Stok
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Status
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            Harga
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                            <span class="flex flex-row justify-center">Detail</span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (count($result) > 0) {
                                        $counter = 1;

                                        foreach ($result as $row) {
                                    ?>
                                            <tr class="bg-white border-b">
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['id_produk'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <img class="w-[80px] h-[60px] overflow-hidden rounded-lg object-cover" src="/public/uploads/<?php echo $row['foto'] ?>" alt="product-image">
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['nama_produk'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['nama_kategori'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['nama_label'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['stok'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <span class="h-3 py-1 px-3 rounded-xl <?php echo $row['status'] ? 'bg-green-300' : 'bg-red-300' ?>"><?php echo $row['status'] ? 'Tersedia' : 'Tidak Tersedia' ?></span>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <?php echo $row['harga'] ?>
                                                </td>
                                                <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                                    <a href="/admin/product/view?id=<?php echo $row['id_produk'] ?>" class="flex flex-row justify-center"><svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg></a>
                                                </td>
                                            </tr>
                                    <?php
                                            $counter++;
                                        }
                                    } else {
                                        echo "<tr><td colspan='9' class='py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap' style='font-size: 18px'>No data available.</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>

</body>
<?php include '../../parts/script.php';?>