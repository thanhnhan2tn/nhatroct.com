
<?php
/* Thong ke.php
Người viết: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com

*/
if(!isset($_SESSION)) session_start();
if(isset($_SESSION['userid']) && $_SESSION['level'] != 3)
{
	header('location: index.php');
}else{
	include '../include/counter.php';	
	require_once '../include/function.php';
//mysql_close();
?> 
 
<html>
<head>
</head>
<div>
	<h3>Bảng điều khiển</h3>
	<div  class="thongke"> <!-- khung thống kê -->
		<div class="panel panel-default">
		  <div class="panel-heading">
		    <h2 class="panel-title">Thống kê</h2>
		  </div>
		  <div class="panel-body">
		     <div class="col-md-4" >
			     <div class="padding-5"><a href="./users.php"><span class="glyphicon glyphicon-pushpin"></span>Người dùng: <span class="badge">
			     <?php 
			     	echo count_sql('users');
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="./post-manager.php"><span class="glyphicon glyphicon-sound-stereo"></span>Bài viết: <span class="badge">
			     <?php 
			     	echo count_sql('nhatro');
			     ?>
			     </span></a></div>
			     <div class="padding-5"><a href="?tab=gopy"><span class="glyphicon glyphicon-envelope"></span>Góp ý: <span class="badge">
		     	<?php 
		     		echo count_sql('gopy'); // Đếm tổng số góp ý
			     ?>
		     	</span></a></div>
			 </div>
		     <div class="col-md-4" >
		     	<div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Số lượt xem hôm nay :<span class="badge">
			     <?php echo $day; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5"><span class="glyphicon glyphicon-stats"></span>Tổng số lượt xem: <span class="badge">
			     <?php echo $visit; // đếm tổng số kênh hiện có 
			     ?></span></div>
			     <div class="padding-5" ><span class="glyphicon glyphicon-user"></span>Đang trực tuyến: <span class="badge">
			      <?php echo $online; // đếm tổng số kênh hiện có 
			     ?>
			     </span></div>
			 </div>
		  </div>
		</div>
	</div>
	
</div>
</html>
<?php 

} //End if else
 
?>



