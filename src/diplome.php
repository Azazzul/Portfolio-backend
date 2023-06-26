<?php

include ("database.php");

/**
 * send to api the totality of the diplomas
 * @param PDO $pdo : database
 * @param int $id : optionnal argument to get the id of wanted project
 * @return void
 */
function getDiplome(PDO $pdo, int $id = 0): void
{
    try {
        if ($id === 0) {
            $stmt = $pdo->query('SELECT * from diplome');
        } else {
            $stmt = $pdo->prepare('SELECT * from diplome where id = :id');
            $stmt->execute(['id' => $id]);
        }
        header("Access-Control-Allow-Origin: *"); // Autoriser tous les domaines (attention à ne pas utiliser * en production)
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Autoriser les méthodes GET, POST et OPTIONS
        header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Autoriser les en-têtes Content-Type et Authorization
        echo json_encode($stmt->fetchAll());
    } catch (PDOException $e) {
        die('Erreur de requête : ' . $e->getMessage());
    }
}


function getLastDiplome(PDO $pdo): void
{
    try {
        $stmt = $pdo->query('select * from competence limit 1');
        $stmt = $stmt->fetchAll();
//        var_dump($stmt);
//        $j = json_encode($stmt);
//        var_dump($j);
//        echo var_dump($stmt);
        echo json_encode($stmt);
//        echo "test";
    } catch (PDOException $e) {
        die('Erreur de requête : ' . $e->getMessage());
    }
}