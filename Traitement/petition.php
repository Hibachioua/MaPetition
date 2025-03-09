<?php
session_start();
require_once '../BD/requetes.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'lister':
            $petitions = getAllPetitions();
            $_SESSION['petitions'] = $petitions;
            header('Location: ../IHM/ListePetition.php');
            exit();

            case 'creer':
                // Logique pour créer une pétition
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $Titre = $_POST['Titre'];
                    $Description = $_POST['Description'];
                    $DateFinP = $_POST['DateFinP'];
                    $PorteurP = $_POST['PorteurP'];
                    $Email = $_POST['Email'];
            
                    $data = [
                        'Titre' => $Titre,
                        'Description' => $Description,
                        'DateFinP' => $DateFinP,
                        'PorteurP' => $PorteurP,
                        'Email' => $Email
                    ];
            
                    // Appeler la fonction pour créer une pétition
                    if (createPetition($data)) {
                        $_SESSION['success_message'] = "La pétition a été créée avec succès.";
                        header('Location: ../IHM/ListePetition.php?success=1');
                    } else {
                        $_SESSION['error_message'] = "Une erreur s'est produite lors de la création de la pétition.";
                    }
            
                    header('Location: ../IHM/ListePetition.php');
                    exit();
                } else {
                    header('Location: ../IHM/creerPetition.php');
                    exit();
                }

        case 'modifier':
        
            header('Location: ../IHM/modifierPetition.php');
            exit();

        case 'supprimer':
            // Logique pour supprimer une pétition
            // ... (ajoutez votre code ici pour gérer la suppression)
            header('Location: ../IHM/supprimerConfirmation.php');
            exit();

        default:
        header('Location: ../IHM/index.php');
            break;
    }
} else {
    header('Location: ../IHM/index.php');

}
?>