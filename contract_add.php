<?php  
    ob_start(); 
    require_once("connection.php");
    require_once("top.php"); 

        $sql = "SELECT employee_id, CONCAT(firstname, '  -  ' , lastname) AS employee_name FROM employee ORDER BY firstname ASC , lastname ASC";
    $employee = mysqli_query($con , $sql);
    $row_employee = mysqli_fetch_assoc($employee);

if(isset($_POST["position"])) {
        $id = getValue($_POST["employee_id"]);
        $start_date = getValue($_POST["start_date"]);
        $end_date = getValue($_POST["end_date"]);
        $position = getValue($_POST["position"]);
        $gross_salary = getValue($_POST["gross_salary"]);
      
        $sql =  "INSERT INTO contract VALUES(NULL, $id,'$start_date', '$end_date', '$position', $gross_salary)";
    if(mysqli_query($con, $sql)){
        header("location:contract_add.php?add=done");
        // Error are here                      
    }else{
        header("location:contract_add.php?error=notinsert");
        exit();
    }
}
?>

<div class="card card-body col-lg-6 offset-lg-3 bg-secondary mt-3">
            <div class="card card-header text-warning">
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
                New Contract Has Been Successfully Added! مننه 
                </h3>
        <?php } ?>
<form method="post">
    <div class="input-group-text m-2">
        <span class="mr-5">Employee:</span> 
        <select autofocus="autofocus"  class="form-control" name="employee_id">
            <?php do { ?>
                <option  value="<?php echo $row_employee["employee_id"]; ?>"> <?php echo $row_employee["employee_name"]; ?> </option>
            <?php } while ($row_employee = mysqli_fetch_assoc($employee)); ?>
            </select>
    </div>
    <div class="input-group-text m-2">
        <span class="mr-5">Start Date:</span>
        <input value="<?php echo $row_employee["start_date"]; ?>" autocomplete="off" class="form-control" type="text" id="start_date" name="start_date">
    </div>

    <div class="input-group-text m-2">
        <span class="mr-5">End Date:</span> 
        <input value="<?php echo $row_employee["end_date"]; ?>" autocomplete="off" class="form-control" type="text" id="end_date" name="end_date">
    </div>

    <div class="input-group-text m-2">
        <span class="mr-5 ml-1">Position:</span> 
        <input value="<?php echo $row_employee["position"]; ?>" autocomplete="off" class="form-control" type="text"  name="position">
    </div>
    <div class="input-group-text m-2">
        <span class="mr-4">Gross Salary:</span> 
        <input value="<?php echo $row_employee["gross_salary"]; ?> " autocomplete="off" class="form-control" type="text"  name="gross_salary">
    </div>
    <input type="submit" value="Add Contract" class="btn btn-lg btn-outline-success w-25 m-2">
</form>
    <!-- in condition back button  -->
    <?php if(isset($_GET["add"])) { ?>
        <!-- back button  -->
        <div class="pagination pull-right" >
            <ul class="pagination ">
                <li >
                    <a href="home.php" class="alert alert-info">
                        <span class="glyphicon glyphicon-arrow-left " style="color:red">
                    </span> Back </a>
                </li>
            </ul>
        </div>
    <?php } ?> 

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