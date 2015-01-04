<?php 

session_start();
if(isset($_SESSION['user_name']) && $_SESSION['group'] == 3)
{
include ('./template/header.php');
?>


    <!-- bat dau Thân trang web -->
<div id="wrap">  
  <div class="left_col">
    <?php // menu
	  include_once ('./template/adminmenu.php');
	  ?>
  <a href="#nav" class="nav-toggle" aria-hidden="true">Menu</a>
  </div>
        
  <div role="main" class="main">
    <?php // menu
if(isset($_REQUEST['tab'])){
    if($_REQUEST['tab']=='gopy'){
        include 'quanlygopy.php';
    }
  }else{
    require_once 'thongke.php';
  }
  ?>
  </div> <!-- end Right -->
    <script>
      var navigation = responsiveNav("foo", {customToggle: ".nav-toggle"});
    </script>
</div><!-- ket thuc Thân trang web -->
        <!-- bat dau Footer trang web -->
<?php
//include ('template/footer.php');
}else{
  header('location: index.php');
}
?>

