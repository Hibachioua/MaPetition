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
                
                <a href="creerPetition.php?action=creer" class="btn btn-primary">Créer une Pétition</a>
            </nav>
            
            <div class="hero">
                <h1 class="hero-title">Ensemble, créons le changement</h1>
                <p class="hero-subtitle">Lancez votre pétition aujourd'hui et mobilisez une communauté pour faire entendre votre voix</p>
                
                <div class="hero-actions">
                <a href="../Traitement/petition.php?action=lister" class="btn btn-secondary">Voir les Pétitions</a>
                <a href="../Traitement/petition.php?action=creer" class="btn btn-primary">Créer une Pétition</a>
                </div>
                
                <div class="stats-bar">
                    <div class="stat-item">
                        <span class="stat-number">750+</span>
                        <span class="stat-label">Pétitions actives</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">38K+</span>
                        <span class="stat-label">Signatures</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">215+</span>
                        <span class="stat-label">Victoires</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    
    <section class="featured">
        <div class="container">
            <h2 class="section-title">Récentes victoires</h2>
            <p class="section-subtitle">Découvrez comment des citoyen·ne·s comme vous ont réussi à créer un impact positif</p>
            
            <div class="category-tags">
                <a href="#" class="category-tag">Environnement</a>
                <a href="#" class="category-tag">Éducation</a>
                <a href="#" class="category-tag">Droits humains</a>
                <a href="#" class="category-tag">Santé</a>
                <a href="#" class="category-tag">Transport</a>
                <a href="#" class="category-tag">Culture</a>
            </div>
            
            <div class="card-grid">
                <div class="card">
                    <div class="card-image">
                        <div class="card-image-bg"></div>
                        <i class="fas fa-tree"></i>
                        <span class="victory-badge">Victoire</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Préservation du parc municipal</h3>
                        <p class="card-text">Grâce à notre mobilisation, la mairie a abandonné le projet de construction qui menaçait notre espace vert.</p>
                        <div class="card-footer">
                            <span class="signature-count">
                                <i class="fas fa-signature"></i> 2,378 signatures
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-image">
                        <div class="card-image-bg"></div>
                        <i class="fas fa-bus-alt"></i>
                        <span class="victory-badge">Victoire</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Amélioration du transport scolaire</h3>
                        <p class="card-text">De nouveaux bus ont été ajoutés pour le confort et la sécurité des élèves suite à notre pétition.</p>
                        <div class="card-footer">
                            <span class="signature-count">
                                <i class="fas fa-signature"></i> 1,543 signatures
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class="card">
                    <div class="card-image">
                        <div class="card-image-bg"></div>
                        <i class="fas fa-book-reader"></i>
                        <span class="victory-badge">Victoire</span>
                    </div>
                    <div class="card-content">
                        <h3 class="card-title">Rénovation de la bibliothèque</h3>
                        <p class="card-text">Le conseil municipal a voté un budget de rénovation complète suite à notre mobilisation collective.</p>
                        <div class="card-footer">
                            <span class="signature-count">
                                <i class="fas fa-signature"></i> 3,104 signatures
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section class="how-it-works">
        <div class="container">
            <h2 class="section-title">Comment ça marche</h2>
            <p class="section-subtitle">Trois étapes simples pour faire entendre votre voix et créer du changement</p>
            
            <div class="steps">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-edit"></i>
                    </div>
                    <h3 class="step-title">Créez</h3>
                    <p class="step-text">Lancez une pétition en quelques minutes et exposez clairement votre cause.</p>
                </div>
                
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-share-alt"></i>
                    </div>
                    <h3 class="step-title">Partagez</h3>
                    <p class="step-text">Diffusez votre pétition sur les réseaux sociaux et mobilisez votre communauté.</p>
                </div>
                
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-bullhorn"></i>
                    </div>
                    <h3 class="step-title">Gagnez</h3>
                    <p class="step-text">Utilisez la force du nombre pour convaincre les décideurs et obtenir des résultats.</p>
                </div>
            </div>
        </div>
    </section>
    
    <section class="testimonials">
        <div class="container">
            <h2 class="section-title">Témoignages</h2>
            <p class="section-subtitle">Des personnes qui ont réussi à faire changer les choses grâce à leurs pétitions</p>
            
            <div class="testimonial-slider">
                <div class="testimonial-avatar">
                    <!-- Placeholder for avatar -->
                    <div style="width: 100%; height: 100%; background: linear-gradient(135deg, #e94057 0%, #f27121 100%);"></div>
                </div>
                <p class="testimonial-text">"Grâce à notre pétition qui a rassemblé plus de 2000 signatures, nous avons réussi à convaincre la mairie de préserver notre parc municipal au lieu de le transformer en centre commercial. C'est une victoire importante pour notre communauté et l'environnement."</p>
                <p class="testimonial-author">Sophie Martin</p>
                <p class="testimonial-role">Militante écologiste</p>
            </div>
        </div>
    </section>
    
    <section class="cta">
        <div class="container">
            <div class="cta-content">
                <h2 class="cta-title">Prêt à faire entendre votre voix ?</h2>
                <p class="cta-text">Rejoignez des milliers de personnes qui ont déjà créé du changement grâce à leurs pétitions.</p>
                <a href="?page=creerPetition" class="cta-button">Créer ma pétition maintenant</a>
            </div>
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
    
  <script src="assets/script.js" ></script>
</body>
</html>
