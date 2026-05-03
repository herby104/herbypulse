<?php

require_once "app/models/Project.php";
require_once "app/controllers/ClientController.php";

class AdminController {

    private $project;
    private $clientController;

    public function __construct() {
        $this->project = new Project();
        $this->clientController = new ClientController();
    }

    // 🔐 AUTH CHECK
    private function checkAuth() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (empty($_SESSION['admin'])) {
            header("Location: index.php?page=login");
            exit;
        }
    }

    // 🧠 RENDER UNIQUE LAYOUT (MVC PROPRE)
    private function render($view, $data = []) {

        extract($data);

        // Vue injectée dans admin_layout.php
        $contentView = $view;

        include "app/views/layouts/admin_layout.php";
    }

    // 📊 DASHBOARD
    public function dashboard() {

        $this->checkAuth();

        $data = [
            "projects" => $this->project->getAll(),

            // ✔ clients via controller propre
            "clients" => $this->clientController->getAllClients(),

            "stats" => [
                "total_projects" => $this->project->countProjects(),
                "total_clients"  => $this->project->countClients(),
                "total_devis"    => $this->project->countDevis()
            ]
        ];

        $this->render("app/views/admin/dashboard.php", $data);
    }

    // 👥 PAGE CLIENTS ADMIN (✔ AJOUTÉ ICI)
    public function clientsPage() {

        $this->checkAuth();

        $data = [
            "clients" => $this->clientController->getAllClients()
        ];

        $this->render("app/views/admin/admin_clients.php", $data);
    }

    // ➕ ADD PROJECT
    public function addProject() {

        $this->checkAuth();

        $imageName = null;

        if (!empty($_FILES['image']['name'])) {

            $imageName = time() . "_" . basename($_FILES['image']['name']);
            move_uploaded_file($_FILES['image']['tmp_name'], "assets/uploads/" . $imageName);
        }

        $this->project->create([
            $_POST['title'] ?? '',
            $_POST['description'] ?? '',
            $imageName,
            $_POST['link'] ?? ''
        ]);

        header("Location: index.php?page=admin");
        exit;
    }

    // ✏️ EDIT PROJECT
    public function editProject($id) {

        $this->checkAuth();

        $data = [
            "project" => $this->project->getById($id)
        ];

        $this->render("app/views/admin/project_form.php", $data);
    }

    // 🔄 UPDATE PROJECT
    public function updateProject($id) {

        $this->checkAuth();

        $this->project->update($id, $_POST);

        header("Location: index.php?page=admin");
        exit;
    }

    // ❌ DELETE PROJECT
    public function deleteProject($id) {

        $this->checkAuth();

        $this->project->delete($id);

        header("Location: index.php?page=admin");
        exit;
    }

public function exportClientsCSV() {

    $this->checkAuth();

    $clients = $this->clientController->getAllClients();

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="clients.csv"');

    $output = fopen("php://output", "w");

    fputcsv($output, ["ID", "Nom", "Email", "Téléphone", "Service"]);

    foreach ($clients as $c) {
        fputcsv($output, [
            $c['id'],
            $c['nom'],
            $c['email'],
            $c['telephone'],
            $c['service']
        ]);
    }

    fclose($output);
    exit;
}
public function exportDevisPDF() {

    $this->checkAuth();

    require_once('tcpdf/tcpdf.php');

    $pdf = new TCPDF();
    $pdf->AddPage();

    $pdf->SetFont('helvetica', '', 12);

    $devis = $this->project->getAllDevis(); // ou modèle devis

    $html = "<h2>Liste des devis</h2><br><table border='1' cellpadding='5'>
             <tr><th>ID</th><th>Nom</th><th>Message</th></tr>";

    foreach ($devis as $d) {
        $html .= "<tr>
                    <td>{$d['id']}</td>
                    <td>{$d['nom']}</td>
                    <td>{$d['message']}</td>
                  </tr>";
    }

    $html .= "</table>";

    $pdf->writeHTML($html, true, false, true, false, '');

    $pdf->Output("devis.pdf", "D");
}

}