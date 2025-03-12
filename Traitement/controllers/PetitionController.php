<?php
session_start();

define("ROOT", dirname(dirname(__DIR__)));
require_once(ROOT . "/BD/models/PetitionModel.php");

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    try {
        switch ($action) {
            case 'lister':
                $petitions = Petitions::getAllPetitions();
                $_SESSION['petitions'] = $petitions;
                header('Location: ../../IHM/Petition/ListePetition.php');
                exit();

            case 'creer':
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $data = [
                        'Titre' => $_POST['Titre'],
                        'Description' => $_POST['Description'],
                        'DateFinP' => $_POST['DateFinP'],
                        'PorteurP' => $_POST['PorteurP'],
                        'Email' => $_POST['Email']
                    ];

                    if (Petitions::createPetition($data)) {
                        $_SESSION['success_message'] = "La pétition a été créée avec succès.";
                    } else {
                        $_SESSION['error_message'] = "Une erreur s'est produite lors de la création de la pétition.";
                    }
                    header('Location: ../controllers/PetitionController.php?action=lister');
                    exit();
                } else {
                    header('Location: ../../IHM/Petition/addPetition.php');
                    exit();
                }
                break; 

            case 'topPetition':
                header('Content-Type: application/json');
                $topPetition = Petitions::getTopPetition();
                
                if ($topPetition) {
                    echo json_encode($topPetition);
                } else {
                    echo json_encode(['error' => 'Aucune pétition trouvée']);
                }
                exit();
                break;

            case 'checkNewPetition':
                header('Content-Type: application/json');
                $lastId = $_SESSION['last_petition_id'] ?? 0;
                $newPetition = Petitions::getNewPetition($lastId);
                
                if ($newPetition) {
                    $_SESSION['last_petition_id'] = $newPetition['IDP'];
                    echo json_encode($newPetition);
                } else {
                    echo json_encode(['error' => 'Aucune nouvelle pétition']);
                }
                exit();
                break; 

            default:
                header('Location: ../../IHM/index.php');
                break;
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['error' => 'Erreur serveur lors du traitement de la requête']);
    }
} else {
    header('Location: ../../IHM/index.php');
}
?>