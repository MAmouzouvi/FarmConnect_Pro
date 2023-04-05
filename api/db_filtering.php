<?php
function handleFilteringRequest($condition)
{
    if ($condition != null) {
        echo "<h2> Table: delivery (status : $condition) </h2>";
        $query = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = '$condition'";

        $result = executePlainSQL($query);
        outputResultTable($result);

    }else {
        echo "No deliveries found";
    }
}

?>
