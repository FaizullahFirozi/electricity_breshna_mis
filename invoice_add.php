<?php require_once("connection.php"); ?>

<?php

 if(isset($_POST["present_value"])){


        $counter_id = getValue($_POST["counter_id"]);
        $round_read = getValue($_POST["round_read"]);
        $previous_value = getValue($_POST["previous_value"]);
        $present_value = getValue($_POST["present_value"]);
        $elec_charge = getValue($_POST["elec_charge"]);
        $service_charge = getValue($_POST["service_charge"]);
        $surcharge = getValue($_POST["surcharge"]);
        $invoice_amount = getValue($_POST["invoice_amount"]);
        $payable_amount = getValue($_POST["payable_amount"]);
        $due_amount = getValue($_POST["due_amount"]);
        $total_amount = getValue($_POST["total_amount"]);


        $year = date("Y");
        $month = date("m");
        $day = date("d");
		 
       if( mysqli_query($con, "INSERT INTO invoice VALUES(NULL,$counter_id, $round_read, $year, $month,$day, CURDATE() + INTERVAL 40 DAY , $previous_value, $present_value, $elec_charge, 10, $service_charge, 10 , $surcharge, $invoice_amount, 0, $payable_amount,$due_amount , $total_amount  )")){
           header("location:invoice_add.php?add=done");
       }
       else{
        header("location:invoice_add.php?error=notadd");

       }


 }


?>

<?php require_once("top.php"); ?>

<div class="card card-header col-lg-8 offset-lg-2">

<div class="card card-header text-success">

    <div class="text-right">
    <a href="invoice_list.php" class="btn btn-outline-info  w-25">View Invoice List</a>
    </div>

    <h1> Add New Invoice  </h1>


</div>


<div class="card card-body">

<!-- add message  -->
<?php if(isset($_GET["add"])){ ?>

<div class="alert alert-success alert-dismissable " style="font-size:22px; color:blue; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
        په بریالــۍ توګـــــه اضافــه شـــو  
</div>

<?php } ?>

<!-- error message firozi wardak -->

        
<?php if(isset($_GET["error"])){ ?>
              <div class="alert alert-danger alert-dismissable " style="font-size:22px; color:blue; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
                Could Not Add New Invoice. Try Again
                    </div>
            <?php }  ?>

<form method="post">


<div class="input-group-text m-1">
    <span class="w-50 h6">
        Counter No: </span>
    <input type="text" class="form-control" id="counter_id" name="counter_id" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">

        Round Read: </span>
    <select  class="form-control" name="round_read" >
    <option> 1 </option>
    <option> 2 </option>
    <option> 3 </option>
    <option> 4 </option>
    <option> 5 </option>
    <option> 6 </option>
    </select>
</div>



    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Previous Value: </span>
    <input type="text" readonly class="form-control" id="previous_value" name="previous_value" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Present Value: </span>
    <input type="text" class="form-control" id="present_value" name="present_value" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
    Electricity Charge: </span>
    <input type="text" readonly="readonly" class="form-control" id="elec_charge" name="elec_charge" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Service Charge: </span>
    <input type="text" value="0" class="form-control" id="service_charge" name="service_charge" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Surcharge: </span>
    <input type="text" value="0" class="form-control" id="surcharge" name="surcharge" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Invoice Amount: </span>
    <input type="text" readonly="readonly" class="form-control" id="invoice_amount" name="invoice_amount" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Payable Amount: </span>
    <input type="text" readonly="readonly" class="form-control" id="payable_amount" name="payable_amount" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
     Due Amount: </span>
    <input type="text" readonly="readonly" class="form-control" id="due_amount" name="due_amount" >
</div>


    <div class="input-group-text m-1">
    <span class="w-50 h6">
    Total Amount: </span>
    <input type="text" readonly="readonly" class="form-control" id="total_amount" name="total_amount" >
</div>

<input type="submit" value="Create Invoice" class="btn m-1 mt-3  btn-outline-danger">



</form>


</div>

</div>


<?php require_once("footer.php"); ?>