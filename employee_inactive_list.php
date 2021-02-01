<?php ob_start(); require_once("top.php"); ?>
<?php require_once("connection.php"); restrict(1,1,9,9); ?>

<?php 

        if(!isset($_GET["page"])){

            header("location:employee_inactive_list.php?page=1");
        }

// search condition faizullah firozi 
    $condition = "";

        if(isset($_GET["q"])){

                $keyword = getValue($_GET["q"]);

            $condition = " AND employee_id = '$keyword' OR firstname LIKE '%$keyword%' OR lastname LIKE '%$keyword%' ";

        }

        // All row gettin query 

        $allEmployee = mysqli_fetch_assoc(mysqli_query($con, "SELECT COUNT(employee_id) AS total FROM employee "));

        $totalRow = $allEmployee["total"];

        $rowperpage = 5;
        $totalpage = ceil($totalRow / $rowperpage);



// employee select query 

$offset = ($_GET["page"] - 1) * $totalpage;

 
$employee = mysqli_query($con, "SELECT * FROM employee INNER JOIN emp_degree ON emp_degree.degree_id = employee.degree_id WHERE resign_date IS NOT NULL $condition ORDER BY employee_id DESC LIMIT $offset , $rowperpage ");
$row_employee = mysqli_fetch_assoc($employee);

        $totalRows = mysqli_num_rows($employee);

?>

