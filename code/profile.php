<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php include_once ('./include/head.php');
?>
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
        $( "#edit" ).submit();
    }
}
</script>
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
			<!-- // Cột trái -->
	   <div id="left">
<?php
  	if(!isset($_SESSION['user_name'])){
		header("Location: ./login.php");
	}else{
       	require_once('./include/mysqlConnect.php');
       	$id = $mysqli->escape_string($_SESSION['user_name']);
       	$sql_profile="SELECT * FROM users where user_name='".$id."'";
       	$profile=$mysqli->query($sql_profile);
       	while($row3 = $profile->fetch_array())
		{ 
		$fname=$row3['user_name'];
		$f_fullname=$row3['user_fullname'];
		$sdt=$row3['user_sdt'];
		$gt=$row3['user_gioitinh'];
		$ns=$row3['user_namsinh'];
		$email=$row3['user_email'];
		}
	} // end else
if(isset($_REQUEST['f']) && $_REQUEST['f']=='profile'){
?>
		<div class="profile">
		<form action="edit-profile.php" method="post">
		<table class="table table-bordered table-striped">
		
		<colgroup>
        <col class="col-xs-3">
        <col class="col-xs-7">
      	</colgroup>
			<tr><td>Username</td><td><?php echo $fname ?></td></tr>
			<tr><td>Họ và tên</td><td><input type="text" class="form-control" name="full_name" value="<?php echo $f_fullname; ?>" required/></td></tr>
			<tr><td>Mật khẩu<br />(Để trống nếu không muốn đổi mật khẩu)</td><td>
					<span class="col-md-4 padding-0"><input type="password" id="password" class="form-control" name="matkhau" /></span> 
					<span class="col-md-2 padding-5" style="text-align: right;">Nhập lại: </span>
					<span class="col-md-4 padding-0"><input type="password" id="password2" class="form-control" name="matkhau2" /></span> 
					</td></tr>
			<tr><td>Số điện thoại</td><td><input type="text" class="form-control" name="sdt" value="<?php echo $sdt ?>" required/></td></tr>
			<tr><td>Giới tính</td><td><?php echo ($gt==1)?'Nam':'Nữ' ?></td></tr>
			<tr><td>Năm sinh</td><td><input type="number" min="1890" class="form-control" name="namsinh" value="<?php echo $ns ?>" required/></td></tr>
			<tr><td>Email</td><td><input type="email" class="form-control" name="email" value="<?php echo $email ?>" required /></td></tr>
			
		</table>
		<input id="edit" class="btn btn-primary" type="submit" value="Sửa thông tin" onclick="return mypasswordmatch()" name="edit" style="display: block;margin: auto" />
		</form> <!-- // end form -->
		</div>
        <div class="clearfix margin-5"></div>
        </div> 
        	<!-- // End #left -->
        	<!-- // Cột phải -->
        <div id="right">
          	<ul class="btn-group-vertical"  style="text-decoration:none; list-style:none ; padding: 0">
          		<li class="btn-group"><a class="btn btn-default btn-lg" href="?f=post">Quản lý tin đã đăng</a></li>
          		<li class="btn-group"><a class="btn btn-default btn-lg" href="?f=profile">Sửa thông tin cá nhân</a></li>
          	</ul>
        </div>
    <?php
	}else{
		echo '<h3 class="title">Quản lý bài viết đã đăng</h3>';
		$baidang='SELECT nhatro_id,nhatro_name,ngaydang,nhatro_views,nhatro_conphong,nhatro_trangthai FROM nhatro WHERE user_name=';
		$baidang.="'".$id."'";
		$rs=$mysqli->query($baidang);
		// conphong
		
		echo '<table class="table ">
			<thead><tr><th>STT</th><th>Tên bài đăng</th><th>Ngày đăng</th>
			<th>Lượt xem</th><th>Còn phòng</th><th>Trạng thái</th><th colspan="2">Thao tác</th></tr></thead>
				';
		$i=1;
	if($rs->num_rows>=1){
		while($post = $rs->fetch_array()){
			$conphong = ($post['nhatro_conphong']==1) ? 'glyphicon glyphicon-ok-circle text-primary' :'glyphicon glyphicon-ban-circle text-danger';
			$trangthai = ($post['nhatro_trangthai']==1) ? 'class="glyphicon glyphicon-ok-circle text-primary" title="Mở"' :'class="glyphicon glyphicon-ban-circle text-danger" title="Đã đóng"';
			$style='';
			if($post['nhatro_trangthai']=='0'){$style='class="danger"';}elseif($post['nhatro_conphong']=='0'){$style='class="warning"';}
			echo '<tr'.$style.'>';
			echo '<td>'.$i.'</td>';$i++;
			echo '<td>'.$post['nhatro_name'].'</td>';
			echo '<td>'.date('d-m-Y',strtotime($post['ngaydang'])).'</td>';
			echo '<td>'.$post['nhatro_views'].'</td>';
			echo '<td><span class="'.$conphong.'"></span></td>';
			echo '<td><span '.$trangthai.'></span></td>';
			echo '<td><a class="glyphicon glyphicon-edit text-success" alt="Sửa" title="Sửa" href="./edit-post.php?action=edit&id='.$post['nhatro_id'].'"></a></td>';
			echo '<td><a class="glyphicon glyphicon-remove text-danger" alt="Xóa" title="Xóa" href="./edit-post.php?action=del&id='.$post['nhatro_id'].'"></a></td>';
			echo '</tr>';
		}
		echo '</table>';
	} //num_rows
	?>
	<div class="clearfix margin-5"></div>
        </div> 
        	<!-- // End #left -->
        	<!-- // Cột phải -->
        <div id="right">
          	<ul class="btn-group-vertical"  style="text-decoration:none; list-style:none ; padding: 0">
          		<li class="btn-group"><a class="btn btn-default btn-lg" href="?f=post">Quản lý tin đã đăng</a></li>
          		<li class="btn-group"><a class="btn btn-default btn-lg" href="?f=profile">Sửa thông tin cá nhân</a></li>
          	</ul>
        </div>
      <?php
} // else
    ?>
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