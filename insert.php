<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', 'Vmware1!', 'magliette');

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Prendi i dati inviati dal form
$name = $_POST['name'];
$email = $_POST['email'];
$description = $_POST['description'];

// Prepara la query SQL per l'inserimento
$stmt = $conn->prepare("INSERT INTO magliette_personalizzate (name, email, descrizione, data_inserimento) VALUES (?, ?, ?, NOW())");

// Verifica se la preparazione della query è andata a buon fine
if ($stmt === false) {
    die('Errore di preparazione della query SQL: ' . $conn->error);
}

// Bind dei parametri e esecuzione della query
$stmt->bind_param("sss", $name, $email, $description);

if ($stmt->execute()) {
    echo "Record inserito con successo!";
} else {
    echo "Errore durante l'inserimento del record: " . $stmt->error;
}

// Chiusura dello statement e della connessione
$stmt->close();
$conn->close();
?>
