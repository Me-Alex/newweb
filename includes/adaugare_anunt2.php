<?php

// include 'conectare.php';
// /*if(!empty($_POST['titlu'])&&!empty($_POST['imagine'])&&!empty($_POST['descriere'])){*/
// if (isset($_POST['posteaza_anuntul'])) {
//     $GLOBALS['semafor']=false;
//     $target = "img/" . basename($_FILES['imagine']['name']);
//     $target1 = "img/" . basename($_FILES['imagine1']['name']);
//     $titlu = $_POST['titlu'];
//     $compart = $_POST['compartimentare'];
//     $pret = $_POST['pret'];
//     $sup = $_POST['suprafata'];
//     $et = $_POST['etaj'];
//     $an = $_POST['anconstructie'];
//     if (!isset($titlu)) {
//         echo "nu ai titlu in post";
//     }
//     $img = $_FILES['imagine']['name'];
//     $img1 = $_FILES['imagine1']['name'];
  
//     if (!isset($img)) {
//         echo "nu ai img in post";
//     }
//     $telefon = $_POST['telefon'];
//     if (!isset($telefon)) {
//         echo "nu ai telefon in post";
//     }
//     $categorie = $_POST['categorie'];
//     if (!isset($categorie)) {
//         echo "nu ai categorie in post";
//     }
//     $descriere = $_POST['descriere'];
//     if (!isset($descriere)) {
//         echo "nu ai descriere in post";
//     }
//     include 'select/select_users.php';
//     $user = $row['username'];
//     if (!isset($user)) {
//         echo "nu ai user in post";
//     }
//     $idU = $_SESSION['idUsers'];
//     if (!isset($idU)) {
//         echo "nu ai idu in post";
//     }
//     include './select/select_users.php';

//     $sql = "INSERT INTO anunt (idUsers,categorie,descriere,imagine,imagine1,telefon,compartimentare,pret,suprafata,etaj,an_constructie,titlu,user) VALUES ('$id','$categorie','$descriere','$img','$img1','$telefon','$compart','$pret','$sup','$et','$an','$titlu','$user')";
//     if ($sql!=NULL) {
//         echo "nu ai sql in post";
//     } else {
//         $mesaj="Nu sa incarcat anuntul";
//         header("Location:admin.php?faraanunt");
//         echo "<script type='text/javascript'>alert('$mesaj');</script>";
//     }
//     $result = mysqli_query($conn, $sql);
//     if ($result != NULL) {
//         $store = move_uploaded_file($_FILES['imagine']['tmp_name'], $target);
//         $GLOBALS['semafor']=true;
       
//     } else {
//         $mesaj="Nu sa incarcat anuntul";
//         $GLOBALS['semafor']=true;
//         header("Location:admin.php?faraanunt");
        
//     }
// }
// $i = 1;
// $j = 4;
// $myfile = fopen("pagina.php", "w") or die("Unable to open file!");
// fwrite($myfile, "<?php");
// fwrite($myfile, "\n");
// fwrite($myfile, "");
// if (!isset($_POST['posteaza_anuntul'])) {
//     $sql = "SELECT * FROM anunt";
//     $result = mysqli_query($conn, $sql);
//     while ($row = mysqli_fetch_array($result)) {
//         if ($i < $j) {
//             $titlu = $row['titlu'];
//             echo "<div class='ceva'>";
//             echo "<div class='afisare_titlu_img_descriere'>";
//             echo "<form method='POST' action='anunturi.php' >";
//             echo "<input type='submit' name='click_anunt'class='titlu' value='$titlu'>";
//             echo "</form>";
//             echo "<img class='imagine' src='img/" . $row['imagine'] . "'>";
//             echo "<p class='paragraful_anuntului'>" . $row['descriere'] . "</p>";

//             echo "</div>";
//             echo "</div>";
//         } else {
//             $ttt = $row['descriere'];
//             $titlu = $titlu;
//             $txt = "$ttt\n";
//             fwrite($myfile, $txt);

//             fwrite($myfile, $titlu);
//             fwrite($myfile, "\n");
//         }
//         $i++;
//     }
// }

/*}
  echo "<a  name='click_anunt'  class='titlu' href='anunturi.php'><p name='click_anunt' class='titlu'>" . $row['titlu'] . "</p></a>";
else
{
    echo"<p>trebuie sa completezi toate campurile</p>";
}

$myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
            $ttt=$row['descriere'];
            fwrite('newfile.txt',$ttt);*/
