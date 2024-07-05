<?php
$servername = "localhost";
$username = "root"; // Cambia questo se il tuo nome utente del database è diverso
$password = "Vmware1!"; // Cambia questo se la tua password del database è diversa
$dbname = "magliette"; // Cambia questo con il nome del tuo database

// Creazione della connessione
$conn = new mysqli($servername, $username, $password, $dbname);

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Preparazione dei dati del form
$name = $conn->real_escape_string($_POST['name']);
$email = $conn->real_escape_string($_POST['email']);
$description = $conn->real_escape_string($_POST['description']);
$datainserimento = date("Y-m-d H:i:s");

// Query SQL per l'inserimento dei dati
$sql = "INSERT INTO magliette_personalizzate (descrizione, datainserimento) VALUES ('$description', '$datainserimento')";

if ($conn->query($sql) === TRUE) {
    echo "Nuovo record creato con successo";
} else {
    echo "Errore: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
