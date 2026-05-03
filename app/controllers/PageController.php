<?php

class PageController {

    public function render($page) {

        $allowedPages = [
            'home',
            'about',
            'skills',
            'services',
            'cv',
            'contact',
            'devis'
        ];

        // 🔥 HEADER GLOBAL
        include "app/views/header.php";

        // =========================
        // 🌐 PAGES PUBLIQUES UNIQUEMENT
        // =========================
        if (in_array($page, $allowedPages)) {

            $file = "app/views/$page.php";

            if (file_exists($file)) {
                include $file;
            } else {
                echo "<h3 class='text-danger text-center mt-5'>Page introuvable</h3>";
            }

        } else {
            // fallback
            include "app/views/home.php";
        }

        // 🔥 FOOTER GLOBAL
        include "app/views/footer.php";
    }
}