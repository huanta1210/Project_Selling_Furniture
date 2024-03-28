<div class="box-right col-10">

    <div class="box-right-margin">
        <div class="header">
            <h5 class="header-title">Quản lí nhận trả phòng</h5>
        </div>

        <div class="main-top">
            <div class="main-header-title">
                <p class="title">
                    Quản lí nhận trả phòng
                </p>
            </div>

            <div class="main-table">
                
                <table>
                    <tr>
                        <th>Ảnh phòng</th>
                        <th>Tên phòng</th>
                        <th>Tên khách sạn</th>
                        <th>Người đặt phòng</th>
                        <th>Số điện thoại</th>
                        <th>Ngày đặt phòng</th>
                        <th>Ngày trả phòng</th>
                        <th>Tổng giá</th>
                    </tr>

                    <?php 
                        foreach($loadCheckInOutRoom as $phong ) {
                            extract($phong);
                            $imgPath = "../upload/img".$anh_datphong;
                            if(is_file($imgPath)) {
                                $image = "<img src=".$imgPath." style='width: 40px; height: 40px;'>";
                            } else {
                                $image = "không ảnh";
                            }
                            // $updatePhong = "index.php?act=updatephong&id=".$id_phong;
                            // $deletePhong = "index.php?act=deletephong&id=".$id_phong;
                            // $thongbao = "Bạn có chắc chắn muốn xoá tiêu đề". $name;
                            echo '
                                <tr>
                                    <td>'.$image.'</td>
                                    <td>'.$name.'</td>
                                    <td>'.$name_khach_san.'</td>

                                    <td>'.$tentaikhoan.'</td>
                                    <td>'.$sodienthoai.'</td>
                                    <td>'.$ngaydatphong.'</td>
                                    <td>'.$ngaytraphong.'</td>
                                    <td>'.$tongtien.'</td>
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