<?php
function handleSortingRequest($table, $sortValue, $order)
{
    if ($sortValue != null) {
        echo "<h2> Table: delivery (sort value : $sortValue) </h2>";
        $query = "SELECT * FROM DELIVERY";
        if ($sortValue == 'customerID' && $order == "asc") {

            $query = "SELECT * FROM DELIVERY ORDER BY customerID ASC";

        } else if ($sortValue == 'customerID' && $order == "desc") {
            $query = "SELECT * FROM DELIVERY ORDER BY customerID DESC";

        } else if ($sortValue == 'totalCost' && $order == "asc") {
            $query = "SELECT * FROM DELIVERY ORDER BY totalCost ASC";

        } else if ($sortValue == 'totalCost' && $order == "desc") {
            $query = "SELECT * FROM DELIVERY ORDER BY totalCost DESC";

        }

        $result = executePlainSQL($query);
        outputResultTable($result);
    } else {
        echo "No deliveries found";
    }

}

?>
