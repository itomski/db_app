<?php

try {
    echo "Start migration ".__FILE__.'<br>';
    $sql = 'DROP TABLE `users_next`;';
    $dbh->query($sql);
    echo "End migration ".__FILE__.'<br>';
}
catch(PDOException $e) {
    echo "<p>Problems with migration ".__FILE__.'<br>';
    die();
}