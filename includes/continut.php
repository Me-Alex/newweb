 <div class="continut">
        <div class="top">
            <a id=12 href="index.php"> <img href="index.php" id="logo" src="../img/logo.png" alt="Logo"></a>
            <div class="lista">
                
                <ul>
                    <li><a href="../index.php">Acasa</a></li>
                    <?php
                    if (!isset($_SESSION['idUsers'])) {
                        echo ' <li><a href="../signup.php">Sign in</a></li>';
                        echo '<li><a href="../login.php">Login</a></li>';
                      
                    } else {

                        echo '<li><a href="../login.php">Profil</a></li>';
                        echo '<li><a href="../desprenoi.php">Despre noi</a></li>';
                        echo '<li><a href="../contact.php">Contact</a></li>';
                        $id4=$_SESSION['idUsers'];
                        $sql="SELECT rol FROM users where idUsers='$id4'";
                        $result=mysqli_query($conn,$sql);
                        $row=$result->fetch_assoc();
                        if($row['rol']=='1')
                        echo '<li><a href="../admin.php">Admin</a></li>';
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
                        <img id='img_user_profile'src="../imgprofil/<?php echo $row['imagine']?>" alt="">
                      
                        <button class="user_profile_buton"name='user_profil_ancora'><a href="../profile_show.php" ><p id="ceva"> <?php echo $row['username'] ?> </p></a></button>
                        <?php
                       
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    