function loadTopPetition() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../Traitement/controllers/PetitionController.php?action=topPetition', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const topPetition = JSON.parse(xhr.responseText);
            document.getElementById('topPetition').innerHTML =
                `<div class="card-image">
                    <div class="card-image-bg"></div>
                    <i class="fas fa-star"></i>
                    <span class="victory-badge">Top Pétition</span>
                </div>
                <div class="card-content">
                    <h3 class="card-title">${topPetition.Titre}</h3>
                    <p class="card-text">${topPetition.Description}</p>
                    <p class="card-text">Cette pétition a le plus de signatures !</p>
                    <div class="card-footer">
                        <span class="signature-count">
                            <i class="fas fa-signature"></i> ${topPetition.nbSignatures} signatures
                        </span>
                        <a href="../../Traitement/controllers/SignatureController.php?action=creerSignature&id=${topPetition.IDP}" class="btn btn-primary">Signer cette pétition</a>
                    </div>
                </div>`;
        }
    };
    xhr.send();
}

// Vérifiez la pétition avec le plus de signatures toutes les 5 secondes
setInterval(loadTopPetition, 5000);
loadTopPetition(); // Appel initial pour charger la pétition