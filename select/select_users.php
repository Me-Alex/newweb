<?php

$id = $_SESSION['idUsers'];
$sql = "SELECT * FROM users  WHERE idUsers ='$id'";
$result = mysqli_query($conn, $sql);
$row = $result->fetch_assoc();
$id3 = $row['idUsers'];
$user = $row['username'];
$name = $row['nume'];
$prenume = $row['prenume'];
$email = $row['email'];
$img = $row['imagine'];
