<?php
session_start();
include 'includes/conectare.php';
include 'includes/head.php'; 
include 'includes/continut2.php';?>
<center>
    <div style="width: 500px; background:white;padding:5px padding:20px;" >
        <form  class="contact" action="" method="POST">
        <h1 style="text-decoration:underline">Contactati-ne!!</h1>
        
            <input type="email" name="mail" placeholder="Email..."><br>
            <input type="text" name="subiect" placeholder="Subject..."><br>
            <textarea style="width: 206px;height:60px" placeholder="Message..." name="text" id="" cols="20" rows="5"></textarea><br><br>
            <input  class="buton_logout"type="submit" name="buton_submit_contact"><br>
        </form>
    </div>

</center>
<?php 
if(isset($_POST['buton_submit_contact'])){
    $e=$_POST['mail'];
    $s=$_POST['subiect'];
    $t=$_POST['text'];
    $sql="INSERT INTO contact (mail,subiect,text) VALUES ('$e','$s','$t')";
    $result=mysqli_query($conn,$sql);

}
?>
<?php
include 'includes/footer.php';?>