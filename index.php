<?php
include 'includes/conectare.php';
session_start();

?>
<html>

<head>
    <?php include 'includes/head.php'; ?>
    <script src="javascript/main.js"></script>
</head>

<div class="continut">
    <div class="top">
        <a id=12 href="index.php"> <img href="index.php" id="logo" src="img/logo.png" alt="Logo"></a>
        <div class="lista">

            <ul>
                <li><a href="index.php">Acasa</a></li>
                <?php
                if (!isset($_SESSION['idUsers'])) {
                    echo ' <li><a href="signup.php">Inregistrati-va</a></li>';
                    echo '<li><a href="login.php">Autentificare</a></li>';
                } else { ?>
                    <div class="content">
                        <li><a href="login.php">Profil</a></li>
                        <div style="position: relative; display:inline">
                            <div class="dropdown-content">
                                <li><a href="includes/profile_edit.php">Editeaza</a></li>
                                <li><a href="anunturi_user.php">Anunturi</a></li>
                            </div>
                        </div>
                    </div>
                <?php
                    echo '<li><a href="desprenoi.php">Despre noi </a></li>';
                    echo '<li><a href="contact.php">Contact</a></li>';
                    $id4 = $_SESSION['idUsers'];
                    $sql = "SELECT rol FROM users where idUsers='$id4'";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();
                    if ($row['rol'] == '1')
                        echo '<li><a href="admin.php">Admin</a></li>';
                }

                ?>
            </ul>
        </div>
        <div class="user_profil">
            <div class="custom">
                <?php
                if (isset($_SESSION['idUsers'])) {
                    $id = $_SESSION['idUsers'];
                    $sql = "SELECT * FROM users WHERE idUsers='$id' ";
                    $result = mysqli_query($conn, $sql);
                    $row = $result->fetch_assoc();
                ?>
                    <img id='img_user_profile' src="imgprofil/<?php echo $row['imagine'] ?>" alt="">

                    <button class="user_profile_buton" name='user_profil_ancora'><a href="profile_show.php">
                            <p id="ceva"> <?php echo $row['username'] ?> </p>
                        </a></button>
                <?php

                }
                ?>
            </div>
        </div>

    </div>

</div>

<?php


if (!isset($_SESSION['idUsers']) && isset($_POST['submit'])) {
?><div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'" class="w3-button  w3-large w3-display-topright">&times;</span>

        <p class="w3-center">Ca sa poti adauga un anunt treb sa dai login!</p>
    </div>
<?php
    echo '   <form method="POST" action="login.php" class="submit" >
        <input class="  buton" type="submit" name="submit" value="Autentifica-te"><br>
    </form>';

    $sql = "SELECT * FROM anunt ";
    $result = mysqli_query($conn, $sql);
}
?>
<form method="POST" action="index.php" class="submit">
    <input class="  buton" type="submit" name="submit" value="+ adaugare anunt"><br>
</form>

<?php
if(isset($_POST['submit']))
include 'includes/adaugare_anunt.php';
if (  !isset($_POST['submit'])) {
    include 'includes/cautarehtml.php';
    include 'includes/afisare_anunturi.php';
}

?>