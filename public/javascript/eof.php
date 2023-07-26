<?php
$myfile = fopen("coba.txt", "r") or die("Unable to open file");
//Output One line untikl end-of-file
while(!feof($myfile)){
    echo fgets($myfile) . "<br>";
}
fclose($myfile);
?>