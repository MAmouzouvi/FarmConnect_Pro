<!DOCTYPE html>
<html>
<head>
    <title>Delivery Information</title>
    <style>
        <?php include "styles.css" ?>
    </style>
</head>
<body>
<h2> Delivery Information </h2>
<div class="page-menu" onclick="window.location.href = 'index.php'"> Back</div>

<?php
require_once('api/db_selection.php');
require_once('api/db_connect.php');

if (connectToDB()) {
    handleSelectionRequest("Delivery");
    handleSelectionRequest("Drivers");
    disconnectFromDB();
}
?>
<br/>

<h3>Choose a related table to display:</h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" id="selectRequest" name="selectRequest">
    <select name="tableName">
        <option value="transportvehicle"> Transport Vehicles</option>
        <option value="items"> Items</option>
        <option value="itemcosts"> Item Costs</option>
        <option value="deliveryreceived"> Delivery Received</option>
    </select>
    <input type="submit" value="Go">
</form>
<h3>Find drivers who made all deliveries to a certain customer on a certain day:</h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" name="divisionRequest">
    Date:<input type="date" name="date" style="margin: 10px;"><br/>
    Customer ID: <input type="text" name="cid" style="margin: 10px;"><br/>
    <input type="submit" value="Find Deliveries">
</form>
<br/>
<h3>Find counts and total weights of each item by name:</h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" name="groupByRequest">
    <input type="submit" value="Go">
</form>

<br/>
<br/>
<h3>Enter only the fields you would like to see for the delivery tables
    (in capitals and seperated by a comma) and submit!</h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" name="projectionRequest">
    Fields: <input type="text" name="fields" style="margin: 100px;">
    <input type="submit" value="Submit">
</form>

<h3>Find the customer ID of all customers whose average number of deliveries is less or equal to the overall minimum
    average number of deliveries</h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" name="NestedGroupByRequest">
    <input type="submit" value="Go">
</form>

<h3>Find deliveries based on status (filtering/selection) </h3>
<form method="GET" action="delivery_tables.php">
    <input type="hidden" name="filterRequest">
    transport status: <input type="text" name="status" style="margin: 10px;">
    <input type="submit" value="Go">
</form>
<br/>
<br/>
<?php
require_once('api/router.php');
?>
</body>
</html>