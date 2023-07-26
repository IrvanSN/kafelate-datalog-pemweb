USE new_katalog_app;

CREATE TABLE `admin` (
  `id_admin` int NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id_admin`)
);

INSERT INTO `admin` (`id_admin`, `username`, `password`) VALUES
(1,	'iniadmin',	'123hore'),
(2,	'nadief',	'1234hore'),
(3,	'fani',	'12345hore');

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
);

INSERT INTO `kategori` (`nama_kategori`) VALUES
('Appetizer'),
('Main Course'),
('Side Dishes'),
('Dessert'),
('Beverages'),
('Specials'),
('Kids Menu'),
('Vegetarian');

CREATE TABLE `label` (
  `id_label` int NOT NULL AUTO_INCREMENT,
  `nama_label` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_label`)
);

INSERT INTO `label` (`id_label`, `nama_label`) VALUES
(1,	'Terlaris'),
(2,	'Rekomendasi'),
(3,	'Paket Hemat');

CREATE TABLE `produk` (
  `id_produk` int NOT NULL AUTO_INCREMENT,
  `id_kategori` int DEFAULT NULL,
  `id_label` int DEFAULT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `stok` int DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `harga` decimal(10,0) DEFAULT NULL,
  PRIMARY KEY (`id_produk`),
  FOREIGN KEY (`id_kategori`) REFERENCES kategori(id_kategori),
  FOREIGN KEY (`id_label`) REFERENCES label(id_label)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `produk` (`id_kategori`, `id_label`, `nama`, `deskripsi`, `status`, `stok`, `foto`, `harga`) VALUES
(1, 1, 'Bruschetta', 'Roti panggang dengan topping tomat segar dan basil', 1, 50, 'bruschetta.jpg', 50000),
(1, 1, 'Garlic Bread', 'Roti panggang dengan bawang putih dan mentega', 1, 30, 'garlic_bread.jpg', 30000),
(1, 1, 'Chicken Wings', 'Sayap ayam panggang dengan saus BBQ', 1, 20, 'chicken_wings.jpg', 60000),
(1, 1, 'Fruit Salad', 'Salad buah segar dengan mayones dan madu', 1, 40, 'fruit_salad.jpg', 40000),
(1, 1, 'Cheese Sticks', 'Stik keju yang renyah dan lezat', 1, 35, 'cheese_sticks.jpg', 45000),

(2, 1, 'Steak', 'Steak daging sapi premium dengan saus istimewa', 1, 20, 'steak.jpg', 150000),
(2, 2, 'Grilled Chicken', 'Ayam panggang dengan rempah-rempah', 1, 15, 'grilled_chicken.jpg', 85000),
(2, 3, 'Pasta Carbonara', 'Pasta creamy dengan saus carbonara spesial', 1, 25, 'pasta_carbonara.jpg', 80000),
(2, 1, 'Seafood Platter', 'Hidangan laut segar dengan saus istimewa', 1, 10, 'seafood_platter.jpg', 130000),
(2, 2, 'Vegetable Stir Fry', 'Sayuran tumis dengan saus tiram', 1, 30, 'vegetable_stir_fry.jpg', 70000),

(3, 1, 'French Fries', 'Kentang goreng renyah dengan saus sambal', 1, 100, 'french_fries.jpg', 30000),
(3, 2, 'Mashed Potatoes', 'Kentang tumbuk dengan saus gravy', 1, 80, 'mashed_potatoes.jpg', 35000),
(3, 3, 'Coleslaw', 'Salad kubis dengan mayones', 1, 75, 'coleslaw.jpg', 20000),
(3, 1, 'Garlic Rice', 'Nasi goreng dengan bawang putih', 1, 60, 'garlic_rice.jpg', 40000),
(3, 2, 'Mixed Vegetables', 'Sayuran campur rebus', 1, 70, 'mixed_vegetables.jpg', 25000),

(4, 1, 'Ice Cream Vanilla', 'Es krim vanilla klasik dengan topping coklat', 1, 75, 'ice_cream_vanilla.jpg', 25000),
(4, 2, 'Fruit Pudding', 'Puding buah dengan sirup vanili', 1, 60, 'fruit_pudding.jpg', 30000),
(4, 3, 'Chocolate Cake', 'Kue coklat lembut dengan topping coklat', 1, 50, 'chocolate_cake.jpg', 40000),
(4, 1, 'Cheese Cake', 'Kue keju lembut dengan topping buah', 1, 45, 'cheese_cake.jpg', 45000),
(4, 2, 'Apple Pie', 'Pie apel hangat dengan es krim vanila', 1, 40, 'apple_pie.jpg', 50000),

(5, 1, 'Avocado Juice', 'Jus alpukat segar dengan sedikit susu dan madu', 1, 30, 'avocado_juice.jpg', 35000),
(5, 2, 'Iced Coffee', 'Kopi dingin dengan susu dan sirup caramel', 1, 25, 'iced_coffee.jpg', 30000),
(5, 3, 'Lemon Tea', 'Teh lemon segar dengan gula batu', 1, 35, 'lemon_tea.jpg', 25000),
(5, 1, 'Smoothie Berry', 'Smoothie buah berry segar', 1, 40, 'smoothie_berry.jpg', 40000),
(5, 2, 'Mineral Water', 'Air mineral segar', 1, 100, 'mineral_water.jpg', 10000);

INSERT INTO `produk` (`id_kategori`, `id_label`, `nama`, `deskripsi`, `status`, `stok`, `foto`, `harga`) VALUES
(5, 2, 'Espresso', 'Kopi hitam pekat dengan rasa yang kuat', 1, 50, 'espresso.jpg', 30000),
(5, 3, 'Cappuccino', 'Kopi dengan campuran susu panas dan busa susu', 1, 40, 'cappuccino.jpg', 35000),
(5, 1, 'Latte', 'Kopi dengan susu yang banyak, lebih ringan dari Cappuccino', 1, 45, 'latte.jpg', 35000),
(5, 1, 'Mocha', 'Kopi dengan campuran coklat dan susu, memiliki rasa manis', 1, 40, 'mocha.jpg', 40000),
(5, 2, 'Affogato', 'Es krim vanila yang dituangi espresso panas', 1, 30, 'affogato.jpg', 45000),
(5, 3, 'Americano', 'Espresso yang ditambah air panas, rasa lebih ringan dari espresso', 1, 50, 'americano.jpg', 30000),
(5, 1, 'Flat White', 'Kopi dengan campuran espresso dan susu panas, lebih ringan dari Cappuccino', 1, 40, 'flat_white.jpg', 35000);


CREATE TABLE `review` (
  `id_review` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_review`)
);

INSERT INTO `review` (`nama`, `deskripsi`) VALUES
('Amanda', 'Restorannya sangat nyaman dan makanannya lezat. Akan kembali lagi.'),
('Budi', 'Steak di sini adalah yang terbaik! Saya akan merekomendasikan kepada teman-teman saya.'),
('Cindy', 'Kopi di sini sungguh luar biasa, saya suka suasana di sini.'),
('Dedy', 'Saya mencoba menu vegan dan saya sangat puas. Bagus untuk memiliki opsi yang sehat.'),
('Eva', 'Pelayanannya sangat baik dan cepat, makanannya juga enak.'),
('Fahri', 'Restoran ini sangat bagus untuk makan malam romantis, saya sangat menikmati waktunya.'),
('Grace', 'Hidangan penutupnya luar biasa, pasti akan kembali untuk mencoba lebih banyak lagi.'),
('Hans', 'Tempat yang sempurna untuk hang out, cinta suasana dan musiknya.'),
('Irene', 'Saya suka menu anak-anaknya, anak saya sangat menikmati makan di sini.'),
('Jason', 'Harga makanannya sepadan dengan rasanya, saya akan kembali lagi.');