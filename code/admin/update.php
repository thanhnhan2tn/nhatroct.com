<?php
if(isset($_POST['update'])){
	require_once '../include/mysqlConnect.php';

	$sql="UPDATE users SET ";
	$username=$mysqli->escape_string($_POST['us_name']);
	if($_POST['us_fullname']!=''){ 
		$fullname=$mysqli->escape_string($_POST['us_fullname']); 
		$sql.="user_fullname='$fullname', ";
		}

	if($_POST['us_phone']!=''){ $phone=$mysqli->escape_string($_POST['us_phone']); 
		$sql.="user_sdt='$phone', ";
		}
	if(isset($_POST['us_sex'])) {
			$sex = $mysqli->escape_string($_POST['us_sex']);
		$sql.="user_gioitinh='$sex', ";
			}
	if($_POST['us_year']!='') {
			$year=$mysqli->escape_string($_POST['us_year']);
			$sql.="user_namsinh='$year', ";
			}
	if($_POST['us_groundid']!='') {
			$group_id=$mysqli->escape_string($_POST['us_groundid']);
			$sql.="group_id='$group_id', ";
		}

	$email=$mysqli->escape_string($_POST['us_email']);
			$sql.="user_email='$email', ";
	$password=$mysqli->escape_string($_POST['us_pass']);
	$password=sha1($password);
			$sql.="user_pass='$password' ";
	$sql.="WHERE user_name='".$username."';";

	
	$mysqli->query($sql);
	$mysqli->close();
	
	echo "<script>alert('Cap nhat thanh cong');window.location=('./users.php');</script>";
	//header("location:.php");
	exit();
 }
?>
