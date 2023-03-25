<?php
function handleDeleteRequest($ids) {
    global $db_conn;

    $id_list = implode(",", $ids);
    $query = "DELETE FROM ORA_LPHAM01.delivery WHERE deliveryID IN ($id_list)";

    $result = executePlainSQL($query);

    if ($result) {
        echo "Successfully deleted the selected rows.";
    } else {
        echo "Error deleting rows from the table.";
    }
}
?>
