<?php
    //Membuat File
    date_default_timezone_set("Asia/Jakarta");
    $namafile = "testfile.txt";
    $openfile = fopen($namafile, 'w') or die("Gagal membuat file");
    $text = "Pesan Baru dengan tanggal" .date('d/m/YH:i:s');
    fwrite($openfile,$text) or die("Gagal menulis");
    fclose($openfile);
    echo "Nama 1:Aldi Taher";
    echo "<br/><br/>";
    //Membuka File
    $openfile = fopen($namafile, "r") or die("Gagal membuka file");
    $line = fgets($openfile);
    fclose($openfile);
    echo "Nama 1: Rafi Ahmad";
?>