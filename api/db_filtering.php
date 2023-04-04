<?php
function handleFilteringRequest($table, $condition)
{
    if ($condition != null) {

        if ($condition == 'in-delivery') {

            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

        } else if ($condition == 'in warehouse') {
            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in warehoude'";

        } else if ($condition == 'delivered') {
            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'delivered'";

        } else if ($condition == 'delayed') {
            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'delayed'";

        }

        $result = executePlainSQL($query);
        outputResultTable($result);
    } else {
        echo "No deliveries found";
    }

}

?>
