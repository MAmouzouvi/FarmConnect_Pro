<?php
require_once('db_connect.php');
function handleSelectionByDateRequest()
{
    global $db_conn;

    $date = date("YYYY-MM-DD");



    $result = executePlainSQL("SELECT * FROM DELIVERY WHERE DELIVERY.SCHEDULEDDATE = $date");

    if ((oci_fetch_row($result))) {
        handleSelectionRequest("Delivery","Delivery.scheduledDate = $date");

    }
    else {
        echo "No deliveries found";
    }
}






