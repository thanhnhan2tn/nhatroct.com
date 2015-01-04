<?php
if(!isset($_SESSION)){
	session_start();
	}
if(isset($_REQUEST['logout'])){
	session_destroy();
	header('location: #');
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>.: <?php if(isset($filename)) echo $filename.' - ';  if(isset($sitename)){ echo $sitename.' - '; } ?> Control Panel :.</title>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="./../template/bootstrap/css/bootstrap-theme.min.css" />
<link rel="stylesheet" type="text/css" href="template/admin.css" />
<!--[if lte IE 8]><link rel="stylesheet" href="../plugin/responsive-nav/responsive-nav.css"><![endif]-->
    <!--[if gt IE 8]><!--><link rel="stylesheet" href="../plugin/responsive-nav/styles.css"><!--<![endif]-->
    <script src="../plugin/responsive-nav/responsive-nav.min.js"></script>

</head>
<body>
	<script type="text/javascript" src="./../template/bootstrap/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="./../js/jquery-1.11.0.min.js"></script>

<div id="top" class="header">
     <!-- bat dau top Navination -->	
<div class="top_nav navbar navbar-inverse navbar-fixed-top container-fluid">
<div class="container">
 <span class="title text_title col-md-3"><a href="./../"><span class="glyphicon glyphicon-home" style="margin-right: 5px;"></span></a>> Khu vực quản lý</span>
 <span class="title user_title col-md-3"><span class="glyphicon glyphicon-user" style="margin-right: 5px;"></span>Xin chào <?php echo $_SESSION['user_name']; ?> | <a href="../login.php?logout" name="logout"><span class="glyphicon glyphicon-log-out"></span>Thoát</a></span>
	</div>
</div>
        <!-- ket thuc top Navination -->

</div>
 