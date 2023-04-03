<?php
function handleProjectionRequest($table, $condition, $fields) {
    $result = doSelection($table, $condition, $fields);
    outputResultTable($result);
}
?>