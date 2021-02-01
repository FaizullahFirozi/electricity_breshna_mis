
<?php require_once("top.php"); ?>

<?php require_once("connection.php"); restrict(1,1,1,1); ?>

	<?php

	
 $province = mysqli_query($con, "SELECT * FROM province");

	$row_province = mysqli_fetch_assoc($province);



?>



	<div class="card card-body  col-lg-8 offset-lg-2 mt-3" style="padding:0">
	<div class="card card-header  ">

        <div class="text-right">
	<a href="province_add.php" class="btn btn-outline-primary  pull-right " ><span class="glyphicon glyphicon-plus"> Add Province </span></a>
        </div>


        <h1> Province Manage <small style="color:red"><?php echo date("F Y D"); ?></small></h1>
        
	
	</div>
	
	
	<div class="card card-body">

	
    <!-- if add province  -->
    <?php if(isset($_GET["add"])){ ?>
<br>
<div class="alert alert-success alert-dismissable col-lg-10 col-lg-offset-1" style="font-size:20px; color:tomato; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
  Success  ! ولایت اضافه شو</div>
<?php } ?>

    <!-- if edit province  -->
    <?php if(isset($_GET["edit"])){ ?>
<br>
<div class="alert alert-success alert-dismissable col-lg-10 col-lg-offset-1" style="font-size:20px; color:tomato; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
  Success  ! ولایت تغیر شو</div>
<?php } ?>




        <!-- message orror -->
        <?php if(isset($_GET["error"])) { ?>
            <h3 class="alert alert-danger alert-dismissable text-center" >
                <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                Error: ولایت تغیر نه شو مهربانی وکړئ بیا کوشش وکړئ
            </h3>

        <?php } ?>





	
	<table class="table table-striped table-hover">


	<?php if ($row_province > 0 ) { ?>
	<thead class="alert alert-success"> 
	<tr>
		<th class="text-center" >Province ID</th>
		<th  >Province Name</th>
		<th  >Edit</th>

	</tr>
	</thead>


	<tbody>
	
				<?php do { ?>
			<tr>
				<th class="text-center" ><?php echo $row_province["province_id"]; ?> </th>
				<th  ><?php echo $row_province["province_name"]; ?> </th>
				<th >
                    <a href="province_edit.php?province_id=<?php echo $row_province["province_id"]; ?>" >
                <span class="glyphicon glyphicon-edit"> Edit </span>
                    </a>
                </th>

			</tr>
				<?php } while($row_province = mysqli_fetch_assoc($province)); ?>
				<?php } else { ?>

					<div class="text-center ">
                    <br>
                    <br>
                    <br>
                    <h1 class="text-center label label-success well-lg"  style="font-size:18px"> هیڅ ولایت تر اوسه شتون نه لری </h1>
                    </div>

				<?php }  ?>

	</tbody>
	
	</table>

	
	
	
	
	</div>

	</div>


<?php require_once("footer.php"); ?>