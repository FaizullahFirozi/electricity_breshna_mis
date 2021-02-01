<?php ob_start(); require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(2,2,9,9); ?>

    <?php 

    $employee = mysqli_query($con , "SELECT employee_id, CONCAT(firstname, '  -  ' , lastname) AS employee_name FROM employee ORDER BY firstname ASC , lastname ASC");
    $row_employee = mysqli_fetch_assoc($employee);

    if(isset($_POST["over_hour"])) {

        $id = getValue($_POST["employee_id"]);
        $hour = getValue($_POST["over_hour"]);

        $year = date("Y");
        $month = date("m");
        $day = date("d");

     $result =  mysqli_query($con, "INSERT INTO overtime VALUES ($id, $year, $month, $day, $hour)");

       if ($result) {
           
           header("location:employee_overtime.php?add=done");
       
            } else {
                header("location:employee_overtime_add.php?error=notupdate");
       
            }
   
    }

    ?>

<div class="card card-header mt-4 col-lg-6 offset-lg-3">

        <div class="card card-header text-center text-primary">

            <h2>
                <span class="glyphicon glyphicon-plus"></span> Add Employee OverTime 
                <span class="glyphicon glyphicon-plus"></span>
                </h2>
        </div>

        <div class="card card-body">

        <!-- form  -->
        <form method="post">
                
        <div class="input-group-text">
           <span class="w-25 h6">
           <span class="glyphicon glyphicon-user"></span>


                Employee:</span> <select class="form-control" name="employee_id">
                         
                         <?php do { ?>
                            <option value="<?php echo $row_employee["employee_id"]; ?>"> <?php echo $row_employee["employee_name"]; ?> </option>
                         <?php } while ($row_employee = mysqli_fetch_assoc($employee)); ?>
                </select>
            </div>

            <div class="input-group-text m-2">
           <span class="w-25 h6">
           <span class="glyphicon glyphicon-time"></span>

                OverTime Hour:</span> 
                         
                         <input maxlength="2" autocomplete="off" type="text" name="over_hour" class="form-control">
                </select>
            </div>

            <input type="submit" value="Add Overtime" class="btn btn-outline-danger m-4 w-25 ">
        </form>
                
        <!-- message orror -->
        <?php if(isset($_GET["error"])) { ?>
                                <h3 class="alert alert-danger alert-dismissable text-center" >
                                    <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                                Error: لطفً نمبر یا عددونه انتخاب کړئ <small>او هیڅ کارمند حق نه لرې چی په یوه ورځ دوه ځله اضافه کاری وکړئ</small>
                                </h3>

                            <?php } ?>

            </div>

   </div>
    






<?php require_once("footer.php"); ?>