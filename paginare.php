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
</div>