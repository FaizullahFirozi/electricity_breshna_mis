<?php ob_start(); require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(2,9,9,9); ?>

    <?php 


    if(isset($_POST["province_name"])) {

        $province_name = getValue($_POST["province_name"]);


       $result = mysqli_query($con, "INSERT INTO province VALUES (NULL, '$province_name')");
        if ($result) {
        header("location:province_manage.php?add=done");
   
        } else {
            header("location:province_add.php?error=notadd");
   
        }
   
   
   
   
    }

    ?>

<div class="card card-body mt-3 col-lg-6 offset-lg-3">

        <div class="card card-header">

            <h1>
                <span class="glyphicon glyphicon-pencil"></span> Add Province
                <span class="glyphicon glyphicon-plus"></span>
                </h1>
        </div>

        <div class="panel-body">

        <!-- form  -->
        <form method="post">
                

            <div class="input-group-text m-2 mt-3">
           <span class="w-25 h6 ">
           <span class="glyphicon glyphicon-star"></span>

                Province Name:</span>
                         
                         <input required autofocus="autofocus" autocomplete="off" type="text" name="province_name" class="form-control">
                </select>
            </div>

            <input type="submit" value="Add Province" class="btn btn-danger m-2">
        </form>

<!-- message orror -->
        <?php if(isset($_GET["error"])) { ?>
                        <h3 class="alert alert-danger alert-dismissable text-center" >
                            <button class="close" area-hidden="true" data-dismiss="alert">&times </button>
                        Error: ولایت اضافه نه شو مهربانی وکړئ بیا کوشش وکړئ
                        </h3>

                    <?php } ?>
            </div>

   </div>
    






<?php require_once("footer.php"); ?>