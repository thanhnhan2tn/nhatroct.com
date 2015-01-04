<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
<?php include_once ('./include/head.php');?>
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
	   <article><div id="left">
        <div class="list_item">
        <!-- Hien thi thong tin nha tro -->
            <?php
                include('./template/listNhatro.php');
            ?>
        <!-- // Hien thi thong tin nha tro -->
        </div> <!-- // List item -->
        <div class="clearfix margin-5"></div>
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
<?php include_once ('./template/footer.php'); ?>

</footer>
</body>
</html>