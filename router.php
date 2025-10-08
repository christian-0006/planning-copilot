<?php
session_start();
require_once __DIR__ . '/app/Controllers/EventController.php';
require_once __DIR__ . '/app/Controllers/UserController.php';
require_once __DIR__ . '/app/Models/User.php';
require_once __DIR__ . '/app/Models/Event.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($_GET['action'] === 'add_user') {
        User::insertUser($_POST['username'], $_POST['email'], $_POST['password']);
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif ($_GET['action'] === 'add_event') {
        Event::insertEvent($_POST['title'], $_POST['date'], $_POST['location'], $_POST['user_id']);
        require_once __DIR__ . '/app/Views/confirmation.php';
    } elseif ($_GET['action'] === 'login') {
        $users = User::getAllUsers();
        foreach ($users as $user) {
            if ($user['email'] === $_POST['email'] && password_verify($_POST['password'], $user['password'])) {
                $_SESSION['user'] = $user;
                break;
            }
        }
        require_once __DIR__ . '/app/Views/confirmation.php';
    }
} elseif (isset($_GET['view'])) {
    require_once __DIR__ . '/app/Views/' . $_GET['view'] . '.php';
} elseif (isset($_GET['user'])) {
    $controller = new UserController();
    $controller->show($_GET['user']);
} else {
    $controller = new EventController();
    $controller->index();
}
