<?php

require_once __DIR__ . "/../../config/db.php";

class User {

    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    public function login($email, $password) {

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);

        $user = $stmt->fetch();

        // ⚠️ VERSION SIMPLE (MD5)
        if ($user && md5($password) === $user['password']) {
            return $user;
        }

        return false;
    }
}