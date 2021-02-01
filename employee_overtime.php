
<?php require_once("top.php"); ?>

<?php require_once("connection.php"); restrict(1,1,9,9); ?>

	<?php

	$curyear = date("Y");
	$curmonth = date("m");
	
	
 $overtime = mysqli_query($con, "SELECT employee.employee_id , firstname, lastname, photo, SUM(over_hour) AS total FROM employee INNER JOIN overtime ON employee.employee_id = overtime.employee_id WHERE date_year = $curyear AND date_month = $curmonth GROUP BY employee.employee_id");

	$row_overtime = mysqli_fetch_assoc($overtime);



?>



	<div class="card card-header mt-4  col-lg-8 offset-lg-2 " style="padding:0">

        <div class="card card-header">
<div class="text-right">
	<a href="employee_overtime_add.php" class="btn btn-outline-danger w-25" ><span class="glyphicon glyphicon-plus "> Add OverTime </span></a>
</div>


        <h3> Employee Overtime <small style="color:red"><?php echo date("F Y D"); ?></small></h3>
        
	
	</div>
	
	
	<div class="card card-body ">

	
    <!-- if Overtime employee  -->
    <?php if(isset($_GET["add"])){ ?>
<br>
<div class="alert alert-success alert-dismissable col-lg-10 col-lg-offset-1" style="font-size:20px; color:tomato; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
  Success Overtime ! کارکوونکی ته اضافه کاری وخت زیات شو</div>
<?php } ?>
	
	<table class="table table-striped table-hover">

	<?php if ($row_overtime > 0 ) { ?>
	<thead class="alert alert-success"> 
	<tr>
		<th class="text-center" >ID</th>
		<th class="text-center" >First Name</th>
		<th class="text-center" >Last Name</th>
		<th class="text-center" >Photo</th>
		<th class="text-center" >Total Hour</th>
	</tr>
	</thead>


	<tbody>
	
				<?php do { ?>
			<tr>
				<td class="text-center" ><?php echo $row_overtime["employee_id"]; ?> </td>
				<td class="text-center" ><?php echo $row_overtime["firstname"]; ?> </td>
				<td class="text-center" ><?php echo $row_overtime["lastname"]; ?> </td>
				<td class="text-center" ><img src="<?php echo $row_overtime["photo"]; ?>" width="40" class="img-rounded"> </td>
				<td class="text-center" style="color:yellowgreen" ><h3><?php echo $row_overtime["total"]; ?> <small> hrs </small></h3></td>
				
			</tr>
				<?php } while($row_overtime = mysqli_fetch_assoc($overtime)); ?>
				<?php } else { ?>

					<div class="text-center ">
                    <br>
                    <br>
                    <br>
                    <h1 class="text-center label label-success well-lg"  style="font-size:18px"> تاسو په دی میاشت کی هیڅ د کارکوونکی اضافه کاری ساعتونه نه لرئ</h1>
                    </div>

				<?php }  ?>

	</tbody>
	
	</table>

	
	
	
	
	</div>

	</div>


<?php require_once("footer.php"); ?>