<?php 
 require_once("connection.php");

//  this coding id for jquery or javasript
//  this coding id for jquery or javasript
//  this coding id for jquery or javasript

 $id = getValue($_POST["counter_id"]);

         $last = mysqli_query($con, "SELECT invoice_id , total_amount FROM invoice WHERE counter_id=$id ORDER BY invoice_id DESC LIMIT 1");
    
            $row_last = mysqli_fetch_assoc($last);


            $payment = mysqli_query($con , "SELECT * FROM income WHERE invoice_id = " . $row_last["invoice_id"]);

            $pay = mysqli_num_rows($payment);

            
            if($pay == 0){
                echo $row_last["total_amount"];
            }
            else {
                echo 0;
            }

 ?> 