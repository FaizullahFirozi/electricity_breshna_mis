<?php
    require_once("connection.php"); restrict(2,9,9,9); 
    
    if(!isset($_SESSION)){
        session_start();
    }

    $sql = "SELECT employee_id FROM  employee ";
    $employee = mysqli_query($con, $sql);
    $row_employee = mysqli_fetch_assoc($employee);


    if(isset($_POST["user_name"])) {

            $employee_id = getValue($_POST["employee_id"]);
            $user_name = getValue($_POST["user_name"]);
            $password = getValue($_POST["password"]);
            $user_level = getValue($_POST["user_level"]);
            $account_status= getValue($_POST["account_status"]);

            $sql = "INSERT INTO users VALUES ($employee_id, '$user_name', PASSWORD('$password'), $account_status)";
        if(mysqli_query($con, $sql)){
                $admin; $hr; $finance; $customer;
            if($user_level == "admin"){
                $admin = 1;
                $hr = 1;
                $finance = 1;
                $customer = 1;
            }
            else if ($user_level == "hr"){
                $admin = 0;
                $hr = 1;
                $finance = 0;
                $customer = 0;
            }
            else if ($user_level == "finance"){
                $admin = 0;
                $hr = 0;
                $finance = 1;
                $customer = 0;
            }
            else if ($user_level == "customer"){
                $admin = 0;
                $hr = 0;
                $finance = 0;
                $customer = 1;
                }
            $sql = "INSERT INTO user_level VALUES ($employee_id, $admin, $hr, $finance, $customer)";
        mysqli_query($con, $sql);
            header("location:account_management.php?add=done");
        }else{
            header("location:account_management.php?error=notadd");
        }
    }
?>

<?php require_once("top.php"); ?>


    <!-- change password successful  -->
    <?php if(isset($_GET["privilege"])){ ?>
        <div class="alert alert-info alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:23px; margin-top: 20px; color:tomato; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            Privilege Successful Change ! ستاسو محدودیتونه تغیر شول!  مننه
        </div>
    <?php } ?>
    <!--end-->

    <!-- change password successful  -->
    <?php if(isset($_GET["change"])){ ?>
        <div class="alert alert-success alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:23px; margin-top: 20px; color:tomato; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            Successful Reset ! په بریالئ توگه ستاسو کود تغیر شو!  مننه
        </div>
    <?php } ?>
    <!--end-->

    <!-- add account successful  -->
    <?php if(isset($_GET["add"])){ ?>
        <div class="alert alert-success alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:23px; margin-top: 20px; color:tomato; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            Successful create account ! په بریالئ توگه نوی اکونټ جوړ شو!  مننه
        </div>
    <?php } ?>
    <!--end-->

    <!--error account -->
    <?php if(isset($_GET["error"])) { ?>
        <h3 class="alert alert-danger alert-dismissable" >
            <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
            Error: could not Create New Account ! Please Try Again!
        </h3>
    <?php } ?>
    <!--end -->



<!-- panel section -->
    <div class="card card-body col-lg-6 offset-lg-3 mt-3" style="padding:0">
        <div class="card card-header text-danger">
            <h1 >Create New Account Manage <span class="glyphicon glyphicon-gift"></span> </h1>
        </div>
    <div class="card card-body " style="background-image: url(images/logo/firozi.jpg)">

<!--form section-->
<form method="post" id="change">
    <div class="input-group-text m-2">
        <span class="w-25 h6">Employee ID: </span>
            <select  class="form-control" name="employee_id">
                <?php do {  ?>
                    <option ><?php echo $row_employee["employee_id"]; ?></option>
                <?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
            </select>
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">User Name:</span> 
        <input autocomplete="off"  type="text" class="form-control " name="user_name">
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Password:</span>
        <input id="new"  type="password" class="form-control" name="password">
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Retype Password:</span> 
        <input  id="retype" type="password" class="form-control" name="retype">
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6"> Level: </span>
        <select  class="form-control" name="user_level">
            <option value="admin">Admin</option>
            <option value="hr">HR</option>
            <option value="finance">Finance</option>
            <option value="customer">Customer</option>
        </select>
    </div>


    <div class="input-group-text m-2">
        <span class="w-25 h6">Account Status:</span>
        &nbsp;&nbsp;&nbsp;
        <label>Active: <input type="radio" checked name="account_status" value="1"></label>
        &nbsp;&nbsp;
        <label>Disable: <input type="radio" name="account_status" value="0"></label>
    </div>

    <input type="submit" value="Add" class="btn btn-success m-2 w-25">
</form>

    </div>
</div>

    <!--  code by faizullah firozi wardak 0780002528  -->
    <!--  code by faizullah firozi wardak 0780002528  -->
    <?php

            $sql = "SELECT * FROM users INNER JOIN employee ON employee.employee_id=users.employee_id";
        $users = mysqli_query($con, $sql);
        $row_users = mysqli_fetch_assoc($users);
    ?>

<div class="card card-body  col-lg-8 offset-lg-2 mt-5" >
    <div class="card card-header text-primary ">
        <h1 > Users Accounts List</h1>
</div>
    <div class="card card-body ">
<table class="table table-striped table-hover">
            <thead class="alert alert-success">
                <tr>
                    <th>Employee Name</th>
                    <th class="text-center" >User Name</th>
                    <th class="text-center" >Reset Password</th>
                    <th class="text-center" >Delete</th>
                    <th class="text-center" >Privilege</th>
                </tr>
            </thead>

    <tbody>
        <?php do { ?>
            <tr>
                <td ><?= $row_users["firstname"] . " ~> " . $row_users["lastname"] ?></td>
                <th class="text-center" ><?= $row_users["user_name"]; ?></th>
                <th class="text-center">
                    <a href="account_reset.php?employee_id=<?= $row_users["employee_id"]; ?>" >
                        <span class="glyphicon glyphicon-retweet">Reset</span>
                    </a>
                </th>
                <th class="text-center">
                    <a class="delete" href="account_delete.php?employee_id=<?= $row_users["employee_id"]; ?>" >
                        <span class="glyphicon glyphicon-trash">Delete</span>
                    </a>
                </th>
                <th class="text-center">
                    <a href="account_privilege.php?employee_id=<?= $row_users["employee_id"]; ?>" >
                        <span class="glyphicon glyphicon-btc">Privilege</span>
                    </a>
                </th>
            </tr>
        <?php } while ($row_users = mysqli_fetch_assoc($users)); ?>
    </tbody>
 </table>

 <h5 class="text-danger text-right">د هغه کارمندان چی ډیلیټ شوی، اکونټونه یی نه ډیلیټ شوی جوړولو ته ضرورت لری</h5>

    </div>
</div>
<?php require_once("footer.php"); ?>