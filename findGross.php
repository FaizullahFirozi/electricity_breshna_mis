<?php

require_once ("connection.php");

  $id = $_POST["employee_id"];

  $gross = mysqli_query($con, "SELECT gross_salary FROM contract WHERE employee_id=$id ORDER BY contract_id DESC LIMIT 1" );
  $row_gross = mysqli_fetch_assoc($gross);

    echo $row_absent["gross_salary"];

?>