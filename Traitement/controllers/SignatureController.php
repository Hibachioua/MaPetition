<?php
session_start();

define("ROOT", dirname(dirname(__DIR__)));
require_once(ROOT . "/BD/models/SignatureModel.php");

$action = $_GET['action'] ?? $_POST['action'] ?? '';

switch ($action) {
    case 'creerSignature':
        $id = $_GET['id'] ?? '';
        header("Location: ../../IHM/Signature/addSignature.php?id=$id");
        exit;
    
    case 'ajouterSignature':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $resultat = Signatures::createSignature($_POST);
            
            if ($resultat) {
                header("Location: ../../IHM/Petition/ListePetition.php?id=" . $_POST['IDP'] . "&success=1");
                exit;
            } else {
                header("Location: ../../IHM/Signature/addSignature.php?id=" . $_POST['IDP'] . "&error=1");
                exit;
            }
        }
        break;
    
    case 'recentesSignatures':
        $id = $_GET['id'] ?? '';
        if (!empty($id)) {
            $signatures = Signatures::getRecentSignatures($id, 5);
            header('Content-Type: application/json');
            echo json_encode($signatures);
        } else {
            echo json_encode([]);
        }
        exit;
    
    default:
        header("Location: ../../index.php");
        exit;
}
?>