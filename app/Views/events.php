<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Mes événements</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <?php include 'navbar.php'; ?>
    <h1>Liste des événements</h1>
    <ul class="list-group">
        <?php foreach ($events as $event): ?>
            <li class="list-group-item">
                <strong><?= htmlspecialchars($event['title']) ?></strong><br>
                Date : <?= htmlspecialchars($event['date']) ?><br>
                Lieu : <?= htmlspecialchars($event['location']) ?><br>
                Utilisateur : <?= htmlspecialchars($event['username']) ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
