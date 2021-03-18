<?php

$file = $_GET['file'];

$myfile = fopen("../../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../../data/saved/info.json")), true);
fclose($myfile);

if (! in_array($file, $films['films']))
{
    die("not in array");
}

?>