<?php
function handleFilteringRequest($table, $condition)
{
    if ($condition != null) {
        echo "<h2> Table: delivery (status : $condition) </h2>";
        $query = "SELECT * FROM DELIVERY";
        if ($condition == 'in-delivery') {

            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

        } else if ($condition == 'in warehouse') {
            $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in warehouse'";

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
