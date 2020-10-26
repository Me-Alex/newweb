<?php
session_start();
include 'includes/conectare.php';
include 'includes/head.php'; ?>
<?php
if (isset($_GET['id'])) {

    $x = $_GET['id'];
    $sql = "DELETE FROM users WHERE idUsers=$x";
    $result = mysqli_query($conn, $sql);
    header("Location:admin.php");
}
if ($_SESSION['idUsers'] != 0) {
    $sesiunea = $_SESSION['idUsers'];
    $sql = "SELECT * FROM users WHERE idUsers=$sesiunea ";
}
if ($sql) {
    $result = mysqli_query($conn, $sql);
}
$row = $result->fetch_assoc();
if ($row['rol'] == 1) {
?>
    <div class="continut ">
        <div class="top">
            <a id=12 href="index.php"> <img href="index.php" id="logo" src="img/logo.png" alt="Logo"></a>

            <div class="lista">
                <ul>
                    <li><a href="index.php">Acasa</a></li>
                    <?php
                    if (!isset($_SESSION['idUsers'])) {
                        echo ' <li><a href="signup.php">Sign in</a></li>';
                        echo '<li><a href="login.php">Autentificare</a></li>';
                    } else { ?>
                        <div class="content">
                            <li><a href="login.php">Profil</a></li>
                            <div class="dropdown-content">
                                <li><a href="includes/profile_edit.php">Editeaza</a></li>
                                <li><a href="anunturi_user.php">Anunturi</a></li>
                            </div>
                        </div>
                    <?php echo '<li><a href="desprenoi.php">Despre noi</a></li>';
                        echo '<li><a href="contact.php">Contact</a></li>';
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



    <div class="w3-center">
        <button class=' buton buton_logout' name="users"><a style="text-decoration:none;" href="admin.php">Users</a></button>
        <button class=' buton buton_logout' name="anunturi"><a style="text-decoration:none;" href="admin_anunturi.php">Anunturi</a></button>
    </div>
    <?php

    ?>
    <br>
    <center>
        <div class="admin_background">

            <div class="cauta">
                <p>Cauta dupa</p>
                <form method="POST" action="admin.php">
                    <label for="cautar" name="cautare"></label>
                    <select id="cautar" name="cautare">
                        <option value="nume">nume</option>
                        <option value="prenume">prenume</option>
                        <option value="username">username</option>
                        <option value="email">email</option>
                    </select>
                    <input type="text" name="input">
                    <input class="buton buton_logout" type="submit" name="cauta1" value="cauta">
                </form>
            </div>

            <div class='afisare_users_adminTab'>
                <p>Nume</p>
                <p>Prenume</p>
                <p>User</p>
                <p>Email</p>

            </div>
            <?php

            $sql = "SELECT * FROM users ";
            $result = mysqli_query($conn, $sql);
            $vector = mysqli_num_rows($result);
            if (!isset($_GET['pagina']))
                header('Location:admin.php?pagina=1');
            if ($_GET['pagina'] < 1) {
                header('Location:admin.php?pagina=1');
            } else  if ($_GET['pagina'] > $vector) {
                header('Location:admin.php?pagina=' . $vector);
            }
            $nr_pagini = (int) $vector / 4 + 1;
            if (!isset($_POST['cauta1'])) {
                for ($i = 0; $i < $vector && $row = mysqli_fetch_array($result); $i++) {
                    if (($i + 4) / 4 == $_GET['pagina'])
                        for ($j = 1; $j <= 4; $j++) {

                            $nume = $row['nume'];
                            $prenume = $row['prenume'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $id_1 = $row['idUsers'];

            ?>

                        <div class="users">
                            <div id="usersbuttons">
                                <button class=" buton_logout"><a href="includes/profile_edit.php?id=<?php echo $id_1; ?>">Modifica</a></button>
                                <button class="  buton_logout"><a href="admin.php?id=<?php echo $id_1; ?>" name="sterge">Sterge </a></button>
                            </div>
                            <p><?php echo $nume ?></p>

                            <p><?php echo $prenume ?></p>

                            <p><?php echo $username ?></p>

                            <p><?php echo $email ?></p>

                        </div>
                        <?php
                            $row = mysqli_fetch_array($result);
                            if ($row == NULL)
                                break;
                            if ($j == 4) {
                                $nume = $row['nume'];
                                $prenume = $row['prenume'];
                                $username = $row['username'];
                                $email = $row['email'];
                                $id_1 = $row['idUsers'];
                        ?>

                            <div class="users">
                                <div id="usersbuttons">
                                    <button class=" buton_logout"><a href="includes/profile_edit.php?id=<?php echo $id_1; ?>">Modifica</a></button>
                                    <button class="  buton_logout"><a href="admin.php?id=<?php echo $id_1; ?>" name="sterge">Sterge </a></button>
                                </div>
                                <p><?php echo $nume ?></p>

                                <p><?php echo $prenume ?></p>

                                <p><?php echo $username ?></p>

                                <p><?php echo $email ?></p>

                            </div>
                    <?php
                            }
                        }
                }
            } else {


                $cauta = $_POST['cautare'];
                $de_cautat = $_POST['input'];
                $sql = "SELECT * FROM users WHERE $cauta='$de_cautat'";
                $result = mysqli_query($conn, $sql);


                while ($row = mysqli_fetch_array($result)) {
                    $nume = $row['nume'];
                    $prenume = $row['prenume'];
                    $username = $row['username'];
                    $email = $row['email'];
                    $id_1 = $row['idUsers'];
                    ?>

                    <div class="users">

                        <div id="usersbuttons">
                            <button class=" buton_logout"><a href="includes/profile_edit.php?id=<?php echo $id_1; ?>">Modifica</a></button>
                            <button class="  buton_logout"><a href="admin.php?id=<?php echo $id_1; ?>" name="sterge">Sterge </a></button>


                        </div>
                        <p><?php echo $nume ?>


                            <p><?php echo $prenume ?></p>

                            <p><?php echo $username ?></p>

                            <p><?php echo $email ?></p>


                    </div>
        </div>

        <?php
                }
            } ?>
    </center>


<div class="paginare1">
    <div class='paginare' id="make-active">
        <a class='inactiv' href="admin.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">&laquo;</a>
        <?php

        for ($contor = 1; $contor <= (int) $vector / 4 + 1; $contor++) {
            $vector_nr_pagini[$contor] = $contor;
            if ($_GET["pagina"] == $vector_nr_pagini[$contor]) {
        ?>
                <a class='active' href="admin.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
            <?php
            } else {
            ?>
                <a class="inactiv " href="admin.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
        <?php
            }
        } ?>
        <a class='inactiv' href="admin.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">&raquo;;</a>
    </div>
</div><?php
    } else {
        $de_sters = $_SESSION['idUsers'];
        $sql = "DELETE FROM users WHERE idUsers=$de_sters";
        $result = mysqli_query($conn, $sql);
        session_destroy();
        echo "<p style='font-size:40px; color:red;text-align:center;background-color:white;'>Contul dumneavoastra a fost sters!</p>";

        echo "<p style='font-size:40px; color:red;text-align:center;background-color:white;'>Creati-va un cont nou -></p>";
        include 'signup.php';
    }




        ?>