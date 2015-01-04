jQuery(document).ready(function() {
	$("#Submit").click(function checkpost() 
	{
		var sonha = $("#sonha").val().length;
		var checkedBoxes = $(".details input:checked");
		var cost = $("#cost").val();
		///Kiemm tra tieu de dang tin
		if($("#nhatro-type").val()==null){
			$("#nhatro-type").focus();
			$("#jstype").addClass("show");
			$("#jstype").css('color', 'red');
			return false;
		}
		if ($("#title").val()== '') 
		{
			$("#title").focus();
			$("#jstitle").removeClass();
			$("#jstitle").addClass("show");
			$("#jstitle").css('color', 'red');
		
			return false;
		} 
		//Kiem tra số nhà
		
		if(sonha == 0) 
		{	
			$("#sonha").focus();
			$("#jssonha").removeClass();
			$("#jssonha").addClass("show");
			$("#jssonha").css('color', 'red');
		
			return false;
		} 
		
		/*//Kiem tra dien tich su dung
		var dientich = $("#dientich").val();
		if(dientich < 1) 
		{	
			$("#dientich").val("0");
			$("#dientich").focus();
			$("#jsdientich").removeClass();
			$("#jsdientich").addClass("show");
			check = 0;
		} 
		else 
		{
			$("#jsdientich").removeClass();
			$("#jsdientich").addClass("hide");
		}
		
		
		*/
		// kiem cha check dac diem
		if(checkedBoxes.length <2 ){
            	$(".jscheck").css('color', 'red');
            	alert("Lỗi! Bạn phải chọn ít nhất 2 đặc điểm!");
            	return false;
            }
		//Kiem tra gia cho thue
		
		if(cost < 100 || cost>10000) 
		{	
			$("#cost").focus();
			$("#jscost").removeClass();
			$("#jscost").addClass("show");
			$("#jscost").css('color', 'red');
		
			return false;
		} 
		
		
		//Kiemm tra hoten
		if ($("#name").val().length==0 || $("#name").val().length>30) 
		{
			//alert("Nhập lại họ tên");
			//$("#name").val("");
			$("#name").focus();
			$("#jsname").removeClass();
			$("#jsname").addClass("show");
			$("#jsname").css('color', 'red');
		
			return false;
		}
		
		//Kiem tra dien thoai di dong
		if ($("#ContactPhone").val()=='')
		{
			$("#jsphone").removeClass();
			$("#jsphone").addClass("show");
			$("#ContactPhone").focus();
		
			return false;
		}
	else{
		return true;
	}
});
    
});
// number So tien
