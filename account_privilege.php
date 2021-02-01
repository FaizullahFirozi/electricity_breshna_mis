<?php 
    require_once("connection.php"); 
    require_once("top.php"); 

        $sql = "SELECT * FROM user_level WHERE employee_id=" . getValue($_GET["employee_id"]);
    $level = mysqli_query($con, $sql);
    $row_level = mysqli_fetch_assoc($level);

  if(isset($_POST["form"])){
        $admin_level = $_POST["admin"];
        $hr_level = $_POST["hr"];
        $finance_level = $_POST["finance"];
        $customer_level = $_POST["customer"];

        $sql = "UPDATE user_level SET admin_level=$admin_level, hr_level=$hr_level, finance_level=$finance_level, customer_level=$customer_level WHERE employee_id=". getValue($_GET["employee_id"]);
      if(mysqli_query($con, $sql)){
          header("location:account_management.php?privilege=done");
      }else{
          header("location:account_privilege.php?error=notchange");
      }
  }
?>

<div class="card card-body mt-5 col-lg-8 offset-lg-2 " >
    <div class="card card-header text-primary ">
        <h1 > Set Account Privilege </h1>
     </div><br>
<div class="card card-body">
   <form method="post">
    <div class="input-group-text m-2 ">
        <span class="w-25 h6 text-danger">
            <big><b>Admin Department :</b></big></span>&nbsp;
            <label><input type="radio" name="admin" <?php if($row_level["admin_level"] == 0 ) echo 'checked="checked"'; ?> value="0"> None &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="admin" <?php if($row_level["admin_level"] == 1 ) echo 'checked="checked"'; ?> value="1"> Read &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="admin" <?php if($row_level["admin_level"] == 2 ) echo 'checked="checked"'; ?> value="2"> Write &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="admin" <?php if($row_level["admin_level"] == 4 ) echo 'checked="checked"'; ?> value="4"> Update &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="admin" <?php if($row_level["admin_level"] == 8 ) echo 'checked="checked"'; ?> value="8"> Delete &nbsp;&nbsp;&nbsp;</label>
    </div><hr>

    <div class="input-group-text m-2">
        <span class="w-25 h6 text-success">
            <big><b>H R Department :</b></big></span>&nbsp;
                <label><input type="radio" name="hr" <?php if($row_level["hr_level"] == 0 ) echo 'checked="checked"'; ?> value="0"> None &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="hr" <?php if($row_level["hr_level"] == 1 ) echo 'checked="checked"'; ?> value="1"> Read &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="hr" <?php if($row_level["hr_level"] == 2 ) echo 'checked="checked"'; ?> value="2"> Write &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="hr" <?php if($row_level["hr_level"] == 4 ) echo 'checked="checked"'; ?> value="4"> Update &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="hr" <?php if($row_level["hr_level"] == 8 ) echo 'checked="checked"'; ?> value="8"> Delete &nbsp;&nbsp;&nbsp;</label>
    </div> <hr>

    <div class="input-group-text m-2">
        <span class="w-25 h6 text-warning">
            <big><b> Finance Department :</b></big></span>&nbsp;
                <label><input type="radio" name="finance" <?php if($row_level["finance_level"] == 0 ) echo 'checked="checked"'; ?> value="0"> None &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="finance" <?php if($row_level["finance_level"] == 1 ) echo 'checked="checked"'; ?> value="1"> Read &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="finance" <?php if($row_level["finance_level"] == 2 ) echo 'checked="checked"'; ?> value="2"> Write &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="finance" <?php if($row_level["finance_level"] == 4 ) echo 'checked="checked"'; ?> value="4"> Update &nbsp;&nbsp;&nbsp;</label>
                <label><input type="radio" name="finance" <?php if($row_level["finance_level"] == 8 ) echo 'checked="checked"'; ?> value="8"> Delete &nbsp;&nbsp;&nbsp;</label>
    </div> <hr>



    <div class="input-group-text m-2">
    <span class="w-25 h6 text-info">
        <big><b>Customer Department :</b></big></span>&nbsp;
            <label><input type="radio" name="customer" <?php if($row_level["customer_level"] == 0 ) echo 'checked="checked"'; ?> value="0"> None &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="customer" <?php if($row_level["customer_level"] == 1 ) echo 'checked="checked"'; ?> value="1"> Read &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="customer" <?php if($row_level["customer_level"] == 2 ) echo 'checked="checked"'; ?> value="2"> Write &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="customer" <?php if($row_level["customer_level"] == 4 ) echo 'checked="checked"'; ?> value="4"> Update &nbsp;&nbsp;&nbsp;</label>
            <label><input type="radio" name="customer" <?php if($row_level["customer_level"] == 8 ) echo 'checked="checked"'; ?> value="8"> Delete &nbsp;&nbsp;&nbsp;</label>
    </div> <hr>

<!--    دغه انفوټ فارم همیشه سبمیټ کیږی که ولیو هم ونه لری-->

       <input type="hidden" value="" name="form" >
        <input type="submit" value="Change" class="btn btn-outline-success w-25">
</form>
    </div>
</div>
<?php require_once("footer.php"); ?>