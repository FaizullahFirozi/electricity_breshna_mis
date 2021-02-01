<!--this page don't need to connetion.php faizullah firozi-->
<?php
    if(!isset($_SESSION)) {  session_start();   }

    if(isset($_SESSION["login"])){
        header("location:home.php");
    }

    /*mysql connection by faizullah firozi wardak 0780002528*/
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "breshna";

    $con = mysqli_connect($server, $username, $password);
    mysqli_select_db($con,$database);

    // wrapper function
    function getValue($value){
        global $con;
        return mysqli_real_escape_string($con, $value);
    }

    // code for form validation 
    $error_username = $error_password = "";
    $error = false;

if(isset($_POST["submit"])){
    if(!empty($_POST["username"])){
        if(strlen($_POST["username"]) < 3){
            $error_username = "Your Username must be at least 3 ";
            $error = true;
        }
    }else{
        $error_username = " * Please Enter Username ";
        $error = true;
    }
    if(!empty($_POST["password"])){
        if(strlen($_POST["password"]) < 3){
            $error_password = "Your Password must be at least 3 ";
            $error = true;
        }
    }else{
        $error_password = " * Please Enter password ";
        $error = true;
    }

    if(!$error){
        $user = getValue($_POST["username"]);
        $pass = getValue($_POST["password"]);

            $sql =  "SELECT * FROM users WHERE user_name ='$user' AND user_password = PASSWORD('$pass') ";
        $login = mysqli_query($con, $sql);
        $totalrow = mysqli_num_rows($login);

        if ($totalrow == 1) {
            $row_login = mysqli_fetch_assoc($login);
            $_SESSION["login"] = $row_login["employee_id"];

        //user level
            $level = mysqli_query($con, "SELECT * FROM user_level WHERE employee_id=" . $_SESSION["login"]);
            $row_level = mysqli_fetch_assoc($level);
                $_SESSION["admin"] = $row_level["admin_level"];
                $_SESSION["hr"]     = $row_level["hr_level"];
                $_SESSION["finance"] = $row_level["finance_level"];
                $_SESSION["customer"] = $row_level["customer_level"];

                header("location:home.php");
        }else{
            header("location:index.php?login=failed");
            exit();
            // error
        }
    }
}  
?>
   
<?php require_once("top.php"); ?>
<div id="login">
    <form method="post">
        <h1 align="center" style="margin-bottom: 20px;color:lightblue">Login to breshna MIS</h1>
            <!-- message if you not login and go to home or other page -->
        <?php if(isset($_GET["notlogin"])) {  ?>
            <div class="alert alert-warning text-danger p-3 alert-dismissable" >
                <button class="close" area-hidden="true" data-dismiss="alert" style="font-size:40px; color:blue">&#88;</button><b>
                مهربانی وکړئ لومړی قانونی ورته داخل شئ
                </b>
            </div>
        <?php  }  ?>
        <!-- login error message firozi wardak  -->

        <?php if(isset($_GET["login"])){ ?>
            <div class="alert alert-danger text-center alert-dismissable" style="font-size:18px; color:red">
                <button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
                په دقت سره یی ولیکه...  دا <b style="font-size:25px;color:blue"> غلت </b> دی
            </div>
        <?php } ?>
        <!-- login form -->
        <div class="input-group-text">
            <span class="input-group-addon text-success mr-2">Username</span>
            <input class="form-control" autocomplete="off" type="text" placeholder="EX: faizullah firozi"  name="username">
        </div>
        <span class="text-danger h5"><?php if($error) { echo $error_username; } ?></span>
        
        <div class="input-group-text mt-2">
            <span class="input-group-addon text-success mr-2">Password</span>
            <input class="form-control" type="password" placeholder="EX : Wardak tech"  name="password">
        </div>
        <span class="text-danger h5"><?php if($error) { echo $error_password; } ?></span>
        <input class="btn btn-outline-warning btn-lg mt-3 btn-block " type="submit" name="submit"  value="login">
    </form><br>
        <div class="text-center">
            <img src="images/logo/firozi.jpg" width="200px" class="rounded-circle img-thumbnail">
                <span class="spinner-grow text-dark" role="none"></span>
                <span class="spinner-grow text-danger" role="none"></span>
                <span class="spinner-grow text-success " role="none"></span>
        </div>
    </div>
</div>

</div>

<div id="footer" class="row navbar navbar-fixed-bottom">Copyright &copy; <?php echo date("Y"); ?> Faizullah firozi </div>

    </div>

    </body>
</html>