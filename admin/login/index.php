<?php
session_start();
 
if (isset($_SESSION['username'])) {
    header("Location: /admin/dashboard");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/public/public/assets/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <title>Login - DATALOG</title>
    <link rel="stylesheet" href="/public/stylesheets/output.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="apple-touch-icon" sizes="57x57" href="/public/assets/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/public/assets/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/public/assets/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/public/assets/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/public/assets/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/public/assets/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/public/assets/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/public/assets/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/public/assets/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/public/assets/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/public/assets/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/public/assets/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/public/assets/favicon/favicon-16x16.png">
    <link rel="manifest" href="/public/assets/favicon/manifest.json">
</head>
<body class="bg-gray-700 font-poppins">
    <div class="flex justify-center px-7">
        <div class="w-auto rounded-md shadow-md p-3 max-w-md bg-white my-28">
            <div class="p-3">
                <div class="outline-2 outline-dashed outline-gray-500 rounded-md h-auto p-4">
                    <img src="/public/assets/datalog-logo-gray.png" alt="titikoma-logo">
                </div>
                <div class="bg-red-500" hidden></div>
                <h1 class="text-center text-2xl mt-8 font-bold text-gray-800">Selamat datang kembali!</h1>
                <?php
                if (empty($_COOKIE["message_data"])) {
                    echo '';
                } else {
                ?>
                <div class="h-auto col-span-12 mt-2 p-2 rounded-md shadow-md bg-<?php echo $_COOKIE["message_color"]; ?>-500">
                    <p class="text-white text-center"><?php echo $_COOKIE["message_data"]; ?></p>
                </div>
                <?php } ?>
                <form action="/admin/login/action.php" method="POST">
                    <div class="h-auto mb-3 flex flex-col mt-5">
                        <label class="mb-1" for="username">Username</label>
                        <input type="text" name="username"
                               class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                               placeholder="Username admin Anda"/>
                    </div>
                    <div class="h-auto mb-6 flex flex-col">
                        <label class="mb-1" for="password">Password</label>
                        <input type="password" name="password"
                               class="border rounded-md border-gray-400 p-1 pl-2 font-thin text-sm"
                               placeholder="Password admin Anda"/>
                    </div>
                    <div class="h-auto bg-green-500 rounded-md text-center hover:bg-green-700 transition duration-500">
                        <button type="submit" class="text-white font-medium text-lg m-2">Masuk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="/public/javascript/script.js"></script>
</html>