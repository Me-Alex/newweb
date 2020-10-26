<?php
session_start();
include 'conectare.php';
include 'head2.php';
include 'continut.php';
include '../select/select_users.php' ?>
<?php
if (isset($_GET['id'])) {
    $x = $_GET['id'];

    $sql = "SELECT * FROM users WHERE idUsers=$x";

    $result = mysqli_query($conn, $sql);

    $row = $result->fetch_assoc();

?>
    <form class=" profile_edit signin" action="profile_edit.php?id=<?php echo $x ?>" method="POST">

        <p>User</p>

        <input type="text" name="username1" value="<?php echo $row['username']; ?>">

        <input class="buton" type="submit" name="submit_11" value="Change"><br>

        <p>Nume</p>

        <input type="text" name="nume" value="<?php echo $row['nume']; ?>">

        <input class="buton" type="submit" name="submit_22" value="Change"><br>

        <p>Prenume</p>

        <input type="text" name="prenume" value="<?php echo $row['prenume']; ?>">

        <input class="buton" type="submit" name="submit_33" value="Change"><br>

        <p>Email</p>

        <input type="text" name="email" value="<?php echo $row['email']; ?>">

        <input class="buton" type="submit" name="submit_44" value="Change"><br>

        <input class="buton" type="submit" name="submit__" value="Change All"><br>

    </form>

    <?php
    
    if (isset($_POST['submit_11'])) {

        $user_nou = $_POST['username1'];
        $sql = "SELECT username FROM users WHERE username='$user_nou'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($row == true) {
            header("Location: profile_edit.php?info=existente&id=$x");
        } else {
            $sql = "UPDATE users SET username='$user_nou' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
            $sql = "UPDATE anunt SET user='$user_nou' WHERE idUsers='$x' ";
            mysqli_query($conn, $sql);
            header("Location: profile_edit.php?id=$x");
        }
    } else if (isset($_POST['submit_22'])) {
        $nume = $_POST['nume'];
    
            $sql = "UPDATE users SET nume='$nume' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
            header("Location: profile_edit.php?id=$x");
        
    } else if (isset($_POST['submit_33'])) {
        $prenume = $_POST['prenume'];
            $sql = "UPDATE users SET prenume='$prenume' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
            header("Location: profile_edit.php?id=$x");
        
    } else if (isset($_POST['submit_44'])) {
        $email = $_POST['email'];
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        $row = $result->fetch_assoc();
        if ($row == true) {
            header("Location: profile_edit.php?info=existent2&id=$x");
        } else {
            $sql = "UPDATE users SET email='$email' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
            header("Location: profile_edit.php?id=$x");
        }
    } else if (isset($_POST['submit__'])) {
        $user_nou = $_POST['username1'];
        $nume = $_POST['nume'];
        $prenume = $_POST['prenume'];
        $email = $_POST['email'];
        $sql = "UPDATE users SET nume='$nume',prenume='$prenume' WHERE idUsers='$x'";
        mysqli_query($conn, $sql);
        $sql = "SELECT email FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: profile_edit.php?info=existent3&id=$x");
        } else {
            $sql = "UPDATE users SET email='$email' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
        }
        $sql = "SELECT username FROM users WHERE username='$user_nou'";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            header("Location: profile_edit.php?info=existent3&id=$x");
        } else {
            $sql = "UPDATE users SET username='$user_nou' WHERE idUsers='$x'";
            mysqli_query($conn, $sql);
            $sql = "UPDATE anunt SET user='$user_nou' WHERE idUsers='$x' ";
            mysqli_query($conn, $sql);
        }
    }
    if (isset($_GET['info']) && $_GET['info'] == 'existente' && isset($_GET['id']) && $_GET['id'] == $x) {
        ?> <div class="w3-panel w3-red w3-display-container">
         <span onclick="this.parentElement.style.display='none'"
         class="w3-button  w3-large w3-display-topright">&times;</span>
       
         <p class="w3-center">Acest user este deja existent</p>
       </div><?php
     

     }else if (isset($_GET['info']) && $_GET['info'] == 'existent2' && isset($_GET['id']) && $_GET['id'] == $x) {
        ?> <div class="w3-panel w3-red w3-display-container">
         <span onclick="this.parentElement.style.display='none'"
         class="w3-button  w3-large w3-display-topright">&times;</span>
       
         <p class="w3-center">Acest email este deja existent</p>
       </div><?php
     

     }else if (isset($_GET['info']) && $_GET['info'] == 'existent3' && isset($_GET['id']) && $_GET['id'] == $x) {
        ?> <div class="w3-panel w3-red w3-display-container">
         <span onclick="this.parentElement.style.display='none'"
         class="w3-button  w3-large w3-display-topright">&times;</span>
       
         <p class="w3-center">Posibil ca acest  user sa email fie deja existente</p>
       </div><?php
     

     }
} else { ?>
    <form class=" profile_edit signin" action="profile_edit.php" method="POST">
        <p>User</p>
        <input type="text" name="username" value="<?php echo $row['username']; ?>">

        <input class="buton" type="submit" name="submit_1" value="Change"><br>
        <p>Nume</p>
        <input type="text" name="nume" value="<?php echo $row['nume']; ?>">
        <input class="buton" type="submit" name="submit_2" value="Change"><br>
        <p>Prenume</p>
        <input type="text" name="prenume" value="<?php echo $row['prenume']; ?>">

        <input class="buton" type="submit" name="submit_3" value="Change"><br>
        <p>Email</p>
        <input type="text" name="email" value="<?php echo $row['email']; ?>">
        <input class="buton" type="submit" name="submit_4" value="Change"><br>
        <input class="buton" type="submit" name="submit_" value="Change All"><br>
    </form>

<?php
    if (isset($_POST['submit_'])) {
        $id = $_SESSION['idUsers'];
        $n = $_POST['nume'];
        $p = $_POST['prenume'];
        $u = $_POST['username'];
        $e = $_POST['email'];
        $idI = $_SESSION['idI'];

        $sql = "SELECT username FROM users WHERE username='$u'";
        $result = mysqli_query($conn, $sql);
        $row1 = $result->fetch_assoc();
        if ($row1 == false) {
            $sql = "UPDATE users SET nume='$n',prenume='$p',username='$u' WHERE idUsers='$id3' ";
            $result = mysqli_query($conn, $sql);
            include '../select/select_users.php';
            $sql = "UPDATE anunt SET user='$u' WHERE idUsers='$id3' ";
            $result = mysqli_query($conn, $sql);
        } else {
            header("Location: profile_edit.php?info=existent");
        }

        $id = $_SESSION['idUsers'];
        $e = $_POST['email'];
        $sql = "SELECT email FROM users WHERE email='$e'";
        $result = mysqli_query($conn, $sql);
        $row1 = $result->fetch_assoc();
        if ($row1 == false) {
            $sql = "UPDATE users SET email='$e' WHERE idUsers='$id' ";
            $result = mysqli_query($conn, $sql);
            header("Location: profile_edit.php");
        } else {
            header("Location: profile_edit.php?info=email_existent");
        }
    } else if (isset($_POST['submit_1'])) {
        $id = $row['idUsers'];
        $u = $_POST['username'];
        $sql = "SELECT username FROM users WHERE username='$u'";
        $result = mysqli_query($conn, $sql);
        $row1 = $result->fetch_assoc();
        if ($row1 == false) {
            $sql = "UPDATE users SET username='$u' WHERE idUsers='$id' ";
            $result = mysqli_query($conn, $sql);
            include '../select/select_users.php';
            $sql = "UPDATE anunt SET user='$u' WHERE idUsers='$id3' ";
            $result = mysqli_query($conn, $sql);
            header('Location: ../index.php');
            if (!$result)
                echo "nu da update la anunturi";
        } else {
            header("Location: profile_edit.php?info=existent");
        }
    } else if (isset($_POST['submit_2'])) {
        $id = $_SESSION['idUsers'];
        $n = $_POST['nume'];
        $sql = "UPDATE users SET nume='$n' WHERE idUsers='$id' ";
        $result = mysqli_query($conn, $sql);
        header('Location: ../login.php');
    } else if (isset($_POST['submit_4'])) {
        $id = $_SESSION['idUsers'];
        $e = $_POST['email'];
        $sql = "SELECT email FROM users WHERE email='$e'";
        $result = mysqli_query($conn, $sql);
        $row1 = $result->fetch_assoc();
        if ($row1 == false) {
            $sql = "UPDATE users SET email='$e' WHERE idUsers='$id' ";
            $result = mysqli_query($conn, $sql);
            header('Location: ../login.php');
        } else {
            header("Location: profile_edit.php?info=email_existent");
        }
    }else if(isset($_POST['submit_3'])){
        $p=$_POST['prenume'];
        $sql = "UPDATE users SET prenume='$p' WHERE idUsers='$id' ";
        $result = mysqli_query($conn, $sql);
        header('Location: ../login.php');
    }else 
    if (isset($_GET['info']) && $_GET['info'] == 'existent') {
       ?> <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button  w3-large w3-display-topright">&times;</span>
      
        <p class="w3-center">Acest user este deja existent</p>
      </div><?php
    } else if (isset($_GET['info']) && $_GET['info'] == 'email_existent') {
        ?> <div class="w3-panel w3-red w3-display-container">
        <span onclick="this.parentElement.style.display='none'"
        class="w3-button  w3-large w3-display-topright">&times;</span>
      
        <p class="w3-center">Acest email este deja existent</p>
      </div><?php
    }else if (isset($_GET['info']) && $_GET['info'] == 'existent1'){
        echo '<p id="paragraf_unic" color:red">Acest user este deja folosit</p>';
    }

} ?>

<div class=" footer_center  ">
   
    <div class="footer_ceva">
        <div class="aranjare_footer">
            <ul>
                <li>
                    <h6><a href="../contact.php">Contact</a></h6>
                </li>
                <li>
                    <h6> <a href="../index.php">Acasa</a></h6>
                </li>
                <li>
                    <h6> <a href="../login.php">Profil</a></h6>
                </li>
            </ul>
        </div>
        <div>
            <ul>
              
                <li style="display: flex;justify-content:space-evenly">
                <h5> <i class="fas fa-envelope"></i>
                     rent.apartments@rentables.ro</h5>
                </li>
            </ul>
        <ul>
                <li >
                
              <h5>  <i class="fas fa-phone-volume"></i>
                0725876457</h5>
                   

                </li>

            </ul>
        </div>
    </div>
   <center><p class="footer_text">Rent Apartments &copy All Rights Reserved</p></center> 
</div>