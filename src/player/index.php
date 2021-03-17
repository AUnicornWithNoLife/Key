<?php

$myfile = fopen("../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../data/saved/info.json")), true);
fclose($myfile);

$film = $_GET['film'];

$confrom = 0;

if ($_GET['con'] == '1')
{
    $confrom = (int) $_GET['pos'];
}

$file = $films["files"][$film];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Key Player</title>

    <link rel="stylesheet" href="../code/css/main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <script>
        <?php
        
        echo "var pos = $confrom; ";
        echo "var film = '$film';";

        ?>
    </script>

    <script src='../code/js/setcont.js'></script>
    <script src='../code/js/console.js'></script>
</head>
<body>
    <h1><?php echo $film; ?></h1>

    <div class='Line'>
        <h2><a href='../'>Home</a></h2>
    </div>
    
    <video id='ptf' width="100%" height="75%" controls='true' src="<?php echo "../data/films/$file" ?>" type="video/mp4"></video>
</body>
</html>

<script src='../code/js/player.js'></script>