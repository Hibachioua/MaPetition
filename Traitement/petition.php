<?php
session_start();
require_once '../BD/models/PetitionModel.php';

if (isset($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case 'lister':
            $petitions = getAllPetitions();
            $_SESSION['petitions'] = $petitions;
            header('Location: ../IHM/ListePetition.php');
            exit();

        case 'creer':
            header('Location: ../IHM/creerPetition.php');
            exit();

        case 'modifier':
        
            header('Location: ../IHM/modifierPetition.php');
            exit();

        case 'supprimer':
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