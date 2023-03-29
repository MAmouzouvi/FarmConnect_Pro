<!DOCTYPE html>
<html>
    <head>
        <title>Delivery Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2> Deliveries </h2>
        <form method="GET" action="delivery_tables.php"> 
            <input type="hidden" id="selectByDateReq" name="selectByDateReq">
            <input type="submit" name="selectByDate"></p>
        </form>
        <?php
            require_once('api/router.php');
        ?>
    </body>
    
</html>