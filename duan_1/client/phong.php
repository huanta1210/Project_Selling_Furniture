<div class="container">
    <!-- phần nội dung chính -->
    <div class="row mb">
        <!--nội dung bên trái -->
        <div class="boxtrai mr col-7">
            <div class="moi">
                <p>
                    <ion-icon name="pricetags-outline"></ion-icon>
                    Sao phải trả nhiều hơn khi luôn có giá rẻ hơn trên App - Click dấu "?" bên phải để tải ngay
                    ứng dụng Traveloka và đặt khách sạn rẻ hơn!
                    <ion-icon name="help-circle-outline"></ion-icon>
                </p>
            </div>
            <div class="boxsp mr">
                <?php 
                    $i = 0;
                    foreach ($listPhong as $room) {
                        extract($room);
                        $image = $imgPath.$img;
                        $linksp = "index.php?act=phongct&idsp=".$id_phong;
                        
                       echo '
                           <a href="'.$linksp.'">
                               <img src="'.$image.'" alt="">
                           </a>
                           <div class="boxsp-title">
                               <div class="title">
                                   <a href="'.$linksp.'">'.$name.'</a>
                               </div>
                               <p class="map">
                                   <ion-icon name="map-outline"></ion-icon>Khách sạn '.$address.'    
                               </p>
                               <div class="price">
                                   <span>$'.$price.'</span>
                               </div>
                           </div> 
                           ';
                           $i = $i + 1;
                    }
                ?>

            </div>

        </div>
        <!-- nội dung bên phải -->
        <div class="boxphai col-4">
            <div class=" mb">
                <div class="boxtitle">Phạm vi giá</div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <li>
                            <a href="#">
                                <input type="number" min="100000" max="3000000" value="100000" step="100000">
                                Giá
                                tiền
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class=" mb">
                <div class="boxtitle">Tiện nghi</div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <li>
                            <a href="#">
                                <input type="checkbox">Wifi
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Hồ bơi
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Chỗ đậu xe
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Thang máy
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Phòng họp
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Lễ tân 24h
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class="mb">
                <div class="boxtitle">Ưu tiên nơi nghỉ</div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <li>
                            <a href="#">
                                <input type="radio">All
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="radio">Thanh toán tại khách sạn
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="radio">Chọn nhiều nhất
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="radio">Phù hợp với gia đình
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="radio">Nhà nghỉ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="radio">Ưu đãi đặc biệt
                            </a>
                        </li>
                    </ul>
                </div>

            </div>
            <div class=" mb">
                <div class="boxtitle">Loại hình lưu chú</div>
                <div class="boxcontent2 menudoc">
                    <ul>
                        <li>
                            <a href="#">
                                <input type="checkbox">All
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Nhà nghỉ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Căn hộ
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Khách sạn
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Khu nghỉ dưỡng
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <input type="checkbox">Nhà nghỉ Homestay
                            </a>
                        </li>
                    </ul>
                </div>

            </div>

        </div>
    </div>
</div>