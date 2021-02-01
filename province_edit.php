<?php ob_start(); require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(4,9,9,9); ?>

    <?php 

        $province_id = getValue($_GET["province_id"]);

       $province = mysqli_query($con, "SELECT * FROM province WHERE province_id=$province_id");
        $row_province = mysqli_fetch_assoc($province);

    if(isset($_POST["province_name"])) {

        $province_name = getValue($_POST["province_name"]);

//echo  "UPDATE province SET province_name='$province_name'"; exit;

       $result = mysqli_query($con, "UPDATE province SET province_name='$province_name' WHERE province_id=$province_id");
        if ($result) {
        header("location:province_manage.php?edit=done");
   
        } else {
            header("location:province_manage.php?error=notedit");
   
        }
   
   
   
   
    }

    ?>

<div class="card card-body col-lg-6 offset-lg-3 mt-3" >

        <div class="card card-header text-center text-primary">

            <h1>
                <span class="glyphicon glyphicon-edit"></span> Edit Province
                <span class="glyphicon glyphicon-edit"></span>
                </h1>
        </div>

        <div class="card card-body">

        <!-- form  -->
        <form method="post">
                

            <div class="input-group-text m-2">
           <span class="w-25 h6 ">
           <span class="glyphicon glyphicon-star"></span>

                Province Name:</span>
                         
                         <input required  value="<?php echo $row_province["province_name"]; ?>"  autocomplete="off" type="text" name="province_name" class="form-control" >
            </div>

            <input  type="submit" value="Edit Province" class="btn btn-warning m-2">
        </form>

            </div>

   </div>
    






<?php require_once("footer.php"); ?>