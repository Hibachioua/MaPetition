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
                    if (createPetition($data)) {
                        $_SESSION['success_message'] = "La pétition a été créée avec succès.";
                        $petitions = getAllPetitions();
                        header('Location: ../Traitement/petition.php?action=lister');
                    } else {
                        $_SESSION['error_message'] = "Une erreur s'est produite lors de la création de la pétition.";
                    }
                    header('Location: ../Traitement/petition.php?action=lister');
                    exit();
                } else {
                    header('Location: ../IHM/creerPetition.php');
                    exit();
                }


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