<?php
$myfile = fopen("coba.txt", "r") or die("Unable to read file!");
echo fgets($myfile);
fclose($myfile);
?>