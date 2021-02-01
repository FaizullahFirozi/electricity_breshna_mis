<?php 
    ob_start();
    require_once("connection.php"); restrict(2,9,9,2); 
    require_once("top.php"); 

//  Customer Register OR counterbox Register 
  $province = mysqli_query($con, "SELECT * FROM province");
  $row_province = mysqli_fetch_assoc($province);

   if(isset($_POST["customer_name"])){
            $counter_id = getValue($_POST["counter_id"]);
            $customer_type = getValue($_POST["customer_type"]);
            $coeffecent = getValue($_POST["coeffecent"]);
            $phase = getValue($_POST["phase"]);
            $account_no = getValue($_POST["account_no"]);
            $customer_no = getValue($_POST["customer_no"]);
            $customer_name = getValue($_POST["customer_name"]);
            $father_name = getValue($_POST["father_name"]);
            $province_id = getValue($_POST["province_id"]);
            $district = getValue($_POST["district"]);
            $address = getValue($_POST["address"]);
            $junction = getValue($_POST["junction"]);
            $transformer = getValue($_POST["transformer"]);
            $box_id = getValue($_POST["box_id"]);
            $rout_code = getValue($_POST["rout_code"]);
      
            $result = mysqli_query($con, "INSERT INTO counterbox VALUES ($counter_id, $customer_type, $coeffecent, $phase, $account_no, $customer_no, '$customer_name', '$father_name', $province_id, '$district', '$address', '$junction', '$transformer', '$box_id', '$rout_code')");
        if($result){
            header("location:customer_list.php?add=done");
        }else{
            header("location:customer_add.php?error=notadd");
        }
   }
?>
  
<div class="card card-header mt-2 col-lg-8 offset-lg-2" >
    <div class="card card-header text-success">
        <h1> Customer Register </h1>
    </div>
<div class="card card-body" >
    <?php if(isset($_GET["error"])) { ?>
        <h3 class="alert alert-danger alert-dismissable" >
            <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
            Error: could not Add New Customer ! Please Try Again! 
        </h3>
    <?php } ?>       

<form method="post">
        <div class="input-group-text m-2">
            <span class="w-25 h6">Counter ID : </span> 
            <input autocomplete="off" autofocus="autofocus" class="form-control" type="text" name="counter_id">
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Customer Type : </span>
             &nbsp;&nbsp;&nbsp;
            <label> Personal <input checked="checked" type="radio" value="0" name="customer_type" > </label>
            &nbsp;&nbsp;&nbsp; <label> Commercial <input  type="radio" value="1" name="customer_type" > </label>
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Coeffecent : </span>
             <input autocomplete="off" class="form-control" type="text" name="coeffecent" >
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Phase : </span> 
            <input autocomplete="off" class="form-control" type="text" name="phase" >
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Account No : </span> 
            <input autocomplete="off" class="form-control" type="text" name="account_no" >
        </div>

        <div class="input-group-text m-2">
            <span class="w-25 h6">Customer No : </span> 
            <input autocomplete="off" class="form-control" type="text" name="customer_no" >
        </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Customer Name : </span> 
        <input autocomplete="off" class="form-control" type="text" name="customer_name" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Father Name : </span> 
        <input autocomplete="off" class="form-control" type="text" name="father_name" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Province : </span>
         <select class="form-control" name="province_id"> 
            <?php do { ?>
                <option value="<?= $row_province["province_id"]; ?>" > 
                    <?= $row_province["province_name"]; ?> 
                </option>
            <?php } while ($row_province = mysqli_fetch_assoc($province)); ?>
        </select>
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">District : </span>
        <input autocomplete="off" class="form-control" type="text" name="district" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Address : </span> 
        <input autocomplete="off" class="form-control" type="text" name="address" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Junction : </span> 
        <input autocomplete="off" class="form-control" type="text" name="junction" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Tranformer : </span> 
        <input autocomplete="off" class="form-control" type="text" name="transformer" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Box ID : </span>
         <input autocomplete="off" class="form-control" type="text" name="box_id" >
    </div>

    <div class="input-group-text m-2">
        <span class="w-25 h6">Rout Code : </span>
         <input autocomplete="off" class="form-control" type="text" name="rout_code" >
    </div>
    <input class="btn btn-outline-success m-2 w-25" type="submit" value="Register">
</form> 
    </div>
</div>
<?php require_once("footer.php"); ?>