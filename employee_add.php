

        <?php ob_start(); require_once("top.php"); ?>

        <?php require_once("connection.php"); restrict(2,2,9,9); ?>

        <?php 
        


        
           $province = mysqli_query($con, "SELECT * FROM province");
// record set
            $row_province = mysqli_fetch_assoc($province);
       
        $degree = mysqli_query($con, "SELECT * FROM emp_degree");
// record set
         $row_degree = mysqli_fetch_assoc($degree);

                if(isset($_POST["firstname"])){

                    $firstname = getValue($_POST["firstname"]);
                    $lastname = getValue($_POST["lastname"]);
                    $fathername = getValue($_POST["fathername"]);
                    $gender = getValue($_POST["gender"]);
                    $birth_year = getValue($_POST["birth_year"]);
                    $nic = getValue($_POST["nic"]);
                    $marital_status = getValue($_POST["marital_status"]);
                    $province_id = getValue($_POST["province_id"]);
                    $district = getValue($_POST["district"]);
                    $address = getValue($_POST["address"]);
                    $email = getValue($_POST["email"]);
                    if($email == "") {
                        $email = " NULL ";
                     }                     // Faizullah FIROZI
                    else {
                        $email = "'" . $email . "'";
                    }
                    $degree_id = getValue($_POST["degree_id"]);
                  
                    
                    // to get photo from file

                    if($_FILES["photo"]["name"] != ""){

                        $filetype = $_FILES["photo"]["type"];
                       
                    if($filetype == "image/jpeg"  || $filetype == "image/png" || $filetype == "image/gif") {
                        if($_FILES["photo"]["size"] <= 5 * 1024 * 1024) {	
                        $path = "images/employee/" . time() . $_FILES["photo"]["name"];
                       $result = move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                       if(!$result) {
                        header("location:employee_add.php?upload=failed");
                        exit();
					                    }
                    
                        }
                         else {
                                        header("location:employee_add.php?filesize=invalid");
                                        exit();
                                    }

                                
                                }
                                else {
                                    header("location:employee_add.php?filetype=invalid");
                                    exit();
                                }		
                            }
                    else {
                        if($gender == 0) {
                            $path = "images/employee/user_m.png";
                           }   
                           else {
                                  $path = "images/employee/user_f.png";
                                      }
      
                                   }
                    $hire_date = date("Y-m-d");


                    $result = mysqli_query($con, "INSERT INTO  employee VALUES (NULL, '$firstname', '$lastname', '$fathername', $gender, $birth_year, '$nic', $marital_status, $province_id, '$district', '$address', $email, $degree_id, '$path', '$hire_date', NULL)");

                    if($result) {
                       header("Location:employee_list.php?page=1&add=done");


                   }
                   else {
                       header("Location:employee_add.php?error=notadd");


                       exit();

                   }
                }

     ?>



        <div class="card card-body col-lg-8 col-md-12 offset-lg-2" >


        <div class="card card-header text-primary">
                <h1>Register New Employee </h1>

        </div>

        <div class="card card-body">

                    
            <?php if(isset($_GET["error"])){ ?>
              <div class="alert alert-danger">
               Could not add new employee 
                    </div>
            <?php }  ?>


<!--  in form this is very important - enctype="multipart/form-data" -->
                <form method="post" enctype="multipart/form-data">


                    <div class="input-group-text m-1 ">
                        <span class="w-25 h6">
                    Firstname: </span> <input autofocus="autofocus" autocomplete="off" minlength="3" required="required" class="form-control " type="text" name="firstname">
                    </div>
                       <div class="input-group-text m-1">
                        <span class="w-25 h6">
                    Lastname: </span> <input autocomplete="off" minlength="3" required="required" class="form-control" type="text" name="lastname">
                    </div>

                       <div class="input-group-text m-1">
                        <span class="w-25 h6">
                    Fathername: </span> <input autocomplete="off" minlength="3" required="required" class="form-control" type="text" name="fathername">
                    </div>

                       <div class="input-group-text m-1">
                        <span class="w-25 h6">
                    Phone: </span> <input readonly value="ددی ټیبل لاتر اوسه نه دی وصل" class="form-control" type="text" name="phone_no">
                    </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">   Gender: </span> <label> &nbsp;&nbsp;&nbsp;&nbsp; Male <input checked="checked" type="radio" name="gender" value="0"></label>
                    <label> &nbsp;&nbsp;&nbsp;&nbsp;Female <input type="radio" name= "gender" value="1"> </label>
                    </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Birth Year: </span> <select  class="form-control-plaintext border-success" name="birth_year">
                                <!-- dynamic date system FIROZI  -->
                                <?php  
                                    $max = date("Y") - 18;
                                    $min = date("Y") - 65;

                                    for($x = $max; $x>$min; $x--){

                                        echo "<option>$x</option>";
                                    }
                                ?>

                                </select>
                                </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               NIC: </span><input autocomplete="off" minlength="3" required="required" class="form-control" type="text" name="nic">
                                </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Marital Status: </span><label>&nbsp;&nbsp;&nbsp;&nbsp;Single <input type="radio" name="marital_status" value="0"></label>
                    <label>&nbsp;&nbsp;&nbsp;&nbsp;Married <input checked="checked" type="radio" name= "marital_status" value="1"></label>
                                </div>


                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               province: </span> <select class="form-control-plaintext border-warning" name="province_id">
                    
                                <?php  do { ?> 
                                    <option value="<?php echo $row_province["province_id"]; ?>"> <?php echo $row_province["province_name"]; ?> </option>
                                <?php } while ($row_province = mysqli_fetch_assoc($province));  ?>
                
                                </select>
                                </div>
                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               District:</span> <input autocomplete="off" minlength="3" required="required" class="form-control" type="text" name="district">
                                </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Address: </span> <textarea rows="" class="form-control"  name="address"></textarea>
                                </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Email: </span><input autocomplete="off"  class="form-control" type="text" name="email">
                                </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Degree: </span> <select class="form-control-plaintext border-danger" name="degree_id">
                                  <?php do { ?>
                                        <option value="<?php echo $row_degree["degree_id"]; ?> "> <?php echo $row_degree["degree_name"]; ?> </option>
                                  <?php } while ($row_degree = mysqli_fetch_assoc($degree)); ?>

                                </select>
                                  </div>

                       <div class="input-group-text m-1">
                           <span class="w-25 h6">
                               Photo: </span> <input name="photo" type="file" class="form-control-file"  >
                                  </div>

                    <input type="submit" value="Register" class="btn btn-outline-success  w-25 m-2 mt-4">



                </form>

        </div>

</div>

        <?php require_once("footer.php"); ?>