<?php

function connexionBD() {
    $serveur       = "localhost";
    $port          = "3306"; 
    $utilisateur   = "root";
    $motdepasse    = "";
    $basededonnees = "petition";
    
    try {
        
        $connexion = new PDO("mysql:host=$serveur;port=$port;dbname=$basededonnees", $utilisateur, $motdepasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        return null;
    }
}

?>
