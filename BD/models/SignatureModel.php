<?php
require_once(ROOT . "/BD/DB.php");
class Signatures {

    public static function createSignature($data) {
        $connexion = DB::connect();
        
        if ($connexion) {
            try {
                $requete = $connexion->prepare(
                    "INSERT INTO Signature (IDP, Nom, Prenom, Pays, Date, Heure, Email)
                     VALUES (:IDP, :Nom, :Prenom, :Pays, :Date, :Heure, :Email)"
                );
                $requete->bindParam(':IDP', $data['IDP']);
                $requete->bindParam(':Nom', $data['Nom']);
                $requete->bindParam(':Prenom', $data['Prenom']);
                $requete->bindParam(':Pays', $data['Pays']);
                $requete->bindParam(':Date', $data['Date']);
                $requete->bindParam(':Heure', $data['Heure']);
                $requete->bindParam(':Email', $data['Email']);
                return $requete->execute();
            } catch (PDOException $e) {
                echo "Erreur lors de l'ajout de la signature : " . $e->getMessage();
                return false;
            }
        }
        return false;
    }

    public static function getAllSignatures($idp) {
        $connexion = DB::connect();
        if ($connexion) {
            try {
                $requete = $connexion->prepare(
                    "SELECT * FROM Signature WHERE IDP = :IDP ORDER BY Date ASC"
                );
                $requete->bindParam(':IDP', $idp);
                $requete->execute();
                return $requete->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                echo "Erreur lors de la récupération des signatures : " . $e->getMessage();
                return [];
            }
        }
        return [];
    }

    public static function getRecentSignatures($idPetition, $limit = 5) {
        $connexion = DB::connect();
        
        if ($connexion) {
            try {
                $requete = $connexion->prepare(
                    "SELECT * FROM Signature 
                     WHERE IDP = :idp
                     ORDER BY Date DESC, Heure DESC
                     LIMIT :limite"
                );
                $requete->bindParam(':idp', $idPetition);
                $requete->bindParam(':limite', $limit, PDO::PARAM_INT);
                $requete->execute();
                return $requete->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                return [];
            }
        }
        return [];
    }
}
?>