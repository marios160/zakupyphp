<?php

$email = $_POST['email'];
$user = 'octicos';
$password = 'KiLuGiLu1';
$database = 'octicos';
error_reporting(E_ALL);

$mysqli = mysqli_connect("mysql.cba.pl", $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Blad polaczenia";
}

$query = "SELECT listaZakupow FROM Uzytkownicy WHERE user LIKE '" . $email . "'";

if ($result = mysqli_query($mysqli, $query)) {

    $wiersz = mysqli_fetch_array($result);
    echo "*STARTLISTY*".$wiersz['listaZakupow']."*KONIECLISTY*";
}