<?php
require_once('db_connect.php');
function handleSelectionByDateRequest($table, $field, $date_in_string)
{
    global $db_conn;
    $date = date($date_in_string);

    $result = executePlainSQL("SELECT * FROM $table WHERE $field = $date");

    if ((oci_fetch_row($result))) {
        handleSelectionRequest($table,$field==$date);
    }
    else {
        echo "No deliveries found";
    }
}






