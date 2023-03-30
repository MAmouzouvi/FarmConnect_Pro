<?php
require_once('db_connect.php');

function handleSelectionRequest($table, $fields = null) {
    global $db_conn;

    if (is_null($fields)) {
        $result = executePlainSQL("SELECT * FROM $table");
    }
    
    $num_fields = oci_num_fields($result);
    echo "<table>";
    echo "<tr>";
    for ($i = 1; $i <= $num_fields; $i++) {
        echo "<th> " . oci_field_name($result, $i) . " </th>";
    }
    echo "</tr>";
    while (($row = oci_fetch_row($result)) != false) {
        echo "<tr>";
        for ($i = 0; $i < $num_fields; $i++) { 
            echo "<td> " . $row[$i] . " </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>