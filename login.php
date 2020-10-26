<?php
session_start();
include "includes/conectare.php";
?>
<html>


<head>
    <?php include 'includes/head.php'; ?>
</head>


<body>

    <div class="continut ">
        <div class="top">
            <a id=12 href="index.php"> <img href="index.php" id="logo" src="img/logo.png" alt="Logo"></a>

            <div class="lista">
                <ul>
                    <li><a href="index.php">Acasa</a></li>
                    <?php
                    if (!isset($_SESSION['idUsers'])) { ?>

                        <li><a href="signup.php">Inregistrati-va</a></li>
                        <li><a href="login.php">Autentificare</a></li>
                    <?php } else { ?>
                        <div class="content">
                            <li><a href="login.php">Profil</a></li>
                            <div style="position: relative; display:inline">
                                <div class="dropdown-content">
                                    <li><a href="includes/profile_edit.php">Editeaza</a></li>
                                    <li><a href="anunturi_user.php">Anunturi</a></li>
                                </div>
                            </div>
                        </div>
                        <li><a href="desprenoi.php">Despre noi</a></li>
                        <li><a href="contact.php">Contact</a></li>
                        <?php
                          $id4 = $_SESSION['idUsers'];
                          $sql = "SELECT rol FROM users where idUsers='$id4'";
                          $result = mysqli_query($conn, $sql);
                          $row = $result->fetch_assoc();
                          if ($row['rol'] == '1')
                              echo '<li><a href="admin.php">Admin</a></li>';?>
                       
                    <?php } ?>




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
                        /*  echo'<img class="imgprofil"src="imgprofil/'.$row['imagine'].'">';*/
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

    <center>
        <diV class=" ">
            <?php
            if (!isset($_SESSION['idUsers'])) {
                echo '  <div class="login">
                        <h1 ">Bine ai revenit!</h1>
                        <form method="POST" action="includes/logininc.php">
                            <input type="text" name="username" placeholder="username"><br>
                            <input type="password" name="parola" placeholder="Parola"><br>
                            <input class="buton" type="submit" name="buton_login"value="login">
                        </form>
                     </div>';
                if (isset($_POST['buton_login']) && !empty($_POST['username']) && !empty($_POST['parola'])) {
                    header("Location: ../login.php");
                }
            } else {
                include 'includes/profile_show.php';
            } ?>
        </diV>
    </center>
    <?php
    if (isset($_GET['info']) && $_GET['info'] == 'ok') {
        echo '<p style="text-align:center; color:green; font-size:20px;">Contul a fost creat cu succes!</p>';
        echo '<p style="text-align:center; color:green; font-size:20px;">Acum introduce-ti numele de utilizator si parola';
    } else  if (isset($_GET['info']) && $_GET['info'] == 'ceva') {
        echo '<p style="text-align:center; color:green; font-size:20px;">Parola sau username gresit</p>';
    } else if (isset($_GET['info']) && $_GET['info'] == 'eroare') {
        echo '<p style="text-align:center; color:red; font-size:20px;">Completati toate campurile!</p>';
    } elseif (isset($_GET['info']) && $_GET['info'] == 'imgschimbata') {
        echo '<p style="color:red;">Imaginea a fost schimbata </p>';
    }
    ?>

    <div class=" footer">
        <?php include 'includes/footer.php'; ?>
    </div>
</body>

</html>