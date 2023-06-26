<?php
declare(strict_types=1);
try {
    $pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3307', 'root', '');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die('Erreur de connexion : ' . $e->getMessage());
}
