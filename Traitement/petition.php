<?php
session_start();
require_once '../BD/requetes.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'lister':
            // Récupérer toutes les pétitions
            $petitions = getAllPetitions();
            $_SESSION['petitions'] = $petitions;
            header('Location: ../IHM/ListePetition.php');
            exit();

        case 'creer':
            // Logique pour créer une pétition
            // ... (ajoutez votre code ici pour gérer la création)
            header('Location: ../IHM/creerPetition.php');
            exit();

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