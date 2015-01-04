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

<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>
  </header>
  <div id="main"  class="container">
	   <article>
     <div id="left">
		
<?php 
	if(isset($_SESSION['user_name'])){
		echo "<script>
				alert('Bạn đã đăng nhập vào hệ thống, hãy thoát nếu muốn đăng nhập tài khoản khác!');
				window.location='index.php' 
			</script>";
		//header("Location:index.php");
		}

	if(isset($_GET["logout"])){ // dang xuat
		if(!isset($_SESSION)) session_start();
		$_SESSION = array();
		session_destroy();
		if (isset($_SERVER['HTTP_COOKIE'])){
	    $cookies = explode(';', $_SERVER['HTTP_COOKIE']);
	    foreach($cookies as $cookie)
	    {
	        $mainCookies = explode('=', $cookie);
	        $name = trim($mainCookies[0]);
	        setcookie($name, '', time()-1000);
	        setcookie($name, '', time()-1000, '/');
	    }
	}
	header('location:index.php');
	exit();
	} // logout		
				//Kiem tra da dien username hay password chua
	if(isset($_POST['submit'])){
					$username=$password="";
					if($_POST['username'] == NULL){
						$messages =  "Bạn chưa nhập Username";
					}
					else{
						$username=$_REQUEST['username'];
					}
					if($_POST['password'] == NULL){
						$messages = "Bạn chưa nhập Password";
					}
					else{
						$password=$_REQUEST['password'];
					}
					
					//neu da dien day du thi se ket noi vs CSDL
			if($username && $password){
			require_once './include/mysqlConnect.php';	
						$uname = $mysqli->real_escape_string($username);
						$passwd = $mysqli->real_escape_string($password);
						$hash_pw = sha1($passwd);  // mã hóa SHA1
			
			$query_login = sprintf("SELECT user_name,group_id,CONCAT_WS(user_name,user_pass)
				FROM users
				WHERE (user_name = '".$username."' 
					OR user_sdt = '".$username."' 
					OR user_email = '".$username."')
					AND user_pass = '%s'
					LIMIT 1;
				",$hash_pw);
			
			$query = $mysqli->query($query_login) or die("Khong ket noi csdl");
			if($query->num_rows == 1){
				while ($row = $query->fetch_assoc()){
					//session_start();
						$_SESSION['group'] = $row['group_id'];
						$_SESSION['user_name'] = $row['user_name'];
					if(isset($_POST['checkbox'])){
						$expire = time()+60*60*24*30;
						setcookie('user_name',$_SESSION['user_name'],$expire);
						$_COOKIE["user_name"];
						setcookie('user_pass',$passwd,$expire);
						$_COOKIE["user_pass"];
					}
					
					header("Location:index.php");
				}//END WHILE
			}else{
				$messages = "Username và Password không trùng khớp!";
				}
			} // end IF user password
		} // end Submit
		?>
<div class="form_login" align="center">
			<h2 align="center">Đăng Nhập</h2><hr />
			<h5 align="center">(Bạn phải đăng nhập vào hệ thống để sử dụng các chức năng của website!)</h5>
		<?php
 		if(!empty($messages)) {
 				echo "<p class='warning'>".$messages."</p>"; 
 			}
 		 
 		?>
		<form action='login.php' method='post'>
			<dl>
				<dt>Tên tài khoản:</dt>
				<dd><input type='text' class="inputname" name='username' value= '<?php if(isset($username)){echo $username;} ?>' placeholder="Điền username, số điện thoại hoặc email.." size='25' /><br></p></dd>
			</dl>
			<dl>
				<dt>Mật khẩu: </dt>
				<dd><input type='password' class="inputpass" name='password' size='25' /><br></p></dd>
				<dd> 
					<input type="checkbox" name="checkbox" value="1">  Ghi nhớ đăng nhập?
				</dd>
				</dl>
			<dl>
				<dt></dt>
				<dd>
					<input type='submit' name='submit' value='Đăng Nhập' />
					<input type="reset" name="reset" value="Huỷ"/>
				</dd>
			</dl>
		</form>
		</div> <!-- // form_login --> 
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