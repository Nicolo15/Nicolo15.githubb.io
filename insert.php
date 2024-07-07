<?php
// Configurazione di connessione al database (ad esempio con MySQLi)
$servername = "localhost"; // Indirizzo del server MySQL
$username = "root"; // Nome utente MySQL
$password = "Vmware1!"; // Password MySQL (lascia vuoto se non hai impostato una password)
$dbname = "magliette"; // Nome del database

// Connessione al database
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Verifica se sono stati inviati i dati tramite POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recupera i dati inviati dal form
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    // Verifica che i campi non siano vuoti
    if (!empty($name) && !empty($email) && !empty($description)) {
        // Prepara la query SQL per l'inserimento dei dati
        $stmt = $conn->prepare("INSERT INTO magliette_personalizzate (name, email, description, data_inserimento) VALUES (?, ?, ?, NOW())");

        // Verifica se la preparazione della query è riuscita
        if ($stmt === false) {
            die('Errore nella preparazione della query: ' . $conn->error);
        }

        // Bind dei parametri alla query preparata
        $stmt->bind_param("sss", $name, $email, $description);

        // Esecuzione della query preparata
        if ($stmt->execute()) {
            echo "Dati inseriti correttamente nel database.";
        } else {
            echo "Errore nell'esecuzione della query: " . $stmt->error;
        }

        // Chiudi lo statement preparato
        $stmt->close();
    } else {
        echo "Tutti i campi sono obbligatori.";
    }
}

// Chiudi la connessione al database
$conn->close();
?>
