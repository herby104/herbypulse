<?php

require_once __DIR__ . "/../../config/db.php";

class ClientController {

    private $pdo;

    public function __construct() {
        $db = new Database();
        $this->pdo = $db->connect();
    }

    // 👥 DATA ONLY (ADMIN + DASHBOARD)
    public function getAllClients() {
        $stmt = $this->pdo->query("SELECT * FROM clients ORDER BY id DESC");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 📩 STORE CLIENT (PUBLIC FORM)
    public function store() {

        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            header("Location: index.php?page=services");
            exit;
        }

        $nom = trim($_POST['nom'] ?? '');
        $email = trim($_POST['email'] ?? '');
        $telephone = trim($_POST['telephone'] ?? '');
        $service = trim($_POST['service'] ?? '');
        $message = trim($_POST['message'] ?? '');

        $stmt = $this->pdo->prepare("
            INSERT INTO clients (nom, email, telephone, service, message)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([$nom, $email, $telephone, $service, $message]);

        $phone = "50946301034";

        $text = "👋 Nouveau client:\nNom: $nom\nService: $service\nTéléphone: $telephone";

        header("Location: https://wa.me/$phone?text=" . urlencode($text));
        exit;
    }
}