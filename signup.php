<html>

<head>
    <?php include 'includes/head.php'; ?>
</head>

<body>
    <div class="continut">
        <div class="top">
            <img href="index.php" id="logo" src="./img/logo.png" alt="Logo">
            <div class="lista">
                <ul>
                    <li><a href="index.php">Acasa</a></li>
                    <li><a href="signup.php">Inregistrati-va</a></li>
                    <li><a href="login.php">Autentificare</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php
    $nameErr = "";
    $emailErr = "";
    $usernameErr = "";
    $prenumeErr = "";
    $parolaErr = "";
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nume"])) {
            $nameErr = "NU ati completat campul nume";
        } else {
            $name = $_POST["nume"];
        }

        if (empty($_POST["email"])) {
            $emailErr = "NU ati completat campul email";
        } else {
            $email = $_POST["email"];
        }

        if (empty($_POST["prenume"])) {
            $prenumeErr = "NU ati completat campul prenume";
        } else {
            $prenume = $_POST["prenume"];
        }
        if (empty($_POST["parola"])) {
            $parolaErr = "NU ati completat campul parola";
        } else {
            $parola = $_POST["parola"];
        }

        if (empty($_POST["username"])) {
            $usernameErr = "NU ati completat campul username";
        } else {
            $username = $_POST["username"];
        }
        include 'includes/signininc.php';
    }
    ?>




    <div class=" w3-center signin">
        <h1 style="color:white">Creaza-ți Contul!</h1>
        <form method="POST" action=" " style="" class="">
            <div class="w3-center">
                <input type="text" name="nume" placeholder="Numele"> <br>
                <input type="text" name="prenume" placeholder="Prenumele"><br>
                <input type="text" name="username" placeholder="username"><br>
                <input type="email" name="email" placeholder="Email"><br>
                <input type="password" name="parola" placeholder="Parola"><br>
                <input class="buton" type="submit" value="Inregistrati-va"><br>
            </div>
            <div style="color: red; ">
                <span> <?php echo $nameErr; ?></span> <br>
                <span> <?php echo $prenumeErr; ?></span><br>
                <span> <?php echo $usernameErr; ?></span><br>
                <span> <?php echo $emailErr; ?></span><br>
                <span> <?php echo $parolaErr; ?></span><br>
            </div>

        </form>
        <?php


        if (isset($_GET['info']) && $_GET['info'] == 'eroare')
            echo '<p style="text-align:center; color:red; font-size:20px;">Completati toate campurile!</p>';
        else if (isset($_GET['info']) && $_GET['info'] == 'exista') {
            echo '<p style="text-align:center; color:green; font-size:20px;">Username deja existent</p>';
        } else if (isset($_GET['info']) && $_GET['info'] == 'existaemail') {
            echo "<p style='text-align:center; color:green; font-size:20px'>Aceasta adresa de email este deja utilizata  </p>";
        } ?>

    </div>
</body>

</html>