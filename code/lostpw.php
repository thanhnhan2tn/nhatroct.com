<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php 
include_once ('./include/head.php');
?>
<style type="text/css">
.form_login{
	margin: 10px auto;
	max-width: 800px;
}
.form_login .warning {
				color: #FF0000;
			}
form dl{
	width: 60%;
	clear: both;
}
form dt{
	margin: 0px;
	padding: 0px;
	padding-top: 4px;
	padding-right: 15px;
	text-align: right;
	vertical-align: top;
	box-sizing: border-box;
	width: 32%;
	float: left;
}
form dd{
	width: 68%;
	box-sizing: border-box;
	padding-right: 30px;
	float: left;
}
dd input[type="text"],
dd input[type="password"]{
	width: 100%;
	height: 30px;
}
dd input[type="submit"],
dd input[type="reset"]{
	width: 49%;
	height: 30px;
}

</style>
</head>
<body>
<!-- script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script -->
<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/on-scroll.js"></script>
<script>
function mypasswordmatch()
{
    var pass1 = $("#password").val();
    var pass2 = $("#password2").val();
    if (pass1 != pass2)
    {
        alert("Passwords do not match");
        return false;
    }
    else
    {
        $( "#reset" ).submit();
    }
}
</script>
<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>
  </header>
  <div id="main"  class="container">
	   <article>
     <div id="left">
<?php 
require_once './include/mysqlConnect.php';
if(isset($_SESSION['user_name'])){
		echo "<script>
				alert('Bạn đã đăng nhập vào hệ thống, hãy thoát nếu muốn đăng nhập tài khoản khác!');
				window.location='index.php' 
			</script>";
		//header("Location:index.php");
		}
if(isset($_GET['action'])){       
    if($_GET['action']=="reset")
    {
    	$encrypt = $mysqli->escape_string($_GET['encrypt']);
        $query = "SELECT user_name FROM users where md5(1290*3+user_name)='".$encrypt."'";
        $result = $mysqli->query($query);
        $Results = $result->fetch_array();
        if(count($Results)>=1)
        {
		echo '<div class="panel panel-default" style="max-width: 500px; margin: 20px auto">
		  <div class="panel-heading">
		    <h3 class="panel-title">Nhập lại mật khẩu mới</h3>
		  </div>
		  <div class="panel-body">
		    <form action="lostpw.php" method="POST">
		    	<input type="hidden" name="action" value="'.$encrypt.'" />
		    	<input type="password" name="password" id="password" class="form-control" required/>
		    	<br />
		    	<input type="password" name="password2" id="password2" class="form-control" required/>
		    	<br />
		    	<input type="submit" id="reset" class="btn btn-primary" name="ok" value="Đổi mật khẩu" onClick="mypasswordmatch()"/>
		    </form>	

		  </div>
		</div>	
			';
        }
        else
        {
            $err = 'Invalid key please try again. <a href="./lostpw.php">Forget Password?</a>';
        }
    }
}
elseif(isset($_POST['action'])){
	require_once './include/mysqlConnect.php';
	$encrypt = $mysqli->escape_string($_POST['action']);
    $password = $mysqli->escape_string($_POST['password']);
    $query = "SELECT user_name FROM users where md5(1290*3+user_name)='".$encrypt."'";
 	
    $result = $mysqli->query($query);
    $Results = $result->fetch_array();
    if(count($Results)>=1)
    {
        $query = "update users set user_pass='".sha1($password)."' where user_name='".$Results['user_name']."'";
        $mysqli->query($query);
        $err = "Mật khẩu đã được thay đổi, bạn có thể đăng nhập ngay bây giờ";
    }
    else
    {
        $err = 'Invalid key please try again. <a href="./lostpw.php">Forget Password?</a>';
    }

}elseif(isset($_REQUEST['send'])){
		require_once './include/mysqlConnect.php';
		
		$err ='';
		if($_REQUEST['email'] !=''){
			$email = $mysqli->escape_string($_REQUEST['email']);
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){  // 
				$err='Email không đúng! Vui lòng điền vào email hợp lệ';
			}else{
				$sql_email = "SELECT user_name,user_fullname FROM users WHERE user_email='".$email."'";
				$result = $mysqli->query($sql_email);
				$rows=$result->fetch_array();
				if(count($rows)>=1){
					$encrypt = md5(1290*3+$rows['user_name']); // Mã hóa một chuỗi bất kì + id
					$err='Link khôi phục mật khẩu đã được gửi đến Email của bạn, hãy kiểm tra hộp thư, và cả thư rác.';
					$to=$email;
					$subject='Khôi phục mật khẩu tại Nhatrocantho';
					$from='admin@sinhvientinhoc.com';
					$body='Chào '.$rows['user_fullname'].'<br />
						Bấm vào link bên dưới để Tạo lại mật khẩu của bạn tại Nhatrocantho<br />'
						.$_SERVER["SERVER_NAME"].$_SERVER["PHP_SELF"].'?encrypt='.$encrypt.'&action=reset  <br />
						Thân mến <br />
						Admin';
					$headers = "From: " . strip_tags($from) . "\r\n";
		            $headers .= "Reply-To: ". strip_tags($from) . "\r\n";
		            $headers .= "MIME-Version: 1.0\r\n";
		            $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

		            mail($to,$subject,$body,$headers);
				}else{
					$err='Email này chưa được đăng kí! <a href="./reg.php">Vào đây</a> để đăng kí tài khoản.';
				}
			}
		}else $err='Vui lòng điền email';
	} // SEND
else{
?>
		<div class="panel panel-default" style="max-width: 500px; margin: 20px auto">
		  <div class="panel-heading">
		    <h3 class="panel-title">Điền email của bạn để khôi phục lại mật khẩu</h3>
		  </div>
		  <div class="panel-body">
		    <form action="#" method="post">
		    	<input type="email" name="email" class="form-control" placeholder="Nhập vào email của bạn" required/>
		    	<br />
		    	<input type="submit" class="btn btn-primary" name="send" value="Gửi Email" />
		    	<input type="button" class="btn btn-danger" name="back" value="Về trang chủ" onClick="window.location=('index.php')" />
		    </form>	

		  </div>
		</div>
	<?php
	}  // else
	if(isset($err) && $err!='')
		echo '<div class="alert alert-success margin-10" >'.$err.'</div>';

	?>
	</div> <!-- // End #left -->
        <div id="right">
          <?php 
      		include ('./template/right.php');
      	   ?>
        </div>
     </article>
</div> <!-- END Container -->
</div> <!-- // End Wrapper -->
<footer>
<?php 
    include_once ('./template/footer.php');
?>
</footer>
</body>
</html>