<?php
function handleSelectionByDateRequest()
{
    global $db_conn;

    $transport_status = "in-delivery"; //CHANGE to user imput value later

    $query = "SELECT  CUSTOMERID, TOTALCOST, TRANSPORTSTATUS, DRIVERLICENSENUMBER, WAREHOUSENAME, DESTINATION, SCHEDULEDDATE
FROM DELIVERY 
WHERE TRANSPORTSTATUS = '$transport_status'";

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
