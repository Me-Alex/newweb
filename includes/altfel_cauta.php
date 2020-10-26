<?php 

$cauta = $_POST['cautare'];
$de_cautat = $_POST['input'];
$sql = "SELECT * FROM anunt WHERE titlu='$de_cautat' OR categorie='$de_cautat' OR etaj='$de_cautat' OR an_constructie='$de_cautat'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_array($result)) {
    $titlu = $row['titlu'];
    echo "<div class='ceva'>";
    echo "<div class='afisare_titlu_img_descriere'>";
    echo "<form method='POST' action='anunturi.php' >";
    echo "<input type='submit' name='click_anunt'class='titlu' value='$titlu'>";
    echo "</form>";
    echo "<img class='imagine' src='img/" . $row['imagine'] . "'>";
    echo "<p class='paragraful_anuntului'>" . $row['descriere'] . "</p>";
    echo "<p class='paragraful_pret'>" . $row['pret'] . "(lei)</p>";
    echo "</div>";
    echo "</div>";
}
