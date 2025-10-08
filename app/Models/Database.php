<?php
class Database {
    public static function connect() {
        $dotenv = parse_ini_file(__DIR__ . '/../../.env');
        $host = $dotenv['DB_HOST'];
        $dbname = $dotenv['DB_NAME'];
        $user = $dotenv['DB_USER'];
        $pass = $dotenv['DB_PASS'];

        try {
            return new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
        } catch (PDOException $e) {
            die("Erreur de connexion : " . $e->getMessage());
        }
    }
}
