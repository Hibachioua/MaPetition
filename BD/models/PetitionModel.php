<?php
require_once '../BD/connexion.php';

function getAllPetitions() {
    $connexion = connexionBD();
    if ($connexion) {
        try {
            $requete = $connexion->prepare("SELECT * FROM Petition ORDER BY DatePublic DESC");
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la récupération des pétitions : " . $e->getMessage();
            return [];
        }
    }
    return [];
}

function countSignaturesByPetitionId($id) {
    $connexion = connexionBD();
    if ($connexion) {
        try {
            $requete = $connexion->prepare("SELECT COUNT(*) as nb FROM Signature WHERE IDP = ?");
            $requete->execute([$id]);
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            return $resultat['nb'];
        } catch(PDOException $e) {
            echo "Erreur lors du comptage des signatures : " . $e->getMessage();
            return 0;
        }
    }
    return 0;
}
?>