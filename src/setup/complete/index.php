<?php

require realpath("../code/api/del.php");

$myfile = fopen("../../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../../data/saved/info.json")), true);
fclose($myfile);

foreach ($film as $films['films'])
{
    deleteFilm[$film];
}

?>