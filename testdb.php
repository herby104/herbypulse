<?php
try {
    $pdo = new PDO(
        "mysql:host=sql305.infinityfree.com;dbname=if0_41821187_portefolio_db ;charset=utf8",
        "if0_41821187",
        "badt8vq9vd",
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    echo "DB OK";
} catch (Exception $e) {
    echo "DB ERROR";
}