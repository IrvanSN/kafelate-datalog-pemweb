USE new_katalog_app;

CREATE DATABASE new_katalog_app;

INSERT INTO produk(id_produk, id_label, id_kategori, nama, deskripsi, status, stok, foto, harga)
  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?);

SELECT p.foto, p.id_produk, p.nama AS nama_produk, IFNULL(k.nama_kategori, 'Tidak Ada') AS nama_kategori, IFNULL(l.nama_label, 'Tidak Ada') AS nama_label, p.stok, p.status, p.harga
FROM produk p
LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
LEFT JOIN label l ON p.id_label = l.id_label;

SELECT p.foto, p.id_produk, p.nama AS nama_produk, IFNULL(k.nama_kategori, 'Tidak Ada') AS nama_kategori, IFNULL(l.nama_label, 'Tidak Ada') AS nama_label, p.stok, p.status, p.harga
FROM produk p
LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
LEFT JOIN label l ON p.id_label = l.id_label
WHERE id_produk=?;

SELECT p.foto, p.id_produk, p.nama AS nama_produk, IFNULL(k.nama_kategori, 'Tidak Ada') AS nama_kategori, IFNULL(l.nama_label, 'Tidak Ada') AS nama_label, p.stok, p.status, p.harga
FROM produk p
LEFT JOIN kategori k ON p.id_kategori = k.id_kategori
LEFT JOIN label l ON p.id_label = l.id_label
WHERE nama LIKE CONCAT('%', ?, '%');

SELECT * FROM produk;
SELECT * FROM produk WHERE nama LIKE CONCAT('%', ?, '%');

UPDATE produk
SET id_kategori=?, id_label=?, nama=?, deskripsi=?, status=?, stok=?, foto=?, harga=?
WHERE id_produk=?;

SELECT * FROM label;

SELECT * FROM review;

INSERT INTO review(nama, deskripsi)
VALUES
    ('Hernandez', 'Hidangan yang luar biasa, pelayanan ramah, dan suasana nyaman. Pengalaman makan yang sempurna!'),
    ('Chika', 'Kafe favorit untuk santai dan menikmati kopi lezat. Suasana tenang dan dekorasi menawan.'),
    ('Deo', 'Makan malam yang luar biasa, hidangan indah dan rasa yang tak terlupakan. Pelayanan cepat dan profesional.'),
    ('Fadel', 'Tempat sempurna untuk bekerja atau bertemu teman. Wi-Fi cepat, suasana tenang, dan menu yang beragam.'),
    ('Anggi', 'Pengalaman makan istimewa, hidangan unik dan segar. Tidak sabar untuk kembali ke sini!');


SELECT * FROM admin WHERE username=? AND password=?;

SELECT
  (SELECT COUNT(*) FROM admin) AS jumlah_admin,
  (SELECT COUNT(*) FROM kategori) AS jumlah_kategori,
  (SELECT COUNT(*) FROM label) AS jumlah_label,
  (SELECT COUNT(*) FROM produk) AS jumlah_produk,
  (SELECT COUNT(*) FROM review) AS jumlah_review;

SELECT * FROM kategori;

SELECT nama, harga, foto FROM produk WHERE id_label=?;