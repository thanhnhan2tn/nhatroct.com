<!-- // Thai Thanh Nhan
		1111427
 -->

<style type="text/css">
	@import url('./template/css/nhatro.css');
</style>


<script type="text/javascript" src="./plugin/jsImgSlider/js-image-slider.js"></script>
<?php
	require_once './include/mysqlConnect.php';
	require_once './include/function.php';
if(isset($_REQUEST['id'])){
	$nhatroid=$mysqli->escape_string($_REQUEST['id']);
	$nhatro="SELECT * FROM nhatro, duong ,phuong 
            WHERE (nhatro.phuong_id = phuong.phuong_id
                    AND nhatro.duong_id = duong.duong_id
                    AND nhatro.nhatro_id='".$nhatroid."'
                  )";
	$rs = $mysqli->query($nhatro);
while ($rows=$rs->fetch_assoc()) {
	// xu ly hinh anh
	$img = explode(", ",$rows['nhatro_img']);
	$images=$thumbs='';
	foreach ($img as $key) {
		if($key!=''){
			$images.='<a class="lazyImage" href="'.$key.'"></a>';
			$thumbs.='<img class="thumb" src="'.$key.'">';
		}
	}
	// xu ly dac diem
	$dacdiem = explode(", ",$rows['nhatro_dacdiem']);
	$list_item='';

	for($i=1;$i<count($dacdiem);$i++){
      $list_item.='<li class="list-group-item">';
      $list_item.=get_dacdiem($dacdiem[$i]);
      $list_item.='</li>';
    }
    // xu ly Type
    if($rows['nhatro_type']==1){
          $label = "Cho Thuê";
    }else{
          $label = "Share Phòng";
    }
    //xu ly thong tin
    $nhatrouser=$rows['user_name'];
    $nhatrodiachi1 = $rows['nhatro_diachi'].", ".$rows['duong_name'].", ".$rows['phuong_name'];
    $nhatrodiachi = str_replace("/", "+", $nhatrodiachi1);
    $nhatrodiachi = str_replace(" ", "+", $nhatrodiachi);
    //
?>
<div id="detail">
	<div class="nha-intro">
		<div class="nhatro-cont">
			<div class="img-info">
				
				<div class="nhatro-info">
					<div class="title"><span class="label title-label"><?php echo $label
                    	.'</span><h2>'.$rows['nhatro_name'].
                    	'</h2>'; ?><!-- //title -->
                    </div> <!-- // title -->
					<div class="price">
						<span class="prices">Giá: <?php echo number_format($rows['nhatro_gia']) ?> đ</span><span>/Người/Tháng</span>
					</div>  <!-- // Price -->
					<div class="dacdiem">
						<div class="panel panel-primary">
						  <div class="panel-heading">Đặc điểm nổi bật</div>
						  <div class="panel-body">
						    <fieldset style="">
							<?php echo $list_item; ?>
							</fieldset>
						  </div>
						</div> 
					</div> <!-- // dac diem -->
				</div> <!-- // Nha tro info -->
		<div class="nhatro-img">
				<div class="address-like">
				</div>
				<div class="img">
					<div id="sliderFrame">
				<!-- http://www.menucool.com/javascript-image-slider -->
				<div id="ribbon"></div>
		        <div id="slider">
		                <?php echo $images; ?>
		        </div>
				<!--thumbnails-->
			 	<div id="thumbs">
			            <?php echo $thumbs; ?>
			    </div>
				<!-- http://www.menucool.com/javascript-image-slider -->					
					</div>
				</div><!--  END img -->
					<div class="new">
					</div> <!-- // New -->

				</div> <!-- //nhatro-img -->
			</div>

			<div class="nhatro-point">
				<div class="parameters">
					<div>
						<i class="glyphicon glyphicon-eye-open padding-5"></i>Lượt xem: <span><?php echo $rows['nhatro_views']; ?></span>
						<i class="glyphicon glyphicon-calendar padding-5"></i> <span><?php echo date('d-m-Y',strtotime($rows['ngaydang'])); ?></span>
						
						<i class="glyphicon glyphicon-user padding-5"></i>
							Đăng bởi: <a href="./profile.php?user=
							<?php echo $nhatrouser;
							?>
							"><span>
							<?php echo $nhatrouser;
							?></a>
							</span>
						<img src="./template/img/map.png" class="padding-5"></img>Xem địa điểm:	<span>
						<a href="https://www.google.com/maps/place/<?php echo $nhatrodiachi; ?>,Việt+Nam"><?php echo $nhatrodiachi1; ?></a>
						</span>
					</div>
					<!-- <div class="like">
						<i class="glyphicon glyphicon-thumbs-up padding-5"></i>Yêu thích: <span id="hdvn_1129_likes">0</span>
					</div> -->
				</div>
				<div class="share">
					<div id="fb-root" class=" fb_reset">
					</div>

				</div> <!-- // share -->
			</div>
		</div> <!-- nha intro -->

		<div class="panel panel-info">
		<div class="panel-heading">Thông tin chi tiết</div>
		  <div class="panel-body">
			<p>
			<?php echo $rows['nhatro_mota']?>
			</p>
		  </div>
		</div> 
</div>
</div> <!-- details -->
<?php
	
	} // end WHILE
} // END IF id
?>
<div class="order-bottom">
	<div class="comment">
	<div class="panel panel-info">
		<div class="panel-heading">Bình luận</div>
	<!-- Facebook comment -->
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/all.js#xfbml=1&appId=336805426450697";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
	<!-- // Facebook comment -->
	 	<div class="panel-body">
		<div class="fb-comments" data-href="<?php echo getCurrentPageURL(); ?>" data-numposts="10" data-width="auto" data-colorscheme="light"></div>
		</div>
	</div> <!-- //panel-info -->
</div>
	<div id="key" class="order-bottom">
   		<div class="keywords">
       	<strong>Từ khóa: </strong>
        	
    	</div>

    </div>

</div> <!-- // Details -->
<?php
	// cap nhat luot xem moi
	$mysqli->query("UPDATE nhatro SET nhatro_views = nhatro_views+'1' WHERE nhatro_id='".$nhatroid."'");

?>