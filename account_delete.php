<?php
    require_once("connection.php"); restrict(8,9,9,9);


    $sql = "SELECT * FROM users WHERE employee_id=" . getValue($_GET["employee_id"]);
    $account = mysqli_query($con, $sql);
    $row_account = mysqli_fetch_assoc($account);

    $sql = "DELETE FROM users WHERE employee_id=". getValue($_GET["employee_id"]);

    if(mysqli_query($con, $sql)){
        header("location:account_management.php?delete=done");
    }
?>

