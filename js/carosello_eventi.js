// Viene eseguita la funzione dopo che il DOM è stato caricato
document.addEventListener('DOMContentLoaded', function() {
    // Seleziona l'elemento <ul> all'interno del carosello
    const carosello = document.querySelector('.sezioni-carosello-eventi-index ul');
    // Seleziona tutti gli elementi <li> (immagini) all'interno del carosello
    const images = carosello.querySelectorAll('li');
    // Conta il numero totale di immagini nel carosello
    const totalImages = images.length;
    // Inizializza l'indice corrente dell'immagine visualizzata
    let currentIndex = 0;
    // Inizializza la direzione dello scorrimento (1 per avanti, -1 per indietro)
    let direzione = 1;

    // Funzione per mostrare l'immagine successiva
    function showNextImage() {
        // Incrementa o decrementa l'indice corrente in base alla direzione
        currentIndex += direzione;

        // Se l'indice corrente supera il numero totale di immagini meno 3
        if (currentIndex >= totalImages-4) {
            // Cambia direzione a indietro
            direzione = -1;
            currentIndex = totalImages-4; // Si ferma quando è visibile l'ultima immagine
        } else if (currentIndex < 0) {
            // Cambia direzione a avanti
            direzione = 1;
            currentIndex = 1; // Vai alla seconda immagine
        }

        // Calcola l'offset per spostare il carosello
        const offset = -currentIndex * 26.9; // Percentuale corrispondente alla larghezza delle immagini
        // Applica la trasformazione per spostare il carosello
        carosello.style.transform = `translateX(${offset}%)`;
    }

    // Imposta un intervallo per cambiare immagine ogni 4 secondi
    setInterval(showNextImage, 4000);
});