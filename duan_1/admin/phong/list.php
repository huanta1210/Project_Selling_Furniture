<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí phòng
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
                        <th>Tên phòng</th>
                        <th>Giá phòng</th>
                        <th>Ngày đặt phòng</th>
                        <th>Ảnh phòng</th>
                        <th>Mô tả phòng</th>
                        <th>Sức chứa</th>
                        <th>Tên loại phòng</th>

                        <th></th>
                        <th></th>
                    </tr>

                    <?php 
                        foreach($listPhong as $phong ) {
                            extract($phong);
                            $imgPath = "../upload/img".$img;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                            $updatePhong = "index.php?act=updatephong&id=".$id_phong;
                            $deletePhong = "index.php?act=deletephong&id=".$id_phong;
                            $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề". $name;
                            echo '
                                <tr>
                                    <td>'.$name.'</td>
                                    <td>'.$price.'</td>
                                    <td>'.$ngay_dat_phong.'</td>
                                    <td>'.$image.'</td>
                                    <td>'.$mo_ta.'</td>
                                    <td>'.$suc_chua.'</td>
                                    <td>'.$ten_loaiphong.'</td>
  
                                    <td><a class="update" href="'.$updatePhong.'"> <i class="fa fa-wrench" aria-hidden="true"></i>
                                            <input type="button" value="Sửa"></a></td>
                                    <td><a class="delete" href="'.$deletePhong.'" onclick="return confirm(\''.$thongbao.'\')" role="button" > <i class="fa fa-trash" aria-hidden="true"></i> <input
                                                type="button" value="Xoá"></a></td>
        
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