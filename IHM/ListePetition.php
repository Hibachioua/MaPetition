<?php
session_start();
$petitions = $_SESSION['petitions'] ?? [];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PétitionAction - Plateforme de pétitions en ligne</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="assets/style.css">

</head>
<body>
    <header>
        <div class="wave"></div>
        <div class="container">
            <nav class="navbar">
                <a href="index.php" class="logo">
                    <i class="fas fa-signature"></i>
                    PétitionAction
                </a>
                
                <button class="menu-toggle" id="menuToggle">
                    <i class="fas fa-bars"></i>
                </button>
                
                <ul class="nav-menu" id="navMenu">
                    <li><a href="index.php" class="nav-link">Accueil</a></li>
                    <li><a href="../Traitement/petition.php?action=lister" class="nav-link">Pétitions</a></li>
                    <li><a href="#" class="nav-link">Victoires</a></li>
                    <li><a href="#" class="nav-link">Comment ça marche</a></li>
                </ul>
                
                <a href="creerPetition.php" class="btn btn-primary">Créer une Pétition</a>
            </nav>
        </div>
    </header>

    <section class="featured">
        <div class="container">
            <h2 class="section-title">Liste des Pétitions</h2>
            <p class="section-subtitle">Découvrez les pétitions que vous pouvez soutenir</p>
            <?php if (!empty($petitions)): ?>
                <div class="card-grid">
                    <?php foreach ($petitions as $petition): ?>
                        <div class="card">
                            <div class="card-image">
                                <div class="card-image-bg"></div>
                                <i class="fas fa-pencil-alt"></i>
                            </div>
                            <div class="card-content">
                                <h3 class="card-title"><?php echo htmlspecialchars($petition['Titre']); ?></h3>
                                <p class="card-text"><?php echo htmlspecialchars($petition['Description']); ?></p>
                                <em>Publié le : <?php echo htmlspecialchars($petition['DatePublic']); ?></em>
                                <div class="card-footer">
                                <a href="../Traitement/signature.php?action=creerSignature&id=<?php echo $petition['IDP']; ?>" class="btn btn-primary">Signer cette pétition</a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <p>Aucune pétition disponible.</p>
            <?php endif; ?>
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
                        <li><a href="#"><i class="fas fa-graduation-cap"></i> Conseils</a></li>
                        <li><a href="#"><i class="fas fa-trophy"></i> Histoires de réussite</a></li>
                        <li><a href="#"><i class="fas fa-list-alt"></i> Blog</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Légal</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fas fa-shield-alt"></i> Confidentialité</a></li>
                        <li><a href="#"><i class="fas fa-file-contract"></i> Conditions</a></li>
                        <li><a href="#"><i class="fas fa-cookie"></i> Cookies</a></li>
                        <li><a href="#"><i class="fas fa-gavel"></i> Règles de la communauté</a></li>
                    </ul>
                </div>
                
                <div class="footer-column">
                    <h3>Suivez-nous</h3>
                    <ul class="footer-links">
                        <li><a href="#"><i class="fab fa-facebook-f"></i> Facebook</a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i> Twitter</a></li>
                        <li><a href="#"><i class="fab fa-instagram"></i> Instagram</a></li>
                        <li><a href="#"><i class="fab fa-linkedin-in"></i> LinkedIn</a></li>
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