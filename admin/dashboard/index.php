<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Dashboard";
$selected = "dashboard";
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

    $sql = "SELECT
    (SELECT COUNT(*) FROM admin) AS jumlah_admin,
    (SELECT COUNT(*) FROM kategori) AS jumlah_kategori,
    (SELECT COUNT(*) FROM label) AS jumlah_label,
    (SELECT COUNT(*) FROM produk) AS jumlah_produk,
    (SELECT COUNT(*) FROM review) AS jumlah_review;";
    
    $result = $conn->query($sql);
    $row = $result->fetch(PDO::FETCH_ASSOC);
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/dashboard" class="text-lg font-bold hover:underline hover:underline-offset-1">Dashboard</a>
    </div>
</div>

<div class="flex flex-col h-screen justify-between font-poppins lg:ml-72">
    <div class="grid grid-cols-12 gap-4 p-[30px]">
        <div class="h-auto flex flex-row justify-between bg-sky-500 rounded-md shadow-md overflow-hidden col-span-12 sm:col-span-6 xl:col-span-3 p-4 text-white">
        <svg class="w-1/5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"></path></svg>
            <div class="h-auto text-right flex flex-col justify-center">
                <h1 class="font-thin text-sm">Jumlah Total</h1>
                <h1>Kategori</h1>
                <p class="text-xl font-bold" ><?php echo $row['jumlah_kategori'] ?></p>
            </div>
        </div>

        <div class="h-auto flex flex-row justify-between bg-green-500 rounded-md shadow-md overflow-hidden col-span-12 sm:col-span-6 xl:col-span-3 p-4 text-white">
        <svg class="w-1/5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
            <div class="h-auto text-right flex flex-col justify-center">
                <h1 class="font-thin text-sm">Jumlah Total</h1>
                <h1>Produk</h1>
                <p class="text-xl font-bold" ><?php echo $row['jumlah_produk'] ?></p>
            </div>
        </div>

        <div class="h-auto flex flex-row justify-between bg-yellow-500 rounded-md shadow-md overflow-hidden col-span-12 sm:col-span-6 xl:col-span-3 p-4 text-white">
        <svg class="w-1/5" fill="none" stroke="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z" />
            <path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z" />
        </svg>
            <div class="h-auto text-right flex flex-col justify-center">
                <h1 class="font-thin text-sm">Jumlah Total</h1>
                <h1>Label</h1>
                <p class="text-xl font-bold" ><?php echo $row['jumlah_label'] ?></p>
            </div>
        </div>

        <div class="h-auto flex flex-row justify-between bg-indigo-500 rounded-md shadow-md overflow-hidden col-span-12 sm:col-span-6 xl:col-span-3 p-4 text-white">
        <svg class="w-1/5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
            <div class="h-auto text-right flex flex-col justify-center">
                <h1 class="font-thin text-sm">Jumlah Total</h1>
                <h1>Review</h1>
                <p class="text-xl font-bold" ><?php echo $row['jumlah_review'] ?></p>
            </div>
        </div>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>

</body>
<?php include '../../parts/script.php';?>