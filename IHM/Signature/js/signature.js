document.addEventListener('DOMContentLoaded', function() {
    const now = new Date();
    const dateFormatted = now.toISOString().slice(0, 10);
    document.getElementById('Date').value = dateFormatted;

    const timeFormatted = now.getHours().toString().padStart(2, '0') + ':' + 
                          now.getMinutes().toString().padStart(2, '0');
    document.getElementById('Heure').value = timeFormatted;

    loadRecentSignatures();

    document.getElementById('signatureForm').addEventListener('submit', function(event) {
        event.preventDefault(); 
        this.submit(); 
        loadRecentSignatures(); 
    });

    function loadRecentSignatures() {
        const petitionId = document.getElementById('IDP').value;
        if (!petitionId) return;

        const container = document.getElementById('signaturesContainer');
        container.innerHTML = '<div class="loading-spinner" style="display:block"><div class="spinner"></div><p>Chargement des signatures...</p></div>';

        const xhr = new XMLHttpRequest();
        xhr.open('GET', '../../Traitement/controllers/SignatureController.php?action=recentesSignatures&id=' + petitionId, true);

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    try {
                        const signatures = JSON.parse(xhr.responseText);
                        let html = '';

                        if (signatures.length === 0) {
                            html = '<p>Aucune signature pour cette pétition pour le moment.</p>';
                        } else {
                            signatures.forEach(function(signature) {
                                html += `
                                    <div class="signature-item">
                                        <div class="signature-name">${signature.Prenom} ${signature.Nom}</div>
                                        <div class="signature-meta">
                                            <span>${signature.Pays}</span>
                                            <span>${formatDate(signature.Date)} ${signature.Heure}</span>
                                        </div>
                                    </div>
                                `;
                            });
                        }

                        container.innerHTML = html;
                    } catch (e) {
                        container.innerHTML = '<p>Erreur lors du chargement des signatures.</p>';
                    }
                } else {
                    container.innerHTML = '<p>Erreur lors du chargement des signatures.</p>';
                }
            }
        };

        xhr.send();
    }

    function formatDate(dateStr) {
        if (!dateStr) return '';
        const parts = dateStr.split('-');
        return parts[2] + '/' + parts[1] + '/' + parts[0];
    }
});