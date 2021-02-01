
<?php  require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(1,1,9,9); ?>

    <?php 

    

    $contract = mysqli_query($con, "SELECT * , ROUND(DATEDIFF(end_date, start_date) / 30, 0) AS duration FROM contract WHERE employee_id=" . getValue($_GET["employee_id"]) . " ORDER BY employee_id DESC ");
    
    $row_contract = mysqli_fetch_assoc($contract);



    
    ?>



<div class="card card-header">


<!-- headin  -->
    <div class="card card-header">


        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                Employee Contract
            </a>
        </nav>

        </div>
<!-- body -->
        <div class="card card-body ">

        <table class="table table-dark table-striped table-hover">
            <thead class="bg-danger">
            <tr>
                <th>Contract ID</th>
                <th width="100">Start Date</th>
                <th width="100">End Date</th>
                <th>Duration</th>
                <th>Position</th>
                <th>Gross Salary</th>
                <th>Edit</th>
                <th>delete</th>
            </tr>
            </thead>


            <tbody>
                <?php if($row_contract > 0) { ?>
                <?php do { ?>
                    <tr>
                            <td><?php echo $row_contract["contract_id"]; ?></td>
                            <td><?php echo $row_contract["start_date"]; ?></td>
                            <td><?php echo $row_contract["end_date"]; ?></td>
                            <td><?php echo $row_contract["duration"]; ?> <small> months </small></td>
                            <td><?php echo $row_contract["position"]; ?></td>
                            <td><?php echo $row_contract["gross_salary"]; ?></td>
                            <td>
                                <a href="contract_edit.php?contract_id=<?php echo $row_contract["contract_id"]; ?>">
                                <span class="glyphicon glyphicon-edit"></span>
                                    </a> 
                            </td>
                            <td>
                                <a href="contract_delete.php?contract_id=<?php echo $row_contract["contract_id"]; ?>" >
                                <span class="glyphicon glyphicon-trash"></span>
                                    </a> 
                            </td>

                            
                        </tr>
                        
                        <?php } while ($row_contract = mysqli_fetch_assoc($contract)); ?>
                        <?php } else { ?>

                            <h1 class="text-center text-warning">تاسو د دی سره قرارداد نه لرئ </h1>

                        <?php } ?>
            
            </tbody>



        </table>
                    
<!-- back button  -->
<div class="" >

    <a href="employee_list.php" class="alert-link float-right">

        <span class="glyphicon glyphicon-arrow-left " style="color:red">

    </span> Back </a>

</div>

        </div>

</div>


<?php require_once("footer.php"); ?>