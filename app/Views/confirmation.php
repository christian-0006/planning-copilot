<?php session_start(); ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <?php include 'navbar.php'; ?>
    <div class="alert alert-success">
        Action effectuée avec succès !
    </div>
    <a href="/planning-copilot/public/" class="btn btn-primary">Retour à l'accueil</a>
</body>
</html>
