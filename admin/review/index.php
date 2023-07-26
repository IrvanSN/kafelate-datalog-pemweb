<?php 
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: /admin/login");
}

$title = "Review";
$selected = "review";
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
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Perform the database query to retrieve data

    $sql = "SELECT * FROM review;";
    $result = $conn->query($sql);
?>

<div class="pt-[90px] h-auto shadow-md py-3 lg:ml-72">
    <div class="mx-[30px] text-gray-800 font-light">
        <a href="/admin/review" class="text-lg font-bold hover:underline hover:underline-offset-1">Review</a>
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
            <div class="flex flex-row justify-between">
                <div class="flex flex-row">
                    <div class="flex-none py-2 w-[10px] bg-slate-600 rounded-md"></div>
                    <h1 class="flex-none ml-3 my-auto">Review</h1>
                </div>
            </div>

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
                                        Nama Pelanggan
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-sm text-left text-gray-800 font-medium tracking-wider uppercase">
                                        Deskripsi
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                // Check if there are rows returned
                                if ($result->rowCount() > 0) {
                                    $counter = 1;

                                    // Loop through each row and generate the HTML structure
                                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                                        ?>
                                        <tr class="bg-white border-b">
                                            <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                              <?php echo $row['id_review'] ?>
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                              <?php echo $row['nama'] ?>
                                            </td>
                                            <td class="py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap">
                                              <?php echo $row['deskripsi'] ?>
                                            </td>
                                        </tr>
                                        <?php
                                        $counter++;
                                    }
                                } else {
                                    echo "<td colspan='3' style='font-size: 18px'>No data available.</td>";
                                }

                                // Close the database connection
                                $conn = null;
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