<?php

require_once('db_connect.php');
require_once('db_selection.php');

function handleNestedGroupByRequest()
{
    global $db_conn;

    $query = "SELECT CUSTOMERID, COUNT(*)
FROM DELIVERY d1
GROUP BY d1.CUSTOMERID
HAVING AVG(COUNT(*)) <= (SELECT MIN(COUNT(*))
                         FROM DELIVERY d2
                         GROUP BY d2.CUSTOMERID
                         ORDER BY AVG(COUNT(*))
)";

    $result = executePlainSQL($query);
    outputResultTable($result);
}
