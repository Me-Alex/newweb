<?php

include 'includes/conectare.php';
include 'includes/head.php';
include 'includes/meniu.php';
$sql = "SELECT * FROM anunt  ";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_array($result);

if (isset($_POST['click_anunt'])) {
    $_SESSION['idI'] = $row['idI'];
    $titlu = $_POST['click_anunt'];
    $sql = "SELECT * FROM anunt WHERE titlu='$titlu' ";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result); ?>
    <div class="info_anunt2">
        <div class="info_anunt1 ">
            <div class='info_anunt   '>
                <p class='poz_paragraf_titlu'>Titlu</p>

                <p class='titlu_anunt'><?php echo $row['titlu']; ?></p></a>

                <p class='poz_paragraf_imagine'>imagini</p>

                <?php

                $imagine = $row['imagine'];
                $imagine1 = $row['imagine1'];
                $id = $row['idI'];
                ?>
               

                <img class='imagine_anunt' onclick="ceva('<?php echo $imagine; ?>')" src='img/<?php echo $imagine; ?>'>
                <img class='imagine_anunt' onclick="ceva('<?php echo $imagine1; ?>')" src='img/<?php echo $imagine1; ?>'>
                <img class="slide_show_img" id='super' src='img/<?php echo $imagine1; ?>' >
                <script>
                    function ceva(v) {
                        var a = document.getElementById('super');
                        a.src = "img/" + v;
                        a.style.height = '250px';
                        a.style.width = '300px';
                       



                    }
                </script>

                <p class='poz_paragraf_descriere'>Descriere</p>

                <p class='paragraf_anunt'><?php echo $row['descriere']; ?></p>






                <?php
                $user = $row['user'];
                $sql1 = "SELECT * FROM users WHERE username='$user'";
                /*$sql="SELECT anunt.user,users.id,users.username FROM users INNER JOIN anunt ON anunt.user=users.username WHERE users.id='$id'";*/
                $result1 = mysqli_query($conn, $sql1);
                $row1 = $result1->fetch_assoc();
                ?>

                <div>
                    <p style="background-color:yellow;border-bottom:1px solid red" id="hide_show">Afiseaza mai multe informatii</p>


                    <div class="descriere_anunt" style="display: flex; ">

                        <div class="afisare_informatii_anunt" style="padding:0 400px 0 50px;display:none">
                            <p class="cat" style="background-color:yellow">>Categoria</p>
                            <p class="cat1" style="display: none;padding-left:40px ;"><?php echo $row['categorie']; ?></p>
                            <p class="tel" style="background-color:yellow">>Telefon</p>
                            <p class="tel1" style="display: none;padding-left:40px; "><?php echo $row['telefon']; ?></p>
                            <p class="us" style="background-color:yellow">>user</p>
                            <p class="us1" style="display: none;padding-left:40px ;"><?php echo $row['user']; ?></p>
                            <script>
                                $('.cat').click(function() {
                                    $('.cat1').toggle('slow');
                                });
                                $('.tel').click(function() {
                                    $('.tel1').toggle('slow');
                                });
                                $('.us').click(function() {
                                    $('.us1').toggle('slow');
                                });
                            </script>
                        </div>

                        <!-- <div class="afisare_informatii_anunt_valori" style="display: none;">
                            <p class="tel1"><?php echo $row['telefon']; ?></p>
                            <p class="us1"><?php echo $row['user']; ?></p>
                        </div> -->

                        <script>
                            $('#hide_show').click(function() {
                                $('.afisare_informatii_anunt').toggle("slow");

                            });
                        </script>

                    </div>

                </div>


                <!-- <div class=utilizator_telefon_categorie>
                    <div class="show" onclick="this.style.height = '150px'">

                        <p class='poz_categorie poz_'>Categoria:</p>

                        <div class="hidden">
                            <p class=""><?php echo $row['categorie']; ?></p>
                        </div>

                    </div>



                    <div class="show" onclick="this.style.height = '150px'">
                        <p class='poz_telefon'>Telefonul:</p>

                        <div class="hidden">
                            <?php echo $row['telefon']; ?></div>
                    </div>
                    <div class="show" onclick="this.style.height = '150px'">

                        <p class='poz_utilizator'>Utilizatorul:</p>

                        <div class="hidden">
                            <?php echo $row['user']; ?>
                        </div>
                    </div>
                </div> -->
            <?php
        }
            ?>
            </div>
        </div>
    </div>
    <div class=" footer">
        <?php include 'includes/footer.php'; ?>
    </div>