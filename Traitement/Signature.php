<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure les fichiers nécessaires
require_once '../BD/connexion.php';
require_once '../BD/models/SignatureModel.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Afficher les données reçues pour débogage
    echo "<pre>Données reçues : ";
    print_r($_POST);
    echo "</pre>";
    
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
        echo "Erreur : Données manquantes. Veuillez remplir tous les champs obligatoires.";
    } else {
        // Essayer d'insérer la signature
        $result = createSignature($data);
        
        if ($result) {
            // Redirection en cas de succès
            echo "Signature ajoutée avec succès !";
            echo "<p><a href='../IHM/index.php'>Retour à l'accueil</a></p>";
            // Décommentez la ligne suivante une fois que tout fonctionne
            // header('Location: ../IHM/index.php?success=1');
            // exit;
        } else {
            echo "Erreur lors de l'ajout de la signature. Veuillez réessayer.";
            echo "<p><a href='../IHM/signature/addSignature.php'>Retour au formulaire</a></p>";
        }
    }
} else {
    // Si ce n'est pas une soumission POST, rediriger vers le formulaire
    header('Location: ../IHM/signature/addSignature.php');
    exit;
}
?>