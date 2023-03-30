<!DOCTYPE html>
<html>
    <head>
        <title>Delivery Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2> Deliveries </h2>
        <!-- <form method="GET" action="delivery_tables.php"> 
            <input type="hidden" id="selectRequest" name="selectRequest">
            <input type="text" name="tableName"> <br /><br />
            <input type="submit" name="select"></p>
        </form> -->
        <?php
            require_once('api/router.php');
            require_once('api/db_connect.php');
            if (connectToDB()) {
                handleSelectionRequest("Delivery"); // show Delivery table by default
                disconnectFromDB();
            }
        ?>
    </body>
    
</html>