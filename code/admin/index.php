<html>
<head>
<meta http-equiv=Content-Type content="text/html; charset=UTF-8">
<?php
/* -------------------------
File trang chu, dang nhap quan tri vien

Người viết: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com

----------------------------*/
session_start();
//include_once('../include/mysqlConnect.php');
include_once('../include/function.php');
//include_once('../include/db.php'); 
require_once ('./template/head.php');
?>
</head>
 
<body style="background: #2C2C2C">
<div class="login_form">
	<?php if(!empty($err)){
		foreach($err as $errs){
			echo "<script>alert('".$errs."')</script>";
		}
	}
	
	?>
	<p>Thông tin đăng nhập</p>    
		<form method="post" action="#">
	        <span style="padding: 15px;display: block">
	       	<input type="textbox" class="form-control" name="username" placeholder="Tên người dùng" required/> <br />
	        <input type="password" class="form-control" name="Password" placeholder="Mật khẩu" required/> <br />
	        
	        <input type="submit" class="btn btn-primary" name="submit" value="Đăng nhập" style="width: 67%; float: left; margin-right: 3%;" />
	        <input type="reset" class="btn btn-default" name="reset" value="Làm lại" style="width: 30%; float: left" />
	        </span>
		</form>
</div>
</body>
	
<?php
if(isset($_POST['submit'])){
		$ip=0;
		$err = array();
		$required = array('username','Password');
			foreach($required as $fieldname){
				if(!isset($_POST[$fieldname]) || empty($_POST[$fieldname]))
				$err[] = "Bạn chưa điền vào {$fieldname}";
			} //end foreach
		if(empty($err))	{
			$uname = $mysqli->real_escape_string($_POST['username']);
			$passwd =$mysqli->real_escape_string($_POST['Password']);
			$hash_pw = sha1($passwd);
			
			$query_login = sprintf("SELECT user_name,group_id,CONCAT_WS(user_name,user_pass)
				FROM users
				WHERE user_name = '%s'
				AND user_pass = '%s'
				LIMIT 1
				",$uname,$hash_pw);
			
			$result = $mysqli->query($query_login) or die(mysql_error($conn));
			if ($result->num_rows == 1){
				echo "<script>alert('er')</script>";
				while ($row = $result->fetch_assoc()){
					$_SESSION['group'] = $row['group_id'];
					$_SESSION['user_name'] = $row['user_name'];
					if($_SESSION['group']==3){  // 
						header('location: admin.php');
					}else{
						header('location: ../login.php');
					}
				}//END WHILE
			}
			else { $err[] = "Username và Password không trùng khớp!";
					
					}
		} //end empty($err)
	} //end isset($_POST['submit'])
	exit();
	//} //end if ($_SESSION['admin_login']=='')
 
	?>
</html>	