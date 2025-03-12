function checkNewPetition() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '../../Traitement/controllers/PetitionController.php?action=checkNewPetition', true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            const newPetition = JSON.parse(xhr.responseText);
            if (newPetition && !newPetition.error) {
                showNotification(newPetition);
            }
        }
    };
    xhr.send();
}

function showNotification(petition) {
    const notificationHtml = `
        <div class="notification">
            <strong>Nouvelle Pétition!</strong>
            <p>Titre: ${petition.Titre}</p>
        </div>
    `;
    document.getElementById('notificationContainer').innerHTML += notificationHtml;

    // Faire disparaître la notification après 5 secondes
    setTimeout(() => {
        const notifications = document.querySelectorAll('.notification');
        notifications[notifications.length - 1].remove(); // Supprime la dernière notification
    }, 5000);
}

// Vérifiez les nouvelles pétitions toutes les 10 secondes
setInterval(checkNewPetition, 10000);
checkNewPetition(); // Appel initial pour vérifier les nouvelles pétitions