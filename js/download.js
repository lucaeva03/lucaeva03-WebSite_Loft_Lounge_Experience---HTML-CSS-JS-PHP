document.addEventListener('DOMContentLoaded', function() {
    const bottoneDownload = document.getElementById('bottone-download');

    bottoneDownload.addEventListener('click', function() { // Al click del bottone
        const link = document.createElement('a'); // Crea un elemento <a> e lo assegna alla variabile link
        link.href = '/LoftLoungeExperience/pdf/Menu_Loft.pdf'; // Imposta l'attributo href del link con il percorso del file PDF
        link.download = 'Menu_Loft.pdf'; // Imposta l'attributo download del link con il nome del file da scaricare
        document.body.appendChild(link); // Aggiunge il link al corpo del documento
        link.click(); // Simula il click sul link
        document.body.removeChild(link); // Rimuove il link dal corpo del documento
    });
});