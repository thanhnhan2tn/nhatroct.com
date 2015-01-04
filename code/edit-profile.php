<meta charset='utf-8'>
<?php
// edit-profile.php
// 
session_start();
if(!isset($_SESSION['user_name'])){
		header("Location: ./login.php");
	}else{
    if(isset($_REQUEST['edit'])){
		require_once('./include/mysqlConnect.php');
		$key=$_SESSION['user_name'];
    	$edit="UPDATE users SET";
    	if(isset($_POST['matkhau']) && $_POST['matkhau']!=''){
    		// doi thong tin va mat khau
    		$passw = sha1($_POST['matkhau']);
    		$edit.=" user_pass='".$passw."', ";
    	}

    		$user_fname=$mysqli->escape_string($_POST['full_name']);
    		$sdt = $mysqli->escape_string($_POST['sdt']);
    		$namsinh = $mysqli->escape_string($_POST['namsinh']);
    		$email = $mysqli->escape_string($_POST['email']);
    		$edit.=" user_fullname='".$user_fname."', user_sdt='".$sdt.
    			"', user_namsinh='".$namsinh."', user_email='".$email."'";
    	

    	$edit.=" WHERE user_name='".$key."'";
		$rs=$mysqli->query($edit);
		if($rs)
			echo "<script>alert('Cập nhật thành công!');window.location='./profile.php';</script>";
		else
			echo "<script>alert('Không thể sửa thông tin, vui lòng thực hiện lại!');window.history.go(-1);</script>";
       } // EDIT
    }
?>