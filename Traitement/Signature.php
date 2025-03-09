<?php
// Inclure les fichiers nécessaires
require_once '../BD/connexion.php';
require_once '../BD/models/SignatureModel.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données du formulaire
    $data = [
        'IDP'    => $_POST['IDP'] ?? null,
        'Nom'    => $_POST['Nom'] ?? '',
        'Prenom' => $_POST['Prenom'] ?? '',
        'Pays'   => $_POST['Pays'] ?? '',
        'Date'   => $_POST['Date'] ?? date('Y-m-d'),
        'Heure'  => $_POST['Heure'] ?? date('H:i:s'),
        'Email'  => $_POST['Email'] ?? ''
    ];
    
    // Vérifier que les données essentielles sont présentes
    if (empty($data['IDP']) || empty($data['Nom']) || empty($data['Email'])) {
        // Redirection en cas de données manquantes
        header('Location: ../IHM/Signature/addSignature.php?error=missing&id=' . $data['IDP']);
        exit;
    } else {
        // Essayer d'insérer la signature
        $result = createSignature($data);
        
        if ($result) {
            // Redirection vers la liste des pétitions en cas de succès
            header('Location: ../IHM/ListePetition.php?success=1');
            exit;
        } else {
            // Redirection en cas d'échec
            header('Location: ../IHM/Signature/addSignature.php?error=failed&id=' . $data['IDP']);
            exit;
        }
    }
} else {
    // Si ce n'est pas une soumission POST, rediriger vers la liste des pétitions
    header('Location: ../IHM/ListePetition.php');
    exit;
}
?>