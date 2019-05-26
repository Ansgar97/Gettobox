<?php
$pdo = mysqli_connect("mars.iuk.hdm-stuttgart.de", "mg195", "oy1Ein5rei", "u-mg195");
session_start();




?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Getto Box   Dein Dashboard</h1>
<a>Upload von Dateien</a>
<a>Download von Dateien</a>
<h3>Deine Ordner</h3>

<?php
$alledateien = scandir('nutzer1'); //Ordner "files" auslesen

foreach ($alledateien as $datei) { // Ausgabeschleife
    echo $datei."<br />"; //Ausgabe Einzeldatei
};

?>



</body>
</html>