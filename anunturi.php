<?php
include 'includes/conectare.php';
include 'includes/head.php';
include 'includes/meniu.php';

$propertyId = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
$property = null;
$owner = null;

if ($propertyId && $propertyId > 0) {
    $stmt = mysqli_prepare(
        $conn,
        "SELECT idI, idUsers, titlu, descriere, imagine, imagine1, telefon, categorie,
                compartimentare, pret, suprafata, etaj, an_constructie, user
         FROM anunt
         WHERE idI = ?
         LIMIT 1"
    );

    mysqli_stmt_bind_param($stmt, 'i', $propertyId);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $property = mysqli_fetch_assoc($result) ?: null;
    mysqli_stmt_close($stmt);

    if ($property && !empty($property['idUsers'])) {
        $ownerStmt = mysqli_prepare(
            $conn,
            "SELECT username, nume, prenume, email, imagine
             FROM users
             WHERE idUsers = ?
             LIMIT 1"
        );
        mysqli_stmt_bind_param($ownerStmt, 'i', $property['idUsers']);
        mysqli_stmt_execute($ownerStmt);
        $ownerResult = mysqli_stmt_get_result($ownerStmt);
        $owner = mysqli_fetch_assoc($ownerResult) ?: null;
        mysqli_stmt_close($ownerStmt);
    }
}

function propertyValue($value, $fallback = 'Nespecificat')
{
    if ($value === null || $value === '') {
        return $fallback;
    }

    return htmlspecialchars((string) $value, ENT_QUOTES, 'UTF-8');
}
?>

<style>
.property-page {
    max-width: 1100px;
    margin: 0 auto 50px;
    padding: 0 20px;
}
.property-back {
    display: inline-block;
    margin-bottom: 18px;
    text-decoration: none;
}
.property-card {
    background: #fff;
    border: 1px solid #d8d8d8;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, .08);
}
.property-heading {
    display: flex;
    justify-content: space-between;
    gap: 20px;
    align-items: flex-start;
    padding: 25px;
    border-bottom: 1px solid #ececec;
}
.property-heading h1 {
    margin: 0 0 8px;
}
.property-price {
    white-space: nowrap;
    font-size: 28px;
    font-weight: 700;
}
.property-gallery {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 10px;
    padding: 20px;
}
.property-gallery img {
    width: 100%;
    height: 420px;
    object-fit: cover;
    border-radius: 8px;
    cursor: pointer;
}
.property-gallery .property-thumbnails {
    display: grid;
    gap: 10px;
}
.property-gallery .property-thumbnails img {
    height: 205px;
}
.property-content {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 30px;
    padding: 25px;
}
.property-description {
    line-height: 1.7;
    white-space: pre-line;
}
.property-specs {
    display: grid;
    grid-template-columns: repeat(2, minmax(0, 1fr));
    gap: 12px;
    margin-top: 25px;
}
.property-spec {
    padding: 14px;
    background: #f5f5f5;
    border-radius: 7px;
}
.property-spec strong {
    display: block;
    margin-bottom: 4px;
}
.property-owner {
    padding: 20px;
    background: #f7f7f7;
    border-radius: 8px;
    height: fit-content;
}
.property-owner img {
    width: 70px;
    height: 70px;
    object-fit: cover;
    border-radius: 50%;
}
.property-owner a {
    display: inline-block;
    margin-top: 12px;
    padding: 11px 16px;
    background: #3a1616;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
}
.property-not-found {
    max-width: 700px;
    margin: 40px auto;
    padding: 35px;
    background: #fff;
    text-align: center;
    border-radius: 8px;
}
@media (max-width: 800px) {
    .property-heading,
    .property-content {
        grid-template-columns: 1fr;
        display: grid;
    }
    .property-gallery {
        grid-template-columns: 1fr;
    }
    .property-gallery img,
    .property-gallery .property-thumbnails img {
        height: 280px;
    }
    .property-specs {
        grid-template-columns: 1fr;
    }
    .property-price {
        white-space: normal;
    }
}
</style>

