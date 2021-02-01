<?php require_once("connection.php"); ?>
<?php

    $invoice = mysqli_query($con,  "SELECT * , (SELECT invoice_id FROM invoice WHERE counter_id=maintable.counter_id ORDER BY invoice_id DESC LIMIT 1)  FROM invoice AS maintable");
    $row_invoice = mysqli_fetch_assoc($invoice);

    ?>

<?php require_once("top.php"); ?>


    <div class="card card-header mt-3">

<div class="card card-header">

<h1> Invoice List </h1>

</div>

<div class="card card-body">

<table class="table table-striped table-hover">

<thead>
<tr>
<th class="text-center" >Invoice ID</th>
<th class="text-center" >Counter ID</th>
<th class="text-center" >Issue Date</th>
<th class="text-center" >Expire Date</th>
<th class="text-center" >Total Amount</th>
<th class="text-center" >Detail</th>
</tr>

</thead>

<tbody>

<?php do { ?>
<tr>
<td class="text-center" ><?php echo $row_invoice["invoice_id"] ?></td>
<td class="text-center" ><?php echo $row_invoice["counter_id"] . " " . "هره ایډی باید ماته یو ځل وښودل شی" ?></td>
<td class="text-center" ><?php echo $row_invoice["issue_year"] . "-" . $row_invoice["issue_month"] . "-" . $row_invoice["issue_day"] ?></td>
<td class="text-center" ><?php echo $row_invoice["expire_date"]; ?></td>
<td class="text-center" ><?php echo $row_invoice["total_amount"]; ?></td>
<td class="text-center" >
    <a href="invoice_detail.php?invoice_id=<?php echo $row_invoice["invoice_id"]; ?>">
    <span class="glyphicon glyphicon-search"></span>
    </a>
</td>
</tr>

<?php } while($row_invoice = mysqli_fetch_assoc($invoice)); ?>


</tbody>

</table>

</div>
</div>







<?php require_once("footer.php"); ?>