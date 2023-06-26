<?php
// Se connecter à la base de données
include("database.php");

/**
 * send to api the totality of the projects
 * @param PDO $pdo : database
 * @param int $id : optionnal argument to get the id of wanted project
 * @return void
 */
function getProjects(PDO $pdo, int $id = 0): void
{
    try {
        if ($id === 0) {
            $stmt = $pdo->query('SELECT * from project');
        } else {
            $stmt = $pdo->prepare('SELECT * from project where id = :id');
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
 * create project in database
 * @param PDO $pdo : connection to database
 * @return void
 */
function createProject(PDO $pdo): void
{
    try {
        $client = trim($_POST['client']);
        $image = trim($_POST['images']);
        $lien = trim($_POST['lien']);
        $desc = trim($_POST['description']);
        $title = trim($_POST['title']);
        $projet = $pdo->prepare('INSERT INTO `project` (`nom`,`client`, `images`, `lien`, `description`,`title`) values(:name,:client,:image,:lien,:desc, :title)');
        $projet->execute(['name' => $name, 'client' => $client, 'image' => $image, 'lien' => $lien, 'desc' => $desc, 'title' => $title]);
        header("Access-Control-Allow-Origin: *"); // Autoriser tous les domaines (attention à ne pas utiliser * en production)
        header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Autoriser les méthodes GET, POST et OPTIONS
        header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Autoriser les en-têtes Content-Type et Authorization
    } catch (PDOException $e) {
        die(' ' . $e->getMessage());
    }
}


function getLastProject(PDO $pdo): void
{
    try {
        $stmt = $pdo->query('SELECT * from project order by dates desc limit 1');
        echo json_encode($stmt->fetchAll());
    } catch (PDOException $e) {
        die(' ' . $e->getMessage());
    }
}