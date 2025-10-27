<?php

$dsn = 'mysql:host=mysql;dbname=test;port=3306;charset=utf8mb4';

try {
    $dbh = new PDO($dsn, 'root', '');
}
catch(PDOException $e) {
    //print_r($dbh->errorInfo()); // Error: $dbh ist kein gültiges Objekt
    print_r($e->getMessage());
    print_r($e->errorInfo); // Kann über die Exception abgefragt werden
    die(); // Beendet das Script
}

//$options = [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
//$dbh = new PDO($dsn, 'root', '', $options);

$dbh->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Default für die Verbindung
//$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try {
    $stmt = $dbh->query('SELECT firstname FROM users WHERE id = 5');
    $stmt->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); // Default nur für das Statement
    // $stmt->setFetchMode(PDO::FETCH_ASSOC); // Default FetchMode nur für das Statement
}
catch(PDOException $e) {
    //print_r($dbh->errorInfo()); // Ein Array mit verschiedenen Informationen
    //print_r($e->getMessage()); // Alles als eine Textnachricht
    //die();
}
finally { // Wird immer ausgeführt, wenn das Script nicht vorzeitig beendet wird
    print_r($dbh->errorInfo());
    print_r($dbh->errorCode());
    echo '<p>OK</p>';
}

$data = $stmt->fetchAll();

echo '<pre>';
print_r($dbh);
print_r($stmt);
print_r($data);
echo '</pre>';

//$dbh = null;