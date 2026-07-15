<?php
$page = isset($_GET['pagina']) ? (int) $_GET['pagina'] : 1;
$page = max(1, $page);
$perPage = 4;

$countResult = mysqli_query($conn, "SELECT COUNT(*) AS total FROM anunt");
$countRow = $countResult ? mysqli_fetch_assoc($countResult) : ['total' => 0];
$totalProperties = (int) $countRow['total'];
$totalPages = max(1, (int) ceil($totalProperties / $perPage));
$page = min($page, $totalPages);
$offset = ($page - 1) *