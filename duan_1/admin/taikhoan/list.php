<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí người dùng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí người dùng
                </p>
            </div>

            <div class="main-table">
                <div class="main-table-title">
                    <a href="index.php?act=addphong"><i class="fa fa-plus-circle" aria-hidden="true"></i> <input
                            type="button" value="Thêm phòng"></a>
                    <p class="line"></p>
                </div>
                <table>
                    <tr>
                        <th>Tên tài khoản</th>
                        <th>Mật khẩu</th>
                        <th>Email tài khoản</th>
                        <th>Địa chỉ</th>
                        <th>Số điện thoại</th>
                        <th>Vai trò</th>

                    </tr>


                    <?php 
                        foreach($listTaiKhoan as $user ) {
                            extract($user);
                            $imgPath = "../upload/img".$img;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                           
                            echo '
                                <tr>
                                    <td>'.$user_taikhoan.'</td>
                                    <td><input type="password" name="" id="" value="'.$pass_taikhoan.'"></td>
                                    <td>'.$email_taikhoan.'</td>
                                    <td>'.$address.'</td>
                                    <td>'.$tell_taikhoan.'</td>
                                    <td>'.$vaitro_taikhoan.'</td>
                                </tr>
                            
                            ';
                        }
                    ?>

                </table>
            </div>
        </div>
    </div>


</div>
</div>
</div>