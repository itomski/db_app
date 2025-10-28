<?php

use Playground\Utils\DbUtils;

require_once 'vendor/autoload.php';

$dbh = DbUtils::getInstance()->getConnection();
$stmt = $dbh->query('DELETE FROM users WHERE id = 6');
if($stmt->rowCount() > 0) {
    echo 'Datensatz wurde gelöscht!';
}
else {
    echo 'Datensatz konnte nicht gelöscht werden!';
}