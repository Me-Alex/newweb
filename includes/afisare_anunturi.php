<?php
$page = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$page = max(1, $page);
$perPage = 4;

$countResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM anunt");
$countRow = $countResult ? mysqli_fetch_assoc($countResult) : ['total' => 0];
$totalProperties = (int) $countRow['total'];
$totalPages = max(1, (int) ceil($totalProperties / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) * $perPage;

$stmt = mysqli_prepare($conn, "SELECT idI, titlu, descriere, pret, imagine, categorie, suprafata FROM anunt ORDER BY idI DESC LIMIT ? OFFSET ?");
mysqli_stmt_bind_param($stmt, 'ii', $perPage, $offset);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
?>
<body>
<?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <article class="ceva">
        <div class="afisare_titlu_img_descriere">
            <a class="titlu" href="anunturi.php?id=<?php echo (int) $row['idI']; ?>">
                <?php echo htmlspecialchars($row['titlu'], ENT_QUOTES, 'UTF-8'); ?>
            </a>

            <a href="anunturi.php?id=<?php echo (int) $row['idI']; ?>">
                <img
                    class="imagine"
                    src="img/<?php echo rawurlencode($row['imagine']); ?>"
                    alt="<?php echo htmlspecialchars($row['titlu'], ENT_QUOTES, 'UTF-8'); ?>"
                >
            </a>

            <p class="paragraful_anuntului">
                <?php echo htmlspecialchars(mb_strimwidth($row['descriere'], 0, 120, '...'), ENT_QUOTES, 'UTF-8'); ?>
            </p>

            <p class="paragraful_pret">
                <?php echo number_format((float) $row['pret'], 0, ',', '.'); ?> lei
            </p>

            <p>
                <?php echo htmlspecialchars($row['categorie'], ENT_QUOTES, 'UTF-8'); ?>
                <?php if (!empty($row['suprafata'])) { ?>
                    · <?php echo (int) $row['suprafata']; ?> m²
                <?php } ?>
            </p>

            <a href="anunturi.php?id=<?php echo (int) $row['idI']; ?>">Vezi proprietatea completă</a>
        </div>
    </article>
<?php } ?>

<?php mysqli_stmt_close($stmt); ?>

<?php if ($totalPages > 1) { ?>
    <nav class="paginare1" aria-label="Paginare proprietăți">
        <div class="paginare">
            <?php if ($page > 1) { ?>
                <a class="inactiv" href="index.php?pagina=<?php echo $page - 1; ?>">&laquo;</a>
            <?php } ?>

            <?php for ($pageNumber = 1; $pageNumber <= $totalPages; $pageNumber++) { ?>
                <a
                    class="<?php echo $pageNumber === $page ? 'active' : 'inactiv'; ?>"
                    href="index.php?pagina=<?php echo $pageNumber; ?>"
                ><?php echo $pageNumber; ?></a>
            <?php } ?>

            <?php if ($page < $totalPages) { ?>
                <a class="inactiv" href="index.php?pagina=<?php echo $page + 1; ?>">&raquo;</a>
            <?php } ?>
        </div>
    </nav>
<?php } ?>

<div class="footer">
    <?php include 'includes/footer.php'; ?>
</div>

<script src="javascript/main.js"></script>
</body>
</html>
