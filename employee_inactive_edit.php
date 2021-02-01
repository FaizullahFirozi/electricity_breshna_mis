        <?php ob_start(); require_once("top.php"); ?>
        <?php require_once("connection.php"); restrict(4,4,9,9); ?>

        <?php 
		
           $province = mysqli_query($con, "SELECT * FROM province");
// recordset
                  $row_province = mysqli_fetch_assoc($province);
       


        $degree = mysqli_query($con, "SELECT * FROM emp_degree");
// recordset
             $row_degree = mysqli_fetch_assoc($degree);



         $employee =  mysqli_query($con, "SELECT * FROM employee WHERE employee_id =" . getValue($_GET["employee_id"]) );

                    $row_employee = mysqli_fetch_assoc($employee);




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
                       
                    if($filetype == "image/jpeg" || $filetype == "image/png" || $filetype == "image/gif") {
                        if($_FILES["photo"]["size"] <= 5 * 1024 * 1024) {	
                        $path = "images/employee/" . time() . $_FILES["photo"]["name"];
                       $result = move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
                       
                            if(!$result) {
                                header("location:employee_inactive_edit.php?upload=failed");
                                exit();
                                                }
                                    if(! ($row_employee["photo"] == "images/employee/user_m.png" || $row_employee["photo"] == "images/employee/user_f.png")) {
                                        
                                        unlink($row_employee["photo"]);  
                                           
                                        }   

                            
                        }
                         else {
                                        header("location:employee_inactive_edit.php?filesize=invalid");
                                        exit();
                                    }

                                
                                }
                                else {
                                    header("location:employee_inactive_edit.php?filetype=invalid");
                                    exit();
                                }		
                            }
                    else {
                        $path = $row_employee["photo"];
                                   }
                    $hire_date = getValue($_POST["hire_date"]);
                    $resign_date = getValue($_POST["resign_date"]);

                                   if($resign_date == ""){
                                       $resign_date = "NULL";
                                   }   else {
                                       $resign_date = "'" . $resign_date . "'";
                                   }

                                
                    $result = mysqli_query($con, "UPDATE employee SET firstname='$firstname', lastname='$lastname', fathername='$fathername', gender=$gender, birth_year=$birth_year, nic='$nic', marital_status=$marital_status, province_id=$province_id, district='$district', address='$address', email=$email, degree_id=$degree_id, photo='$path', hire_date='$hire_date', resign_date=$resign_date WHERE employee_id =" . getValue($_GET["employee_id"]));

                   if($result) {
                       header("Location:employee_inactive_list.php?page=1&edit=done");
                    

                   }
                   else {
                       header("Location:employee_inactive_edit.php?error=notupdate");
                      
                       exit();

                   }
                }


              $employee =  mysqli_query($con, "SELECT * FROM employee WHERE employee_id =" . getValue($_GET["employee_id"]) );

                $row_employee = mysqli_fetch_assoc($employee);
     ?>



        <div class="card card-body">


        <div class="card card-header">
                <h1 class="text-danger"> Edit In Active Employee </h1>

        </div>

        <div class="card card-body">

                    
            <?php if(isset($_GET["error"])){ ?>
              <div class="alert alert-danger">
               Could Not Edit In Active Employee! Please Try Again 
                    </div>
            <?php }  ?>
            


