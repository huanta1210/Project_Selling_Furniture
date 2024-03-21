<div class="main">

    <form action="index.php?act=dangky" method="POST" class="form" id="register-form" enctype="multipart/form-data">
        <h3 class="heading">Đăng ký</h3>

        <div class="spacer"></div>

        <div class="form-group">
            <label for="fullname" class="form-label">Tài khoản:</label>
            <input id="fullname" name="fullname" rules="required" type="text" placeholder="VD: Taikhoan"
                class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email:</label>
            <input id="email" name="email" type="text" rules="required|email" placeholder="VD: email@domain.com"
                class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input id="password" name="password" type="password" rules="required|min:6" placeholder="Nhập mật khẩu"
                class="form-control">
            <span class="form-message"></span>
        </div>
        <input class="form-submit" type="submit" value="Đăng ký" name="dangky">


    </form>
</div>
<!-- <script src="../main.js"></script>
<script>
$(document).ready(function() {
    $('#registrationForm').submit(function(event) {
        // Ngăn chặn sự kiện mặc định của form
        event.preventDefault();

        // Thu thập dữ liệu từ form
        var formData = $(this).serialize();

        // Gửi yêu cầu AJAX tới dangky.php
        $.ajax({
            type: 'POST',
            url: 'taikhoan/dangky.php',
            data: formData,
            success: function(response) {
                // Xử lý kết quả trả về từ PHP
                $('#register-form').html(response);
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});
Validate('#register-form');
</script> -->