<?php
    require_once("connection.php"); restrict(4,9,9,9); 

    if(!isset($_SESSION)){
        session_start();
    }
            $sql = "SELECT * FROM users WHERE employee_id=". getValue($_GET["employee_id"]);
        $result = mysqli_query($con,  $sql);
        $row_result = mysqli_fetch_assoc($result);

    if(isset($_POST["new"])){
        $new = getValue($_POST["new"]);

            $sql = "UPDATE users SET user_password= PASSWORD('$new') WHERE employee_id=".getValue($_GET["employee_id"]);
        if(mysqli_query($con, $sql)){
            header("location:account_management.php?change=done");
        }else{
            header("location:account_reset.php?error=notchange");
        }
    }

?>
<?php require_once("top.php"); ?>
    <div class="card card-body col-lg-6 offset-lg-3 mt-5" style="padding:0">
        <div class="card card-header">
            <h1 >Reset Password</h1>
        </div>
<!-- Alert section -->
 <!-- Old password Wrong  -->
    <?php if(isset($_GET["error"])){ ?>
        <div class="alert alert-danger alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:23px; margin-top: 20px; color:tomato; text-align:center">
            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
            Wrong  !  بیا کوښښ وکړئ
        </div>
    <?php } ?>
<!--  end-->

<div class="card card-header">
    <form method="post" id="change" >
        <div class="input-group-text m-2">
            <span class="w-25 h6">User Name:</span>
            <input value="<?= $row_result["user_name"]; ?>" readonly style="color:red; font-size: large" type="text" class="form-control text-center" >
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">New Password:</span> 
            <input  id="new" type="password" class="form-control" name="new">
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Retype Password:</span> 
            <input  id="retype" type="password" class="form-control" name="retype">
        </div>
        <input type="submit" value="Reset Password" class="btn btn-outline-danger m-2 w-25">
    </form>
    </div>
</div>
<!--  code by faizullah firozi wardak 0780002528  -->
<?php require_once("footer.php"); ?>