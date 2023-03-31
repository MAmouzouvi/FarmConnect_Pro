<?php
require_once('db_connect.php');
require_once('db_display.php');
require_once('db_updates.php');
require_once('db_selection.php');
// handles routing for API requests
function handlePOSTRequest()
{
    if (connectToDB()) {
//        if (array_key_exists('resetTablesRequest', $_POST)) {
//            handleResetRequest();
//        } else if (array_key_exists('updateQueryRequest', $_POST)) {
//            handleUpdateRequest();
//        } else if (array_key_exists('insertQueryRequest', $_POST)) {
//            handleInsertRequest();
//        }

        disconnectFromDB();
    }
}

// HANDLE ALL GET ROUTES
// A better coding practice is to have one method that reroutes your requests accordingly. It will make it easier to add/remove functionality.
function handleGETRequest()
{
    if (connectToDB()) {
        if (array_key_exists('selectRequest', $_GET) && array_key_exists('tableName', $_GET)) {
            handleSelectionRequest($_GET['tableName']);
        }

        if(array_key_exists('selectRequest', $_GET) && array_key_exists('date', $_GET)){
            handleSelectionByDateRequest("Pays_Bill", 'fulfillmentDate',$_GET['date']);
        }


        disconnectFromDB();
    }
}

if (isset($_POST['insertDeliveryRequest'])){
handlePOSTRequest();
} else if (isset($_GET['selectRequest']) ) {
    handleGETRequest();
}
?>
