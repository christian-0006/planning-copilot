<?php
require_once __DIR__ . '/app/Controllers/EventController.php';
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Models/User.php';
require_once __DIR__ . '/app/Models/Event.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'add_user') {
        User::insertUser($_POST['username'], $_POST['email'], $_POST['password']);
        $message = "Utilisateur ajouté avec succès.";
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif ($_GET['action'] === 'add_event') {
        Event::insertEvent($_POST['title'], $_POST['date'], $_POST['location'], $_POST['user_id']);
        $message = "Événement ajouté avec succès.";
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif ($_GET['action'] === 'login') {
        $user = User::authenticate($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = $user;
            $message = "Connexion réussie.";
        } else {
            $message = "Échec de la connexion.";
        }
        require_once __DIR__ . '/app/Views/confirmation.php';
    }
} else {
    if (isset($_GET['user'])) {
        $controller = new UserController();
        $controller->show($_GET['user']);
    } elseif (isset($_GET['action']) && $_GET['action'] === 'add_user_form') {
        require_once __DIR__ . '/app/Views/add_user.php';
    } elseif (isset($_GET['action']) && $_GET['action'] === 'add_event_form') {
        require_once __DIR__ . '/app/Views/add_event.php';
    } elseif (isset($_GET['action']) && $_GET['action'] === 'login_form') {
        require_once __DIR__ . '/app/Views/login.php';
    } else {
        $controller = new EventController();
        $controller->index();
    }
}
