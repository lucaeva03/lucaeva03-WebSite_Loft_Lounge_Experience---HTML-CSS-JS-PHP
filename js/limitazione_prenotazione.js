document.addEventListener('DOMContentLoaded', function() {
    // Crea un oggetto oggi con la data di oggi
    const oggi = new Date();
    // Crea un oggetto domani con la data di oggi + 1 giorno
    const domani = new Date(oggi);
    domani.setDate(oggi.getDate() + 1);
    // Ottieni la data di domani in formato str (stringa) yyyy-mm-dd
    const domaniStr = domani.toISOString().split('T')[0];
    // Imposta l'attributo min del campo data_prenotazione con la data di domani
    document.getElementById('data_prenotazione').setAttribute('min', domaniStr);
});