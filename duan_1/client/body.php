<body>
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


                <?php 
                    foreach ($rooms as $room) {
                        extract($room);
                        $image = $imgPath.$img;
                        $linksp = "index.php?act=phongct&idphong=".$id_phong;
                        
                       echo '
                       <div class="boxsp mr">
                           <a href="'.$linksp.'">
                               <img src="'.$image.'" alt="">
                           </a>
                           <div class="boxsp-title">
                               <div class="title">
                                   <a href="'.$linksp.'">'.$name.'</a>
                               </div>
                               <div class="map">
                                   <ion-icon name="map-outline"></ion-icon>Khách sạn ở '.$address.'   
                               </div> 
                               <div class="quantity">
                                    <span><i class="fa fa-bed" aria-hidden="true"></i>' .$suc_chua.'</span>
                                </div>
                               <div class="price">
                                   <span>$'.$price.'</span>
                               </div>
                               <div class="put">
                                   <form action="index.php?act=themphong" method="POST">
                                       <input type="hidden" name="id" value="'.$id_phong.'">
                                       <input type="hidden" name="name" value="'.$name.'">
                                       <input type="hidden" name="price" value="'.$price.'">
                                       <input type="hidden" name="img" value="'.$img.'">
                                       <input type="submit" name="themphong" value="Đặt phòng">
                                   </form>
                               </div>
                           </div> 
                           </div>
                           ';
                    }
               ?>
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
                    <div class="boxtitle">Danh mục phòng</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <?php
                                foreach($danhMucPhong as $phong) {
                                 extract($phong);
                                 $linkDanhMuc = "index.php?act=phong&iddm=".$id_loaiphong;   
                                    echo '
                                    <li>
                                        <a href="'.$linkDanhMuc.'"><input type="checkbox">'.$ten_loaiphong.'</a>
                                    </li>';
                                }
                            
                            ?>
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