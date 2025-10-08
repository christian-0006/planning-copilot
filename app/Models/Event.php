<?php
require_once 'Database.php';

class Event {
    public static function insertEvent($title, $date, $location, $userId) {
        $db = Database::connect();
        $stmt = $db->prepare("INSERT INTO events (title, date, location, user_id) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$title, $date, $location, $userId]);
    }

    public static function getAllEvents() {
        $db = Database::connect();
        $stmt = $db->query("
            SELECT events.*, users.username 
            FROM events 
            JOIN users ON events.user_id = users.user_id 
            ORDER BY events.date ASC
        ");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
