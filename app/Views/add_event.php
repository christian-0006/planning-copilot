<?php
require_once __DIR__ . '/../Models/User.php';
$users = User::getAllUsers();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un événement</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <h2>Ajouter un événement</h2>
    <form method="POST" action="?action=add_event">
        <div class="mb-3">
            <label for="title" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="mb-3">
            <label for="date" class="form-label">Date</label>
            <input type="date" class="form-control" name="date" required>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lieu</label>
            <input type="text" class="form-control" name="location" required>
        </div>
        <div class="mb-3">
            <label for="user_id" class="form-label">Utilisateur</label>
            <select name="user_id" class="form-select" required>
                <?php foreach ($users as $user): ?>
                    <option value="<?= $user['id'] ?>"><?= htmlspecialchars($user['username']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Ajouter</button>
    </form>
</body>
</html>
