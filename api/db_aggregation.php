<?php
function handleDeliveryRequest() {
    global $db_conn;

    $date_from = date('Y-m-d');
    $date_to = date('Y-m-d', strtotime('+2 days'));

    $query = "SELECT deliveryID, COUNT(*)
              FROM ORA_LPHAM01.Delivery 
              WHERE scheduledDate >= TO_DATE('$date_from', 'YYYY-MM-DD') 
              AND scheduledDate <= TO_DATE('$date_to', 'YYYY-MM-DD') 
              GROUP BY destination 
              HAVING COUNT(*) > 1";

    $result = executePlainSQL($query);

    if (($row = oci_fetch_row($result)) != false) {
        echo "<table>";
        echo "<tr><th>Destination Address</th><th>Number of Deliveries</th></tr>";
        do {
            echo "<tr><td>" . $row[0] . "</td><td>" . $row[1] . "</td></tr>";
        } while (($row = oci_fetch_row($result)) != false);
        echo "</table>";
    } else {
        echo "No deliveries found";
    }
}
?>

