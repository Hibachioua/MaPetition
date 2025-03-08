<?php

function connexionBD() {
    $serveur = "localhost";
    $utilisateur = "root";
    $motdepasse = "";
    $basededonnees = "petition";
    
    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$basededonnees", $utilisateur, $motdepasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        return null;
    }
}

?>
