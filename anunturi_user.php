<?php
session_start();
include 'includes/conectare.php';
include 'includes/head.php';
include 'includes/continut2.php';
include 'An1.php';
include "select/select_anunturi.php";
if (isset($_POST['click_anunt'])) {
    $d = $_SESSION['idUsers'];
    $c = $_POST['click_anunt']; ?>
    <?php
    $sql = "SELECT * FROM anunt WHERE idUsers='$d'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if (!$row) {
        echo "<center><p style='background-color:red;font-size:larger ;width:950px;color:white;'>Nu aveti nici un anunt!!!</p></center>";
        if (isset($_POST['submit'])) {
            include 'includes/adaugare_anunt.php';
        } else if (!isset($_POST['submit'])) {
            echo '   <form method="POST" action="index.php" class="submit" >
            <input class="  buton" type="submit" name="submit" value="+ adaugare anunt"><br>
        </form>';
        }
    } else  if (!isset($_GET['id'])) {

        $sql = "SELECT * FROM anunt WHERE titlu='$c'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        
       /* $sql = "SELECT * FROM anunt WHERE titlu='$c'";
        $titlu3=$row['titlu'];
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        $img1=$row['imagine']; 
        $tel1=$row['telefon'];
        $cat1=$row['categorie'];
        $comp1=$row['compartimentare'];
        $pret1=$roe['pret'];
        $sup1=$row['suprafata'];
        $et1=$row['etaj'];
        $an1= $row['an_constructie'];
        $desc1=$row['descriere'];
        $sql="SELECT * FROM anunt WHERE pret='$pret1' AND telefon='$tel1' AND "*/ ?>
        <form class=" profile_edit signin" action="" method="POST">

            <p>Titlu</p>

            <input type="text" name="titlu" value="<?php echo $row['titlu']; ?>">

            <input class="buton" type="submit" name="submit_1" value="Change"><br>

            <p>Imagine</p>
            <div style="position: relative;">
                <img style="" id="blah" class="  imagini_anunt" src="img/<?php echo $row['imagine']; ?>">

                <input style="width:300px" class="adaugare_anunt_buton_imagine" type="file" name="imagine" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">


                <input class="buton" type="submit" name="submit_2" value="Change"><br>
            </div>
            <p>Telefon</p>

            <input type="number" name="telefon" value="<?php echo $row['telefon']; ?>">

            <input class="buton" type="submit" name="submit_3" value="Change"><br>

            <p>Categorie</p>
            <label for="camere" name="categorie"></label>
            <select style="width:300px" id="camere" name="categorie">
                <option value="2 camere">2 camere</option>
                <option value="3 camere">3 camere</option>
                <option value="4 camere">4 camere</option>
                <option value="5 camere">5 camere</option>
            </select>

            <input class="buton" type="submit" name="submit_4" value="Change"><br>

            <p>Compartimentare</p>
            <label for="compartimentare" name="compartimentare" value="<?php echo $row['compartimentare']; ?>"></label><br>
            <select style="width: 300px;;" id="compartimentare" name="compartimentare" value="<?php echo $row['compartimentare']; ?>">
                <option value="decomandat">Decomandat</option>
                <option value="semidecomandat">Semidecomandat</option>
                <option value="nedecomandat">Nedecomandat</option>
                <option value="circular">Circular</option>
            </select>
            <input class="buton" type="submit" name="submit_5" value="Change"><br>

            <p>Pret (lei)</p>

            <input type="number" name="pret" value="<?php echo $row['pret']; ?>">
            <input class="buton" type="submit" name="submit_6" value="Change"><br>
            <p>Suprafata utila (m<sup>2</sup>)</p>
            <input type="number" name="suprafata" value="<?php echo $row['suprafata']; ?>">
            <input class="buton" type="submit" name="submit_7" value="Change"><br>
            <p>Etaj</p>
            <input type="number" name="etaj" value="<?php echo $row['etaj']; ?>">
            <input class="buton" type="submit" name="submit_8" value="Change"><br>
            <p>An Constructie</p>
            <input type="number" name="anconstructie" value="<?php echo $row['an_constructie']; ?>">
            <input class="buton" type="submit" name="submit_9" value="Change"><br>
            <p>Descrie anuntul</p>
            <input type="text" name="descriere" value="<?php echo $row['descriere']; ?>">
            <input class="buton" type="submit" name="submit_10" value="Change"><br>




            <input class="buton" type="submit" name="submit__" value="Change All"><br>

        </form>
    <?php
          

    }
} else if (isset($_GET['id'])) {

    $x = $_GET['id'];

    $sql = "SELECT * FROM anunt WHERE idUsers='$x'";

    $result = mysqli_query($conn, $sql);

    $row = $result->fetch_assoc();

    ?>
    <form class=" profile_edit signin" action="" method="POST">

        <p>Titlu</p>

        <input type="text" name="titlu" value="<?php echo $row['titlu']; ?>">

        <input class="buton" type="submit" name="submit_1" value="Change"><br>

        <p>Imagine</p>
        <div style="position: relative;">
            <img style="" id="blah" class="  imagini_anunt" src="img/<?php echo $row['imagine']; ?>">

            <input style="width:300px" class="adaugare_anunt_buton_imagine" type="file" name="files[]" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">


            <input class="buton" type="submit" name="submit_2" value="Change"><br>
        </div>
        <p>Telefon</p>

        <input type="number" name="telefon" value="<?php echo $row['telefon']; ?>">

        <input class="buton" type="submit" name="submit_3" value="Change"><br>

        <p>Categorie</p>
        <label for="camere" name="categorie"></label>
        <select style="width:300px" id="camere" name="categorie">
            <option value="2 camere">2 camere</option>
            <option value="3 camere">3 camere</option>
            <option value="4 camere">4 camere</option>
            <option value="5 camere">5 camere</option>
        </select>

        <input class="buton" type="submit" name="submit_4" value="Change"><br>

        <p>Compartimentare</p>
        <label for="compartimentare" name="compartimentare"></label><br>
        <select style="width: 300px;;" id="compartimentare" name="compartimentare">
            <option value="decomandat">Decomandat</option>
            <option value="semidecomandat">Semidecomandat</option>
            <option value="nedecomandat">Nedecomandat</option>
            <option value="circular">Circular</option>
        </select>
        <input class="buton" type="submit" name="submit_5" value="Change"><br>

        <p>Pret (lei)</p>

        <input type="number" name="pret" value="<?php echo $row['pret']; ?>">
        <input class="buton" type="submit" name="submit_6" value="Change"><br>
        <p>Suprafata utila (m<sup>2</sup>)</p>
        <input type="number" name="suprafata" value="<?php echo $row['suprafata']; ?>">
        <input class="buton" type="submit" name="submit_7" value="Change"><br>
        <p>Etaj</p>
        <input type="number" name="etaj" value="<?php echo $row['etaj']; ?>">
        <input class="buton" type="submit" name="submit_8" value="Change"><br>
        <p>An Constructie</p>
        <input type="number" name="anconstructie" value="<?php echo $row['an_constructie']; ?>">
        <input class="buton" type="submit" name="submit_9" value="Change"><br>
        <p>Descrie anuntul</p>
        <input type="text" name="descriere" value="<?php echo $row['descriere']; ?>">
        <input class="buton" type="submit" name="submit_10" value="Change"><br>




        <input class="buton" type="submit" name="submit__" value="Change All"><br>
    <?php
    if (isset($_POST['tee'])) {
        $titlu_nou = $_POST['titlu'];
        $sql = "UPDATE anunt SET titlu='$titlu_nou' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['imagine'])) {
        $img = $_POST['imagine'];
        $sql = "UPDATE anunt SET imagine='$img' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['telefon'])) {
        $tel = $_POST['telefon'];
        $sql = "UPDATE anunt SET telefon='$tel' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['categorie'])) {
        $cat = $_POST['categorie'];
        $sql = "UPDATE anunt SET categorie='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['compartimentare'])) {
        $cat = $_POST['compartimentare'];
        $sql = "UPDATE anunt SET compartimentare='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
        header("Location:anunturi_user.php");
    } else if (!empty($_POST['pret'])) {
        $cat = $_POST['pret'];
        $sql = "UPDATE anunt SET pret='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['suprafata'])) {
        $cat = $_POST['suprafata'];
        $sql = "UPDATE anunt SET suprafata='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['etaj'])) {
        $cat = $_POST['etaj'];
        $sql = "UPDATE anunt SET etaj='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['an_constructie'])) {
        $cat = $_POST['an_constructie'];
        $sql = "UPDATE anunt SET an_constructie='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (!empty($_POST['descriere'])) {
        $cat = $_POST['descriere'];
        $sql = "UPDATE anunt SET descriere='$cat' WHERE idUsers='$d'";
        mysqli_query($conn, $sql);
    } else if (isset($_POST['submit__'])) {
        $titlu_nou = $_POST['titlu'];
        $img = $_POST['imagine'];
        $tel = $_POST['telefon'];
        $cat = $_POST['categorie'];
        $comp = $_POST['compartimentare'];
        $pret = $_POST['pret'];
        $sup = $_POST['suprafata'];
        $et = $_POST['etaj'];
        $desc = $_POST['descriere'];
        $sql = "UPDATE anunt SET titlu='$titlu_nou',imagine='$img',telefon='$tel',categorie='$cat',compartimentare='$comp',pret='$pret',suprafata='$sup',etaj='$et',descriere='$desc' WHERE idUsers='$d'";
    }
}
include "select/select_anunturi.php";
if (isset($_POST['submit_1'])) {
    $titlu_nou = $_POST['titlu'];
    $sql = "UPDATE anunt SET titlu='$titlu_nou' WHERE idUsers='$d' AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_2'])) {
    $img = $_POST['imagine'];
    $sql = "UPDATE anunt SET imagine='$img' WHERE idUsers='$d' AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_3'])) {
    $tel = $_POST['telefon'];
    $sql = "UPDATE anunt SET telefon='$tel' WHERE idUsers='$d' AND idI='$idA' ";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_4'])) {
    $cat = $_POST['categorie'];
    $sql = "UPDATE anunt SET categorie='$cat' WHERE idUsers='$d' AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_5'])) {
    $cat = $_POST['compartimentare'];
    $sql = "UPDATE anunt SET compartimentare='$cat' WHERE idUsers='$d' AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_6'])) {
    $cat = $_POST['pret'];
    $sql = "UPDATE anunt SET pret='$cat' WHERE idUsers='$d' AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_7'])) {
    $cat = $_POST['suprafata'];
    $sql = "UPDATE anunt SET suprafata='$cat' WHERE idUsers='$d'AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_8'])) {
    $cat = $_POST['etaj'];
    $sql = "UPDATE anunt SET etaj='$cat' WHERE idUsers='$d'AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_9'])) {
    $cat = $_POST['anconstructie'];
    $sql = "UPDATE anunt SET an_constructie='$cat' WHERE idUsers='$d'AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (!empty($_POST['submit_10'])) {
    $cat = $_POST['descriere'];
    $sql = "UPDATE anunt SET descriere='$cat' WHERE idUsers='$d'AND idI='$idA'";
    mysqli_query($conn, $sql);
    header("Location:anunturi_user.php");
} else if (isset($_POST['submit__'])) {
    $titlu_nou = $_POST['titlu'];
    $img = $_POST['imagine'];
    $tel = $_POST['telefon'];
    $cat = $_POST['categorie'];
    $comp = $_POST['compartimentare'];
    $pret = $_POST['pret'];
    $sup = $_POST['suprafata'];
    $et = $_POST['etaj'];
    $desc = $_POST['descriere'];
    $sql = "UPDATE anunt SET titlu='$titlu_nou',imagine='$img',telefon='$tel',categorie='$cat',compartimentare='$comp',pret='$pret',suprafata='$sup',etaj='$et',descriere='$desc' WHERE idUsers='$d' AND idI='$idA'";
    header("Location:anunturi_user.php");
}



    ?>
    </form>
    <?php
    include 'includes/footer.php'; ?>