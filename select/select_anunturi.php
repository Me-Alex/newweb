<?php
include 'includes/conectare.php';
if (isset($_SESSION['idUsers'])){
    $id = $_SESSION['idUsers'];
$sql = "SELECT * FROM anunt WHERE idUsers='$id'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$idA = $row['idI'];
$user = $row['user'];
$titlu = $row['titlu'];
$descriere = $row['descriere'];
$tel = $row['telefon'];
$categorie = $row['categorie'];}
