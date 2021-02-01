<?php require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(1,1,1,1); ?>


<?php 

$curyear = date("Y");
$curmonth = date("m");

                               
$attendance = mysqli_query($con, "SELECT employee.employee_id , firstname, lastname, photo, SUM(absent_hour) AS total FROM employee INNER JOIN attendance ON employee.employee_id = attendance.employee_id WHERE date_year = $curyear AND date_month = $curmonth GROUP BY attendance.employee_id");
$row_attendance = mysqli_fetch_assoc($attendance);
?>

<div class="card card-body">

    <div class="card card-header">

        <div class="text-right">
            <a href="attendance_add.php" class="btn btn-outline-primary btn-lg w-25 " ><span class="glyphicon glyphicon-plus"> Add Absent </span></a>
        </div>
        <h1> Employee Attendance <small style="color:red"><?php echo date("F Y"); ?></small></h1>


        </div>
    

    
    <!-- if Absent employee  -->
    <?php if(isset($_GET["add"])){ ?>
<br>
<div class="alert alert-success alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:25px; color:tomato; text-align:center">

<button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
  Success Absent ! کارکوونکي غیر حاضر شو
</div>
<?php } ?>


    <div class="card card-body">

    
    

             

        <table class="table table-striped table-hover ">
            
        <?php if($row_attendance > 0) { ?>
        <thead>
        <tr class="bg-info">
                <th class="text-center" width="10" >ID</th>
                <th class="text-center" >Fist Name </th>
                <th class="text-center" >Last Name </th>
                <th class="text-center" >Photo </th>
                <th class="text-center" >Total Absent</th>
               
               
            </tr>
</thead>

            <?php do { ?>
                <tbody>
            <tr>
                <td class="text-center" ><?php echo $row_attendance["employee_id"]; ?></td>
                <td class="text-center" ><?php echo $row_attendance["firstname"];  ?></td>
                <td class="text-center" ><?php echo $row_attendance["lastname"];  ?></td>
                <td class="text-center" ><img src="<?php echo $row_attendance["photo"];?>" width="50" class="img-circle"></td>
                <td class="text-center" style="color:red"><h3><?php echo $row_attendance["total"]; ?><small> hrs</small></h3></td>
                
            </tr>
            </tbody>
            <?php } while($row_attendance = mysqli_fetch_assoc($attendance)); ?>

 <!-- if list employee attendance empty -->
            <?php } else { ?>
                    <div class="text-center">
                    <br>
                    <br>
                    <br>
                    <h1 class="text-center label label-success well-lg" style="font-size:18px"> خوشبختانه تاسو په دی میاشت کی غیرحاضر کامند نه لرئ</h1>
                    </div>
            <?php }  ?>

        </table>   
</div>		
    </div>

</div>

<?php require_once("footer.php"); ?>