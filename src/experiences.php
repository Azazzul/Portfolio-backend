<?php

/**
 * send to api the totality of the projects
 * @param PDO $pdo : database
 * @param int $id : optional argument to get the id of wanted experiences
 * @return void
 */
function getExperiences(PDO $pdo, int $id = 0): void
{
    try {
        if ($id === 0) {
            $stmt = $pdo->query('SELECT * from experience');
        } else {
            $stmt = $pdo->prepare('SELECT * from experience where id = :id');
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

/**
 * create experience in database
 * @param PDO $pdo : connection to database
 * @return void
 */
function createExperience(PDO $pdo): void
{
    try {
        $entreprise = trim($_POST['entreprise']);
        $image = trim($_POST['images']);
        $date = trim($_POST['date']);
        $desc = trim($_POST['description']);
        $projet = $pdo->prepare('INSERT INTO `experience` ( `images`, `entreprise`, `description`,`date`) values(:image,:entreprise,:desc,:date)');
        $projet->execute(['image' => $image, 'entreprise' => $entreprise, 'date' => $date, 'desc' => $desc]);
    } catch (PDOException $e) {
        die(' ' . $e->getMessage());
    }
}


