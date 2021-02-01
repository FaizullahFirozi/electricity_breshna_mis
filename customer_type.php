<?php 
 require_once("connection.php");

//  this coding id for jquery or javasript
//  this coding id for jquery or javasript
//  this coding id for jquery or javasript

 $counter_id = getValue($_POST["counter_id"]);

         $type = mysqli_query($con, "SELECT customer_type FROM counterbox WHERE counter_id=$counter_id");
    
            $row_type = mysqli_fetch_assoc($type);
    echo $row_type["customer_type"];

 ?> 