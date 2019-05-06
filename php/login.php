<?php
$pdo=new PDO('mysql:: host=mars.iuk.hdm-stuttgart.de; 
 dbname=gettobox_user_registrierung', 'mg195', 'oy1Ein5rei',
    array('charset'=>'utf8'));

if(isset($_GET['login'])) {
    $passwort = $_POST['pw1'];
    $benutzer = $_POST['benutzer'];
    $email = $_POST['email'];

    $statement = $pdo->prepare("SELECT * FROM gettobox_user_registrierung WHERE Mail = :Mail");
    $result = $statement->execute(array('Mail' => $email));
    $user = $statement->fetch();

    $statement = $pdo->prepare("SELECT * FROM gettobox_user_registrierung WHERE Benutzername = :Benutzername");
    $result = $statement->execute(array('Benutzername' => $benutzer));
    $user = $statement->fetch();

    if ($user !== false && password_verify($passwort, $user['Passwort'])) {
        $_SESSION['userid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }

}
echo 'Test'
?>

