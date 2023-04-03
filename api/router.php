<?php
require_once('db_connect.php');
require_once('db_selection.php');
require_once('db_insert.php');
require_once('db_division.php');
require_once('db_groupby.php');
require_once('db_nested_groupby.php');
require_once('db_projection.php');
require_once('db_filtering.php');

// built off of tutorial 7 code at https://www.students.cs.ubc.ca/~cs-304/resources/php-oracleresources/php-setup.html
// handles routing for API requests

function handlePOSTRequest() {
    if (connectToDB()) {
        if (array_key_exists('insertBusinessRequest', $_POST)) {
            handleInsertRequest();
        }

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
        } else if (array_key_exists('divisionRequest', $_GET) && array_key_exists('date', $_GET) && array_key_exists('cid', $_GET)) {
            handleDivisionRequest();
        } else if (array_key_exists('groupByRequest', $_GET)) {
            handleGroupByRequest();
        } else if (array_key_exists('projectionRequest', $_GET) && array_key_exists('fields', $_GET)) {
            handleProjectionRequest("Delivery", null, $_GET['fields']); // in db_selection.php
        } else if (array_key_exists('NestedGroupByRequest', $_GET)) {
            handleNestedGroupByRequest();
        } else if (array_key_exists('filterRequest', $_GET) && array_key_exists('status', $_GET)) {
            handleFilteringRequest("Delivery", $_GET['status']);
        }
        disconnectFromDB();
    }
}

if (isset($_POST['insertBusinessRequest'])) {
    handlePOSTRequest();
} else if (isset($_GET['selectRequest']) || isset($_GET['divisionRequest']) || isset($_GET['groupByRequest'])
    || isset($_GET['projectionRequest'])) {
    handleGETRequest();
}
?>