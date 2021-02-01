<?php require_once("connection.php"); restrict(8,8,9,9); ?>


<?php 

     $photo = mysqli_query($con, "SELECT photo FROM employee WHERE employee_id =" . getValue($_GET["employee_id"]));
        $row_photo = mysqli_fetch_assoc($photo);


        if (! ($row_photo["photo"] == "images/employee/user_m.png" || $row_photo["photo"] == "images/employee/user_f.png")) {
          
            unlink($row_photo["photo"]);
            
            }   


    mysqli_query($con, "DELETE FROM employee WHERE employee_id = " . getValue($_GET["employee_id"]) );

    header("location:employee_list.php?delete=done");



?>