<div class="card card-body" >

    <div class="card card-header" >



        <!-- search section -->
        <nav class="navbar navbar-light bg-light ">

            <h1 ><?php echo $head_inactive_employee_list; ?></h1>

            <!-- In Active Employee List  -->
            <a class="navbar-brand text-primary border-top" href="employee_list.php">Goto Active Employee</a>

            <img src="<?php echo $row_employee["photo"];  ?>" width="40" height="40" class="d-inline-block align-top" alt="">
            <form method="get" class="form-inline">
                <!-- to fine i add 2 url parameter  -->
                <input  hidden="hidden" type="text" name="page" value="<?php echo $_GET["page"]; ?>" >
                <input class="form-control mr-sm-2" type="search" autocomplete="off" name="q" id="search" placeholder="Search " aria-label="Search" />
                <button class=" btn btn-outline-success my-2 my-sm-0" type="submit">
                    <?php echo $head_employee_search; ?>
                </button>
            </form>
        </nav>
        <!--end of search-->


    </div>


    <div class="card card-body">

    
                            <?php if(isset($_GET["delete"])){ ?>

                        <div class="alert alert-success alert-dismissable col-lg-8 col-lg-offset-2" style="font-size:25px; color:tomato; text-align:center">

                        <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
                        Success Deleted:  ! په بریالئ توگه دا کارکوونکئ ډیلیټ شو !  مننه  
                        </div>
                        <?php } ?>

                        <?php if(isset($_GET["edit"])){ ?>

                            <div class="alert alert-success alert-dismissable col-lg-4 col-lg-offset-4" style="font-size:22px; color:red; text-align:center">

                            <button class="close " area-hidden="true" data-dismiss="alert" style="font-size:30px; color:red">&#88;</button>
                                           ستـاســــو تـغیرات بـریالی وو ، منـنـــــه  
                            </div>
                            <?php } ?>



                                <!-- search Total rows show by faizullah firozi  -->

                <?php if(isset($_GET["q"])) { ?>
             
                    <br>
                    <div class="pull-right alert alert-info " >
                     <span  class="glyphicon glyphicon-zoom-in " style="color:orange"></span>
                    <big><b>Total Result : <span   style="color:red; "> <?php echo $totalRows; ?></span></b></big>

                        </div>

                                <?php }  ?>

                                <!-- start Table Employee list  -->

        <table class="table table-striped table-hover  ">
           
        <thead class=" text-center">
            <tr>
                <th class="text-center" ><?php echo $employee_list_id; ?></th">
                <th class="text-center" ><?php echo $employee_list_firstname; ?></th>
                <th class="text-center" ><?php echo $employee_list_lastname; ?></th>
                <th class="text-center" ><?php echo $employee_list_fathername; ?></th>
                <th class="text-center" ><?php echo $employee_list_degree; ?></th>
                <th class="text-center"  width="100"><?php echo $inactive_employee_hire_date; ?></th>
                <th class="text-center"  width="100"><?php echo $inactive_employee_resign_date; ?></th>
           
                <th class="text-center"><?php echo $employee_list_photo; ?></th>
                <th class="text-center"><?php echo $employee_list_edit; ?></th>
                <th class="text-center"><?php echo $employee_list_delete; ?></th>
                <th class="text-center"><?php echo $employee_list_contract; ?></th>
                <th class="text-center"><?php echo $employee_list_all_detail; ?></th>
            </tr>
                            </thead>


            <!-- if table have a rows it will be show faizullah firozi  -->
                <?php if($totalRows > 0) { ?>

            <?php do { ?>

                <tbody>
            <tr>
                <td class="text-center" ><?php echo $row_employee["employee_id"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["firstname"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["lastname"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["fathername"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["degree_name"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["hire_date"]; ?></td>
                <td class="text-center" ><?php echo $row_employee["resign_date"]; ?></td>
               
                <td class="text-center" ><img src="<?php echo $row_employee["photo"]; ?>" class="img-rounded" width="45px"></td>
                <td class="text-center">
                    <a href="employee_inactive_edit.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
                        <span class="glyphicon glyphicon-edit" >Edit</span>
                    </a>
                </td>
                <td class="text-center">
                    <a  class="delete" href="employee_inactive_delete.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
                        <span class="glyphicon glyphicon-trash " >Delete</span>
                    </a>
                </td>

                <td class="text-center">
                    <a href="employee_contract.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
                        <span class="glyphicon glyphicon-file">Contract</span>
                    </a>

                </td>
                <td class="text-center" >
                    <a href="employee_all_detail.php?employee_id=<?php echo $row_employee["employee_id"]; ?>">
                        <span class="glyphicon glyphicon-info-sign alert ">All Details</span>
                    </a>

                </td>

            </tr>
            </tbody>
            <?php } while($row_employee = mysqli_fetch_assoc($employee)); ?>
        
            <?php } else {   ?>

                <h2 align = "center" style="color:tomato" ><b>Result Not Found ! ستاسو د خوښي څیړنه پیدا نشوه</b></h2>

            <?php }  ?>
                

        </table> 





        <!-- number of pages -->

        <div class="text-center ">
            <big><b class="badge badge-pill badge-success "> <?php echo $employee_list_page; ?> : <?php echo $_GET["page"]; ?></b></big>

        </div>


        <!-- pagination section faizullah firozi wardak -->

        <ul class="pagination">

            <li class="page-item ">

                <?php if($_GET["page"] != 1 ) { ?>

                    <a class="page-link" href="employee_inactive_list.php?page=1"> <?php echo $pagenition_first; ?> </a>


                <?php } else { ?>

                    <a style="color:gray; background-color:lightgray" class="btn disabled"> <?php echo $pagenition_first; ?></a>

                <?php } ?>


            </li>


            <li class="page-item ">

                <?php if($_GET["page"] != 1 ) { ?>

                    <a class="page-link" href="employee_inactive_list.php?page=<?php echo $_GET["page"]-1; ?>" > <?php echo $pagenition_previous; ?></a>

                <?php } else { ?>

                    <a style="cursor:fucase; color:gray; background-color:lightgray"  class="btn disabled">  <?php echo $pagenition_previous; ?> </a>

                <?php } ?>


            </li>

            <li class="page-item">

                <?php if($_GET["page"] != $totalpage) { ?>

                    <a class="page-link" href="employee_inactive_list.php?page=<?php echo $_GET["page"]+1; ?>"><?php echo $pagenition_next; ?></a>

                <?php } else { ?>


                    <a style="cursor:fucase; color:gray; background-color:lightgray"  class="btn disabled">  <?php echo $pagenition_next; ?> </a>


                <?php } ?>

            </li>

            <li class="page-item">

                <?php if($_GET["page"] != $totalpage) { ?>

                    <a class="page-link" href="employee_inactive_list.php?page=<?php echo $totalpage; ?>"><?php echo $pagenition_last; ?></a>

                <?php }  else { ?>


                    <a style="cursor:fucase; color:gray; background-color:lightgray"  class="btn disabled"> <?php echo $pagenition_last; ?> </a>

                <?php } ?>

            </li>


        </ul>


        <!-- pagination section faizullah firozi wardak -->





        <!-- back button  -->

        <div class="">
            <a class="alert-link float-right" href="employee_list.php"><?php echo $employee_list_back; ?> <span class="sr-only">(current)</span></a>

        </div>





    </div>

</div>

<?php require_once("footer.php"); ?>