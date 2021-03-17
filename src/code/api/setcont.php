<?php

$film = $_GET['film'];
$cont = $_GET['cont'];

$myfile = fopen("../../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../../data/saved/info.json")), true);
fclose($myfile);

if (! in_array($film, $films['films']))
{
    die("not in array");
}

$films['progress'][$film] = (int)$cont;

$fj = json_encode($films);

$myfile = fopen("../../data/saved/info.json", "w") or die("Unable to open file!");
fwrite($myfile, $fj);
fclose($myfile);

?>