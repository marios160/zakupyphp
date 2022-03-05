<?php

$email = $_POST['email'];
$emailMoj = $_POST['emailMoj'];
$user = 'octicos';
$password = 'KiLuGiLu1';
$database = 'octicos';
error_reporting(E_ALL);

$mysqli = mysqli_connect("mysql.cba.pl", $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Blad polaczenia";
}

$query = "SELECT id FROM Uzytkownicy WHERE user LIKE '" . $email . "'";

if ($result = mysqli_query($mysqli, $query)) {
    $wiersz = mysqli_fetch_array($result);
    $id = $wiersz['id'];
    $query = "SELECT id FROM Uzytkownicy WHERE user LIKE '" . $emailMoj . "'";

    if ($result = mysqli_query($mysqli, $query)) {
        $wiersz = mysqli_fetch_array($result);
        $idMoje = $wiersz['id'];

        $query = "UPDATE Uzytkownicy SET idPolaczenia = '' WHERE user LIKE '" . $email . "'";
        $result = mysqli_query($mysqli, $query);
        $query = "UPDATE Uzytkownicy SET idPolaczenia = '' WHERE user LIKE '" . $emailMoj . "'";
        $result = mysqli_query($mysqli, $query);
        
    }
}

