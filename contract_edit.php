<?php 
    ob_start();
    require_once("connection.php");
    require_once("top.php"); 
 
//    i have here error in mysqli_fetch_assoc
// error
// error
            $sql = "SELECT * FROM contract WHERE contract_id=" . getValue($_GET["contract_id"]);
        $contract = mysqli_query($con, $sql);
// error
        $row_contract = mysqli_fetch_assoc($contract);
if(isset($_POST["position"])) {                      
        $start_date = getValue($_POST["start_date"]);
        $end_date = getValue($_POST["end_date"]);
        $position = getValue($_POST["position"]);
        $gross_salary = getValue($_POST["gross_salary"]);

        $sql ="UPDATE contract SET start_date='$start_date', end_date='$end_date', position='$position', gross_salary=$gross_salary WHERE contract_id=". getValue($_GET["contract_id"]);
    if(mysqli_query($con, $sql)){
        header("location:employee_list.php?page=1&edit=done");
        // Error are here                      
    }else{
        header("location:contract_edit.php?contract_id=" . $_GET["contract_id"] . "&error=notupdate");
    exit();
    }
}
?>

<div class="panel panel-success col-lg-6 col-md-8 col-sm-10 col-xs-12 col-lg-offset-3 col-md-offset-2 col-sm-offset-1 col-xs-offset-0">
    <div class="panel-heading">
        <h1> Etit Contract </h1>
    </div>
    <div class="panel-body">             
    <!-- Error Message show   -->
    <?php if(isset($_GET["error"])){ ?>
        <div class="alert alert-warning alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:20px; color:tomato; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            Not Change ! ستاسو تغیرات بریالی نه وو مهربانی وکړئ بیا کوشش وکړئ  
        </div>
    <?php } ?>
    
    <!-- table -->
<form method="post">            
    <div class="input-group">
        <span class="input-group-addon">Start Date:</span>
        <input value="<?= $row_contract["start_date"]; ?>" autocomplete="off" class="form-control" type="text" id="start_date" name="start_date">
    </div>

    <div class="input-group">
        <span class="input-group-addon">End Date:</span> 
        <input value="<?= $row_contract["end_date"]; ?>" autocomplete="off" class="form-control" type="text" id="end_date" name="end_date">
    </div>

    <div class="input-group">
        <span class="input-group-addon">Position:</span> 
        <input value="<?php echo $row_contract["position"]; ?>"  class="form-control" type="text"  name="position">
    </div>

    <div class="input-group">
        <span class="input-group-addon">Gross Salary:</span> 
        <input value="<?php echo $row_contract["gross_salary"]; ?>" autocomplete="off" class="form-control" type="text"  name="gross_salary">
    </div>
    <input type="submit" value="Etid Contract" class="btn btn-success">
</form>

    </div>
</div>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "start_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "end_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>
<?php require_once("footer.php"); ?>