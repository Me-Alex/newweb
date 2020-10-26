<?php
session_start();
require('conectare.php');

if (isset($_POST['username']) && isset($_POST['parola']) && !empty($_POST['username']) && !empty($_POST['parola'])) {
    $username = $_POST['username'];
    $parola = $_POST['parola'];
    $nume = $_POST['nume'];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
    $hash = $row['parola'];

    $check = password_verify($parola, $hash);
    if ($check == 0) {
        header("Location: ../login.php?info=ceva");
        die();
    } else {
        $sql = "SELECT * FROM users WHERE username='$username' AND parola='$hash'";
        $result = mysqli_query($conn, $sql);

        if (!$row = $result->fetch_assoc()) {
            echo '<p style="text-align:center; color:red; font-size:20px;">parola si usernameul nu se potrivesc</p>';
        } else {

            $_SESSION['idUsers'] = $row['idUsers'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['nume'] = $row['nume'];
            $_SESSION['prenume'] = $row['prenume'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['parola'] = $row['parola'];
            $_SESSION['imagine'] = $row['imagine'];
        }
        header("Location: ../login.php");
    }
} else {
    header("Location:../login.php?info=eroare");
}
