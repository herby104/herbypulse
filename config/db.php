<?php

if (class_exists("Database")) {
    return;
}

class Database {

    private $pdo;

    public function connect() {

        // 🔥 charger config depuis le même dossier
       $config = require __DIR__ . "/../config.php";

        try {

            $this->pdo = new PDO(
                "pgsql:host={$config['db_host']};port={$config['db_port']};dbname={$config['db_name']}",
                $config['db_user'],
                $config['db_pass'],
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                    PDO::ATTR_TIMEOUT => 5
                ]
            );

        } catch (PDOException $e) {

            die("❌ DB Error: " . $e->getMessage());
        }

        return $this->pdo;
    }
}