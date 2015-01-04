<?php 
session_start();
if(isset($_SESSION['user_name']) && $_SESSION['group'] == 3)
{
include ('./template/header.php');
?>
<style type="text/css">

</style>

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
	require ('../include/mysqlConnect.php');

	$sql = "SELECT n.nhatro_id,n.user_name, n.nhatro_name, n.nhatro_type,n.ngaydang , n.nhatro_gia
			FROM nhatro as n,users as u  
			ORDER BY ngaydang desc LIMIT  10";

	$result = $mysqli->query($sql) or die ('Khong the ket noi');
	$i=1;
	echo '<div class="block" >';
	echo '<table class="table ">
			<thead><tr><th>STT</th><th>Tên bài đăng</th><th>Ngày đăng</th>
			<th>Lượt xem</th><th>Còn phòng</th><th>Trạng thái</th><th colspan="2">Thao tác</th></tr></thead>';
	while ($set = $result->fetch_array()){
	    $username = $set['user_name']; 
	    $nhatroname = $set['nhatro_name'];
	    ($set['nhatro_type']==1) ?  $nhatrotype='Cho thuê' : $nhatrotype='Share phòng';
	    $ngaydang = $set['ngaydang'];
	    $gia = $set['nhatro_gia'];


		echo '<tr>';
	    echo '<td>'.$i.'</td>';
	    $i++;
	    echo '<td>'.$nhatroname.'</td>';
	    echo '<td>'.$username.'</td>';
	    
	    echo '<td>'.$nhatrotype.'</td>';
	    echo '<td>'.$gia.'</td>';
	    echo '<td>'.$ngaydang.'</td>';
    	echo '<td><a class="glyphicon glyphicon-edit text-success" alt="Sửa" title="Sửa" href="./update-post.php?action=edit&id='.$set['nhatro_id'].'"></a></td>';
		echo '<td><a class="glyphicon glyphicon-remove text-danger" alt="Xóa" title="Xóa" href="./update-post.php?action=del&id='.$set['nhatro_id'].'"></a></td>';
			
    	echo '</tr>';

	}
	echo '</table>';
	echo '</div>';

?></div> <!-- end Right -->
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