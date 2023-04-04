<?php
require_once('db_connect.php');
require_once('db_selection.php');

function handleHavingByRequest() {
    global $db_conn;

    $query = <<< QUERY
    SELECT name, SUM(weight * quantity)
    FROM Items
    GROUP BY name
    HAVING AVG(cost) > 10 
    QUERY;

    $result = executePlainSQL($query);
    outputResultTable($result);
}

?>
