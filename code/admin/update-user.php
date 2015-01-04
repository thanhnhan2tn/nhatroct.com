<?php 

session_start();
if(isset($_SESSION['user_name']) && $_SESSION['group'] == 3)
{
include ('./template/header.php');
?>
	<style type="text/css">
label{
	display: block;
	margin: 9px 0;
}
.input{
	margin: 4px 0;
	padding: 2px 0;
}
input{
	display: inline-block;
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
	margin-top:7px;
}
sup{
	color: red;
}
.label_left{
	display :block;
	width: 12%;
	float: left;
	text-align:center;
}
.input_right{
	width: 87%;
	float:right;
	
}
.textbox{
	-webkit-border-radius: 5px; 
    -moz-border-radius: 5px; 
    border-radius: 5px; 
    border: 1px solid #848484; 
    outline:0; 
    height:25px; 
    width: 275px; 
}
.textbox:hover{
	background-color:	#F2F2DC;
}
.btn{
	width:83px; 
	height:39px;
}
.btn:hover{
	background-color: 	#999999;
}
	</style>
	<script language=Javascript>
	function check()
	{
		document.getElementById("name").checked=true
	}
	function check()
	{
	document.getElementById("nu").checked=true
	}
	</script>

<!-- bat dau Thân trang web -->
<div id="wrap">  
  <div class="left_col">
    <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  <a href="#nav" class="nav-toggle" aria-hidden="true">Menu</a>
  </div>
        
  <div role="main" class="main">
<?php
if(isset($_REQUEST['edit'])){
	require_once '../include/mysqlConnect.php';
	$edit=$mysqli->escape_string($_GET['edit']);
	$sql_user="SELECT * FROM users WHERE user_name='".$edit."'";
	$rs=$mysqli->query($sql_user);
	$row=$rs->fetch_array();
	?>
	<form name="adduser" action="update.php" method="post">
		<fieldset>
			<div class="label_left">
					<label>Tên tài khoản		<sup>*</sup></label>
					<label>Cấp quyền						</label>
					<label>Mật khẩu				<sup>*</sup></label>	
					<label>Nhập lại mật khẩu	<sup>*</sup></label>
					<label>Email				<sup>*</sup></label>
					<label>Họ và tên			<sup>*</sup></label>
					<label>Năm sinh 			<sup>*</sup></label>
					<label>Giới tính			<sup>*</sup></label>
					<label>Số điện thoại					</label>
				</div>
				<div class="input_right">
					
					<input type="hidden" class="textbox input" name="us_name" value="<?php echo $row['user_name']; ?>" />
					<input type="text" class="textbox input" disabled="disabled" value="<?php echo $row['user_name']; ?>" />
					<br/>
					<select class="input" name="us_groundid">
						<option class="input" value="2">Thành viên</option>
						<option class="input" value="1">Quản lý</option>
					</select>
					<br/>
					<input id="txtmatkhau" class="textbox input" type="password" name="us_pass" maxlength="30" />
					<a class="check" id="check_pass"></a>
					<br/>
					<input class="textbox input" type="password" name="us_repass" maxlength="30" />
					<a class="check" id="check_repass"></a>
					<br/>
					<input id="txtemail" class="textbox input" type="text" name="us_email" maxlength="100" value="<?php echo $row['user_email']; ?>"/>
					<a class="check" id="check_email"></a>
					<br/>
					<input id="txtfullname" class="textbox input" type="text" name="us_fullname" maxlength="100" value="<?php echo $row['user_fullname']; ?>"/>
					<a class="check" id="check_name"></a>
					<br/>
					<select  name="us_year" class="input" style="margin-top:7px;">
						<option value="<?php echo $row['user_namsinh']; ?>" selected="1"><?php echo $row['user_namsinh']; ?></option>
							<?php for ($i=1920;$i<=2014;$i++)
								echo '<option value="'.$i.'">'.$i.'</option>';
							?>
					</select>
					<a class="check" id="check_year"></a>
					<br/>
					<span class="input">
					<a style="margin-top:7px;">Nam</a> <input id="nam" type="radio" value="1" name="us_sex"/>
					<a style="margin-top:7px;">	Nữ</a> <input id="nu"  type="radio" value="0" name="us_sex"/>
					<a class="check" id="check_sex"></a>
					</span>
					<br/>
				
					<input id="txtphone" class="textbox input" type="text" name="us_phone" maxlength="11" value="<?php echo $row['user_sdt']; ?>"/>
					<a class="check" id="check_phone"></a>
					<br/>
				</div>
				<div class="submit">
					<input type="submit" name="update" class="input" value="Cập nhật"/>
					<input type="reset" name="reset" class="button input" value="Làm lại"/>
				</div>
		  </fieldset>
	</form>
<?php
	}
// update-user.php
if(isset($_REQUEST['del'])){
	require_once '../include/mysqlConnect.php';
	
		$user_name=$mysqli->escape_string($_GET['del']);

		$rs=$mysqli->query("DELETE FROM users WHERE user_name='".$user_name."'");
		if($rs){$mysqli->close();
			header("location:users.php");
			}
}
?>
</div> <!-- end Right -->
    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
</div><!-- ket thuc Thân trang web -->

<?php
//include ('template/footer.php');
	}else{
	  header('location: index.php');
	}
?>