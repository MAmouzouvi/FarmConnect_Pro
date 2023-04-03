<!DOCTYPE html>
<html lang="">
    <head>
        <title>Payments and contracts Information</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>
        <h2> Payments and contracts Information </h2>
        <div class="page-menu" onclick="window.location.href = 'index.php'"> Back </div>

        <?php
            require_once('api/db_selection.php');
            require_once('api/db_connect.php');
            require_once('api/router.php');
            if (connectToDB()) {
                handleSelectionRequest("Pays_Bill");
                handleSelectionRequest("Signs_Contract");
                handleSelectionRequest("Contract_Dates");
                disconnectFromDB();
            }

        ?>
<!--        <br><br />-->
<!--        <h3>Type in a date in the format YYYY-MM-DD:</h3>-->
<!--        <form method="GET" action="Payments_tables.php">-->
<!--            <input type="hidden" id="selectByDateRequest" name="selectByDateRequest">-->
<!--            Date:<input type="text" name="date"><br/><br/>-->
<!--            <input type="submit" name="Go">-->
<!--        </form>-->

    </body>
</html>

