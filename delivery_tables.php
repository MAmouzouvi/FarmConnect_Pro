<!DOCTYPE html>
<html>
    <head>
        <title>Delivery Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <div class="page-menu" onclick="window.location.href = 'index.php'"> Back </div>
        <h2> Delivery Information </h2>
        <?php
            require_once('api/db_selection.php');
            require_once('api/db_connect.php');
            if (connectToDB()) {
                handleSelectionRequest("Delivery"); 
                handleSelectionRequest("Drivers");
                disconnectFromDB();
            }
        ?>
        <br />
        <br />
        <h3>Choose a related table to display:</h3>
        <form method="GET" action="delivery_tables.php"> 
            <input type="hidden" id="selectRequest" name="selectRequest">
            <select name="tableName">
                <option value="transportvehicle"> Transport Vehicles </option>
                <option value="items"> Items </option>
                <option value="itemcosts"> Item Costs </option>
                <option value="deliveryreceived"> Delivery Received </option>
            </select>
            <input type="submit" value="Go">
        </form>
        <h3>Find drivers who made all deliveries on a certain day:</h3>
        <form method="GET" action="delivery_tables.php">
            <input type="hidden" name="divisionRequest">
            Date:<input type="date" name="date" style="margin: 10px;"><br />
            <input type="submit" value="Find Deliveries">
        </form>
        <br />
        <h3>Find counts of each item by name:</h3>
        <form method="GET" action="delivery_tables.php">
            <input type="hidden" name="groupByRequest">
            <input type="submit" value="Go">
        </form>
        <br />
        <br />
        <?php
            require_once('api/router.php');
        ?>
    </body>
</html>