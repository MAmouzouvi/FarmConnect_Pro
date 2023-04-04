<?php
function handleUpdateRequest()
{
    global $db_conn,$success;;
    $error_msg = "<div class=\"error-msg\"> ";
    $cID = $_POST['cID'];
    $new_name = $_POST['new_name'];
    $new_email= $_POST['new_email'];
    $new_phone = $_POST['new_phone'];


    if (empty($cID)) {
        echo $error_msg . "Please enter a customerID. </div>";

    }else{
        $result = executePlainSQL("SELECT * FROM CUSTOMER WHERE customerID =" . $cID);
        if(countRows($result) == 0)  {
            echo $error_msg . "Customer with ID " . $cID . " does not exist. </div>";
        }else{
            // Check for empty fields
            if(empty($new_name)){
                $result = executePlainSQL("SELECT NAME FROM CUSTOMER WHERE customerID =" . $cID);
                $row = oci_fetch_assoc($result);
                $new_name = $row['NAME'];
            }
            if(empty($new_email)){
                $result = executePlainSQL("SELECT EMAILADDRESS FROM CUSTOMER WHERE customerID =" . $cID);
                $row = oci_fetch_assoc($result);
                $new_email = $row['EMAILADDRESS'];
            }
            if(empty($new_phone)){
                $result = executePlainSQL("SELECT PHONENUMBER FROM CUSTOMER WHERE customerID =" . $cID);
                $row = oci_fetch_assoc($result);
                $new_phone = $row['PHONENUMBER'];
            }

            // Update fields
            if (!is_numeric($new_phone)) {
                echo $error_msg . "Invalid phone number. </div>";
            } else {
                executePlainSQL("UPDATE CUSTOMER SET NAME='" . $new_name . "', EMAILADDRESS='" . $new_email . "', PHONENUMBER=" . $new_phone . " WHERE customerID =" . $cID);
                if ($success) {
                    echo "<div class=\"success-msg\"> Successfully updated customer! </div>";
                }
                OCICommit($db_conn);
            }
        }
    }
}

function countRows($result) {
    $data =array(0);
    $rows = oci_fetch_all($result, $data, null, null, OCI_FETCHSTATEMENT_BY_ROW);
    return $rows;
}

?>