<?php ob_start(); require_once("top.php"); ?>
<?php require_once("connection.php"); ?>
<?php

 $income = mysqli_query($con, "SELECT *  FROM income INNER JOIN bank ON bank.bank_id=income.bank_id ");
 $row_income = mysqli_fetch_assoc($income);

 if(isset($_POST["invoice_id"])){

     $invoice_id = getValue($_POST["invoice_id"]);
     $bank_id = getValue($_POST["bank_name"]);
     $receipt_date = getValue($_POST["receipt_date"]);

     $parts = explode("-", $receipt_date);
     $year = $parts[0];
     $month = $parts[1];
     $day = $parts[2];

    if( mysqli_query($con, "INSERT INTO income VALUES ($invoice_id, $bank_id, $year, $month, $day )")){
        header("location:income_add.php?add=done");
    }
    else {
        header("location:income_add.php?error=notadd");
    }

 }


?>

    <div class="card card-body mt-3 col-lg-6 offset-lg-3 ">

        <div class="card card-header text-danger">

            <h1> Add New Contract </h1>
        </div>


        <div class="card card-body">



            <?php if(isset($_GET["error"])) { ?>
                <h3 class="alert alert-danger alert-dismissable" >
                    <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                    Error: could not Add New Contract! Please Try Again!
                </h3>

            <?php } ?>



            <?php if(isset($_GET["add"])) { ?>
                <h3 class="alert alert-info alert-dismissable" style="color:green">
                    <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                    New Income Has Been Successfully Added! مننه
                </h3>

            <?php } ?>

            <form method="post">



                <div class="input-group-text m-1">
                   <span class="w-25 h6">

                   Invoice ID:</span> <input  autocomplete="off" class="form-control" type="text"  name="invoice_id">
                </div>



                <div class="input-group-text m-1">
                   <span class="w-25 h6">


                        Bank: </span> <select class="form-control" name="bank_name">

                        <?php do { ?>
                            <option value="<?php echo $row_income["bank_id"]; ?>"> <?php echo $row_income["bank_name"]; ?> </option>
                        <?php } while ($row_income = mysqli_fetch_assoc($income));  ?>
                    </select>
                </div>



                <div class="input-group-text m-1">
                   <span class="w-25 h6">


                   Receipt Date:</span> <input value="<?php echo date("Y"). "-" . date("m"). "-" . date("d") ?>" autocomplete="off" class="form-control" type="text" id="receipt_id" name="receipt_date">
                </div>

                <input type="submit" class="btn btn-outline-primary m-2 w-25" value="Add">

            </form>

        </div>

    </div>



    <script type="text/javascript">
        Calendar.setup({
            inputField      :    "receipt_id",
            ifFormat        :    "%Y-%m-%d",
            showsTime       :    false,
            timeFormat      :    "24"
        });
    </script>

<?php require_once("footer.php"); ?>