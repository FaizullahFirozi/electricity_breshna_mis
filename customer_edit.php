<?php 
        ob_start();
        require_once("top.php");
        require_once("connection.php"); restrict(4,9,9,4); 

//  Customer Register OR counterbox Register 


  $customer = mysqli_query($con, "SELECT * FROM counterbox WHERE counter_id=" . getValue($_GET["counter_id"]));
  $row_customer = mysqli_fetch_assoc($customer);

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

       
        $result = mysqli_query($con, "UPDATE counterbox SET counter_id=$counter_id, customer_type=$customer_type, coeffecent=$coeffecent, phase=$phase, account_no=$account_no, customer_no=$customer_no, customer_name='$customer_name', father_name='$father_name', province_id=$province_id, district='$district', address='$address', junction='$junction', transformer='$transformer', box_id='$box_id', rout_code='$rout_code'  WHERE counter_id=" . getValue($_GET["counter_id"]));

        if($result){
            header("location:customer_list.php?edit=done");
        }
        else {
            header("location:customer_adit.php?error=notadd");
        }


   }


  ?>

  
     <div class="card card-body mt-3 col-lg-6 offset-lg-3" >

<div class="card card-header">

        <h1> Customer Edit </h1>

    </div>


    <div class="card-body">
            <?php if(isset($_GET["error"])) { ?>
                        <h3 class="alert alert-danger alert-dismissable" >
                            <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                        Error: could not Add New Customer ! Please Try Again! 
                        </h3>

                    <?php } ?>
               



<form method="post">


        <div class="input-group-text m-1">
                <span class="w-25 h6 ">

  Counter ID : </span>  <input autocomplete="off" value="<?= $row_customer["counter_id"]; ?>" class="form-control" type="text" name="counter_id" >
  
  </div>
  <br>



    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Customer Type : </span> &nbsp;&nbsp;&nbsp;
 <label> Personal <input <?php if($row_customer["customer_type"] == 0) { echo 'checked="checked"'; }  ?> type="radio" value="0" name="customer_type" > </label>
 &nbsp;&nbsp;&nbsp; <label> Commerce <input <?php if($row_customer["customer_type"] == 1) { echo 'checked="checked"'; }  ?>  type="radio" value="1" name="customer_type" > </label>
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Coeffecent : </span> <input autocomplete="off" value="<?= $row_customer["coeffecent"]; ?>" class="form-control" type="text" name="coeffecent" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Phase : </span> <input autocomplete="off" value="<?= $row_customer["phase"]; ?>" class="form-control" type="text" name="phase" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Account No : </span> <input autocomplete="off" value="<?= $row_customer["account_no"]; ?>" class="form-control" type="text" name="account_no" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Customer No : </span> <input autocomplete="off" value="<?= $row_customer["customer_no"]; ?>" class="form-control" type="text" name="customer_no" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Customer Name : </span> <input autocomplete="off" value="<?= $row_customer["customer_name"]; ?>" class="form-control" type="text" name="customer_name" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Father Name : </span> <input autocomplete="off" value="<?= $row_customer["father_name"]; ?>" class="form-control" type="text" name="father_name" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Province : </span> <select class="form-control" name="province_id"> 
     <?php do { ?>
          
          <?php if($row_customer["province_id"] == $row_province["province_id"]) { ?>
          
               <option selected="selected" value="<?= $row_province["province_id"]; ?>" > <?= $row_province["province_name"]; ?>  </option>

          <?php } else { ?>
              
               <option value="<?= $row_province["province_id"]; ?>" > <?= $row_province["province_name"]; ?>  </option>
         
          <?php } ?>

     <?php } while ($row_province = mysqli_fetch_assoc($province)); ?>
</select>
</div>



    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


District : </span> <input autocomplete="off" value="<?= $row_customer["district"]; ?>" class="form-control" type="text" name="district" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Address : </span> <input autocomplete="off" value="<?= $row_customer["address"]; ?>" class="form-control" type="text" name="address" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Junction : </span> <input autocomplete="off" value="<?= $row_customer["junction"]; ?>" class="form-control" type="text" name="junction" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Tranformer : </span> <input autocomplete="off" value="<?= $row_customer["transformer"]; ?>" class="form-control" type="text" name="transformer" >
</div>



    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Box ID : </span> <input autocomplete="off" value="<?= $row_customer["box_id"]; ?>" class="form-control" type="text" name="box_id" >
</div>


    <div class="input-group-text m-1">
                <span class="w-25 h6 ">


Rout Code : </span> <input autocomplete="off" value="<?= $row_customer["rout_code"]; ?>" class="form-control" type="text" name="rout_code" >
</div>

<input class="btn btn-primary m-1 btn-lg" type="submit" value="Change">



</form> 


</div>
</div>


<?php require_once("footer.php"); ?>