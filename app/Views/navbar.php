<?php
if (!isset($_SESSION)) session_start();
?>
<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container-fluid">
        <a class="navbar-brand" href="/planning-copilot/public/">Planning Copilot</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item"><a class="nav-link" href="?view=add_event">Ajouter événement</a></li>
                    <li class="nav-item"><a class="nav-link" href="/planning-copilot/logout.php">Se déconnecter</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="nav-link" href="?view=add_user">Créer un compte</a></li>
                    <li class="nav-item"><a class="nav-link" href="?view=login">Se connecter</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
