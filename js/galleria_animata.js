document.addEventListener('DOMContentLoaded', function() {
    const carte = document.querySelectorAll('.contenitore-carta'); // Seleziona tutte le carte

    carte.forEach(carta => { // Per ogni carta
        setInterval(() => { // Imposta un intervallo per ruotare la carta
            const flip = Math.random() > 0.5; // Genera un numero casuale tra 0 e 1 e se è maggiore di 0.5, flip è true
            carta.style.transform = flip ? 'rotateY(180deg)' : 'rotateY(0deg)'; // Ruota la carta di 180 gradi se flip è true, altrimenti la ruota di 0 gradi
        }, Math.random() * 5000 + 5000); // Imposta un intervallo casuale tra 5 e 10 secondi
    });
});