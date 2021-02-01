<?php

require_once ("connection.php");

  $id = $_POST["employee_id"];

  $absent = mysqli_query($con, "SELECT SUM(absent_hover) AS total FROM attendance WHERE employee_id=$id AND date_year= EXTRACT(YEAR FROM curdate()) AND date_month= EXTRACT(MONTH FROM CURDATE())" );
  $row_absent = mysqli_fetch_assoc($absent);

    echo $row_absent["total"];

?>