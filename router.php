<?php
require_once __DIR__ . '/app/Controllers/EventController.php';
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Models/User.php';
require_once __DIR__ . '/app/Models/Event.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action']) && $_GET['action'] === 'add_user') {
        User::insertUser($_POST['username'], $_POST['email'], $_POST['password']);
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif (isset($_GET['action']) && $_GET['action'] === 'add_event') {
        Event::insertEvent($_POST['title'], $_POST['date'], $_POST['location'], $_POST['user_id']);
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif (isset($_GET['action']) && $_GET['action'] === 'login') {
        $user = User::login($_POST['username'], $_POST['password']);
        if ($user) {
            $_SESSION['user'] = $user;
            require_once __DIR__ . '/app/Views/confirmation.php';
        } else {
            echo "<div class='alert alert-danger'>Échec de la connexion</div>";
        }
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
