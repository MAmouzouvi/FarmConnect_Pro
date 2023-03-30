<?php
require_once('db_connect.php');
function handleSelectionByDeliveryStatusRequest()
{
    global $db_conn;

    $status = " ";


    $result = executePlainSQL("SELECT * FROM DELIVERY WHERE transportStatus = $status");

    if ((oci_fetch_row($result))) {
        handleSelectionRequest("Delivery","Delivery.transportStatus = $status");

    }
    else {
        echo "No deliveries found";
    }
}