<?php
include 'conectare.php';
if (!empty($_POST['nume']) && !empty($_POST['prenume']) && !empty($_POST['username']) && !empty($_POST['email']) && !empty($_POST['parola']) && isset($_POST['nume']) && isset($_POST['prenume']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['parola'])) {
    $nume = $_POST['nume'];
    $prenume = $_POST['prenume'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $parola = $_POST['parola'];

    $parola_hashed = password_hash($parola, PASSWORD_DEFAULT);
    $sql = "SELECT username FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    $check = mysqli_num_rows($result);

    $sql1 = "SELECT email FROM users WHERE email='$email'";
    $result1 = mysqli_query($conn, $sql1);
    $check1 = mysqli_num_rows($result1);

    if ($check > 0) {
       
       header("Location: ../signup.php?info=exista");
        die();
    
    } else if($check1>0){
       header("Location: ../signup.php?info=existaemail");
        die();
    } else if($check == 0){
    
        $sql = "INSERT INTO users (nume ,prenume ,username,email,parola)  VALUES ('$nume','$prenume','$username','$email','$parola_hashed')";
        $result = mysqli_query($conn, $sql);
        header("Location: ../login.php?info=ok");
    
    }

} else {
  //  header("Location:../signup.php?info=eroare");
}




 
