<?php

function handleJoiningRequest($table, $date)
{
    if ($date != null) {
        echo "<h2>Table: Delivery (Scheduled Date: $date)</h2>";
        $query = "SELECT Customer.name, Customer.address
                  FROM Customer
                  JOIN Delivery ON Customer.customerID = Delivery.customerID
                  WHERE Delivery.scheduledDate = '$date'";
        $result = executePlainSQL($query);
        outputResultTable($result);
    } else {
        echo "Please provide a date";
    }
}

?>
