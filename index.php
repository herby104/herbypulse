<?php
session_start();

/* =========================
   CONTROLLERS
========================= */
require_once __DIR__ . "/app/controllers/PageController.php";
require_once __DIR__ . "/app/controllers/AdminController.php";
require_once __DIR__ . "/app/controllers/AuthController.php";
require_once __DIR__ . "/app/controllers/ClientController.php";

/* =========================
   INSTANCES
========================= */
$pageController  = new PageController();
$adminController = new AdminController();
$authController  = new AuthController();

/* =========================
   ROUTE
========================= */
$page = $_GET['page'] ?? 'home';

/* =========================
   AUTH ROUTES
========================= */
if ($page === "login") {
    $authController->login();
    exit;
}

if ($page === "logout") {
    $authController->logout();
    exit;
}

/* =========================
   MIDDLEWARE ADMIN
========================= */
function requireAdmin() {
    if (empty($_SESSION['admin'])) {
        header("Location: index.php?page=login");
        exit;
    }
}

/* =========================
   ADMIN ROUTES
========================= */
$adminRoutes = [
    'admin',
    'admin_add',
    'admin_edit',
    'admin_update',
    'admin_delete',
    'admin_clients'
];

if (in_array($page, $adminRoutes)) {

    requireAdmin();

    switch ($page) {

        case 'admin':
            $adminController->dashboard();
            break;

        case 'admin_add':
            $adminController->addProject();
            break;

        case 'admin_edit':
            $adminController->editProject($_GET['id'] ?? null);
            break;

        case 'admin_update':
            $adminController->updateProject($_GET['id'] ?? null);
            break;

        case 'admin_delete':
            $adminController->deleteProject($_GET['id'] ?? null);
            break;

        case 'admin_clients':
            $adminController->clientsPage(); // ✔ IMPORTANT (FIX DESIGN)
            break;

            case 'export_clients':
            $adminController->exportClientsCSV();
            break;
            
            case 'export_devis':
            $adminController->exportDevisPDF();
            break;
    }

    exit;
}

/* =========================
   API CLIENT PUBLIC
========================= */
if ($page === "add_client") {
    $clientController = new ClientController();
    $clientController->store();
    exit;
}

/* =========================
   FRONT OFFICE
========================= */
$pageController->render($page);