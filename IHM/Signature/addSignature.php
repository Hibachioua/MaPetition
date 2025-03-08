<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Ajouter une signature</title>
</head>
<body>
    <h1>Ajouter une signature</h1>

    <!-- 
         Le formulaire pointe vers l’action 'add' du contrôleur 'signature'.
         Adaptez l’URL (action du formulaire) en fonction de votre routing. 
    -->
    <form action="index.php?controller=signature&action=add" method="POST">
        
        <div>
            <label for="IDP">ID de la pétition :</label>
            <input type="number" name="IDP" id="IDP" required />
        </div>

        <div>
            <label for="Nom">Nom :</label>
            <input type="text" name="Nom" id="Nom" required />
        </div>

        <div>
            <label for="Prenom">Prénom :</label>
            <input type="text" name="Prenom" id="Prenom" required />
        </div>

        <div>
            <label for="Pays">Pays :</label>
            <input type="text" name="Pays" id="Pays" required />
        </div>

        <div>
            <label for="Date">Date :</label>
            <input type="date" name="Date" id="Date" required />
        </div>

        <div>
            <label for="Heure">Heure :</label>
            <input type="time" name="Heure" id="Heure" required />
        </div>

        <div>
            <label for="Email">Email :</label>
            <input type="email" name="Email" id="Email" required />
        </div>

        <div>
            <input type="submit" value="Signer" />
        </div>
    </form>
</body>
</html>
