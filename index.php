<?php
//variabili contenenti i dati di connessione al db

$db_hostname = "localhost";
$db_username = "root";
$db_password = "root";
$db_name = "example_db";

//creo connessione al db
$connection = new mysqli( $db_hostname, $db_username, $db_password, $db_name);

/**
 * Check sulla connesione al db che mostra un messaggio di errore nel caso in cui
 * qualcosa non sia andato a buon fine.
 */
if ( $connection-> connect_error ) {
    die( 'Connessione al database non riuscita' . $connection-> connection_error );
}

//Query
$query = 'SELECT id, title, date, content FROM posts';
$query_result = $connection->query($query);

?>

<!DOCTYPE html>
<html>
    <head>
        <title>index</title>
        <meta name="description" content="Main page camere da letto">
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <section>
            <?php
                if ( $query_result->num_rows > 0 ) {
                    while( $row = $query_result->fetch_assoc()) {
                    //Codice HTML per formattare i post
                    
                ?>
                <div class='post' id="<?php echo $row['id']; ?>">
                    <h1 style="text-align: center;"><?php echo $row['title']; ?></h1>
                    <div class="testo">
                        <time datetime="<?php echo $row['date']; ?>"><?php echo $row['date']; ?></time>
                        <p><?php echo $row['content']; ?></p>
                    </div>
                </div>
                <?php 
                    }
                }
                ?>
        </section>
    </body>
</html>