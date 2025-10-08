<?php
require_once 'Database.php';

class User {
    public static function insertUser($username, $email, $password) {
        try {
            $db = Database::connect();
            $hashed = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $stmt->execute([$username, $email, $hashed]);
        } catch (PDOException $e) {
            error_log("Erreur insertion utilisateur : " . $e->getMessage());
        }
    }

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
            return [];
        }
    }

    public static function authenticate($username, $password) {
        $db = Database::connect();
        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user && password_verify($password, $user['password'])) {
            return $user;
        }
        return false;
    }
}
