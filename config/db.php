<?php

if (class_exists("Database")) {
    return;
}

class Database {

    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct() {

        if ($_SERVER['SERVER_NAME'] == 'localhost') {

            $this->host = "localhost";
            $this->dbname = "portefolio_db";
            $this->username = "root";
            $this->password = "";

        } else {

            $this->host = "sql305.infinityfree.com";
            $this->dbname = "if0_41821187_portefolio_db";
            $this->username = "if0_41821187";
            $this->password = "badt8vq9vd";
        }
    }

    public function connect() {

        if ($this->pdo === null) {

            try {
                $this->pdo = new PDO(
                    "mysql:host={$this->host};dbname={$this->dbname};charset=utf8",
                    $this->username,
                    $this->password,
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                    ]
                );

            } catch (PDOException $e) {
                error_log($e->getMessage());
                die("Erreur base de données");
            }
        }

        return $this->pdo;
    }
}