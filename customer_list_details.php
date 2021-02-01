
<?php require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(1,9,9,1); ?>

<?php

   $customer_details =  mysqli_query($con, "SELECT * FROM counterbox INNER JOIN province ON province.province_id = counterbox.province_id WHERE counter_id=" . getValue($_GET["counter_id"]));

    $row_customer_details = mysqli_fetch_assoc($customer_details);





?>


<div class="card card-body col-lg-10 offset-lg-1">

<div class="card card-header">

<a href="customer_edit.php?counter_id=<?php echo $row_customer_details["counter_id"]; ?>" class="pull-right">  <h1 >Edit <span class="glyphicon glyphicon-info-sign "></span></h1></a>
<h1>Customer Details </h1>

</div>

<div class="card card-body ">



<table class="table table-striped table-hover ">

<thead> <tr><th class="text-center">مکمل معلومات </th></tr></thead>

<tr> 
<th >Counter ID</th>
<td ><?php echo $row_customer_details["counter_id"]; ?></td>
</tr>


<tr>
<th >Customer Type</th>
<td ><?php if($row_customer_details["customer_type"] == 0) { echo "Personal";} else { echo "commerce";} ?></td>
</tr>


<tr>
<th >Customer Name</th>
<td ><?php echo $row_customer_details["customer_name"]; ?></td>
</tr>
</tr>

<tr>
<th >Father Name</th>
<td ><?php echo $row_customer_details["father_name"]; ?></td>
</tr>
</tr>

<tr>
<th >Customer Number</th>
<td ><?php echo $row_customer_details["customer_no"]; ?></td>
</tr>
</tr>

<tr>
<th >Province</th>
<td ><?php echo $row_customer_details["province_name"]; ?></td>
</tr>

<tr>
<th >District</th>
<td ><?php echo $row_customer_details["district"]; ?></td>
</tr>

<tr>
<th >Address</th>
<td ><?php echo $row_customer_details["address"]; ?></td>
</tr>

<tr>
<th >Junction</th>
<td ><?php echo $row_customer_details["junction"]; ?></td>
</tr>


<tr>
<th  >Coefficient</th>
<td  ><?php echo $row_customer_details["coeffecent"]; ?></td>
</tr>

<tr>
<th  >Phase</th>
<td  ><?php echo $row_customer_details["phase"]; ?></td>
</tr>

<tr>
<th  >Account No</th>
<td  ><?php echo $row_customer_details["account_no"]; ?></td>
</tr>


<tr>
<th  >Transformer</th>
<td  ><?php echo $row_customer_details["transformer"]; ?></td>
</tr>


<tr>
<th  >Box ID </th>
<td  ><?php echo $row_customer_details["box_id"]; ?></td>
</tr>


<tr>
<th  >Rout Code </th>
<td  ><?php echo $row_customer_details["rout_code"]; ?></td>
</tr>



</table>


<!-- back button  -->

    <a href="customer_list.php" class="nav-link"><span class="spinner-border spinner-border-sm"></span> Back </a>

</div>





</div>



</div>





<?php require_once("footer.php"); ?>