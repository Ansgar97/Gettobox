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
<body>

</body>
</html>

<?php
$statement = $pdo->prepare("INSERT INTO gettobox_user_registrierung (Benutzer, Password, E-mail) 
                VALUES (:Benutzer, :Password), :E-mail");

$statement->bindParam(':Benutzer', $_POST["user"]);
$statement->bindParam(':Password', $_POST["pw1"]);
$statement->bindParam(':E-mail', $_POST["email"]);
if ($statement -> execute()) {
    echo "alles tight: ".$pdo -> lastInsertId();
} else {
    echo 'Du bist nicht Getto genug: ';
    echo $statement ->errorInfo();
    die();
}

?>








