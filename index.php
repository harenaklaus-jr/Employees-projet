<?php
ini_set('display_errors', 1);
ini_set('display_error_reporting', E_ALL);
error_reporting(E_ALL);

include_once "inc/fonctions.php";
$list = get_all_dept_manager();
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
        <i class="bi bi-people-fill me-2"></i>Liste des départements
    </h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th><i class="bi bi-building me-1"></i>Département</th>
                <th><i class="bi bi-person-fill me-1"></i>Manager</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list as $list_ligne) { ?>
            <tr>
                <td><?= $list_ligne['dept_name']; ?></td>
                <td>
                    <?php
                    // Nom et prenom du manager 
                        echo $list_ligne['first_name']; 
                        echo " "; 
                        echo $list_ligne['last_name']; 
                    ?>
                </td>
                <td>
                    <a class="btn btn-outline-dark" href="liste.php?dept_no=<?= $list_ligne['dept_no']; ?>">
                        Voir tous les employées
                    </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>