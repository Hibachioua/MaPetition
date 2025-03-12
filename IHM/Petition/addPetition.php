<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une pétition - PétitionAction</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="css/addPetitionStyle.css">
    <link rel="stylesheet" href="../../assets/style.css">
    <link rel="stylesheet" href="css/listPetitionStyle.css">
</head>
<body>

<div id="notificationContainer" class="notification-container"></div>
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Ajouter une pétition</h1>
            <p class="page-subtitle">Créez une nouvelle pétition pour une cause importante.</p>
        </div>

        <div class="petition-form-container">
            <div class="form-section">
                <h2 class="form-section-title">Informations de la pétition</h2>

                <?php if (isset($_GET['error'])): ?>
                    <div class="error-message">
                        <i class="fas fa-exclamation-circle"></i> 
                        <?php if ($_GET['error'] === 'missing'): ?>
                            Veuillez remplir tous les champs obligatoires.
                        <?php elseif ($_GET['error'] === 'failed'): ?>
                            Une erreur s'est produite lors de l'ajout de la pétition. Veuillez réessayer.
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <?php if (isset($_GET['success'])): ?>
                    <div class="success-message">
                        <i class="fas fa-check-circle"></i> Votre pétition a été ajoutée avec succès. Merci pour votre engagement !
                    </div>
                <?php endif; ?>
                
                <form action="../../Traitement/controllers/PetitionController.php?action=creer" method="POST" class="petition-form">
                    <div class="form-group">
                        <label for="Titre" class="form-label">Titre :</label>
                        <input type="text" name="Titre" id="Titre" required class="form-control" placeholder="Titre de la pétition" />
                    </div>

                    <div class="form-group">
                        <label for="Description" class="form-label">Description :</label>
                        <textarea name="Description" id="Description" required class="form-control" placeholder="Description de la pétition"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="DateFinP" class="form-label">Date de fin :</label>
                        <input type="date" name="DateFinP" id="DateFinP" required class="form-control" />
                    </div>

                    <div class="form-group">
                        <label for="PorteurP" class="form-label">Porteur de la pétition :</label>
                        <input type="text" name="PorteurP" id="PorteurP" required class="form-control" placeholder="Nom du porteur de la pétition" />
                    </div>

                    <div class="form-group">
                        <label for="Email" class="form-label">Email :</label>
                        <input type="email" name="Email" id="Email" required class="form-control" placeholder="votre.email@exemple.com" />
                    </div>

                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus-circle"></i> Ajouter la pétition
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="js/notifications.js"></script>
</body>
</html>