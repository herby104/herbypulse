<?php
session_start();

if (!isset($_SESSION['admin'])) {
    die("❌ Accès refusé");
}

date_default_timezone_set("America/Port-au-Prince");

$host = "localhost";
$dbname = "portefolio_db";
$user = "root";
$pass = "";

$backupDir = __DIR__ . "/backups/";

if (!is_dir($backupDir)) {
    mkdir($backupDir, 0777, true);
}

$file = "backup_" . date("Y-m-d_H-i-s") . ".sql";
$path = $backupDir . $file;

$success = false;
$error = "";

try {

    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8",
        $user,
        $pass
    );

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

    $sql = "";

    foreach ($tables as $table) {

        $create = $pdo->query("SHOW CREATE TABLE `$table`")->fetch();
        $sql .= $create[1] . ";\n\n";

        $rows = $pdo->query("SELECT * FROM `$table`")->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as $row) {

            $values = array_map(function ($value) use ($pdo) {
                return is_null($value) ? "NULL" : $pdo->quote($value);
            }, array_values($row));

            $sql .= "INSERT INTO `$table` VALUES (" . implode(",", $values) . ");\n";
        }

        $sql .= "\n";
    }

    file_put_contents($path, $sql);

    $success = true;

} catch (Exception $e) {
    $error = $e->getMessage();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Backup Database</title>
    <style>
        body{
            font-family: Arial;
            background:#f4f4f4;
            text-align:center;
            padding-top:50px;
        }
        .box{
            background:white;
            padding:30px;
            width:500px;
            margin:auto;
            border-radius:10px;
            box-shadow:0 0 10px rgba(0,0,0,0.1);
        }
        .success{color:green;}
        .error{color:red;}
        .btn{
            display:inline-block;
            padding:10px 20px;
            margin-top:15px;
            background:green;
            color:white;
            text-decoration:none;
            border-radius:5px;
        }
    </style>
</head>
<body>

<div class="box">

    <h2>💾 Backup de la base de données</h2>

    <?php if ($success): ?>

        <p class="success">✅ Backup réussi</p>
        <p>Fichier : <strong><?= $file ?></strong></p>

        <a class="btn" href="backups/<?= $file ?>">📥 Télécharger le backup</a>

    <?php elseif ($error): ?>

        <p class="error">❌ Erreur : <?= $error ?></p>

    <?php else: ?>

        <p>En cours...</p>

    <?php endif; ?>

</div>

</body>
</html>