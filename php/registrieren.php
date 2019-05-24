<?php
$pdo = mysqli_connect("mars.iuk.hdm-stuttgart.de", "mg195", "oy1Ein5rei", "u-mg195");
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

if  (strpos($ma , "@") ==false) {
echo ("E-Mail falsch!");
die();
}

    $db = $pdo->prepare("INSERT INTO nutzer (Benutzername, Vorname, Nachname, Passwort, E-mail) 
                VALUES (:bn ,:vn, :nn, :hpw, :ma");

    $db->bindParam(":Benutzername",$bn);
    $db->bindParam(":Vorname",$vn);
    $db->bindParam(":Nachname",$nn);
    $db->bindParam(":Passwort",$hpw);
    $db->bindParam(":E-mail",$ma);


?>








