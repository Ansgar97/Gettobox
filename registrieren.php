<?php
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; 
 dbname=gettobox_user_registrierung', 'mg195', 'oy1Ein5rei',
    array('charset'=>'utf8'));
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registrierung läuft</title>
</head>

<?php
$statement = $pdo->prepare("INSERT INTO gettobox_user_registrierung (E-mail, Benutzername, Passwort) 
                VALUES (:Benutzer, :Password), :E-mail");

$statement->bindParam(':E-mail', $_POST["E-mail"]);
$statement->bindParam(':Benutzername', $_POST["Benutzername"]);
$statement->bindParam(':Passwort', $_POST["Passwort"]);
if ($statement -> execute()) {
    echo "alles tight: ".$pdo -> lastInsertId();
} else {
    echo 'Du bist nicht Getto genug: ';
    echo $statement ->errorInfo();
    die();
}

?>

<body>

</body>
</html>






