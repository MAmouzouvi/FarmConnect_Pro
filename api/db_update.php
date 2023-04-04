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
        if(empty($new_name)){
            if(empty($new_email)){
                if(empty($new_phone)){
                    echo $error_msg . "you need at least one non-empty field. </div>";

                }else {
                    if (!is_numeric($new_phone)) {
                        echo $error_msg . "Invalid phone number. </div>";
                    }else {

                        executePlainSQL("UPDATE CUSTOMER SET PHONENUMBER=" . $new_phone . " WHERE customerID =" . $cID);

                    }
                }

            }else {
                executePlainSQL("UPDATE CUSTOMER SET EMAILADDRESS='" . $new_email . "' WHERE customerID =" . $cID);
            }


        }else {
            executePlainSQL("UPDATE CUSTOMER SET NAME='" . $new_name . "' WHERE customerID =" . $cID);
            if ($success) {
                echo "<div class=\"success-msg\"> Successfully updated customer! </div>";
            }
        }
        OCICommit($db_conn);

        if ($success) {
            echo "<div class=\"success-msg\"> Successfully updated customer! </div>";
        }

    }


}
?>