<?php

$myfile = fopen("./data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("./data/saved/info.json")), true);
fclose($myfile);

$cont = [];

foreach ($films['films'] as $film)
{
    if ($films['progress'][$film] >= 60)
    {
        array_push($cont, $film);
    }
}

sort($films['films']);
sort($cont);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Home | Key</title>

    <script src='code/js/console.js'></script>

    <link rel="stylesheet" href="./code/css/main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Home</h1>

    <div id="cont">
        <h2>Continue Watching</h2>

        <div class='Line'>
            <?php

            foreach ($cont as $film)
            {
                $jpg = $films['art'][$film];
                $pos = $films['progress'][$film];
                echo "<div><a href='./player?film=$film&con=1&pos=$pos'><img class='mart' src='./data/art/$jpg'></a></div>";
            }

            ?>
        </div>
    </div>

    <div id="library">
        <h2>Your Library</h2>

        <div class='Line'>
            <?php

            foreach ($films['films'] as $film)
            {
                $jpg = $films['art'][$film];
                echo "<div><a href='./player?film=$film'><img class='mart' src='./data/art/$jpg'></a></div>";
            }

            ?>
        </div>
    </div>

    <br><br>

    <div class='Line'>
        <a href='./upload/'>Upload</a>
        <a href='./about.html'>About</a>
    </div>
</body>
</html>