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
function createPetition($data) {
    global $connexion;
    
    // Si la connexion n'existe pas déjà, on la crée
    if (!isset($connexion) || $connexion === null) {
        $connexion = connexionBD();
    }
    
    if ($connexion) {
        try {
            // Utiliser NOW() pour la date de publication
            $requete = $connexion->prepare(
                "INSERT INTO petition (Titre, Description, DatePublic, DateFinP, PorteurP, Email)
                 VALUES (:Titre, :Description, NOW(), :DateFinP, :PorteurP, :Email)"
            );
            $requete->bindParam(':Titre', $data['Titre']);
            $requete->bindParam(':Description', $data['Description']);
            $requete->bindParam(':DateFinP', $data['DateFinP']);
            $requete->bindParam(':PorteurP', $data['PorteurP']);
            $requete->bindParam(':Email', $data['Email']);
            return $requete->execute();
        } catch(PDOException $e) {
            echo "Erreur lors de la création de la pétition : " . $e->getMessage();
            return false;
        }
    }
    return false;
}
?>