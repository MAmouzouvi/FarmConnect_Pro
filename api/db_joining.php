<?php
require_once('db_connect.php');
require_once('db_selection.php');
function handleJoiningRequest()
{
    global $db_conn;
    $error_msg = "<div class=\"error-msg\"> ";
    if (empty($_GET['date'])) {
        echo $error_msg .= "Please specify a date. </div>";
        echo 'hello';
    } else {
        $error_msg .= "No deliveries found. </div>";
        echo 'hello';
        $inputDate = new DateTime($_GET['date']);
        $dateString = $inputDate->format('d-M-y');
        

        $success = False;
        $query = <<< QUERY
        SELECT Customer.name, Customer.address
                  FROM Customer
                  JOIN Delivery ON Customer.customerID = Delivery.customerID
                  WHERE Delivery.scheduledDate = :date
        QUERY;
        echo $query;

        $stid = oci_parse($db_conn, $query);
        oci_bind_by_name($stid, ':date', $_GET['date']);

        $success = oci_execute($stid);
        if (!$success) {
            echo $query;
            echo $error_msg;
//            $e = OCI_Error($statement);
//            echo htmlentities($e['message']);
            echo "<br>";
        } else {
            echo $query;
            outputResultTable($stid);
        }
        oci_free_statement($stid);
    }
}

?>
