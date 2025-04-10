<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prenotazioni";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Gestisci la richiesta di eliminazione
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) { // se il metodo di richiesta è POST e l'array $_POST contiene la chiave 'id'
    $id = intval($_POST['id']); // intval() restituisce il valore id
    $sql = "DELETE FROM prenotazioni WHERE id = $id"; // preparazione query per eliminare la prenotazione con id uguale a $id
    if ($conn->query($sql) === TRUE) { // esecuzione della query e controllo dell'esito
        echo "Prenotazione eliminata con successo";
    } else {
        echo "Errore durante l'eliminazione della prenotazione: " . $conn->error;
    }
    $conn->close(); // chiusura della connessione
    exit;
}

// Recupera le prenotazioni
$sql = "SELECT id, nome, email, telefono, data_prenotazione, ora_prenotazione, numero_persone FROM prenotazioni ORDER BY data_prenotazione ASC, ora_prenotazione ASC";
$risultato = $conn->query($sql); // esecuzione della query e memorizzazione in $ristultato

// Creazione di un array per memorizzare le prenotazioni
$prenotazioni = array();
if ($risultato->num_rows > 0) { // se il numero di righe restituite dalla query è maggiore di 0
    while($row = $risultato->fetch_assoc()) { // finché ci sono righe da leggere
        $prenotazioni[] = $row; // aggiungi la riga all'array $prenotazioni
    }
}

$conn->close(); // chiusura della connessione

?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Prenotazioni - Loft Lounge Experience</title>
    <link rel="stylesheet" href="stile/stile-gp.css">
    <script src="gestione_prenotazioni.js"></script> 
</head>
<body>
    <h1>Gestione Prenotazioni - Loft Lounge Experience</h1>
    <table id="prenotazioni">
            <tr>
                <th>Nome</th>
                <th>Email</th>
                <th class="centro">Telefono</th>
                <th class="centro">Data</th>
                <th class="centro">Ora</th>
                <th class="centro">Numero di Persone</th>
                <th class="centro">Elimina</th>
            </tr>
            <?php foreach ($prenotazioni as $prenotazione): ?> <!-- per ogni prenotazione nell'array $prenotazioni -->
            <tr>
                <!-- stampa i valori dei campi della prenotazione e il bottone di eliminazione -->
                <td><?php echo htmlspecialchars($prenotazione['nome']); ?></td>
                <td><?php echo htmlspecialchars($prenotazione['email']); ?></td>
                <td class="centro"><?php echo htmlspecialchars($prenotazione['telefono']); ?></td>
                <td class="centro"><?php echo htmlspecialchars($prenotazione['data_prenotazione']); ?></td>
                <td class="centro"><?php echo htmlspecialchars($prenotazione['ora_prenotazione']); ?></td>
                <td class="centro"><?php echo htmlspecialchars($prenotazione['numero_persone']); ?></td>
                <td class="centro">
                    <button onclick="eliminaPrenotazione(<?php echo $prenotazione['id']; ?>)">Elimina</button>
                </td>
            </tr>
            <?php endforeach; ?>
    </table>
</body>
</html>