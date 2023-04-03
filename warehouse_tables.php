<!DOCTYPE html>
<html>

<head>
    <title>Warehouse Information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
<h2> Warehouse Information </h2>
<div class="page-menu" onclick="window.location.href = 'index.php'"> Back </div>
<?php
require_once('api/router.php');
require_once('api/db_selection.php');
require_once('api/db_connect.php');
if (connectToDB()) {
    handleSelectionRequest("Warehouse");
    handleSelectionRequest("Farm");
    handleSelectionRequest("Farm_Warehouse_Supplies");
    disconnectFromDB();
}
?>
<br />
</body>

</html>