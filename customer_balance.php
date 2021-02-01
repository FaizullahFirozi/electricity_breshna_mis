<?php
    require_once("connection.php"); restrict(1,9,9,1); 

    $customer = mysqli_query ($con , " SELECT * from counterbox ");
    $row_customer = mysqli_fetch_assoc($customer);
?>
<?php require_once("top.php"); ?>

<div class="card card-body mt-3">
    <div class="card card-header text-primary">
        <h1> Customer Balance </h1>
    </div>
    <div class="card card-body">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th class="text-center" >Counter ID</th>
                    <th class="text-center" >Customer Name</th>
                    <th class="text-center" >Type</th>
                    <th class="text-center" >Balance</th>
                </tr>
            </thead>
            <tbody>
                <?php do { ?>
                    <tr>
                        <th class="text-center" ><?= $row_customer["counter_id"]; ?></th>
                        <td class="text-center" ><?= $row_customer["customer_name"]; ?></td>
                        <td class="text-center" ><?= $row_customer["customer_type"] == 0 ? "Personal" : "Commercial";  ?></td>
                        <td class="text-center" ><?= " لا تر اوسه دا نه دی جوړ شوی"; ?></td>
                    </tr>
                <?php } while ($row_customer = mysqli_fetch_assoc($customer)); ?>
            </tbody>
        </table>
    </div>
</div>
<?php require_once("footer.php"); ?>