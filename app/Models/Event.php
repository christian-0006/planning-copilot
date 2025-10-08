<?php
// app/Models/Event.php

require_once 'Database.php';

class Event {
    public static function getAllEvents() {
        
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM events ORDER BY date ASC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);

    }
}