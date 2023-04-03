<?php
function handleFilteringRequest($table = null, $condition) {

if($condition == 'in-delivery'){

    $result = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

}else if ($condition == 'in warehouse'){
    $result = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

}else if($condition == 'delivered'){
    $result = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

}else if ($condition == 'delayed'){
    $result = "SELECT * FROM DELIVERY WHERE TRANSPORTSTATUS = 'in-delivery'";

}else{
    echo "No deliveries found";
}

    outputResultTable($result);
}
?>
