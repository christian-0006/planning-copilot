<?php
require_once 'Database.php';

class User {
    public static function insertUser($username, $email, $password) {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt->execute([$username, $email, $hashedPassword]);
        } catch (PDOException $e) {
            error_log("Erreur SQL (insertUser): " . $e->getMessage());
        }
    }

    public static function getAllUsers() {
        try {
            $db = Database::connect();
            $stmt = $db->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL (getAllUsers): " . $e->getMessage());
            return [];
        }
    }

    public static function getUserEvents($userId) {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("SELECT * FROM events WHERE user_id = ?");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erreur SQL (getUserEvents): " . $e->getMessage());
            return [];
        }
    }

    public static function login($username, $password) {
        try {
            $db = Database::connect();
            $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
            $stmt->execute([$username]);
            $user = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($user && password_verify($password, $user['password'])) {
                return $user;
            }
        } catch (PDOException $e) {
            error_log("Erreur SQL (login): " . $e->getMessage());
        }
        return null;
    }
}
