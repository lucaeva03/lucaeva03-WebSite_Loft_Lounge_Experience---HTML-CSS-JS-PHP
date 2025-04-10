<?php

// Dettagli di connessione al database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "prenotazioni";

// Crea connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controlla connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera i dati dal modulo
$nome = isset($_POST['nome']) ? $_POST['nome'] : ''; // se nome è definito e non nullo allora $nome = $_POST['nome'], altrimenti $nome = ''
$email = isset($_POST['email']) ? $_POST['email'] : '';
$telefono = isset($_POST['telefono']) ? $_POST['telefono'] : '';
$data_prenotazione = isset($_POST['data_prenotazione']) ? $_POST['data_prenotazione'] : '';
$ora_prenotazione = isset($_POST['ora_prenotazione']) ? $_POST['ora_prenotazione'] : '';
$numero_persone = isset($_POST['numero_persone']) ? $_POST['numero_persone'] : '';

// Prepara la query di inserimento
$sql = "INSERT INTO prenotazioni (nome, email, telefono, data_prenotazione, ora_prenotazione, numero_persone)
VALUES ('$nome', '$email', '$telefono', '$data_prenotazione', '$ora_prenotazione', '$numero_persone')";

// Esegue la query e controlla l'esito
if ($conn->query($sql) === TRUE) {
    header("Location: ../prenota_conferma.html");
    exit();
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

// Chiudi la connessione
$conn->close();
?>