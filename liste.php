<?php
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
        <!-- Formulaire de recherche -->
        <div class="card border-0 shadow-sm mb-4">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-search me-2"></i>Rechercher un employé
                </h5>
            </div>
            <div class="card-body p-4">
                <form action="traitement.php" method="post">
                    <div class="row g-3 align-items-end">

                        <!-- Nom -->
                        <div class="col-md-3">
                            <label for="name" class="form-label fw-semibold">
                                <i class="bi bi-person me-1"></i>Nom
                            </label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Ex: Jean">
                        </div>

                        <!-- Age-->
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">
                                <i class="bi bi-calendar me-1"></i>Âge
                            </label>
                            <div class="input-group">
                                <input type="number" class="form-control" name="age_min" min="18" max="100" placeholder="Min">
                                <!-- <span class="input-group-text">—</span> -->
                                <input type="number" class="form-control" name="age_max" min="18" max="100" placeholder="Max">
                            </div>
                        </div>

                        <!-- Département -->
                        <div class="col-md-3">
                            <label for="departement" class="form-label fw-semibold">
                                <i class="bi bi-building me-1"></i>Département
                            </label>
                            <select class="form-select" name="dept_no" id="departement">
                                <option value="">-- Choisir un département --</option>
                                <option value="d001">Marketing</option>
                                <option value="d002">Finance</option>
                                <option value="d003">Human Resources</option>
                                <option value="d004">Production</option>
                                <option value="d005">Development</option>
                                <option value="d006">Quality Management</option>
                                <option value="d007">Sales</option>
                                <option value="d008">Research</option>
                                <option value="d009">Customer Service</option>
                            </select>
                        </div>

                        <!-- Boutons -->
                        <div class="col-md-2 d-flex gap-2">
                            <button type="submit" class="btn btn-dark w-100">
                                <i class="bi bi-search me-1"></i>Rechercher
                            </button>
                            <button type="reset" class="btn btn-outline-secondary">
                                <i class="bi bi-x-circle"></i>
                            </button>
                        </div>

                    </div>
                </form>
            </div>
        </div>

        <div class="card border-0 shadow-sm">
            <div class="card-header bg-dark text-white py-3">
                <h5 class="mb-0">
                    <i class="bi bi-people-fill me-2"></i>Employees
                </h5>
            </div>
            <div class="card-body p-0">
                <table class="table table-hover mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th><i class="bi bi-building me-1"></i>Nom</th>
                            <th><i class="bi bi-person-fill me-1"></i>Prenom</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($list_employees as $list_employees_ligne) { ?>
                            <tr>
                                <td class="fw-semibold"><?= $list_employees_ligne['first_name']; ?></td>
                                <td class="fw-normal"><?= $list_employees_ligne['last_name']; ?></td>
                                <td class="text-end">
                                    <a class="btn btn-outline-dark btn-sm" href="liste.php?dept_no=<?= $list_employees_ligne['last_name']; ?>">
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