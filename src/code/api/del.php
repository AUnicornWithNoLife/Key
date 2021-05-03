<?php

$file = $_GET['file'];

deleteFilm($file);

function deleteFilm($todo)
{
    $myfile = fopen("../../data/saved/info.json", "r") or die("Unable to open file!");
    $films = json_decode(fread($myfile,filesize("../../data/saved/info.json")), true);
    fclose($myfile);

    if (! in_array($todo, $films['films']))
    {
        die("not in array");
    }

    $art = $films['art'][$todo];
    $film = $films['files'][$todo];

    unlink("../../data/art/$art");
    unlink("../../data/films/$film");

    unset($films['art'][$todo]);
    unset($films['files'][$todo]);
    unset($films['progress'][$todo]);

    array_splice($films['films'], array_search($todo, $films['films'], true), 1);

    $myfile = fopen("../../data/saved/info.json", "w") or die("Unable to open file!");
    fwrite($myfile, json_encode($films));
    fclose($myfile);
}

?>