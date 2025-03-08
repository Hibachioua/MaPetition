<?php
// 1. Inclure la connexion et le modèle
require_once '../Connexion.php';
require_once '../models/SignatureModel.php';

// 2. (Optionnel) Vous pouvez déclarer une classe « AjouterSignature » si vous voulez un contrôleur orienté objet
class AjouterSignature
{
    private $signatureModel;

    public function __construct()
    {
        // Connexion à la base
        $db = Connexion::connect();

        // Instancier le modèle
        $this->signatureModel = new SignatureModel($db);
    }

    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération des données du formulaire
            $data = [
                'IDP'    => $_POST['IDP'] ?? null,
                'Nom'    => $_POST['Nom'] ?? '',
                'Prenom' => $_POST['Prenom'] ?? '',
                'Pays'   => $_POST['Pays'] ?? '',
                'Date'   => $_POST['Date'] ?? '',
                'Heure'  => $_POST['Heure'] ?? '',
                'Email'  => $_POST['Email'] ?? ''
            ];

            // Insérer dans la base via le modèle
            $this->signatureModel->createSignature($data);

            // Redirection ou affichage d'un message
            header('Location: ../index.php'); 
            exit;
        } else {
            // Afficher le formulaire
            require_once '../views/signature/addSignature.php';
        }
    }

    /**
     * Exemple : afficher la liste des signatures (à adapter)
     */
    public function list()
    {
        // Ici vous pourriez récupérer toutes les signatures depuis le modèle 
        // et passer les données à la vue correspondante
        // require 'views/signature/list.php';
    }
}
// 3. Instancier le contrôleur et gérer la requête
$controller = new AjouterSignature();
$controller->handleRequest();