<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $fname = $_POST['name'];

    echo "Uploading $fname<br>";

    $target_dir = "../data/art/";
    $target_file = $target_dir . basename($_FILES["poster"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the poster already exists.<br>";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["poster"]["size"] > 5000000) {
        echo "Sorry, the poster is too large.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        } else {
        if (move_uploaded_file($_FILES["poster"]["tmp_name"], $target_file)) {
            echo "The file poster has been uploaded.<br>";
        } else {
            echo "Sorry, there was an error uploading the poster.<br>";
        }
    }

    $target_dir = "../data/films/";
    $target_file = $target_dir . basename($_FILES["film"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, the film already exists.<br>";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        } else {
        if (move_uploaded_file($_FILES["film"]["tmp_name"], $target_file)) {
            echo "The file film has been uploaded.<br>";
        } else {
            echo "Sorry, there was an error uploading the film.<br>";
        }
    }

    $pt = basename($_FILES["poster"]["name"]);
    $ft = basename($_FILES["film"]["name"]);

    $myfile = fopen("../data/saved/info.json", "r") or die("Unable to open file!");
    $films = json_decode(fread($myfile,filesize("../data/saved/info.json")), true);
    fclose($myfile);

    array_push($films['films'], $fname);

    $films['progress'][$fname] = 0;
    $films['art'][$fname] = $pt;
    $films['files'][$fname] = $ft;

    $fj = json_encode($films);

    $myfile = fopen("../data/saved/info.json", "w") or die("Unable to open file!");
    fwrite($myfile, $fj);
    fclose($myfile);

    echo "Done<br><a href='../'>Home</a>";
}
else
{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Upload</title>

    <link rel="stylesheet" href="../code/css/main.css">
    <link rel="stylesheet" href="../code/css/form.css">

    <link rel="preconnect" href="https://fonts.gstatic.com"> 
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@700&display=swap" rel="stylesheet">
</head>
<body>
    <h1>Upload</h1>

    <div class='Line'>
        <h2><a href='../'>Home</a></h2>
    </div>

    <form action='./' method="POST" enctype="multipart/form-data">
        <p>Movie Name</p><input type='text' name='name'><br>
        <p>Poster</p><input type='file' name='poster'><br>
        <p>Film</p><input type='file' name='film'><br>
        <input type='submit' name='form'><br>
    </form>
</body>
</html>

<?php

}

?>