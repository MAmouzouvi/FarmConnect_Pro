<?php

require_once('db_connect.php');
require_once('db_selection.php');

function handleNestedGroupByRequest()
{
    global $db_conn;
    $query = <<< QUERY
    SELECT D.CUSTOMERID, D.TOTALCOST
    FROM DELIVERY D
    WHERE D.TOTALCOST <= ALL (SELECT AVG (D2.TOTALCOST)
                                   FROM DELIVERY D2
                                   GROUP BY CUSTOMERID)
QUERY;

    $result = executePlainSQL($query);
    outputResultTable($result);
}

