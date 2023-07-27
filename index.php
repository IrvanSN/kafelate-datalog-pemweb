<?php
    $servername = "mysql.duakaryadigital.com";
    $username = "root";
    $password = "123hore";
    $dbname = "new_katalog_app";

    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
   
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM label;";

    $stmt = $conn->prepare($sql);

    $stmt->execute();
    $label = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<?php
function formatIDRCurrency($amount) {
    $formatted_amount = number_format($amount, 0, ',', '.');
    return 'Rp ' . $formatted_amount;
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>KafeLate</title>
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
                                    class="w-5 h-1 group-hover:w-7 transition-all duration-500 bg-stone-500 md:group-hover:bg-stone-500 rounded-full hidden md:block"
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
                                    class="nav-line w-2 h-1 group-hover:w-7 transition-all duration-500 bg-white md:group-hover:bg-stone-500 rounded-full hidden md:block"
                                ></div>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- NAVIGATION BAR END -->

        <div class="flex flex-col pt-16">
            <div class="flex flex-col p-16 relative">
                <div class="flex flex-col max-w-[500px]">
                    <h2
                        class="text-4xl md:text-5xl font-bold text-center md:text-left font-playfair"
                    >
                        Nikmati momen Anda bersama KafeLate.
                    </h2>
                </div>
                <div>
                    <p
                        class="text-center md:text-left text-lg mt-5 font-normal max-w-[600px]"
                    >
                        Kami memberikan jenis biji kopi terbaik yang telah
                        diseleksi secara ketat. Bijih kopi kami impor dari
                        negara Guatemala, Colombia, Costa Rica, The Arabian
                        Penisula, Ethiopia, dan Jamaica.
                    </p>
                </div>
                <div class="flex flex-col md:flex-row mt-10 gap-4">
                    <button
                        type="button"
                        class="text-white bg-secondary-700 transition duration-500 hover:bg-secondary-900 ease-out font-poppins rounded-md font-medium text-sm px-5 py-4 md:py-2 text-center md:mr-0"
                    >
                        Beli Sekarang
                    </button>
                    <button
                        type="button"
                        class="text-white border border-white font-poppins rounded-md font-medium text-sm px-4 py-4 md:py-2 text-center md:mr-0"
                    >
                        Reservasi
                    </button>
                </div>
            </div>
            <?php
            function splitIntoWordsIfMultiple($string) {
                $words = explode(' ', trim($string));
                $numWords = count($words);
                return ($numWords > 1) ? $words : [$string];
            }

            if (count($label) > 0) {
                $counter = 1;

                foreach ($label as $row_label) {
                    $split_words = splitIntoWordsIfMultiple($row_label['nama_label']);
            ?>
            <div class="flex flex-col p-16">
                <div class="text-3xl font-playfair font-bold text-center">
                    <?php
                    if (count($split_words) == 2) {
                        echo '<span class="text-secondary-300">' . $split_words[0] . '</span> ' . $split_words[1];
                    } else {
                        echo '<span class="text-secondary-300">' . $split_words[0] . '</span>';
                    }
                    ?>
                </div>

                <div class="flex mt-5 gap-2 justify-center items-center">
                    <button
                        id="scrollLeftBtn-<?php echo $counter ?>"
                        class="p-4 w-fit h-fit rounded-full bg-secondary-300 text-white font-bold hidden md:block"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.75 19.5L8.25 12l7.5-7.5"
                            />
                        </svg>
                    </button>
                    <div
                        id="choice-<?php echo $counter ?>"
                        class="flex flex-wrap md:flex-nowrap w-full whitespace-nowrap md:flex-row mt-5 gap-5 items-center flex-no-wrap overflow-hidden scrolling-touch"
                    >
                    <?php
                    $sql = "SELECT nama, harga, foto FROM produk WHERE id_label=?;";

                    $stmt = $conn->prepare($sql);
                    $stmt->bindValue(1, $row_label['id_label'] , PDO::PARAM_STR);
                    $stmt->execute();
                    $produk = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    ?>
                        <?php
                        if (count($produk) > 0) {
                            $counter_produk = 1;

                            foreach ($produk as $row_produk) {
                        ?>
                        <div class="shadow bg-black card-<?php echo $counter ?>">
                            <div class="md:w-64 md:h-64 bg-gray-500">
                                <img
                                    class="object-cover w-full h-full aspect-square"
                                    src="/public/uploads/<?php echo $row_produk['foto'] ?>"
                                    alt=""
                                />
                            </div>
                            <div class="p-4">
                                <h5
                                    class="text-xl font-playfair font-bold tracking-tight text-white"
                                >
                                    <?php echo $row_produk['nama'] ?>
                                </h5>
                                <p
                                    class="mt-2 text-lg font-bold text-secondary-400"
                                >
                                    
                                    <?php echo formatIDRCurrency($row_produk['harga']); ?>
                                </p>
                            </div>
                        </div>
                        <?php
                                $counter_produk++;
                            }
                        } else {
                            echo "<tr><td colspan='9' class='py-4 px-6 text-sm font-medium text-gray-800 whitespace-nowrap' style='font-size: 18px'>No data available.</td></tr>";
                        }
                        ?>
                    </div>
                    <button
                        id="scrollRightBtn-<?php echo $counter ?>"
                        class="p-4 w-fit h-fit rounded-full bg-secondary-300 text-white font-bold hidden md:block"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            class="w-6 h-6"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M8.25 4.5l7.5 7.5-7.5 7.5"
                            />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="select-<?php echo $counter; ?>">
            </div>
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    const cardsContainer = document.getElementById('choice-<?php echo $counter ?>');
                    const cards = document.querySelectorAll('.card-<?php echo $counter ?>');
                    const cardWidth = cards[0].offsetWidth;
                    const gap = 20;

                    let scrollLeft = cardWidth + gap;

                    document
                        .getElementById('scrollLeftBtn-<?php echo $counter ?>')
                        .addEventListener('click', () => {
                            scrollLeft -= cardWidth + gap;
                            cardsContainer.scrollTo({
                                left: scrollLeft,
                                behavior: 'smooth',
                            });
                        });

                    document
                        .getElementById('scrollRightBtn-<?php echo $counter ?>')
                        .addEventListener('click', () => {
                            scrollLeft += cardWidth + gap;
                            cardsContainer.scrollTo({
                                left: scrollLeft,
                                behavior: 'smooth',
                            });
                        });
                });
            </script>

            <?php
                    $counter++;
                }
            } else {
                echo "No data available.";
            }
            ?>
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
    <script>
        document.getElementById('select-1').innerHTML = `
        <div class="flex flex-col p-16 px-4 md:px-16">
            <div class="text-3xl font-playfair font-bold text-center">
                Butuh Makanan
                <span class="text-secondary-300">Unik</span>?
            </div>
            <div class="flex flex-col md:flex-row mt-5 bg-black">
                <div
                    class="flex p-8 md:w-1/3 items-center text-center md:text-left"
                >
                    <h5
                        class="text-2xl md:text-3xl font-playfair font-bold"
                    >
                        Hadiri acara spesialmu dengan
                        <span class="text-secondary-400">Sandwich Truffle</span>!
                    </h5>
                </div>
                <div class="md:w-1/3">
                    <img
                        class="object-cover w-full h-full"
                        src="/public/assets/images/sandwich-truffle.jpg"
                        alt=""
                    />
                </div>
                <div
                    class="flex md:w-1/3 p-8 flex-col gap-2.5 justify-center"
                >
                    <p class="font-poppins">
                        Mari merayakan momen istimewa dengan Sandwich Truffle yang lezat dan mewah! Undang teman-temanmu untuk menikmati kelezatan Sandwich Truffle dalam promo spesial beli 2 dapat 1!
                    </p>
                    <button
                        type="button"
                        class="mt-5 text-white md:w-fit bg-secondary-700 transition duration-500 hover:bg-secondary-900 ease-out font-poppins rounded-md font-medium text-sm px-4 py-2 text-center"
                    >
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
        `

        document.getElementById('select-2').innerHTML = `
        <div class="flex flex-col p-16 px-4 md:px-16">
            <div class="text-3xl font-playfair font-bold text-center">
                Mau mencicipi
                <span class="text-secondary-300">sensasi baru</span>?
            </div>
            <div class="flex flex-col md:flex-row mt-5 bg-black">
                <div
                    class="flex p-8 md:w-1/3 items-center text-center md:text-left"
                >
                    <h5
                        class="text-2xl md:text-3xl font-playfair font-bold"
                    >
                        Mari bergabunglah dalam petualangan rasa dengan
                        <span class="text-secondary-400">Nuggets Terbaru</span> kami yang tak terlupakan!
                    </h5>
                </div>
                <div class="md:w-1/3">
                    <img
                        class="object-cover w-full h-full"
                        src="/public/assets/images/nuggets.jpg"
                        alt=""
                    />
                </div>
                <div
                    class="flex md:w-1/3 p-8 flex-col gap-2.5 justify-center"
                >
                    <p class="font-poppins">
                    Ciptakan momen bahagia dan nikmati makanan ringan yang dijamin akan memanjakan lidahmu. Setiap gigitan akan membawa sensasi baru yang menggugah selera, membuatmu ingin mencoba lagi dan lagi.
                    </p>
                    <button
                        type="button"
                        class="mt-5 text-white md:w-fit bg-secondary-700 transition duration-500 hover:bg-secondary-900 ease-out font-poppins rounded-md font-medium text-sm px-4 py-2 text-center"
                    >
                        Beli Sekarang
                    </button>
                </div>
            </div>
        </div>
        `
    </script>
</html>
