<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "inchirieri";


$conn =  @ mysqli_connect($servername, $username, $password, $database);

if (!$conn) {
    die("Conexiune nereusita: " . mysqli_connect_error());
}
?>