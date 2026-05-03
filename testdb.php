<?php

require __DIR__ . "/config/db.php";

$db = new Database();
$pdo = $db->connect();

echo "Connexion Supabase OK 👍";