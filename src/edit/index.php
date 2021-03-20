<?php

$myfile = fopen("../data/saved/info.json", "r") or die("Unable to open file!");
$films = json_decode(fread($myfile,filesize("../data/saved/info.json")), true);
fclose($myfile);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Edit files</title>

    <script src='../code/js/console.js'></script>

    <link rel="stylesheet" href="../code/css/main.css">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="../favicon.ico" type="image/x-icon">
    <link rel="icon" href="../favicon.ico" type="image/x-icon">
</head>
<body>
    <h1>Edit files</h1>

    <div class='Line'>
        <h2><a href='../'>Home</a></h2>
    </div>

    <h3>Currently you have to delete films manually</h3>

    <table>
        <?php

        foreach ($films['films'] as $film)
        {
            echo "<tr><th><h3>$film</h3></th><th><button>Delete!</button></th></tr>";
        }

        ?>
    </table>
</body>
</html>