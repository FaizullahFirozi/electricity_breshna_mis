<?php require_once("top.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    $income = mysqli_query($con, "SELECT * ,(SELECT total_amount from invoice WHERE invoice_id = maintable.invoice_id ) AS total_amount FROM income AS maintable INNER JOIN bank ON bank.bank_id=maintable.bank_id");
    $row_income = mysqli_fetch_assoc($income);
?>


    <div class="card card-body mt-3">

        <div class="card card-header text-success">

            <?php require_once("print.php"); ?>

            <h1> Income Report </h1>

        </div>

        <div class="card card-body">

            <table class="table table-striped table-hover">

                <thead>
                <tr>
                    <th class="text-center" >Invoice ID</th>
                    <th class="text-center" >Bank </th>
                    <th class="text-center" >Receipt Year</th>
                    <th class="text-center" >Receipt Month</th>
                    <th class="text-center" >Receipt Day</th>
                    <th class="text-center" >Total Price</th>
                </tr>

                </thead>

                <tbody>

                <?php do { ?>
                    <tr>
                        <td class="text-center" ><?php echo $row_income["invoice_id"]; ?> </td>
                        <td class="text-center" ><?php echo $row_income["bank_name"]; ?> </td>
                        <td class="text-center" ><?php echo $row_income["receipt_year"]; ?> </td>
                        <td class="text-center" ><?php echo $row_income["receipt_month"]; ?> </td>
                        <td class="text-center" ><?php echo $row_income["receipt_day"]; ?> </td>
                        <td class="text-center" ><?php echo $row_income["total_amount"] . "<small> - AFS </small>"; ?> </td>

                    </tr>

                <?php } while ($row_income = mysqli_fetch_assoc($income)); ?>


                </tbody>

            </table>

        </div>
    </div>





<?php require_once("footer.php"); ?>