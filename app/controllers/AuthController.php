<?php

require_once "app/models/User.php";

class AuthController {

    public function login() {

        // ✅ sécurité session propre
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $userModel = new User();

            // 🔐 login avec email
            $user = $userModel->login(
                $_POST['email'] ?? '',
                $_POST['password'] ?? ''
            );

            if ($user) {

                $_SESSION['admin'] = [
                    'id'    => $user['id'],
                    'name'  => $user['name'],
                    'email' => $user['email']
                ];

                header("Location: index.php?page=admin");
                exit;
            }

            $error = "❌ Identifiants incorrects";
        }

        include "app/views/admin/login.php";
    }

    public function logout() {

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        session_unset();
        session_destroy();

        header("Location: index.php?page=home");
        exit;
    }
}