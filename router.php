<?php
// router.php

require_once __DIR__ . '/app/Controllers/EventController.php';
require_once __DIR__ . '/app/Controllers/UserController.php';

if (isset($_GET['user'])) {
    $controller = new UserController();
    $controller->show($_GET['user']);
} else {
    $controller = new EventController();
    $controller->index();
}