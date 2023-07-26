<?php
    date_default_timezone_set("Asia/Jakarta");
    $namafile = "cobatext.txt";
    $openfile = fopen($namafile,'w') or die("Gagal membuat file");

    $text = "Pesan baru dengan tanggal " .date('/d/m/YH:i:s');
    fwrite($openfile, $text) or die("gagal menulis");
    fclose($openfile);
    echo "Langkah 1 : Berhasil membuat file!";
    echo "<br/><br/>";

    //Membuka file
    $openfile = fopen($namafile, "r") or die("Gagal membuka file");
    $line = fgets($openfile);
    fclose($openfile);

    echo "Langkah 2 : Berhasil Membuka file";
    echo "<br/><br/>";
    //Membaca File
    $myfile = fopen("cobatext.txt", "r") or die("Unable to open file");
    echo fread($myfile, filesize("cobatext.txt"));
    echo "<br/><br/>";
    fclose($myfile);
    echo "Langkah 3 : Berhasil membaca file";
?>