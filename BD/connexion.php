<?php

function connexionBD() {
    $serveur       = "localhost";
    $port          = "3307"; // port MySQL par défaut
    $utilisateur   = "root";
    $motdepasse    = "";
    $basededonnees = "petition";
    
    try {
        // On ajoute ";port=$port" au DSN
        $connexion = new PDO("mysql:host=$serveur;port=$port;dbname=$basededonnees", $utilisateur, $motdepasse);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connexion;
    } catch(PDOException $e) {
        echo "Erreur de connexion : " . $e->getMessage();
        return null;
    }
}

?>
