<?php
class connexion {
    static public function connect(){
        $pdo = new PDO('mysql:host=localhost;dbname=mapetition', 'root', '');
        $pdo->exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    }
}
?>