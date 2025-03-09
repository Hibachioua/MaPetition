<?php
// Récupérer l'ID de la pétition depuis l'URL
$idPetition = $_GET['id'] ?? '';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <title>Signer la pétition - PétitionAction</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="../assets/style.css">
   
</head>
<body>
    <header>
        <div class="wave"></div>
        <div class="container">
            <nav class="navbar">
                <a href="../index.php" class="logo">
                    <i class="fas fa-signature"></i>
                    PétitionAction
                </a>
                
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <ul class="nav-menu" id="navMenu">
                    <li><a href="../index.php" class="nav-link">Accueil</a></li>
                    <li><a href="../ListePetition.php" class="nav-link">Pétitions</a></li>
                    <li><a href="#" class="nav-link">Victoires</a></li>
                    <li><a href="#" class="nav-link">Comment ça marche</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="featured">
        <div class="container">
            <h2 class="section-title">Signer la pétition</h2>
            <p class="section-subtitle">Ajoutez votre voix pour soutenir cette cause</p>
            
            <?php if (isset($_GET['error'])): ?>
                <div class="alert alert-danger">
                    <?php if ($_GET['error'] === 'missing'): ?>
                        <i class="fas fa-exclamation-circle"></i> Veuillez remplir tous les champs obligatoires.
                    <?php elseif ($_GET['error'] === 'failed'): ?>
                        <i class="fas fa-exclamation-circle"></i> Une erreur s'est produite lors de l'ajout de votre signature. Veuillez réessayer.
                    <?php endif; ?>
                </div>
            <?php endif; ?>
            
            <?php if (isset($_GET['success'])): ?>
                <div class="alert alert-success">
                    <i class="fas fa-check-circle"></i> Votre signature a été ajoutée avec succès. Merci pour votre soutien !
                </div>
            <?php endif; ?>
            
            <form action="/MAPETITION/Traitement/Signature.php" method="POST" class="petition-form">
                <input type="hidden" name="IDP" value="<?php echo htmlspecialchars($idPetition); ?>" />
                
                <div class="form-group">
                    <label for="Nom">Nom :</label>
                    <input type="text" name="Nom" id="Nom" required class="form-control" placeholder="Votre nom de famille" />
                </div>

                <div class="form-group">
                    <label for="Prenom">Prénom :</label>
                    <input type="text" name="Prenom" id="Prenom" required class="form-control" placeholder="Votre prénom" />
                </div>

                <div class="form-group">
                    <label for="Pays">Pays :</label>
                    <input type="text" name="Pays" id="Pays" required class="form-control" placeholder="Votre pays" />
                </div>

                <div class="form-group">
                    <label for="Email">Email :</label>
                    <input type="email" name="Email" id="Email" required class="form-control" placeholder="votre.email@exemple.com" />
                </div>

                <!-- Les champs Date et Heure sont maintenant cachés car ils seront définis automatiquement -->
                <input type="hidden" name="useSystemDate" value="1" />

                <div class="form-actions">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-pen-fancy"></i> Signer la pétition
                    </button>
                </div>
            </form>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-column">
                    <h3>PétitionAction</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-info-circle"></i> À propos</a></li>
                        <li><a href="#"><i class="fas fa-chart-line"></i> Impact</a></li>
                        <li><a href="#"><i class="fas fa-users"></i> Équipe</a></li>
                        <li><a href="#"><i class="fas fa-envelope"></i> Contact</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Ressources</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-book"></i> Guide pour réussir</a></li>
                        <li><a href="#"><i class="fas fa-trophy"></i> Histoires de réussite</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Légal</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Confidentialité</a></li>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Conditions</a></li>
                    </ul>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>&copy; 2023 PétitionAction. Tous droits réservés.</p>
            </div>
        </div>
    </footer>
</body>
</html>