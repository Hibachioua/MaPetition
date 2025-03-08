<?php
require_once 'connexion.php';

/**
 * Récupère toutes les pétitions de la base de données
 * Triées par date de publication décroissante
 * @return array Tableau associatif contenant toutes les pétitions
 */
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

/**
 * Compte le nombre de signatures pour une pétition donnée
 * @param int $id L'identifiant de la pétition
 * @return int Le nombre de signatures
 */
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