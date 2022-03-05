<?php

$email = $_GET['email'];
$user = 'octicos';
$password = 'KiLuGiLu1';
$database = 'octicos';
error_reporting(E_ALL);

$mysqli = mysqli_connect("mysql.cba.pl", $user, $password, $database);
if (mysqli_connect_errno()) {
    echo "Blad polaczenia";
}

$query = "SELECT * FROM Uzytkownicy WHERE user LIKE '" . $email . "'";

if ($result = mysqli_query($mysqli, $query)) {
	if ( mysqli_num_rows($result) > 0){
		echo "!true?";
	} else {
		echo "!false?";
	}
}

