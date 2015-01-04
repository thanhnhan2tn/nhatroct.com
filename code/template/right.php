<?php
// Thai Thanh Nhan - Ta Ngoc Như
// Sidebar, sort thông tin
require_once './include/function.php';
?>
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
    <span>Ẩn/Hiện Thanh bên</span></a>
</div>
<div class="sidebar">
<form action="" name="Fillter" id="Fillter" method="get" class="Fillter" enctype="multipart/form-data">
  <div id="filter_normal" style="display:block">
  <div class="content"> 
      <!--  
      <div id="sorttype" class="panel panel-default">
        <div class="panel-heading">
          <h4>Loại tin đăng</h4>
       	</div>
           <div class="panel-body">
            <script type="text/javascript">
            $(document).ready(function() {
            $('input[name=TinDang]').change(function(){
              $('form').submit();
            });
            $('select[name=quan]').change(function(){
              $('form').submit();
            });
             $('select[name=phuong]').change(function(){
              $('form').submit();
            });
           });
          </script>
             <fieldset>
             
               <ul>
                 <li>
                 
                   <input type="radio" name="TinDang" id="at_1" value="1">
                   <label for="at_1">Cho Thuê</label>
                 </li>
                 <li>
                   <input type="radio" name="TinDang" id="at_2" value="2">
                   <label for="at_2">Share Phòng</label>
                 </li>
                 
               </ul>
             
             </fieldset>
            
         
        </div> </div>-->
      
      <div id="location" class="panel panel-default">
          <div class="panel-heading">
            <h4>Khu vực</h4>
          </div>
          <div class="panel-body">
              <fieldset>
                
                  <div id="" class="district margin_bottom">
                      <div class="wid-left"></div>
                        <div class="wid">
                          <div class="selector" id="uniform-DistrictList" style="width: 190px;">
                            <select name="quan" disabled="disabled" id="DistrictList" style="opacity: 1; left: 2px;height:30px; width: 99%; min-width: 150px;">
                            <option  disabled="disabled"> -- Quận/Huyện -- </option>
                            <?php echo quan(); ?>
                            </select>
                          </div>
                      </div>
                  </div>
                  <div class="bussiness_type margin_bottom">
            	            <div id="ward">
                                <div class="divUni-2">
                                    <div class="wid-left"></div>
								    <div class="wid">
                                <div class="selector" id="uniform-WardList" style="width: 190px;">
                                <select name="phuong" id="DistrictList" style="opacity: 1; left: 2px;height:30px; width: 99%; min-width: 150px;">
                                    <option  disabled="disabled" selected="selected"> -- Phường/Xã -- </option>
                                      <?php echo phuong(); ?>
                                </select></div>
                                    </div>
                                </div>
                            </div>
          	            </div>
                  <div class="bussiness_type margin_bottom">
                    <div id="street">
                      <div class="divUni-2">
                        <div class="wid-left"></div>
                        <div class="wid">
                          <div class="selector" id="uniform-DistrictList" style="width: 190px;">
                            <select name="duong" id="DistrictList" onchange="this.form.submit()" style="opacity: 1; left: 2px;height:30px; width: 99%; min-width: 150px;">
                              		<option disabled="disabled" selected="selected">-- Đường --</option>
                                  <?php echo duong(); ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
               
              </fieldset>
          </div>
        </div>
        
        
     <div id="price" class="panel panel-default">
          <div class="panel-heading">
            <h4>Khoảng giá</h4>
          </div>
          <div class="panel-body">
                <input type="radio"  name="khoang-gia" id="khoang-gia1" onchange="this.form.submit()" value="0#500000"><label for="khoang-gia1"> Dưới 500.000</label><br />
                <input type="radio"  name="khoang-gia" id="khoang-gia2" onchange="this.form.submit()" value="500000#1000000"><label for="khoang-gia2">500000-1.000.000</label><br />
                <input type="radio"  name="khoang-gia" id="khoang-gia3" onchange="this.form.submit()" value="100001#1500000"><label for="khoang-gia3">Trên 1.000.000-1.500.000</label><br />
                <input type="radio"  name="khoang-gia" id="khoang-gia4" onchange="this.form.submit()" value="1500001#2000000"><label for="khoang-gia4">Trên 1.500.000-2.000.000</label><br />
                <input type="radio"  name="khoang-gia" id="khoang-gia5" onchange="this.form.submit()" value="2000000#0"><label for="khoang-gia5">Trên 2.000.000</label><br />
              
            </div>
          </div>
  
        
        <div id="body_number" class="panel panel-default">
          <div class="panel-heading">
            <h4>Số người ở</h4>
          </div>
          <div class="panel-body">
              <fieldset>
                <div class="divUni-2">
                  <div class="wid-left"></div>
                  <div class="wid">
                    <div class="selector" id="uniform-NumberOfBedRoomList" style="width: 190px;">
                      <select name="phongngu" id="phongngu" onchange="this.form.submit()" style="opacity: 1; left: 2px; height:30px;width: 99%; min-width: 150px;">
                        <option disabled="disabled" selected="selected">Chọn số người ở</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6+">nhiều hơn 6</option>
                      </select>
                    </div>
                  </div>
                </div>
              </fieldset>
            </div>
          </div>
         <!-- end content -->
	   </div>

</form>
</div>

