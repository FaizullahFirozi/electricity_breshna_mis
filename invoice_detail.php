<?php require_once("connection.php"); ?>

<?php
    $invoice = mysqli_query($con, "SELECT * , CONCAT_WS('-' , issue_year, issue_month,  issue_day) AS issue_date FROM counterbox INNER JOIN province ON province.province_id=counterbox.province_id INNER JOIN invoice ON counterbox.counter_id=invoice.counter_id WHERE invoice_id=" . getValue($_GET["invoice_id"]));
    $row_invoice = mysqli_fetch_assoc($invoice);



    ?>

<?php require_once("top.php"); ?>

    <div class="panel panel-info col-lg-6 col-lg-offset-3">

        <div class="panel-heading">

<!--    printing  require  -->
            <?php require_once("print.php"); ?>


            <h1> Invoice List </h1>

        </div>

        <div class="panel-body">

        <h2 style="margin-left: 50px">Invoice ID : <?php echo $row_invoice["invoice_id"]; ?></h2>


        <table class="pull-left  list">

            <tr>
                <th>Customer ID: </th>                <td><?php echo $row_invoice["counter_id"]; ?></td>

            </tr>
            <tr>
                <th>Customer No: </th>                <td><?php echo $row_invoice["customer_no"]; ?></td>

            </tr>
            <tr>
                <th>Customer Name: </th>                <td><?php echo $row_invoice["customer_name"]; ?></td>

            </tr>
            <tr>
                <th>Father Name: </th>                <td><?php echo $row_invoice["father_name"]; ?></td>

            </tr>
            <tr>
                <th>Province: </th>                <td><?php echo $row_invoice["province_name"]; ?></td>

            </tr>
            <tr>
                <th>District: </th>                <td><?php echo $row_invoice["district"]; ?></td>

            </tr>
            <tr>
                <th>Address: </th>                <td><?php echo $row_invoice["address"]; ?></td>

            </tr>
            <tr>
                <th>Customer Type: </th>                <td><?php echo $row_invoice["customer_type"]== 0 ? "Personal" : "Commercial" ?></td>

            </tr>
            <tr>
                <th>Coefficint: </th>                <td><?php echo $row_invoice["coeffecent"]; ?></td>

            </tr>
            <tr>
                <th>Phase: </th>                <td><?php echo $row_invoice["phase"]; ?></td>

            </tr>
            <tr>
                <th>Accoun No: </th>                <td><?php echo $row_invoice["account_no"]; ?></td>

            </tr>
            <tr>
                <th>Junction: </th>                <td><?php echo $row_invoice["junction"]; ?></td>

            </tr>
            <tr>
                <th>Transformer: </th>                <td><?php echo $row_invoice["transformer"]; ?></td>

            </tr>
            <tr>
                <th>Box No: </th>                <td><?php echo $row_invoice["box_id"]; ?></td>

            </tr>
            <tr>
                <th>Rout Code: </th>                <td><?php echo $row_invoice["rout_code"]; ?></td>

            </tr>
            </table>

        <table class="list " >

            <tr>
                <th>Round Read: </th>                <td><?php echo $row_invoice["round_read"]; ?></td>

            </tr>
            <tr>
                <th>Issue Date: </th>                <td><?php echo $row_invoice["issue_date"]; ?></td>

            </tr>
            <tr>
                <th>Expire Date: </th>                <td><?php echo $row_invoice["expire_date"]; ?></td>

            </tr>
            <tr>
                <th>Previous Value: </th>                <td><?php echo $row_invoice["previous_value"]; ?></td>

            </tr>
            <tr>
                <th>Present Value: </th>                <td><?php echo $row_invoice["present_value"]; ?></td>

            </tr>
            <tr>
                <th>Electricity Charge: </th>                <td><?php echo $row_invoice["electricity_charge"]; ?></td>

            </tr>
            <tr>
                <th>Bank Charge: </th>                <td><?php echo $row_invoice["bank_charge"]; ?></td>

            </tr>
            <tr>
                <th>Service Charge: </th>                <td><?php echo $row_invoice["service_charge"]; ?></td>

            </tr>
            <tr>
                <th>Stationary Charge: </th>                <td><?php echo $row_invoice["stationay_charge"]; ?></td>

            </tr>
            <tr>
                <th>Surcharge: </th>                <td><?php echo $row_invoice["surcharge"]; ?></td>

            </tr>
            <tr>
                <th>Invoice Amount: </th>                <td><?php echo $row_invoice["invoice_amount"]; ?></td>

            </tr>
            <tr>
                <th>Tax: </th>                <td><?php echo $row_invoice["taxt"]; ?></td>

            </tr>
            <tr>
                <th>Payable Amount: </th>                <td><?php echo $row_invoice["payable_amount"]; ?></td>

            </tr>
            <tr>
                <th>Due Amount: </th>                <td><?php echo $row_invoice["due_amount"]; ?></td>

            </tr>
            <tr>
                <th>Total Amount: </th>                <td><?php echo $row_invoice["total_amount"]; ?></td>

            </tr>
            </table>


        </div>
    </div>







<?php require_once("footer.php"); ?>