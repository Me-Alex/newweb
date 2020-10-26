<?php
session_start();
include 'includes/conectare.php';
include 'includes/head.php';
if (isset($_GET['id'])) {
    $idAnunt = $_GET['id'];
    $sql = "DELETE FROM anunt WHERE idI=$idAnunt";
    $result = mysqli_query($conn, $sql);
    header("Location: admin_anunturi.php");
} ?>
<div class="continut ">
    <div class="top">
        <a id=12 href="index.php"> <img href="index.php" id="logo" src="img/logo.png" alt="Logo"></a>

        <div class="lista">
            <ul>
                <li><a href="index.php">Acasa</a></li>
                <?php
                if (!isset($_SESSION['idUsers'])) {
                    echo ' <li><a href="signup.php">Inregistrati-va</a></li>';
                    echo '<li><a href="login.php">Login</a></li>';
                } else {
                    echo '<li><a href="login.php">Profil</a></li>';
                    echo '<li><a href="desprenoi.php">Despre noi</a></li>';
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
    <div class="admin_anunturi">
        <div class="admin_background">
            <div class="cauta">
                <p>Cauta dupa</p>
                <form method="POST" action="admin_anunturi.php">
                    <label for="cautar" name="cautare"></label>
                    <select id="cautar" name="cautare">
                        <option value="categorie">Categorie</option>
                        <option value="suprafata">Suprafata</option>
                        <option value="etaj">Etaj</option>
                        <option value="an_constructie">An constructie</option>
                    </select>
                    <input type="text" name="input">
                    <input class="buton buton_logout" type="submit" name="cauta1" value="cauta">
                </form>
            </div>
            <div class='afisare_users_adminTab'>

                <p>Categorie</p>
                <p>Suprafata(m<sup>2</sup>)</p>
                <p>Etaj</p>
                <p>An constructie</p>


            </div>
            <?php

            $sql = "SELECT * FROM anunt ";
            $result = mysqli_query($conn, $sql);
            if (!isset($_POST['cauta1'])) {
                $vector = mysqli_num_rows($result);
                if (!isset($_GET['pagina']))
                    header('Location:admin_anunturi.php?pagina=1');
                if ($_GET['pagina'] < 1) {
                    header('Location:admin_anunturi.php?pagina=1');
                } else  if ($_GET['pagina'] > $vector) {
                    header('Location:admin_anunturi.php?pagina=' . $vector);
                }
                $nr_pagini = (int) $vector / 4 + 1;
                if (!isset($_POST['cauta1'])) {
                    for ($i = 0; $i < $vector && $row = mysqli_fetch_array($result); $i++) {
                        if (($i + 4) / 4 == $_GET['pagina'])
                            for ($j = 1; $j <= 4; $j++) {
                                $idAnunt = $row['idI'];
                                $idUser = $row['idUsers'];
                                $categorie = $row['categorie'];
                                $sup = $row['suprafata'];
                                $etaj = $row['etaj'];
                                $an = $row['an_constructie'];
            ?>

                            <div class="users_anunturi">
                                <div id="usersbuttons">
                                    <button class=" buton_logout"><a style="text-decoration:none;" href="anunturi_user.php?id=<?php echo $idAnunt; ?>">Modifica</a></button>
                                    <button class="  buton_logout" name="sterge"><a style="text-decoration:none;" href="admin_anunturi.php?id=<?php echo $idAnunt; ?>">Sterge </a></button>
                                </div>
                                <p><?php echo $categorie ?></p>
                                <p><?php echo $sup ?></p>
                                <p><?php echo $etaj ?></p>
                                <p><?php echo $an ?></p>
                            </div>
                            <?php
                            $row = mysqli_fetch_array($result);
                            if ($row == NULL)
                                break;
                            if ($j == 4) {
                                $idAnunt = $row['idI'];
                                $idUser = $row['idUsers'];
                                $categorie = $row['categorie'];
                                $sup = $row['suprafata'];
                                $etaj = $row['etaj'];
                                $an = $row['an_constructie'];
                        
                            }
                    }}
                }
            } else {


                $cauta = $_POST['cautare'];
                $de_cautat = $_POST['input'];
                $sql = "SELECT * FROM anunt WHERE $cauta='$de_cautat'";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    $idAnunt = $row['idI'];
                    $idUser = $row['idUsers'];
                    $categorie = $row['categorie'];
                    $sup = $row['suprafata'];
                    $etaj = $row['etaj'];
                    $an = $row['an_constructie'];
                    ?>

                    <div class="users_anunturi">
                        <div id="usersbuttons">
                            <button class=" buton_logout"><a style="text-decoration:none;" href="anunturi_user.php?id=<?php echo $idAnunt; ?>">Modifica</a></button>
                            <button class="  buton_logout" name="sterge"><a style="text-decoration:none;" href="admin_anunturi.php?id=<?php echo $idAnunt; ?>">Sterge </a></button>
                        </div>

                        <p><?php echo $idAnunt ?></p>

                        <p><?php echo $idUser ?></p>

                        <p><?php echo $categorie ?></p>
                        <p><?php echo $sup ?></p>
                        <p><?php echo $etaj ?></p>
                        <p><?php echo $an ?></p>
                    </div>
        </div>
    </div>
<?php
                }
            }


?>
</center>

<div class="paginare1">
    <div class='paginare' id="make-active">
        <a class='inactiv' href="admin_anunturi.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">&laquo;</a>
        <?php

        for ($contor = 1; $contor <= (int) $vector / 4 + 1; $contor++) {
            $vector_nr_pagini[$contor] = $contor;
            if ($_GET["pagina"] == $vector_nr_pagini[$contor]) {
        ?>
                <a class='active' href="admin_anunturi.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
            <?php
            } else {
            ?>
                <a class="inactiv " href="admin_anunturi.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
        <?php
            }
        } ?>
        <a class='inactiv' href="admin_anunturi.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">&raquo;;</a>
    </div>
</div><?php