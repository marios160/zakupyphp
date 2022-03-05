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

$query = "SELECT idPolaczenia FROM Uzytkownicy WHERE user LIKE '" . $email . "'";

if ($result = mysqli_query($mysqli, $query)) {

    $wiersz = mysqli_fetch_array($result);
    $id = $wiersz['idPolaczenia'];
    if ($id!=0) {
        $query = "SELECT user FROM Uzytkownicy WHERE id LIKE '" . $id . "'";

        if ($result = mysqli_query($mysqli, $query)) {

            $wiersz = mysqli_fetch_array($result);
            $user = $wiersz['user'];


            echo "polacz1" . $user . "polacz2";
        }
    }
}

