<?php
session_start();
include '../includes/conectare.php';
$target = "img/" . basename($_FILES['imagine']['name']);
$target1 = "img/" . basename($_FILES['imagine1']['name']);
$titlu = $_POST['titlu'];
if (isset($titlu)) {
    $compart = $_POST['compartimentare'];

    $pret = $_POST['pret'];

    $sup = $_POST['suprafata'];

    $et = $_POST['etaj'];

    $an = $_POST['anconstructie'];


    $img1 = $_FILES['imagine']['name'];

    $img2 = $_FILES['imagine1']['name'];



    if (isset($img1) && isset($img2)) {

        $telefon = $_POST['telefon'];
        if (isset($telefon)) {
            $categorie = $_POST['categorie'];

            if (isset($categorie)) {
                $descriere = $_POST['descriere'];

                if (isset($descriere)) {





                    $idU = $_SESSION['idUsers'];
                    $sql = "SELECT * FROM users WHERE idUsers = .$idU";
                    $result = mysqli_query($conn, $sql);
                    $row=mysqli_fetch_assoc($result);
                    $user = $row['username'];


              

                    $sql = "INSERT INTO anunt (idUsers,categorie,descriere,imagine,imagine1,telefon,compartimentare,pret,suprafata,etaj,an_constructie,titlu,user) VALUES ('$idU','$categorie','$descriere','$img1','$img2','$telefon','$compart','$pret','$sup','$et','$an','$titlu','$user')";

                    $result = mysqli_query($conn, $sql);
                    if ($result)
                        echo "A mers";
                } else {
                    echo "nu ai descriere";
                }
            } else {
                echo "nu ai categorie";
            }
        } else {
            echo "nu ai telefon";
        }
    } else {
        echo "selectati imagini";
    }
}
