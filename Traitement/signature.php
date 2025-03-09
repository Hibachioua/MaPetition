<?php
session_start();
require_once '../BD/models/SignatureModel.php';

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'creerSignature':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        header("Location: ../IHM/signature/addSignature.php?id=$id");
        exit;
    
    case 'ajouterSignature':

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultat = createSignature($_POST);
            
            if ($resultat) {
                header("Location: ../IHM/ListePetition.php?id=".$_POST['IDP']."&success=1");
                exit;
            } else {
                header("Location: ../IHM/addSignature.php?id=".$_POST['IDP']."&error=1");
                exit;
            }
        }
        break;
    
    case 'recentesSignatures':
        $id = isset($_GET['id']) ? $_GET['id'] : '';
        if (!empty($id)) {
            $signatures = getRecentSignatures($id, 5);
            header('Content-Type: application/json');
            echo json_encode($signatures);
        } else {
            echo json_encode([]);
        }
        exit;
    
    default:
        header("Location: ../index.php");
        exit;
}
?>