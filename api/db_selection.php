<?php
require_once('db_connect.php');

function handleSelectionRequest($table, $fields = null) {
    global $db_conn;
    $output = "<h2> Table: $table </h2>";

    if (is_null($fields)) {
        $result = executePlainSQL("SELECT * FROM $table");
    }
    
    $num_fields = oci_num_fields($result);
    $output .= "<table>";
    $output .=  "<tr>";
    for ($i = 1; $i <= $num_fields; $i++) {
        $output .=  "<th> " . oci_field_name($result, $i) . " </th>";
    }
    $output .=  "</tr>";
    while (($row = oci_fetch_row($result)) != false) {
        $output .=  "<tr>";
        for ($i = 0; $i < $num_fields; $i++) { 
            $output .=  "<td> " . $row[$i] . " </td>";
        }
        $output .=  "</tr>";
    }
    $output .=  "</table>";
    echo $output;
}
?>