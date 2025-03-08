<?php
class SignatureModel
{
    private $db; 

    public function __construct($db)
    {
        $this->db = $db;
    }

    /**
     * Insère une nouvelle signature dans la table Signature
     */
    public function createSignature($data)
    {
        $sql = "INSERT INTO Signature (IDP, Nom, Prenom, Pays, Date, Heure, Email)
                VALUES (:IDP, :Nom, :Prenom, :Pays, :Date, :Heure, :Email)";
        
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':IDP', $data['IDP']);
        $stmt->bindParam(':Nom', $data['Nom']);
        $stmt->bindParam(':Prenom', $data['Prenom']);
        $stmt->bindParam(':Pays', $data['Pays']);
        $stmt->bindParam(':Date', $data['Date']);
        $stmt->bindParam(':Heure', $data['Heure']);
        $stmt->bindParam(':Email', $data['Email']);
        
        return $stmt->execute();
    }

    /*
     * ajouter ici d'autres méthodes 
     * (lister les signatures, les modifier, les supprimer, etc.)
     */
}