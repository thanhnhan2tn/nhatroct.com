<script type="text/javascript">
  // Sidebar
$(document).ready(function() {
    $(".callToAction").click(function() {
        $(".sidebar").toggle("slow");
        
    });
});
  
</script>
<style type="text/css" >
.content h4{
 	margin: 0;
	padding: 0;
	}
.content ul{
	list-style:none;
	padding:5px 0 0 0;
	}
.margin_bottom{
	margin-bottom:10px;
}
.sidebarToggle span{
    font-size: 15pt;
    clear: both;
    display: block;
    padding: 10px;
    border: 1px solid;
    margin: 10px;
    border-radius: 9px;
    color: #fff;
    text-align: center;
    background: rgb(51, 114, 170);
    background-image: linear-gradient(rgb(37, 85, 128),rgb(23, 99, 167),rgb(81, 144, 201));
}
</style>
<div class="sidebarToggle" style="clear: both; cursor: pointer;">
<a class="callToAction" data-target=".sidebar">
    <span>Thanh bên <strong>↓</strong></span></a>
</div>
<div class="sidebar">
<form action="" name="Fillter" id="Fillter" method="get" class="Fillter" enctype="multipart/form-data">
  <div id="filter_normal" style="display:block">
    <div class="content">
      <div id="sorttype" class="panel panel-default">
        <div class="panel-heading">
          <h4>Loại tin đăng</h4>
       	</div>
           <div class="panel-body">
            
            </div>
         
        </div>
      
      
        
         
          </div> <!-- end content -->
		</div>
  
 
</form>
</div>