<?php if (!$property) { ?>
    <?php http_response_code(404); ?>
    <main class="property-not-found">
        <h1>Proprietatea nu a fost găsită</h1>
        <p>Anunțul nu există, a fost șters sau adresa accesată nu este corectă.</p>
        <a href="index.php">Înapoi la toate proprietățile</a>
    </main>
<?php } else { ?>
    <?php
    $title = propertyValue($property['titlu']);
    $mainImage = !empty($property['imagine']) ? 'img/' . rawurlencode($property['imagine']) : '';
    $secondImage = !empty($property['imagine1']) ? 'img/' . rawurlencode($property['imagine1']) : '';
    $phone = preg_replace('/[^0-9+]/', '', (string) $property['telefon']);
    ?>

    <main class="property-page">
        <a class="property-back" href="index.php">&larr; Înapoi la proprietăți</a>

        <article class="property-card">
            <header class="property-heading">
                <div>
                    <h1><?php echo $title; ?></h1>
                    <p>
                        <?php echo propertyValue($property['categorie']); ?>
                        <?php if (!empty($property['suprafata'])) { ?>
                            · <?php echo (int) $property['suprafata']; ?> m²
                        <?php } ?>
                    </p>
                </div>
                <div class="property-price">
                    <?php echo number_format((float) $property['pret'], 0, ',', '.'); ?> lei
                </div>
            </header>

            <?php if ($mainImage || $secondImage) { ?>
                <section class="property-gallery" aria-label="Galerie imagini">
                    <?php if ($mainImage) { ?>
                        <img id="property-main-image" src="<?php echo $mainImage; ?>" alt="<?php echo $title; ?>">
                    <?php } ?>

                    <div class="property-thumbnails">
                        <?php if ($mainImage) { ?>
                            <img src="<?php echo $mainImage; ?>" alt="<?php echo $title; ?>" onclick="changePropertyImage(this.src)">
                        <?php } ?>
                        <?php if ($secondImage) { ?>
                            <img src="<?php echo $secondImage; ?>" alt="<?php echo $title; ?>" onclick="changePropertyImage(this.src)">
                        <?php } ?>
                    </div>
                </section>
            <?php } ?>

            <div class="property-content">
                <section>
                    <h2>Descriere</h2>
                    <p class="property-description"><?php echo propertyValue($property['descriere'], 'Nu a fost adăugată o descriere.'); ?></p>

                    <h2>Detalii proprietate</h2>
                    <div class="property-specs">
                        <div class="property-spec"><strong>Categorie</strong><?php echo propertyValue($property['categorie']); ?></div>
                        <div class="property-spec"><strong>Compartimentare</strong><?php echo propertyValue($property['compartimentare']); ?></div>
                        <div class="property-spec"><strong>Suprafață utilă</strong><?php echo !empty($property['suprafata']) ? (int) $property['suprafata'] . ' m²' : 'Nespecificat'; ?></div>
                        <div class="property-spec"><strong>Etaj</strong><?php echo propertyValue($property['etaj']); ?></div>
                        <div class="property-spec"><strong>An construcție</strong><?php echo propertyValue($property['an_constructie']); ?></div>
                        <div class="property-spec"><strong>ID proprietate</strong>#<?php echo (int) $property['idI']; ?></div>
                    </div>
                </section>

                <aside class="property-owner">
                    <h2>Contact proprietar</h2>

                    <?php if ($owner && !empty($owner['imagine'])) { ?>
                        <img src="imgprofil/<?php echo rawurlencode($owner['imagine']); ?>" alt="Proprietar">
                    <?php } ?>

                    <p><strong>Nume:</strong><br>
                        <?php
                        if ($owner) {
                            echo propertyValue(trim($owner['nume'] . ' ' . $owner['prenume']), propertyValue($owner['username']));
                        } else {
                            echo propertyValue($property['user']);
                        }
                        ?>
                    </p>

                    <p><strong>Telefon:</strong><br><?php echo propertyValue($property['telefon']); ?></p>

                    <?php if ($phone !== '') { ?>
                        <a href="tel:<?php echo htmlspecialchars($phone, ENT_QUOTES, 'UTF-8'); ?>">Sună proprietarul</a>
                    <?php } ?>
                </aside>
            </div>
        </article>
    </main>

    <script>
        function changePropertyImage(source) {
            var mainImage = document.getElementById('property-main-image');
            if (mainImage) {
                mainImage.src = source;
            }
        }
    </script>
<?php } ?>

<div class="footer">
    <?php include 'includes/footer.php'; ?>
</div>
