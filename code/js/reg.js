$(document).ready(function() {
    $("#btn_submit").click(function() {
        var temp = 0;
        var username = document.forms["form"]["us_name"].value;
        if ((username.length) == 0) {
            $("#check_id").html("Tên đăng nhập không được để trống");
            $("input[name=us_name]").focus();
            temp = 1;
        } else if (username.length < 3) {
            $("#check_id").html("Tên đăng nhập ít nhất 3 ký tự");
            $("input[name=us_name]").focus();
            temp = 1;
        } else if ((username.match("^[a-zA-z0-9]*$")) == null) {
            $("#check_name").text("Tên đăng nhập là chuỗi kí tự, không sử dụng số, TV có dấu, kí tự đặc biệt!");
            $("us_name").focus();
            temp = 1;
        } else $("#check_id").html(" ");

        var password = document.forms["form"]["us_pass"].value;
        if ((password.length) == 0) {
            $("#check_pass").html("Mật khẩu không được để trống");
            $("input[name=us_pass]").focus();
            temp = 1;
        } else if ((password.length) < 8) {
            $("#check_pass").html("Mật khẩu ít nhất 8 ký tự");
            $("us_pass").focus();
            temp = 1;
        } else $("#check_pass").html(" ");

        var re_password = document.forms["form"]["us_repass"].value;
        if ((re_password.match(password)) == null) {
            $("#check_repass").html("Mật khẩu chưa khớp");
            $("us_repass").focus();
            temp = 1;
        } else $("#check_repass").html(" ");
        var email = document.forms["form"]["us_email"].value;
        var reg_email = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ((email.length) == 0) {
            $("#check_email").text("Email không được để trống");
            $("us_email").focus();
            temp = 1;
        } else if ((email.match(reg_email)) == null) {
            $("#check_email").text("Email không hợp lệ");
            $("us_email").focus();
            temp = 1;
        } else $("#check_email").text(" ");

        var fullname = document.forms["form"]["us_fullname"].value;
        if ((fullname.length) == 0) {
            $("#check_name").text("Họ tên không được để trống");
            $("us_name").focus();
            temp = 1;
        } else $("#check_name").text(" ");

        var year = document.forms["form"]["us_year"].value;
        if (year == 0) {
            $("#check_year").text("Xác nhận năm sinh");
            temp = 1;
        } else $("#check_year").text(" ");

        var phone = document.forms["form"]["us_phone"].value;
        if ((phone.length) > 0) {
            if ((phone.match("^[0-9{10,11}]*$")) == null) {
                $("#check_phone").text("Số điện thoại không hợp lệ");
                $("us_phone").focus();
                temp = 1;
            } else $("#check_phone").text(" ");
        } else $("#check_phone").text(" ");
        if (temp == 1) return false;
        else if (temp == 0) return true;
    });
});