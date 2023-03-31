<!DOCTYPE html>
<html lang="">
    <head>
        <title>Delivery Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2> Delivery Information </h2>
        <?php
            require_once('api/db_selection.php');
            require_once('api/db_connect.php');
            if (connectToDB()) {
                handleSelectionRequest("Delivery"); // show Delivery table by default
                disconnectFromDB();
            }
            require_once('api/router.php');
        ?>
        <br />
        <h3>Choose a related table to display:</h3>
        <form method="GET" action="delivery_tables.php"> 
            <input type="hidden" id="selectRequest" name="selectRequest">
            <select name="tableName">
                <option value="items"> Items </option>
                <option value="transportvehicle"> Transport Vehicles </option>
                <option value="drivers"> Drivers </option>
            </select>
            <input type="submit" value="Go">
        </form>
    </body>
</html>


