
<?php require_once("top.php"); ?>
<?php require_once("connection.php"); ?>

<?php
        $salary = mysqli_query($con, "SELECT *, (SELECT net_salary FROM payment WHERE employee_id = maintable.employee_id AND date_year = EXTRACT(YEAR FROM CURDATE()) AND date_month= EXTRACT(MONTH FROM CURDATE())) AS net_salary FROM employee AS maintable");
        $row_salary = mysqli_fetch_assoc($salary);
?>


<div class="card card-body mt-3">

    <div class="card card-header">

        <?php require_once("print.php"); ?>

        <h1> Salary Payment: <?php echo date("F - Y"); ?></h1>


        <h1> Income Report </h1>

    </div>

    <div class="card card-body">

        <table class="table table-striped table-hover">

            <thead>
            <tr>
                <th class="text-center" >ID</th>
                <th class="text-center" >Name </th>
                <th class="text-center" >Photo </th>
                 <th class="text-center" >Net Salary</th>
            </tr>

            </thead>

            <tbody>

            <?php do { ?>
                <tr>
                    <td class="text-center" ><?php echo $row_salary["employee_id"]; ?> </td>
                    <td class="text-center" ><?php echo $row_salary["firstname"]; ?> </td>
                    <td class="text-center" ><img src="<?php echo $row_salary["photo"]; ?>" width="40"> </td>
                      <td class="text-center" ><?php if( $row_salary["net_salary"] > 0 ){
                              echo$row_salary["net_salary"] . "<small> AF </small>";
                          } else { ?>
                              <a class="btn btn-info" href="salary_add.php?employee_id=<?php echo $row_salary["employee_id"]; ?>">
                              <span class="glyphicon glyphicon-usd"> Pay</span>
                              </a>
                                                    <?php } ?> </td>

                </tr>

            <?php } while ($row_salary = mysqli_fetch_assoc($salary)); ?>


            </tbody>

        </table>

    </div>
</div>




<?php require_once("footer.php"); ?>