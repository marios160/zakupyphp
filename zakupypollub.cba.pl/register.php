<?php

$email = $_POST['email'];
$haslo = $_POST['haslo'];
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Niepoprawny email";
    return;
}
$user = 'octicos';
$password = 'KiLuGiLu1';
$database = 'octicos';
error_reporting(E_ALL);

$mysqli = mysqli_connect("mysql.cba.pl", $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Blad polaczenia";
}

$query = "SELECT user, haslo FROM Uzytkownicy WHERE user LIKE '" . $email . "'";

if ($result = mysqli_query($mysqli, $query)) {
    if (mysqli_num_rows($result) < 1) {
        $query = "INSERT INTO Uzytkownicy (user,haslo) VALUES ('" . $email . "','".$haslo."');";
        if (mysqli_query($mysqli, $query)) {
            echo "Zarejestrowano";
        } else {
            echo "Rejestracja nieudana";
        }
    } else {
        $wiersz = mysqli_fetch_array($result);
        if ($haslo == $wiersz['haslo']) {
            echo "Zalogowano";
        } else {
            echo "Uzytkownik juz istnieje";
        }
    }
}
?>