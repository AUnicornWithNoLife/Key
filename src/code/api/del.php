<?php

$file = $_GET['file'];

$myfile = fopen("../../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../../data/saved/info.json")), true);
fclose($myfile);

if (! in_array($file, $films['films']))
{
    die("not in array");
}

$art = $films['art'][$file];
$film = $films['file'][$file];

unlink("../../data/art/$art");
unlink("../../data/films/$film");

unset($films['art'][$file]);
unset($films['file'][$file]);
unset($films['progress'][$file]);

$myfile = fopen("../../data/saved/info.json", "w") or die("Unable to open file!");
fwrite($myfile, $fj);
fclose($myfile);

?>