<?php

$products = $_POST['products'];
$email = $_POST['email'];
$user = 'octicos';
$password = 'KiLuGiLu1';
$database = 'octicos';
error_reporting(E_ALL);

$mysqli = mysqli_connect("mysql.cba.pl", $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Blad polaczenia";
}

$query = "UPDATE Uzytkownicy SET listaZakupow = '" . $products . "' WHERE user LIKE '" . $email . "'";
$result = mysqli_query($mysqli, $query);
if(!$result){
    echo "UPDATE ERROR";
} else {
    echo "UPDATED SUCCESSFULLY";
}