<?php
session_start();
include 'conectare.php';
include 'head2.php';
include 'continut.php';

?>

<form method="POST"  class="w3-center"action="change_img.php" enctype="multipart/form-data">
    <input type="file" name="imagine"><br><br>
    <input type="submit" class="  buton signin "name="Schimba_imaginea" value="Change">
    <?php

if (isset($_POST['Schimba_imaginea'])) {
    $id = $_SESSION['idUsers'];
    $target = "../imgprofil/" . basename($_FILES['imagine']['name']);
    $img = $_FILES['imagine']['name'];
    $sql = "UPDATE  users  SET  imagine='$img'  WHERE idUsers='$id' ";
    $result = mysqli_query($conn, $sql);
    $store = move_uploaded_file($_FILES['imagine']['tmp_name'], $target);
    if ($store) {

        header("Location:../login.php?info=imgschimbata");
        echo "<p style='color:red'> Imaginea sa incarcat cu succes</p>";
        die();
    } else {
        echo "<p style='color:red'> Imaginea nu sa incarcat cu succes</p>";
    }
} 

?>
<img src="" alt="">
</form>
