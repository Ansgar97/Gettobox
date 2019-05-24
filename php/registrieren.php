<?php
$pdo = mysqli_connect("mysql:: host=mars.iuk.hdm-stuttgart.de", "mg195", "oy1Ein5rei", "u-mg195");
session_start();

if($_POST["benutzername"]=='' OR$_POST["vorname"]=='' OR $_POST["nachname"]=='' OR $_POST["pw1"]== '' OR $_POST["email"]==''){
echo ("Füllen sie das Formular komplett aus!");
die();}


$bn = $_POST ["benutzername"];
$vn = $_POST["vorname"];
$nn = $_POST ["nachname"];
$ma = $_POST["email"];
$pw = $_POST["pw1"];
$hpw = password_hash($pw,PASSWORD_DEFAULT);
$cpw = $_POST ["pw2"];

if ($pw !== $cpw) {
    echo ("Passwörter stimmen nicht überein");
    die();
}

if  (strpos($ma , "@") !==false) {
echo ("E-Mail falsch!");
die();
}

    $db = $pdo->prepare("INSERT INTO gettobox_user_registrierung (Benutzername, Vorname, Nachname, Passwort, E-mail) 
                VALUES (:bn ,:vn, :nn, :hpw, :ma");

    $db->bindParam(":Benutzername", $_POST["benutzername"]);
    $db->bindParam(":Vorname", $_POST["vorname"]);
    $db->bindParam(":Nachname", $_POST["nachname"]);
    $db->bindParam(":Passwort", $_POST["hpw"]);
    $db->bindParam(":E-mail", $_POST["email"]);


?>








