<?php
include 'head.php';
include 'includes/conectare.php';

if (isset($_SESSION['idUsers'])) { ?>
    <div class="adaugare_anunt">
        <form class="adaugare" method="POST" action="./posteaza/incarca_anunt.php" enctype="multipart/form-data">
            <p>Titlu</p>
            <input type="text" name="titlu" placeholder="Adauga un titlu...">
            <p>Adauga poza</p>
            <!-- <div style="position:relative;" class="">
                <img id="blah" class="  imagini_anunt" src="img/upload_image.PNG"> </div> -->

            <div class="">
                <input class="adaugare_anunt_buton_imagine" type="file" name="imagine" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                <input class="adaugare_anunt_buton_imagine" type="file" name="imagine1" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

            </div>
            <p>Telefon</p>
            <input class="" type="tel" name="telefon" placeholder=""><br>
            <p>Categorie</p>
            <label for="camere" name="categorie"></label>
            <select id="camere" name="categorie">
                <option value="2 camere">2 camere</option>
                <option value="3 camere">3 camere</option>
                <option value="4 camere">4 camere</option>
                <option value="5 camere">5 camere</option>
            </select>
            <p>Compartimentare</p>
            <label for="compartimentare" name="compartimentare"></label>
            <select id="compartimentare" name="compartimentare">
                <option value="decomandat">Decomandat</option>
                <option value="semidecomandat">Semidecomandat</option>
                <option value="nedecomandat">Nedecomandat</option>
                <option value="circular">Circular</option>
            </select>
            <div style="margin:-393px 0 0 320px;">
                <p>Pret (lei)</p>

                <input type="number" name="pret" placeholder="pret.." value="25"><br>
                <p>Suprafata utila (m<sup>2</sup>)</p>
                <input type="number" name="suprafata" placeholder="surafata.." value="25"><br>
                <p>Etaj</p>
                <input type="number" name="etaj" placeholder="etajul.." value="2"><br>
                <p>An Constructie</p>
                <input type="number" name="anconstructie" placeholder="Anul constructiei.." value="25"><br>
                <p>Descrie anuntul</p>
                <input type="text" name="descriere" placeholder="Spune ceva..." value="25"><br>
                <input class=" buton adaugare_anunt_buton" type="submit" name="posteaza_anuntul" value="Posteaza"><br>
            </div>
        </form>
    </div>
<?php
} ?>