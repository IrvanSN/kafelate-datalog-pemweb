<?php
$myfile = fopen("coba.txt", "r") or die("Unable to open file");

while(!feof($myfile)){
    echo fgetc($myfile);
}
fclose($myfile);
?>