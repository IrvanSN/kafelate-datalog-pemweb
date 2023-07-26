<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Tambah Data Label";
$selected = "label";
?>

<?php include '../../../parts/header.php';?>
<body>
<?php include '../../../parts/navbar.php';?>
<?php include '../../../parts/sidebar.php';?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/label" class="text-lg font-bold hover:underline hover:underline-offset-1">Label</a>
        >
        <a href="/admin/label/add" class="text-lg font-bold hover:underline hover:underline-offset-1">Buat Label Baru</a>
    </div>
</div>

<div class="flex flex-col h-screen justify-between font-poppins lg:ml-72">
    <div class="h-auto m-[30px] bg-white rounded-md shadow-md overflow-hidden">
        <div class="h-auto bg-gray-800 shadow-sm p-4">
            <h2 class="text-white font-bold">Buat label baru</h2>
        </div>
        <form method="post" action="/admin/label/add/action.php">
            <div class="h-auto p-4">
                <div class="h-auto flex flex-col mb-3">
                    <label class="mb-1" for="email">Nama Label</label>
                    <input type="text" name="nama_label" class="border rounded-md border-gray-500 p-1 pl-2 font-thin text-sm" placeholder="Masukkan nama label..">
                </div>
            </div>
            <div class="h-auto bg-gray-200 p-2 flex justify-end">
                <button type="submit" class="bg-gray-700 px-3 py-2 rounded-md hover:bg-gray-900 hover:shadow-md text-white transition text-sm">Submit</button>
            </div>
        </form>
    </div>

    <div class="bg-gray-700 p-5 font-poppins">
        <p class="text-white m-auto text-center lg:text-left">DATALOG by Kelompok 4</p>
    </div>
</div>

</body>
<?php include '../../../parts/script.php';?>
</html>