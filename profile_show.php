<?php
    include 'includes/conectare.php';
    include 'includes/head.php';
    include 'includes/meniu.php';




?>
<html>
<div class="profil">

    <?php
      /* include 'select/select_anunturi.php';
       header("Location: includes/profile_edit.php?info=$idA");*/
        include 'select/select_users.php';

    ?>
    <div class="profile_show_ w3-center">
        <button class="w3-btn w3-round"><a class="" href="includes/change_img.php"><img class="w3-round" <?php echo 'src="imgprofil/' . $GLOBALS['img'] . '"'; ?>></a></button>
        <?php

        echo '<p >Username: ' . $user;
        echo '<p  >Nume: ' . $name;
        echo '<p >Prenume: ' . $prenume;
        echo '<p  >Email: ' . $email;

        ?>
    </div>
</div>
<form class="w3-center" action="includes/logout.php">
    <input class="buton buton_logout  " style="cursor:pointer" type="submit" value="Logout">
</form>
<?php
?>
<?php include 'includes/footer.php';?>
</html>
