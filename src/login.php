<?php
function login(PDO $pdo): void
{
//    if (isset($_POST['username'], $_POST['password'])) {

// Accéder aux valeurs
    $rawData = file_get_contents("php://input");
    $data = json_decode($rawData, true);
    $username = $data['username'];
    $password = $data['password'];
    $user = $pdo->prepare("SELECT * FROM utilisateurs WHERE username= :username AND password= :password");
    $user->execute(['username' => $username, 'password' => $password]);

    $result = $user->fetch(PDO::FETCH_ASSOC);
    if (!$result) {
        http_response_code(401); // Définit le statut de la réponse à 401 (Unauthorized)

        echo json_encode(array("message" => "Identifiants incorrects"));
        return;
    }
    http_response_code(200);
    echo json_encode(array("message" => "Connexion successful"));
//    } else {
//        http_response_code(400); // Définit le statut de la réponse à 400 (Bad Request)
//        echo json_encode(array("message" => "Données de connexion manquantes"));
//    }
    // Le reste de votre logique si les identifiants sont valides
}

;