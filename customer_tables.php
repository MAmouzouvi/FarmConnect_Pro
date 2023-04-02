<!DOCTYPE html>
<html>

<head>
    <title>Customer Information</title>
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <h2> Customer Information </h2>
    <div class="page-menu" onclick="window.location.href = 'index.php'"> Back </div>
    <?php
            require_once('api/router.php');
            require_once('api/db_selection.php');
            require_once('api/db_connect.php');
            if (connectToDB()) {
                handleSelectionRequest("Customer");
                handleSelectionRequest("CustomerPhoneAddress");
                handleSelectionRequest("Individual"); 
                handleSelectionRequest("Business");
                disconnectFromDB();
            }
        ?>
    <br />
    <h3>Add a new Business customer</h3>
    <div class="form-box">
        <form method="POST" action="customer_tables.php">
            <input type="hidden" id="insertBusinessRequest" name="insertBusinessRequest">
            <label>Name:</label>
            <input type="text" name="bname"> <br />
            <label>Email:</label>
            <input type="email" name="bemail"> <br />
            <label>Phone Number:</label>
            <input type="tel" name="bphone"> <br />
            <label>Company Name:</label>
            <input type="text" name="bcompname"> <br />
            <label>Address:</label>
            <input type="text" name="baddress"> <br />
            <label>Type:</label>
            <input type="text" name="btype"> <br />
            <input type="submit" value="Add">
        </form>
    </div>
</body>

</html>