<?php
// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Inclure le fichier de connexion
require_once 'BD/connexion.php';

// Tester la connexion
echo "<h2>Test de connexion à la base de données</h2>";

// Essayer d'établir une connexion
$connexion = connexionBD();

if ($connexion) {
    echo "<p style='color: green; font-weight: bold;'>✓ Connexion réussie à la base de données !</p>";
    
    // Tester que la table Signature existe
    try {
        $requete = $connexion->query("SHOW TABLES LIKE 'Signature'");
        $tableExiste = $requete->rowCount() > 0;
        
        if ($tableExiste) {
            echo "<p style='color: green;'>✓ La table 'Signature' existe.</p>";
            
            // Afficher la structure de la table
            $requete = $connexion->query("DESCRIBE Signature");
            $colonnes = $requete->fetchAll(PDO::FETCH_ASSOC);
            
            echo "<h3>Structure de la table Signature :</h3>";
            echo "<table border='1' cellpadding='5'>";
            echo "<tr><th>Champ</th><th>Type</th><th>Null</th><th>Clé</th><th>Défaut</th><th>Extra</th></tr>";
            
            foreach ($colonnes as $colonne) {
                echo "<tr>";
                echo "<td>" . $colonne['Field'] . "</td>";
                echo "<td>" . $colonne['Type'] . "</td>";
                echo "<td>" . $colonne['Null'] . "</td>";
                echo "<td>" . $colonne['Key'] . "</td>";
                echo "<td>" . $colonne['Default'] . "</td>";
                echo "<td>" . $colonne['Extra'] . "</td>";
                echo "</tr>";
            }
            
            echo "</table>";
            
            // Compter les signatures
            $requete = $connexion->query("SELECT COUNT(*) AS total FROM Signature");
            $resultat = $requete->fetch(PDO::FETCH_ASSOC);
            echo "<p>Nombre total de signatures : " . $resultat['total'] . "</p>";
            
        } else {
            echo "<p style='color: red;'>✗ La table 'Signature' n'existe pas !</p>";
        }
        
    } catch (PDOException $e) {
        echo "<p style='color: red;'>Erreur lors de la vérification de la table : " . $e->getMessage() . "</p>";
    }
    
} else {
    echo "<p style='color: red; font-weight: bold;'>✗ Échec de la connexion à la base de données.</p>";
    echo "<p>Vérifiez les paramètres suivants dans votre fichier connexion.php :</p>";
    echo "<ul>";
    echo "<li>Serveur : localhost</li>";
    echo "<li>Port : 3307</li>";
    echo "<li>Utilisateur : root</li>";
    echo "<li>Mot de passe : (vide)</li>";
    echo "<li>Base de données : petition</li>";
    echo "</ul>";
}
?>