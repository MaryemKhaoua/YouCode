<?php
require_once 'Apprenant.php';
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "youcode";

$apprenantObj = new Apprenant($servername, $username, $password, $dbname);


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        if ($_POST['submit'] === 'add') {
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];
            $email = $_POST['email'];

            $apprenantObj->addApprenant($nom, $prenom, $email);
        } elseif ($_POST['submit'] === 'update') {
            $apprenantId = $_POST['apprenant_id'];
            $newNom = $_POST['new_nom'];
            $newPrenom = $_POST['new_prenom'];
            $newEmail = $_POST['new_email'];

            $apprenantObj->updateApprenant($apprenantId, $newNom, $newPrenom, $newEmail);
        }
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $apprenantId = $_GET['id'];
    $apprenantObj->deleteApprenant($apprenantId);
}

$apprenants = $apprenantObj->getApprenants();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Apprenant crud</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2 class="mb-4">Manage Apprenants</h2>
    <form action="" method="post">
        <div class="form-group">
            <label for="nom">Nom:</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prenom:</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" name="submit" value="add" class="btn btn-primary">Add Apprenant</button>
    </form>
    <table class="table mt-4">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Email</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($apprenants as $apprenant): ?>
            <tr>
                <td><?= $apprenant['id'] ?></td>
                <td><?= $apprenant['nom'] ?></td>
                <td><?= $apprenant['prenom'] ?></td>
                <td><?= $apprenant['email'] ?></td>
                <td>
                    <a href="?action=edit&id=<?= $apprenant['id'] ?>" class="btn btn-warning">Edit</a>
                    <a href="?action=delete&id=<?= $apprenant['id'] ?>" class="btn btn-danger">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    <?php if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['action']) && $_GET['action'] === 'edit' && isset($_GET['id'])): ?>
        <?php
        $editId = $_GET['id'];
        $editData = $apprenantObj->getApprenantById($editId);
        ?>
        <form action="" method="post" class="mt-4">
            <input type="hidden" name="apprenant_id" value="<?= $editData['id'] ?>">
            <div class="form-group">
                <label for="new_nom">New Nom:</label>
                <input type="text" class="form-control" id="new_nom" name="new_nom" value="<?= $editData['nom'] ?>" required>
            </div>
            <div class="form-group">
                <label for="new_prenom">New Prenom:</label>
                <input type="text" class="form-control" id="new_prenom" name="new_prenom" value="<?= $editData['prenom'] ?>" required>
            </div>
            <div class="form-group">
                <label for="new_email">New Email:</label>
                <input type="email" class="form-control" id="new_email" name="new_email" value="<?= $editData['email'] ?>" required>
            </div>
            <button type="submit" name="submit" value="update" class="btn btn-success">Update Apprenant</button>
        </form>
    <?php endif; ?>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
