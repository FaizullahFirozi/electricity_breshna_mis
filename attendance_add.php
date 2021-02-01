<?php
    ob_start(); 
    require_once("top.php"); 
    require_once("connection.php"); 

            $sql = "SELECT employee_id, CONCAT(firstname, '  -  ' , lastname) AS employee_name FROM employee ORDER BY firstname ASC , lastname ASC";
        $employee = mysqli_query($con , $sql);
        $row_employee = mysqli_fetch_assoc($employee);

    if(isset($_POST["absent_hour"])) {
            $id = getValue($_POST["employee_id"]);
            $hour = getValue($_POST["absent_hour"]);
            $year = date("Y");
            $month = date("m");
            $day = date("d");

            $sql = "INSERT INTO attendance VALUES (NULL, $id, $year, $month, $day, $hour)";
            $result = mysqli_query($con,  $sql);
        if ($result) {
            header("location:employee_attendance.php?add=done");
        } else {
            header("location:attendance_add.php?error=notupdate");
        }  
    }
?>
<div class="card card-header col-lg-6 offset-lg-3 mt-2">
        <div class="card card-header text-danger">
            <h1>
                <span class="glyphicon glyphicon-plus"></span> Add Employee Attendance<span class="glyphicon glyphicon-plus"></span>
            </h1>
        </div>

<div class="card card-body">
    <!-- form  -->
<form method="post">              
    <div class="input-group-text m-2">
           <span class="w-25">
           <span class="glyphicon glyphicon-user"></span>Employee:</span> 
                <select class="form-control" name="employee_id">
                    <?php do { ?>
                        <option value="<?php echo $row_employee["employee_id"]; ?>"> <?php echo $row_employee["employee_name"]; ?> </option>
                    <?php } while ($row_employee = mysqli_fetch_assoc($employee)); ?>
                </select>
        </div>

        <div class="input-group-text m-2">
           <span class="w-25">
             <span class="glyphicon glyphicon-time"></span>
                Absent Hour:</span> 
                    <input autocomplete="off" type="text" name="absent_hour" class="form-control">
        </div>
    <input type="submit" value="Add Absent" class="btn btn-outline-danger m-3">
</form>
<!-- message orror -->
        <?php if(isset($_GET["error"])) { ?>
            <h3 class="alert alert-danger alert-dismissable text-center" >
                <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
            Error: لطفً نمبر یا عددونه انتخاب کړئ 
            </h3>
        <?php } ?>
    </div>
</div>
<?php require_once("footer.php"); ?>