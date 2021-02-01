<?php require_once("top.php"); ?>
<?php require_once("connection.php"); ?>

<?php

    if(isset($_POST["allowance"])){
        $amount_overtime = getValue($_POST["amount_overtime"]);
        $absent_amount = getValue($_POST["absent_amount"]);
        $allowance = getValue($_POST["allowance"]);
        $allowance_remark = getValue($_POST["allowance_remark"]);
        $deduct = getValue($_POST["deduct"]);
        $deduct_remark = getValue($_POST["deduct_remark"]);
        $taxtable_salary = getValue($_POST["taxtable_salary"]);
        $taxt_amount = getValue($_POST["taxt_amount"]);
        $net_salary = getValue($_POST["net_salary"]);
    }

?>
<div class="card card-body col-lg-8 offset-2">
    <div class="card card-header text-success">
<h1>Salary Payment</h1>

    </div>


    <div class="card card-body">
<form method="post">

<div class="input-group-text m-2">
    <span class="w-25 h6">


    Overtime Amount:</span> <input type="text" class="form-control" readonly="readonly" name="amount_overtime"> <br>
</div>




    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Absent Amount: </span> <input type="text" class="form-control" readonly="readonly" name="absent_amount"> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Allowance: </span><input autocomplete="off" type="text" class="form-control" name="allowance"> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Remark :</span> <textarea autocomplete="off" class="form-control" cols="50" rows="3" name="allowance_remark"></textarea> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Deduct:</span> <input autocomplete="off" type="text" class="form-control" name="deduct"> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Remark : </span><textarea autocomplete="off" class="form-control" cols="50" rows="3" name="deduct_remark"></textarea> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Taxable Salary:</span> <input type="text" class="form-control" readonly="readonly" name="taxtable_salary"> <br>
    </div>




    <div class="input-group-text m-2">
    <span class="w-25 h6">


          Tax Amount: </span><input type="text" class="form-control" readonly="readonly" name="taxt_amount"> <br>
    </div>



    <div class="input-group-text m-2">
    <span class="w-25 h6">


         Net Salary: </span><input type="text" class="form-control" readonly="readonly" name="net_salary"> <br>
    </div>


    <input type="hidden" id="emp_id" value="<?php echo $_GET["employee_id"]; ?>"  >
    <input type="submit"  value="Pay Salary" class="btn btn-outline-danger m-2">


</form>



</div>
</div>

<script type="text/javascript">
    calcSalary();
</script>

<?php require_once("footer.php"); ?>