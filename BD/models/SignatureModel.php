<?php

require_once '../BD/connexion.php';
/**
 * Insère une nouvelle signature dans la table Signature
 *
 * @param PDO   $db   Instance PDO
 * @param array $data Les données de la signature

 */
function createSignature($data) {
    $connexion = connexionBD();
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
        } catch(PDOException $e) {
            echo "Erreur lors de l'ajout de la signature : " . $e->getMessage();
            return false;
        }
    }
    return false;
}

function getAllSignatures($idp) {
    $connexion = connexionBD();
    if ($connexion) {
        try {
            $requete = $connexion->prepare(
                "SELECT * FROM Signature WHERE IDP = :IDP ORDER BY Date ASC"
            );
            $requete->bindParam(':IDP', $idp);
            $requete->execute();
            return $requete->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            echo "Erreur lors de la récupération des signatures : " . $e->getMessage();
            return [];
        }
    }
    return [];
}



?>