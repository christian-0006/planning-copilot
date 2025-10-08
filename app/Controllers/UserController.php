<?php
// app/Controllers/UserController.php

require_once __DIR__ . '/../Models/User.php';

class UserController {
    public function show($userId) {
        $events = User::getUserEvents($userId);
        require_once __DIR__ . '/../Views/user_events.php';
    }
}