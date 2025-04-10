function eliminaPrenotazione(id) { 
    if (confirm('Sei sicuro di voler eliminare questa prenotazione?')) { // 
        fetch('gestione_prenotazioni.php', { // Invia una richiesta HTTP al file gestione_prenotazioni.php che poi invierà una query al database per eliminare la prenotazione
            method: 'POST', // Invia il tipo di metodo: POST
            headers: { 
                'Content-Type': 'application/x-www-form-urlencoded', // Invia il tipo di contenuto della richiesta e in questo caso application/x-www-form-urlencoded è utilizzato per inviare dati del modulo in un formato codificato URL
            },                                                       // Questo formato è lo stesso utilizzato dai moduli HTML inviati tramite POST. E' necessario per la compatibilità con i server e l'interpretazione dei dati
            body: 'id=' + id // Invia l'id della prenotazione da eliminare
        })
        .then(response => response.text()) // Riceve la risposta e la converte a testo
        .then(data => { // Solo dopo aver ricevuto la risposta 
            alert(data); // Mostra un alert con il messaggio ricevuto
            location.reload(); // Ricarica la pagina per aggiornare la lista delle prenotazioni
        })
        .catch(error => console.error('Errore:', error)); // Se c'è un errore, lo mostra nella console
    }
}