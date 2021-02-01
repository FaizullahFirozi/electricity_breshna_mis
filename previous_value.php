<?php 
 require_once("connection.php");

//  this coding id for jquery or javasript
//  this coding id for jquery or javasript
//  this coding id for jquery or javasript

 $counter_id = getValue($_POST["counter_id"]);
     $previous = mysqli_query($con, "SELECT present_value FROM invoice WHERE counter_id=$counter_id ORDER BY invoice_id DESC LIMIT 1");
     $row_previous = mysqli_fetch_assoc($previous);
            echo $row_previous["present_value"];

 ?> 