<?php
ini_set('display_errors', 1);
ini_set('display_error_reporting', E_ALL);
error_reporting(E_ALL);
include('fonctions.php');
$first = $_GET['first'];
$last = $_GET['last'];

$manager = $_GET['manager'];
$employee = $_GET['employee'];
$min = $_GET['min'];
$max = $_GET['max'];

$result = about_employee($first, $last);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fiche</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>
<body class="bg-light">

<div class="container mt-5">
    <h2 class="mb-4">
        <i class="bi bi-people-fill me-1"></i> Ses propos
    </h2>

    <table class="table table-striped table-bordered table-hover shadow-sm">
        <thead class="table-dark">
            <tr>
                <th><i class=""></i>Nom</th>
                <th><i class=""></i>Prenom</th>
                <th><i class="">Genre</i></th>
                <th><i class=""></i>Numero</th>
                <th><i class=""></i>Poste</th>
                <th><i class=""></i>salaire du</th>
                <th><i class=""></i>Au</th>
                <th><i class=""></i>Valeurs</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($result as $key) { ?>
            <tr>
                <td><?= $key['first_name']; ?></td>
                <td><?= $key['last_name']; ?></td>
                <td><?= $key['gender']; ?></td>
                <td><?= $key['emp_no']; ?></td>
                <td><?= $key['title']; ?></td>
                <td><?= $key['from_date']; ?></td>
                <td><?= $key['to_date']; ?></td>
                <td><?= $key['salary']; ?> MGA</td>
            </tr>
            <?php } ?>
        </tbody>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>