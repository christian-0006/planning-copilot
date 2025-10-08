<?php
require_once 'Database.php';

class Event {
    public static function insertEvent($title, $date, $location, $userId) {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO events (title, date, location, user_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $date, $location, $userId]);
        } catch (PDOException $e) {
            error_log("Erreur SQL (insertEvent): " . $e->getMessage());
        }
    }

    public static function getAllEvents() {
        try {
            $db = Database::connect();
            $stmt = $db->query("
                SELECT events.*, users.username 
                FROM events 
                JOIN users ON events.user_id = users.id 
                ORDER BY events.date ASC
            ");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL (getAllEvents): " . $e->getMessage());
            return [];
        }
    }
}
