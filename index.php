<?php
require "src/database.php";
require "src/login.php";
require "src/projects.php";
require "src/diplome.php";
require "src/experiences.php";
global $pdo;

$action = $_GET['action']; // Détermine l'action à effectuer
$type = $_SERVER["REQUEST_METHOD"];

header("Access-Control-Allow-Origin: *"); // Autoriser tous les domaines (attention à ne pas utiliser * en production)
header("Access-Control-Allow-Methods: GET, POST, OPTIONS"); // Autoriser les méthodes GET, POST et OPTIONS
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Autoriser les en-têtes Content-Type et Authorization
header("Access-Control-Allow-Credentials: false");

try {
    switch ($action) {
        case 'login':
            if ($type == 'POST') {
                // Autoriser les requêtes provenant de n'importe quelle origine
                header("Access-Control-Allow-Origin: *");

// Autoriser les méthodes de requête spécifiques (GET, POST, etc.)
                header("Access-Control-Allow-Methods: GET, POST");

// Autoriser les en-têtes personnalisés si nécessaire
                header("Access-Control-Allow-Headers: Content-Type");

// Indiquer que les requêtes peuvent inclure des cookies ou des informations d'identification
                header("Access-Control-Allow-Credentials: true");
//                header('Allow: POST'); // Spécifie les méthodes HTTP autorisées pour la ressource (dans cet exemple, uniquement POST)
                login($pdo);
            }
//            } else {
//                http_response_code(405); // Définit le statut de la réponse à 405 (Method Not Allowed)
//                header('Allow: POST'); // Spécifie les méthodes HTTP autorisées pour la ressource (dans cet exemple, uniquement POST)
//                echo json_encode(array("message" => "Method not allowed")); // Renvoie un message d'erreur en JSON
//            }
            break;
        case 'projets':
            if ($type == 'GET')
                if (isset($_GET['id']))
                    getProjects($pdo, $_GET['id']);
                else
                    getProjects($pdo);
            else if ($type == 'POST')
                createProject($pdo);
            else {

                echo $type;
            }

            break;
        case 'experiences':
            if ($type === 'GET')
                if (isset($_GET['id']))
                    getExperiences($pdo, $_GET['id']);
                else
                    getExperiences($pdo);
//            else
//                createExperience($pdo);
            break;
        case 'diplomes':
            if ($type === 'GET')
                if (isset($_GET['id']))
                    getDiplome($pdo, $_GET['id']);
                else
                    getDiplome($pdo);
                break;
        // Ajoutez d'autres cas pour d'autres actions
        case 'lastDiplome':
            if ($type === 'GET')
                getLastDiplome($pdo);
                break;
        case 'lastProject':
            if ($type === 'GET'){
                getLastProject($pdo);
            }
            break;
        default:
            echo "Action non reconnue";
            break;
    }
} catch (Error $e) {

}

