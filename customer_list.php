
<?php require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(1,9,9,1); ?>

<?php

   $customer =  mysqli_query($con, "SELECT * FROM counterbox ");

    $row_customer = mysqli_fetch_assoc($customer);





?>


<div class="card card-header mt-3">

<div class="card card-header text-danger">

<h1>Customer List </h1>

</div>

<div class="card card-body">

 <!-- if edit every things faizullah firozi  -->
 <?php if(isset($_GET["edit"])){ ?>

<div class="alert alert-success alert-dismissable col-lg-4 col-lg-offset-4" style="font-size:22px; color:red; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
               ستـاســــو تـغیرات بـریالی وو ، منـنـــــه  
</div>
<?php } ?>


<?php if(isset($_GET["add"])){ ?>

    <div class="alert alert-success alert-dismissable col-lg-4 col-lg-offset-4" style="font-size:22px; color:blue; text-align:center">

    <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            په بریالــۍ توګـــــه اضافــه شـــو  
    </div>
    <?php } ?>

    <!-- search Total rows show by faizullah firozi  -->



<table class="table table-striped table-hover table-dark">

<thead class="bg-success">

<tr>
<th class="text-center" >Counter ID</th>
<th class="text-center" >Customer Name</th>
<th class="text-center" >Customer Type</th>
<th class="text-center" >Coefficient</th>
<th class="text-center" >Phase</th>
<th class="text-center" >Account No</th>
<th class="text-center" >Customer Details</th>
</tr>

</thead>

<tbody>
 
 <?php do { ?>

<tr>
<td class="text-center" ><?php echo $row_customer["counter_id"]; ?></td>
<td class="text-center" ><?php echo $row_customer["customer_name"]; ?></td>
<td class="text-center" ><?php if($row_customer["customer_type"] == 0) { echo "Personal";} else { echo "commercial";} ?></td>
<td class="text-center" ><?php echo $row_customer["coeffecent"]; ?></td>
<td class="text-center" ><?php echo $row_customer["phase"]; ?></td>
<td class="text-center" ><?php echo $row_customer["account_no"]; ?></td>
<td class="text-center" ><a href="customer_list_details.php?counter_id=<?php echo $row_customer["counter_id"]; ?>"  ><span class="glyphicon glyphicon-info-sign">All Detail</span></a></td>
</tr>

 <?php } while ($row_customer = mysqli_fetch_assoc($customer)); ?>

</tbody>


</table>




</div>



</div>





<?php require_once("footer.php"); ?>