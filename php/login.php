<?php include("config.php");      //connessione al database

session_start();


if(isset($_POST['login'])) {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connessione, $username);
    $password = mysqli_real_escape_string($connessione, $password);

    $query = "SELECT * FROM utentiourf99 WHERE username = '{$username}' ";

    $trova_utente = mysqli_query($connessione, $query);

    if (!$trova_utente) 
    {
        //messaggio di errore con la connessione al database
        die('RICHIESTA FALLITA' . mysqli_error($connessione));
    }

    while ($row = mysqli_fetch_array($trova_utente)) 
    {
        $idUtente = $row['id'];
        $nomeUtente = $row['username'];
        $passUtente = $row['pass'];
        $ruoloUtente = $row ['tipologia'];
    }

    if ($username === $nomeUtente && $password === $passUtente) 
    {
        //mi passo con le variabili globali '$_SESSION' l'username degli utenti ed il rispettivo ruolo 
        $_SESSION['utente'] = $nomeUtente;
        $_SESSION['tipologia'] = $ruoloUtente;
        $_SESSION['idutente'] = $idUtente;
        
        /*mi passo una variabile globale '$_SESSION' per sapere se è stato effettuato o meno un login, perché se è stato effettuato
        cambia la pagina di indirizzamento, dove prima c'era 'login' ora ci sarà un'altra pagina*/
        $_SESSION['accesso'] = true;

            header('Location: ../paginautente.php');
    }
}

?>