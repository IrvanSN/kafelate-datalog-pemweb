<?php
    //append php
    date_default_timezone_set("Asia/Jakarta");
    $namafile = "newfile.txt";
    $openfile = fopen($namafile, 'a') or die("Gagal membuat file");
    //Ganti string variabel text
    $text = "Fakultas Teknologi Informasi dan Bisnis " .date('d/m/Y H:i:s');
    fwrite($openfile,$text) or die("Gagal menulis");
    fclose($openfile);
    echo "Informatika";
    echo "<br/><br/>";
?>