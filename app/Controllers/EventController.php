<?php
require_once __DIR__ . '/../Models/Event.php';

class EventController {
    public function index() {
        $events = Event::getAllEvents();
        require_once __DIR__ . '/../Views/events.php';
    }
}
