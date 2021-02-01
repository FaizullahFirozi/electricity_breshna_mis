
<?php  require_once("top.php"); ?>
<?php require_once("connection.php"); ?>

    <?php 

    $employee_detail = mysqli_query($con, "SELECT * , ROUND(DATEDIFF(hire_date, resign_date) / 30, 0) AS duration FROM employee INNER JOIN emp_degree ON emp_degree.degree_id = employee.degree_id  INNER JOIN province ON province.province_id = employee.province_id  WHERE employee_id=" . getValue($_GET["employee_id"]) );
    
    $row_employee_detail = mysqli_fetch_assoc($employee_detail);
    

    
    ?>



<div class="card card-header col-lg-6 offset-3">

<!-- headin  -->
    <div class="card-header">

        <?php require_once ("print.php"); ?>

        <h1> Employee  Details </h1>

        </div>
<!-- body -->
        <div class="card card-body" id="print-section">

        <table class="table table-striped table-hover ">

<tr>
<th  >Employee ID</th>
<td  ><?php echo $row_employee_detail["employee_id"]; ?></td>
</tr>

<tr>
<th  >First Name</th>
<td  ><?php echo $row_employee_detail["firstname"]; ?></td>
</tr>

<tr>
<th  >Last Name</th>
<td  ><?php echo $row_employee_detail["lastname"]; ?></td>
</tr>

<tr>
<th  >Father Name</th>
<td  ><?php echo $row_employee_detail["fathername"]; ?></td>
</tr>

<tr>
<th  >Gender</th>
<td  ><?php  if($row_employee_detail["gender"] == 0 ){echo "Male"; }else{echo "Female";};  ?></td>
</tr>


<tr>
<th  >Phone Number</th>
<td  ><?php echo "لا تر اوسه مو دا ټیبل نه دی وصل کړی" ?></td>
</tr>

<tr>
<th  >Birth Year</th>
<td  ><?php echo $row_employee_detail["birth_year"]; ?></td>
</tr>

<tr>
<th  >NIC</th>
<td  ><?php echo $row_employee_detail["nic"]; ?></td>
</tr>

<tr>
<th  >Marital Status</th>
<td  ><?php echo $row_employee_detail["marital_status"]; ?></td>
</tr>

<tr>
<th  >Province</th>
<td  ><?php echo $row_employee_detail["province_name"]; ?></td>
</tr>

<tr>
<th  >District</th>
<td  ><?php echo $row_employee_detail["district"]; ?></td>
</tr>

<tr>
<th  >Address</th>
<td  ><?php echo $row_employee_detail["address"]; ?></td>
</tr>

<tr>
<th  >Email</th>
<td  ><?php echo $row_employee_detail["email"]; ?></td>
</tr>

<tr>
<th  >Degree</th>
<td  ><?php echo $row_employee_detail["degree_name"]; ?></td>
</tr>

<tr>
<th  >Hire Date</th>
<td  ><?php echo $row_employee_detail["hire_date"]; ?></td>
</tr>

<tr>
<th  >Resign Date</th>
<td  ><?php echo $row_employee_detail["resign_date"]; ?></td>
</tr>

<tr>
<th  >Duration</th>
<td  ><?php echo $row_employee_detail["duration"]; ?> <small> months </small></td>
</tr>


            <thead>
            <tr >
<td class="text-center" ><img src="<?php echo $row_employee_detail["photo"]; ?>" class="embed-responsive rounded-circle" alt="Photo"></td>
            </tr>
            </thead>


        </table>

          <!-- Back button firozi  -->

          <div class="">


    <a href="employee_list.php" class="float-right"> <span class="spinner-border spinner-border-sm " ></span> Back </a>

</li>
</ul>
</div>


        </div>

</div>


<?php require_once("footer.php"); ?>