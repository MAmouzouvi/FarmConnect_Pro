<?php
function handleProjectionRequest($table, $condition, $fields) {
    if($fields) {
        $result = doSelection($table, $condition, $fields);
        outputResultTable($result);
    }else{
        echo "Columns not correctly entered";
    }
}
?>