<!--  in form this is very important - enctype="multipart/form-data" -->
                <form method="post" enctype="multipart/form-data">
                   
                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                    Firstname: </span> <input value="<?php echo $row_employee["firstname"]; ?>" class="form-control" type="text" name="firstname">
                    </div>
                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                     Lastname: </span> <input value="<?php echo $row_employee["lastname"]; ?>"  class="form-control" type="text" name="lastname">
                    </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">

                    Fathername: </span> <input value="<?php echo $row_employee["fathername"]; ?>" class="form-control" type="text" name="fathername">
                    </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">

                Gender: </span> <label> &nbsp;&nbsp;&nbsp;&nbsp; Male <input <?php if($row_employee["gender"]== 0) echo 'checked="checked"'; ?> type="radio" name="gender" value="0"></label>
                   
                    <label> &nbsp;&nbsp;&nbsp;&nbsp;Fimale <input <?php if($row_employee["gender"]== 1) echo 'checked="checked"'; ?> type="radio" name= "gender" value="1"> </label>
                   
                </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                        Birth Year: </span> <select  class="form-control" name="birth_year">
                                <!-- dynamic date system FIROZI  -->
                               
                               <?php  
                                    $max = date("Y") - 18;
                                    $min = date("Y") - 65;

                                    for($x = $max; $x>$min; $x--){
                                            
                                        if($row_employee["birth_year"] == $x){

                                                    echo "<option selected>$x</option>";
                                    }
                                                else{
                                                    echo "<option >$x</option>";

                                                }

                                                    }
                                                ?>

                                </select>
                                </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                        NIC: </span><input value="<?php echo $row_employee["nic"]; ?>"  class="form-control" type="text" name="nic">
                                </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">

                 Marital Status: </span><label>&nbsp;&nbsp;&nbsp;&nbsp;Single <input <?php if($row_employee["marital_status"] == 0) echo 'checked="checked"'; ?> type="radio" name="marital_status" value="0"></label>
                   
                                     <label>&nbsp;&nbsp;&nbsp;&nbsp;Married <input <?php if($row_employee["marital_status"] == 1 ) echo 'checked="checked"'; ?> type="radio" name= "marital_status" value="1"></label>
                                </div>





                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                      province: </span> <select class="form-control" name="province_id">
                    
                               
                    
                    <?php  do { ?>
                                    <?php if ($row_employee["province_id"] == $row_province["province_id"] ) { ?>
                                    
                                        <option selected="selected" value="<?php echo $row_province["province_id"]; ?>"> <?php echo $row_province["province_name"]; ?> </option>

                                    <?php } else { ?> 

                                        <option  value="<?php echo $row_province["province_id"]; ?>"> <?php echo $row_province["province_name"]; ?> </option>

                                    <?php } ?>
                                <?php } while ($row_province = mysqli_fetch_assoc($province));  ?>
                
                                </select>
                                </div>


                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                        District:</span> <input value="<?php echo $row_employee["district"]; ?>" class="form-control" type="text" name="district">
                                </div>


                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                        Address: </span> <textarea  class="form-control"  name="address"> <?php echo $row_employee["address"]; ?>  </textarea>
                                </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                       Email: </span><input value="<?php echo $row_employee["email"]; ?>" class="form-control" type="text" name="email">
                                </div>

                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">

                    Degree: </span> <select class="form-control" name="degree_id">
                                  <?php do { ?> 

                                    <?php if($row_employee["degree_id"] == $row_degree["degree_id"]) { ?>
                                                
                                                    <option selected="selected" value="<?php echo $row_degree["degree_id"]; ?> "> <?php echo $row_degree["degree_name"]; ?> </option>
                                          
                                                    <?php } else { ?>

                                                    <option  value="<?php echo $row_degree["degree_id"]; ?> "> <?php echo $row_degree["degree_name"]; ?> </option>

                                            
                                                <?php } ?>

                                        <?php } while ($row_degree = mysqli_fetch_assoc($degree)); ?>

                                </select>
                                  </div>


                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                        Hire Date: </span><input autocomplete="off"  id="hire_date"  value="<?php echo $row_employee["hire_date"]; ?>" class="form-control" type="text" name="hire_date">
                                </div>


                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                         Resign Date: </span><input autocomplete="off" id="resign_date" value="<?php echo $row_employee["resign_date"]; ?>" class="form-control" type="text" name="resign_date">
                                </div>


                    <div class="input-group-text m-1">
                        <span class="w-25 h6 text-primary">
                           Photo: <img class="img-rounded"  src="<?php echo $row_employee["photo"]; ?>" width="100px"><br>
                     </span> <input name="photo" type="file" class="form-control-file"  >
                                  </div>
                                  
                    <input type="submit" value=" Edit " class="btn btn-outline-danger btn-lg m-3 w-25 ">
                </form>

       

        </div>

        
<script type="text/javascript">
	Calendar.setup({
        inputField      :    "hire_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

<script type="text/javascript">
	Calendar.setup({
        inputField      :    "resign_date",
        ifFormat        :    "%Y-%m-%d",
        showsTime       :    false,
        timeFormat      :    "24"
    });
</script>

        <?php require_once("footer.php"); ?>