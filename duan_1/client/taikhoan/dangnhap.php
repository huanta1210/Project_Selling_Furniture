<div class="main">

    <form action="index.php?act=dangnhap" method="POST" class="form" id="register-form" enctype="multipart/form-data">
        <h3 class="heading">Đăng Nhập</h3>

        <div class="spacer"></div>

        <div class="form-group">
            <label for="fullname" class="form-label">Tài khoản:</label>
            <input id="fullname" name="fullname" rules="required" type="text" placeholder="VD: Taikhoan"
                class="form-control">
            <span class="form-message"></span>
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Mật khẩu:</label>
            <input id="password" name="password" type="password" rules="required|min:6" placeholder="Nhập mật khẩu"
                class="form-control">
            <span class="form-message"></span>
        </div>
        <input class="form-submit" type="submit" value="Đăng nhập" name="dangnhap">


    </form>
</div>