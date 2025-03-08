<?php
require_once '/BD/connexion.php';

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


?>