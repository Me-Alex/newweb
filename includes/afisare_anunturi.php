<body>


    <?php
    if (!isset($_POST['submit'])) {
        $sql = "SELECT * FROM anunt ";
        $result = mysqli_query($conn, $sql);
        $vector = mysqli_num_rows($result);
        if (!isset($_GET['pagina']))
            header('Location:index.php?pagina=1');
        if ($_GET['pagina'] < 1) {
            header('Location:index.php?pagina=1');
        } else  if ($_GET['pagina'] > $vector) {
            header('Location:index.php?pagina=' . $vector);
        }

        $nr_pagini = (int) $vector / 4 + 1;
        for ($i = 0; $i < $vector && $row = mysqli_fetch_array($result); $i++) {

            if (($i + 4) / 4 == $_GET['pagina'])
                for ($j = 1; $j <= 4; $j++) {
                    $titlu = $row['titlu'];
                    $id=$row['idI'];

    ?>
                <div class='ceva' >
                    <div class='afisare_titlu_img_descriere'>
                        <form method='POST' action='anunturi.php'  onclick="functie()">
                            <input type='submit' name='click_anunt' class='titlu' value="<?php echo $titlu; ?>"">
                        </form>
                        <img class='imagine' src='img/<?php echo $row['imagine']; ?> '>
                        <p class='paragraful_anuntului'><?php echo $row['descriere']; ?></p>
                        <p class='paragraful_pret'><?php echo $row['pret']; ?> (lei)</p>

                    </div>
                </div>
                <script>
                    function functie(){
                    }
                </script>
    <?php
                    $row = mysqli_fetch_array($result);
                    if ($row == NULL)
                        break;
                    if ($j == 4) {
                        $titlu = $row['titlu'];
                        $row['imagine'];
                        $row['descriere'];
                        $row['pret'];
                    }
                }
        }
    }
    $sql = "SELECT * FROM anunt";
    $result = mysqli_query($conn, $sql);
    $lungime = mysqli_num_rows($result);
    ?>
    <?php include "select/select_anunturi.php"; ?>
    <div class="paginare1">
        <div class='paginare' id="make-active">
            <?php
            if ($_GET["pagina"] > 1) {
            ?>
                <a class='inactiv' href="index.php?pagina=<?php echo $_GET['pagina'] - 1; ?>">&laquo;</a>

                <?php
            }

            for ($contor = 1; $contor <= (int) $vector / 4 + 1; $contor++) {
                $vector_nr_pagini[$contor] = $contor;
                if ($_GET["pagina"] == $vector_nr_pagini[$contor]) {
                ?>
                    <a class='active' href="index.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
                <?php
                } else {
                ?>
                    <a class="inactiv " href="index.php?pagina=<?php echo $vector_nr_pagini[$contor]; ?>"><?php echo $vector_nr_pagini[$contor]; ?></a>
                <?php
                }
            }
            if ($_GET["pagina"] <(int)$vector/4) {
                ?>
                <a class='inactiv' href="index.php?pagina=<?php echo $_GET['pagina'] + 1; ?>">&raquo;</a>
            <?php
            }
            ?>
        </div>
    </div>
    <div class=" footer">
        <?php include 'includes/footer.php'; ?>
    </div>




</body>


<script src="javascript/main.js"></script>

</html>