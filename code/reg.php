<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php 
ob_start();
session_start();
include_once ('./include/head.php');
?>
 <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html ; charset=utf-8" />
		<script language="javascript" src="./js/reg.js"></script>
		<link rel="stylesheet" type="text/css" href="./template/css/reg.css" media="all"/>
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
	<div class="reg">
<?php
	$username_ck=$email_ck="";
	if(isset($_POST["submit"])){
	require_once "./include/mysqlConnect.php";
		if(mysqli_connect_errno())
			echo "Ket noi that bai: ";
		else{
			$username=$_POST['us_name'];
			$fullname=$_POST['us_fullname'];
			$phone=$_POST['us_phone'];
			$sex = $_POST['us_sex'];
			$year=$_POST['us_year'];
			$email=$_POST['us_email'];
			$pass=$_POST['us_pass'];
			$password=sha1($pass);
			
			$sql_us = "SELECT * FROM users WHERE user_name='$username'";
			$sql_em = "SELECT * FROM users WHERE user_email='$email'";
			$result_us = $mysqli->query($sql_us);
			$result_em = $mysqli->query($sql_em);
			$row_us = $result_us->num_rows;
			$row_em = $result_em->num_rows;
				if($row_us!=0)
					$username_ck="Tên đăng nhập đã có người sử dụng";
				else if($row_em!=0)
					$email_ck	="Email này đã được sử dụng";
				else if($row_us==0 && $row_em==0){

					$sql ="INSERT INTO users(user_name,user_fullname,user_sdt,user_gioitinh,user_namsinh,user_email,user_pass) 
					VALUES ('$username','$fullname','$phone','$sex','$year','$email','$password')";
					$res=$mysqli->query($sql);
					if($res==TRUE){
						echo "<script>alert('Bạn đã đăng ký thành công');window.location.assign('./index.php');</script>";
						$mysqli->close();
					}else
						printf("Thất bại:%s\n",$conn->error);
					}
			}
	}
?>
	<form name="form" method="POST">
		<fieldset>
		<legend><h3>Đăng ký tài khoản</h3></legend>
				<div class=""> 
				<label class="label_left">Họ và tên			<sup>*</sup></label>
					<input id="txtfullname" class="textbox" type="text" name="us_fullname" maxlength="100" value="<?php if(isset($fullname)){echo $fullname;}?>" required />
					<span class="check" id="check_name"></span>
					<br/>
				<label class="label_left">Tên tài khoản		<sup>*</sup></label>
					<input class="textbox"  type="text" name="us_name" maxlength="30" value="<?php if(isset($fullname)){echo $username; }?>" required/>
					<span class="check" id="check_id"></span>
					<?php echo $username_ck;?>
					<br/>
				<label class="label_left">Mật khẩu				<sup>*</sup></label>		
					<input id="txtmatkhau" class="textbox" type="password" name="us_pass" maxlength="30"/>
					<span class="check" id="check_pass">(*Mật khẩu ít nhất 8 ký tự)</span>
					<br/>
				<label class="label_left">Nhập lại mật khẩu	<sup>*</sup></label>
					<input 				 class="textbox" type="password" name="us_repass" maxlength="30" required/>
					<span class="check" id="check_repass"></span>
					<br/>
				<label class="label_left">Email				<sup>*</sup></label>
					<input id="txtemail" class="textbox" type="email" name="us_email" maxlength="100" value="<?php if(isset($fullname)){echo $email; }?>" required />
					<span class="check" id="check_email"></span>
					<?php echo $email_ck;?>
					<br/>
				
				<label class="label_left">Năm sinh 			<sup>*</sup></label>
					<select  name="us_year" style="margin-top:7px;" required>
						<option value="0" selected="1" disabled="disabled">Năm</option>
							<?php for ($i=2014;$i>=1900;$i--)
								echo '<option value="'.$i.'">'.$i.'</option>';
							?>
					</select>
					<span class="check" id="check_year"></span>
					<br/>
				<label class="label_left">Giới tính			<sup>*</sup></label>
					<a style="margin-top:7px;">Nam</a> <input id="nam" type="radio" value="1" name="us_sex"/>
					<a style="margin-top:7px;">	Nữ</a> <input id="nu"  type="radio" value="0" name="us_sex"/>
					<span class="check" id="check_sex"></span>
					<br/><br/>
				
				
				<label class="label_left clearfix">Số điện thoại	<sup>*</sup></label>
					<input id="txtphone" class="textbox" type="text" name="us_phone" maxlength="11" value="<?php if(isset($fullname)){echo $phone; }?>" required />
					<span class="check" id="check_phone"></span>
					<br/>
				</div>
				<div style="clear:both">
					<input id="btn_submit" class="btn" type="submit" name="submit" value="Đăng ký"/>
					<input class="btn " type="reset" value="Làm lại"  style="margin-left:21px;"/>
				</div>
		</fieldset>
	</form>
	</div>
</div> <!-- // left -->
	    <div id="right">
          <?php 
      		include ('./template/ads.php');
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