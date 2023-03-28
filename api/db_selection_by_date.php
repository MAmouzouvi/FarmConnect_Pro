<?php
function handleSelectionByDateRequest()
{
    global $db_conn;

    $date = date('YYYY-MM-DD');

    $query = "SELECT  CUSTOMERID, TOTALCOST, TRANSPORTSTATUS, DRIVERLICENSENUMBER, WAREHOUSENAME, DESTINATION, SCHEDULEDDATE
FROM DELIVERY 
WHERE DELIVERY.SCHEDULEDDATE= TO_DATE($date,'YYYY-MM-DD')";

    $result = executePlainSQL($query);

    if (($row = oci_fetch_row($result)) != false) {
        echo "<table>";
        echo "<tr><th>CustomerID</th><th>Total Cost</th><th>Transport Status</th><th>Driver's license number</th><th>Warehouse name</th><th>Destination</th><th>scheduled date</th></tr>";

        while ($row = oci_fetch_array($result, OCI_BOTH)) {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td><td>" . $row[2] . "</td><td>" . $row[3] . "</td><td>" . $row[4] . "</td><td>" . $row[5] . "</td><td>" . $row[6]. "</td></tr>";

        }
        echo "</table>";
    } else {
        echo "No deliveries found";
    }
}

