<?php
require_once 'Database.php';

class Event {
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

    public static function insertEvent($title, $date, $location, $user_id) {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO events (title, date, location, user_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$title, $date, $location, $user_id]);
        } catch (PDOException $e) {
            error_log("Erreur insertion événement : " . $e->getMessage());
        }
    }
}
