<?php
include_once "inc/fonctions.php";

$nom = $_POST['name'];
$age_min = $_POST['age_min'];
$age_max = $_POST['age_max'];
$departement = $_POST['dept_no'];
$resultat = get_research($nom, $age_min, $age_max, $departement);
$count_result = count($resultat);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="bootstrap/font/bootstrap-icons.css">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0">
                    Résultat(s): <?= $count_result; ?>
                </h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-building me-1"></i>Nom</th>
                            <th><i class="bi bi-building me-1"></i>Prenom</th>
                            <th><i class="bi bi-person-fill me-1"></i>Age</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($resultat as $employees_ligne) { ?>
                            <tr>
                                <td class="fw-semibold"><?= $employees_ligne['name']; ?></td>
                                <td class="fw-semibold"><?= $employees_ligne['last_name']; ?></td>
                                <td class="fw-normal"><?= $employees_ligne['age']; ?></td>
                                <td class="text-end">
                                    <a class="btn btn-outline-dark btn-sm" href="liste.php?dept_no=<?= $employees_ligne['emp_no']; ?>">
                                        Detail
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>