<?php
    
    include 'conectare.php';
    include 'head.php';
    

?>
<html>
<div class="profil">

    <?php
   
     
        include 'select/select_users.php';
        
    ?>
  
    <div class="profile_show_">
        <button class="w3-btn w3-round"><a class="" href="includes/change_img.php"><img class="w3-round" <?php echo 'src="imgprofil/' . $GLOBALS['img'] . '"'; ?>></a></button>
        <?php

        echo '<p >Username: ' . $user;
        echo '<p  >Nume: ' . $name;
        echo '<p >Prenume: ' . $prenume;
        echo '<p  >Email: ' . $email;

        
        ?>
    </div>
</div>
<form action="includes/logout.php">
    <input class="buton buton_logout " style="cursor:pointer" type="submit" value="Deconectare">
</form>

</html>
