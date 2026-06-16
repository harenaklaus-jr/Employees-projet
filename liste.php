<?php
ini_set('display_errors', 1);
ini_set('display_error_reporting', E_ALL);
error_reporting(E_ALL);

include_once "inc/fonctions.php";
$dept_no = $_GET['dept_no'];
$list_employees = get_all_employees($dept_no);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employees</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">
        <i class="bi bi-people-fill me-2"></i>Liste
    </h2>
    <form action="fiche.php" method="get">
        <input type="text" name="manger" id="" placeholder="Nom Manager">
        <input type="text" name="employee" id="" placeholder="Nom employee">
        <input type="number" name="min" id="" placeholder="Age min">
        <input type="number" name="max" id="" placeholder="Age max">
        <button type="submit">Valider</button>  
    </form>
    <table class="table table-striped table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th><i class="bi bi-person-fill me-1"></i>Employees dans ce departements</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_employees as $list_employees_ligne) { ?>
            <tr>
                <td><a href="fiche.php?first=<?= $list_employees_ligne['first_name']; ?>&amp; last=<?= $list_employees_ligne['last_name']; ?>" ><?= $list_employees_ligne['first_name']; ?> <?= $list_employees_ligne['last_name']; ?></a></td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>