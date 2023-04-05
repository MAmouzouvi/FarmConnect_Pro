<?php
function handleDeleteRequest($id) {
    global $db_conn;

//     $id_list = implode(",", $ids);
    $query = "DELETE FROM Delivery WHERE deliveryID = '$id'";

    $result = executePlainSQL($query);
    OCICommit($db_conn);

    if ($result) {
        echo "Successfully deleted the selected rows.";
    } else {
        echo "Error deleting rows from the table.";
    }
}
?>
