<?php 
    require_once("connection.php"); 
        $sql = "SELECT * FROM contract WHERE contract_id =" . getValue($_GET["contract_id"]);
    $contract = mysqli_query($con, $sql);
    $row_contract = mysqli_fetch_assoc($contract);
   
        $sql = "DELETE FROM contract WHERE contract_id = " . getValue($_GET["contract_id"]);
    mysqli_query($con, $sql);
        header("location:employee_list.php?page=1&delete_contract=done");
?>
