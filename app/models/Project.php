<?php

require_once __DIR__ . "/Database.php";

class Project {

    private $db;

    public function __construct() {
        $this->db = (new Database())->connect();
    }

    // 📁 ALL PROJECTS
    public function getAll() {
        return $this->db
            ->query("SELECT * FROM projects ORDER BY id DESC")
            ->fetchAll(PDO::FETCH_ASSOC);
    }

    // 🔎 SINGLE PROJECT
    public function getById($id) {
        $stmt = $this->db->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // ➕ CREATE PROJECT
    public function create($data) {

        $sql = "INSERT INTO projects (title, description, image, link)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data[0] ?? '',
            $data[1] ?? '',
            $data[2] ?? null,
            $data[3] ?? ''
        ]);
    }

    // ✏️ UPDATE PROJECT
    public function update($id, $data) {

        $sql = "UPDATE projects 
                SET title = ?, description = ?, link = ?
                WHERE id = ?";

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            $data['title'] ?? '',
            $data['description'] ?? '',
            $data['link'] ?? '',
            $id
        ]);
    }

    // ❌ DELETE PROJECT
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }

    // 📊 COUNT PROJECTS
    public function countProjects() {
        return $this->db
            ->query("SELECT COUNT(*) FROM projects")
            ->fetchColumn();
    }

    // 👥 COUNT CLIENTS (pour dashboard)
    public function countClients() {
        return $this->db
            ->query("SELECT COUNT(*) FROM clients")
            ->fetchColumn();
    }

    // 📩 COUNT DEVIS (pour dashboard)
    public function countDevis() {
        return $this->db
            ->query("SELECT COUNT(*) FROM devis")
            ->fetchColumn();
    }
}