<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signer la pétition - PétitionAction</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="styleSignature.css">
</head>
<body>
    <?php 
    $idPetition = isset($_GET['id']) ? $_GET['id'] : '';
    $success = isset($_GET['success']) ? $_GET['success'] : false;
    $error = isset($_GET['error']) ? $_GET['error'] : false;
    ?>
    
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Signer la pétition</h1>
            <p class="page-subtitle">Votre signature est importante pour faire avancer cette cause. Merci de prendre le temps de soutenir cette pétition.</p>
        </div>
        
        <div class="signature-form-container">
            <div class="form-section">
                <h2 class="form-section-title">Informations personnelles</h2>
                
                <form id="signatureForm" action="../../Traitement/signature.php" method="POST">
                    <input type="hidden" name="action" value="ajouterSignature">
                    <input type="hidden" name="IDP" id="IDP" value="<?php echo htmlspecialchars($idPetition); ?>" />
                    
                    <div class="form-group">
                        <label for="Nom" class="form-label">Nom</label>
                        <input type="text" name="Nom" id="Nom" class="form-control" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="Prenom" class="form-label">Prénom</label>
                        <input type="text" name="Prenom" id="Prenom" class="form-control" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="Pays" class="form-label">Pays</label>
                        <input type="text" name="Pays" id="Pays" class="form-control" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="Email" class="form-label">Email</label>
                        <input type="email" name="Email" id="Email" class="form-control" required />
                        <p class="form-note">Votre email ne sera pas rendu public.</p>
                    </div>
                    
                    <div class="form-group">
                        <label for="Date" class="form-label">Date</label>
                        <input type="date" name="Date" id="Date" class="form-control" required />
                    </div>
                    
                    <div class="form-group">
                        <label for="Heure" class="form-label">Heure</label>
                        <input type="time" name="Heure" id="Heure" class="form-control" required />
                    </div>
                    
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary" id="btnSignature">
                            <i class="fas fa-signature"></i> Signer la pétition
                        </button>
                    </div>
                </form>
                
                <div id="successMessage" class="success-message" <?php if($success) echo 'style="display:block"'; ?>>
                    <i class="fas fa-check-circle"></i> Votre signature a été ajoutée avec succès. Merci pour votre soutien !
                </div>
                
                <div id="errorMessage" class="error-message" <?php if($error) echo 'style="display:block"'; ?>>
                    <i class="fas fa-exclamation-circle"></i> Une erreur s'est produite. Veuillez réessayer.
                </div>
            </div>
            
            <div class="form-section">
                <h2 class="form-section-title">Signatures récentes</h2>
                
                <div class="recent-signatures">
                    <p>Les 5 dernières personnes qui ont signé cette pétition :</p>
                    
                    <div id="signaturesContainer" class="signatures-list">
                        <div class="loading-spinner" style="display:block">
                            <div class="spinner"></div>
                            <p>Chargement des signatures...</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="../assets/script.js" ></script>
</body>
</html>