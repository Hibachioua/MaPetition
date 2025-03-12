<?php
require_once(ROOT . "/BD/DB.php");

class Petitions {

    public static function getAllPetitions() {
        $connexion = DB::connect();
        if ($connexion) {
            try {
                $requete = $connexion->prepare("SELECT * FROM Petition ORDER BY DatePublic DESC");
                $requete->execute();
                return $requete->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                // Journaliser l'erreur
                error_log("Erreur lors de la récupération des pétitions : " . $e->getMessage());
                return [];
            }
        }
        return [];
    }

    public static function getTopPetition() {
        $connexion = DB::connect();
        if ($connexion) {
            try {
                $requete = $connexion->prepare("
                    SELECT p.*, COUNT(s.IDS) AS nbSignatures 
                    FROM Petition p
                    LEFT JOIN Signature s ON p.IDP = s.IDP
                    GROUP BY p.IDP
                    ORDER BY nbSignatures DESC
                    LIMIT 1
                ");
                $requete->execute();
                return $requete->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Erreur lors de la récupération de la pétition avec le plus de signatures : " . $e->getMessage());
                return [];
            }
        }
        return [];
    }

    public static function getNewPetition($lastId) {
        $connexion = DB::connect();
        if ($connexion) {
            try {
                $stmt = $connexion->prepare("SELECT * FROM Petition WHERE IDP > :lastId ORDER BY IDP ASC LIMIT 1");
                $stmt->bindParam(':lastId', $lastId);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                error_log("Erreur lors de la recherche de nouvelles pétitions : " . $e->getMessage());
                return null;
            }
        }
        return null;
    }

    public static function countSignaturesByPetitionId($id) {
        $connexion = DB::connect();
        if ($connexion) {
            try {
                $requete = $connexion->prepare("SELECT COUNT(*) as nb FROM Signature WHERE IDP = ?");
                $requete->execute([$id]);
                $resultat = $requete->fetch(PDO::FETCH_ASSOC);
                return $resultat['nb'];
            } catch (PDOException $e) {
                error_log("Erreur lors du comptage des signatures : " . $e->getMessage());
                return 0;
            }
        }
        return 0;
    }

    public static function createPetition($data) {
        $connexion = DB::connect();
        
        if ($connexion) {
            try {
                $requete = $connexion->prepare(
                    "INSERT INTO Petition (Titre, Description, DatePublic, DateFinP, PorteurP, Email)
                     VALUES (:Titre, :Description, NOW(), :DateFinP, :PorteurP, :Email)"
                );
                $requete->bindParam(':Titre', $data['Titre']);
                $requete->bindParam(':Description', $data['Description']);
                $requete->bindParam(':DateFinP', $data['DateFinP']);
                $requete->bindParam(':PorteurP', $data['PorteurP']);
                $requete->bindParam(':Email', $data['Email']);
                return $requete->execute();
            } catch (PDOException $e) {
                error_log("Erreur lors de la création de la pétition : " . $e->getMessage());
                return false;
            }
        }
        return false;
    }
}
?>