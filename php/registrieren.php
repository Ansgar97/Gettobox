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
$db = $pdo->prepare("INSERT INTO gettobox_user_registrierung (Benutzer, Passwort, E-mail) 
                VALUES (Benutzer, Passwort, E-mail");

$pw = $_POST['psw'];
$bn = $_POST['benutzer'];
$ma = $_POST['email'];


if (isset($_POST['registrieren'])) {
    $hashPassword = password_hash($pw,PASSWORD_DEFAULT);

    $db->bindParam(':Benutzer', $_POST["benutzer"]);
    $db->bindParam(':Passwort', $_POST["pw1"]);
    $db->bindParam(':E-mail', $_POST["email"]);
    if ($db->execute()) {
        echo "alles tight: " .$id=$pdo->lastInsertId();}
    else(strpos($ma , "@") !==false)
    {echo 'E-Mail falsch!';}
    elseif ($check = mssql_free_statement("SELECT benutzer from gettobox_user_registrierung WHERE benutzer = $bn"));
            {echo 'Benutzer existiert bereits';}
    else {echo 'Fehler bei der Registrierung'; die(); }



}

?>








