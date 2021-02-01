<?php  ob_start();
			if(!isset($_SESSION)){
				session_start();
			}
			/*mysql connection by faizullah firozi wardak 0780002528*/
	
			$server = "localhost";
			$username = "root";
			$password = "";
			$database = "breshna";
/*
*  		$database name we have in the three section 1 connection.php 2-index.php 3-top.php
*			1 connection line 13
*			2-index.php line 18
*			3-top.php line 82
*			faizullah firozi wardak 0780002528
*/
	$con = mysqli_connect($server, $username, $password);
	mysqli_select_db($con,$database);

	if(!isset($_SESSION["login"])){
		header("location:index.php?notlogin=true");
		exit();
	}

    // wrapper function
	function getValue($value){
		global $con;
		return mysqli_real_escape_string($con, $value);
	}

//function for restrict or mahdod kawal de pageono pashto
	function restrict ($admin_level, $hr_level, $finance_level, $customer_level){
		$redirect = true;
			if($_SESSION["admin"] >= $admin_level){
				$redirect = false;
			}
			if($_SESSION["hr"] >= $hr_level){
				$redirect = false;
			}
			if($_SESSION["finance"] >= $finance_level){
				$redirect = false;
			}
			if($_SESSION["customer"] >= $customer_level) {
				$redirect = false;
			}
		//IF true redirect you will be go to previous page , firozi wardak
		if($redirect){
			if(isset($_SERVER["HTTP_REFERER"])) {
				if(strpos($_SERVER["HTTP_REFERER"] , "?") > 0 ) {
					$param = "&authorize=failed";
				}else {
					$param = "?authorize=failed";
				}
				header("location:". $_SERVER["HTTP_REFERER"] . "$param");
		} else {
			header("location:home.php?authorize=failed");
		}
			exit();
		}
	}
?>		