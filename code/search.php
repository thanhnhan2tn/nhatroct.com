<?php
// search.php
 
/* --1-----------------------
File tìm kiếm dành cho các giao diện trang chính

Author: Thái Thanh Nhàn
MSSV: 1111427
Email: thanhnhan2tn@gmail.com
----1------------------------*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
<?php 

ob_start();
if(!isset($_SESSION))
		 session_start();
include_once ('./include/head.php');

?>
</head>
</head>
<body>
<!-- script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script -->
<script type="text/javascript" src="./template/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="./js/on-scroll.js"></script>

<div id="wrapper"  class="container">
  <header>
    <?php include_once('./template/header.php');?>
  </header>
  <div id="main"  class="">
	   <article><div id="left">
		<?php
	if(isset($_REQUEST['s'])){ 
		if($_REQUEST['s']!=''){ 
				echo '<h3>Kết quả tìm kiếm</h3>';
				require_once './include/mysqlConnect.php';
				$s=$mysqli->escape_string($_REQUEST['s']);
				
				$q=$mysqli->escape_string($s);
				
				$q=strtolower($q);
				$q=str_replace(" ","%",$q);
				$sql = sprintf("SELECT CONCAT_WS(nhatro_name,nhatro_) FROM kenh WHERE kenh_name LIKE '%s%s%s' ORDER BY kenh_view DESC",'%',$q,'%');
				$query = $mysqli->query($sql); 
				
					echo '<div class="list-group list-group-static-top">';
					if($query->num_rows){
						while($rows=$query->fetch_assoc()){		
							echo '<a class="list-group-item" href="./?id='.$rows['kenh_id'].'&chn='.removesign($rows['kenh_name']).'">';
							echo '<img class="media-object pull-left" style="margin:5px 2px 5px 0px;" src="'.$rows['kenh_logo'].'" alt="'.$rows['kenh_name'].'" width="120px" height="50px">';	
							
							echo '<p style="margin-left: 10px"><h4 class="list-group-item-heading">'.$rows['kenh_name'].'</h4>';
							echo '<p class="list-group-item-text">'.$rows['kenh_des'].'</p></p>';
							echo '</a>';
						}
					} //End if mysql_num_rows($query)
					else echo '<h4>Không có kết quả nào trùng khớp với từ khóa.</h4>';
					echo '</div>';
	
	

		// ------------------
		}
	
	} else header('Location: ./index.php');// end isset s
		?>
		
    </div> <!-- /end right_col -->
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
