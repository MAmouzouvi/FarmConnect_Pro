<!DOCTYPE html>
<html lang="">
    <head>
        <title>Payments Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2> Payments Information </h2>

        <?php
            require_once('api/db_selection.php');
            require_once('api/db_connect.php');
            if (connectToDB()) {
                handleSelectionRequest("Pays_Bill"); // show Warehouse table by default
                disconnectFromDB();
            }
            require_once('api/router.php');
        ?>
        <br><br />
        <h3>Type in a date in the format YYYY-MM-DD:</h3>
        <form method="GET" action="Payments_table.php">
            <input type="hidden" id="selectRequest" name="selectRequest">
            Date:<input type="text" name="date"><br/><br/>
            <input type="submit" name="Go">
        </form>

<!---->
<!--        require_once('api/router.php');-->
<!--        require_once('api/db_connect.php');-->
<!--//        if (connectToDB()) {-->
<!--//            handleSelectionRequest("Delivery"); // show Delivery table by default-->
<!--//            disconnectFromDB();-->
<!--//        }-->




    </body>
</html>

