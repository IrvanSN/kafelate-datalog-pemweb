<?php
    $servername = "mysql.duakaryadigital.com";
    $username = "root";
    $password = "123hore";
    $dbname = "new_katalog_app";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM review;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $review = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>KafeLate | Reviews</title>
        <link rel="stylesheet" href="/public/stylesheets/user.css" />
        <link rel="stylesheet" href="/public/stylesheets/output.css" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.7.0/flowbite.min.js"></script>
    </head>
    <body class="flex flex-col bg-main text-white">
        <!-- NAVIGATION BAR START -->
        <nav class="bg-black fixed w-full z-20 top-0 left-0">
            <div
                class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-8 py-4 sm:px-16"
            >
                <a href="#" class="flex items-center font-playfair">
                    <span
                        class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white"
                        >KafeLate</span
                    >
                </a>
                <div class="flex md:order-2">
                    <button
                        type="button"
                        class="text-white bg-secondary-700 transition duration-500 hover:bg-secondary-900 ease-out font-poppins rounded-md font-medium text-sm px-4 py-2 text-center mr-3 md:mr-0"
                    >
                        Beli Sekarang
                    </button>
                    <button
                        data-collapse-toggle="navbar-sticky"
                        type="button"
                        class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-white rounded-lg md:hidden"
                        aria-controls="navbar-sticky"
                        aria-expanded="false"
                    >
                        <svg
                            class="w-5 h-5"
                            aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 17 14"
                        >
                            <path
                                stroke="currentColor"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M1 1h15M1 7h15M1 13h15"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1"
                    id="navbar-sticky"
                >
                    <ul
                        class="flex flex-col p-4 md:p-0 mt-4 font-playfair font-medium rounded-lg md:flex-row gap-2 md:space-x-8 md:mt-0 md:border-0"
                    >
                        <li>
                            <a
                                href="/"
                                class="group flex flex-col gap-2 justify-center items-center md:border-none border border-white"
                            >
                                <div
                                    class="block py-2 pl-3 pr-4 text-gray-900 rounded transition duration-500 md:hover:bg-transparent md:group-hover:text-stone-500 md:p-0 dark:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    Beranda
                                </div>
                                <div
                                    class="nav-line w-2 h-1 group-hover:w-7 transition-all duration-500 bg-white md:group-hover:bg-stone-500 rounded-full hidden md:block"
                                ></div>
                            </a>
                        </li>
                        <li>
                            <a
                                href="/menu"
                                class="group flex flex-col gap-2 justify-center items-center md:border-none border border-white"
                            >
                                <div
                                    class="block py-2 pl-3 pr-4 text-gray-900 transition duration-500 md:hover:bg-transparent md:group-hover:text-stone-500 md:p-0 dark:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    Menu
                                </div>
                                <div
                                    class="nav-line w-2 h-1 group-hover:w-7 transition-all duration-500 bg-white md:group-hover:bg-stone-500 rounded-full hidden md:block"
                                ></div>
                            </a>
                        </li>
                        <li>
                            <a
                                href="/review"
                                class="group flex flex-col gap-2 justify-center items-center md:border-none border border-white"
                            >
                                <div
                                    class="block py-2 pl-3 pr-4 text-gray-900 transition duration-500 md:hover:bg-transparent md:group-hover:text-stone-500 md:p-0 dark:text-white md:dark:hover:bg-transparent dark:border-gray-700"
                                >
                                    Ulasan
                                </div>
                                <div
                                    class="w-5 h-1 group-hover:w-7 transition-all duration-500 bg-stone-500 md:group-hover:bg-stone-500 rounded-full hidden md:block"
                                ></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVIGATION BAR END -->
        <div class="flex flex-col pt-16">
            <div class="flex flex-col p-8 md:p-16 gap-2">
                <h1 class="text-4xl font-playfair text-center font-bold">
                    Ulasan Pelanggan
                </h1>
                <p class="font-playfair text-xl text-center">
                    Apa kata mereka tentang KafeLate?
                </p>
            </div>
            <!-- Testimonial Section -->
            <section class="container mx-auto px-4 py-8">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"
                >
                    <?php
                    if (count($review) > 0) {
                        $counter_review = 1;

                        foreach ($review as $row_review) {
                    ?>
                    <div
                        class="bg-black text-white font-playfair rounded-lg shadow-md p-6"
                    >
                        <div class="flex items-start mb-4">
                            <div>
                                <h4
                                    class="text-secondary-500 font-bold text-lg"
                                >
                                    <?php echo $row_review['nama'] ?>
                                </h4>
                                <p class="text-white">
                                    <?php echo $row_review['deskripsi'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                            $counter_review++;
                        }
                    } else {
                        echo "<tr><td colspan='9' class='py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap' style='font-size: 18px'>No data available.</td></tr>";
                    }
                    ?>
                </div>
            </section>
            <section class="container mx-auto px-4 py-8">
                <h2 class="text-3xl font-bold mb-6">Tambahkan Ulasan</h2>
                <form
                    id="testimonialForm"
                    method="POST"
                    action="/review/action.php"
                    class="flex flex-col gap-4 w-full text-black"
                >
                    <div class="flex flex-col">
                        <label for="nama" class="text-white text-xl font-bold"
                            >Nama</label
                        >
                        <input
                            type="text"
                            id="nama"
                            name="nama"
                            class="px-4 py-2 border border-gray-400 rounded-md"
                            required
                        />
                    </div>
                    <div class="flex flex-col">
                        <label
                            for="deskripsi"
                            class="text-white text-xl font-bold"
                            >Ulasan</label
                        >
                        <textarea
                            id="deskripsi"
                            name="deskripsi"
                            class="px-4 py-2 border border-gray-400 rounded-md"
                            required
                        ></textarea>
                    </div>
                    <button
                        type="submit"
                        class="bg-secondary-700 text-white px-4 py-2 rounded-md font-medium text-sm"
                    >
                        Submit Ulasan
                    </button>
                </form>
            </section>
        </div>
        <!-- Footer Section -->
        <footer class="bg-black py-6 text-white">
            <div class="container mx-auto px-4">
                <div
                    class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6"
                >
                    <!-- Footer Column 1 -->
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl font-bold">About Us</h3>
                        <p class="text-sm">
                            KafeLate is a cozy coffee shop that offers a wide
                            range of delicious coffee and beverages. Visit us to
                            experience the perfect coffee moment!
                        </p>
                    </div>

                    <!-- Footer Column 2 -->
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl font-bold">Contact</h3>
                        <p class="text-sm">Address: 123 Coffee Street, City</p>
                        <p class="text-sm">Phone: (123) 456-7890</p>
                        <p class="text-sm">Email: info@kafelate.com</p>
                    </div>

                    <!-- Footer Column 3 -->
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl font-bold">Opening Hours</h3>
                        <p class="text-sm">
                            Monday - Friday: 8:00 AM - 9:00 PM
                        </p>
                        <p class="text-sm">
                            Saturday - Sunday: 9:00 AM - 10:00 PM
                        </p>
                    </div>

                    <!-- Footer Column 4 -->
                    <div class="flex flex-col gap-2">
                        <h3 class="text-xl font-bold">Follow Us</h3>
                        <div class="flex gap-2">
                            <a href="#" class="text-sm hover:text-stone-500"
                                ><i class="fab fa-facebook-square"></i
                            ></a>
                            <a href="#" class="text-sm hover:text-stone-500"
                                ><i class="fab fa-twitter"></i
                            ></a>
                            <a href="#" class="text-sm hover:text-stone-500"
                                ><i class="fab fa-instagram"></i
                            ></a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>
