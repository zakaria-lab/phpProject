<?php
// Inclusion de la classe
include("Database1.php");

// Instance de la classe Database

$users = $db->getAllUsers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container my-5">
    <h2>Liste des utilisateurs</h2>
    <a class="btn btn-primary" href="create.php" role="button">Inscription</a>
    <br><br>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Nom complet</th>
            <th>Email</th>
            <th>Mot de passe</th>
            <th>Téléphone</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($users)): ?>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']) ?></td>
                    <td><?= htmlspecialchars($user['fullNAME']) ?></td>
                    <td><?= htmlspecialchars($user['email']) ?></td>
                    <td><?= htmlspecialchars($user['password']) ?></td>
                    <td><?= htmlspecialchars($user['numTELE']) ?></td>
                    <td>
                        <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-success btn-sm">edit</a>
                        <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-danger btn-sm"
                           onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Aucun utilisateur trouvé.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>

</body>
</html>