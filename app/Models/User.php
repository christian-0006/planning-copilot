<?php
// app/Models/User.php

require_once 'Database.php';

class User {
    public static function getAllUsers() {
        $db = Database::connect();
        $stmt = $db->query("SELECT * FROM users");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getUserEvents($userId) {
        
    try {
            $db = Database::connect();
            $stmt = $db->prepare("SELECT * FROM events WHERE user_id = ?");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL : " . $e->getMessage());
            return []; // Retourne un tableau vide en cas d'erreur
        }

    }
}