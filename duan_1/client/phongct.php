<p class="line"></p>
<section class="container d-flex justify-content-between product-details">
    <div class="product-colum row">
        <div class="product-details-image col-5">
            <?php 
                extract($loadOnePhong);
                $image = $imgPath.$img;
                    echo '
                        <h3 style="margin:0 0 10px 0" class="product-details-heading">'.$name. ' - Hotel: ' .$name_khach_san.'</h3>
                        <img style="height:500px ; width:500px; padding-right:20px "  src="'.$image.'" alt="">
                    ';
                ?>

        </div>
        <div class="product-details-text col-7">
            <?php
            echo '
            <div class="product-heading">
            <h3 class="heading-text" style="margin:0 0 10px 0">'.$name.' - Hotel: ' .$name_khach_san.'</h3>
            <div class="rating">
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span class="star">&#9733;</span>
                <span><small>(22)</small></span>
            </div>
            <span class="sold-text">Share:<i class=" facebook-icons ti-facebook" aria-hidden="true"></i></span>
            <span class="sold-out">Sold: <small>(389)</small></span>
            <div class="price">
                <span class="product-price">$'.$price.'</span> <span><del class="del">$1500.00</del></span>
            </div>
            <form action="index.php?act=addcart" method="post">
                <div class="port-short">
                    <p>
                        <strong><i class="fa fa-users" aria-hidden="true"></i></strong>
                        <span>'.$suc_chua.'</span>
                    </p>
                    <p>
                        <strong>Địa chỉ khách sạn:</strong>
                        <span>'.$address.'</span>
                    </p>
                    <p>
                        <strong>Loại phòng:</strong>
                        <span>'.$ten_loaiphong.'</span>
                    </p>
                    <p>
                        <strong>Ngày nhận phòng:</strong>
                        <span><input type="date" name="ngay_dat_phong" id=""></span>
                    </p>
                    <p>
                        <strong>Ngày trả phòng:</strong>
                        <span><input type="date" name="ngay_tra_phong" id=""></span>
                    </p>
            
                </div>
                <div class="select-actions clearfix">
                    <div class="warp-cart">
                                                   
                    </div>
                    </div>
                </div>
                <input type="hidden" name="idphong" value="'.$id_phong.'">
                <input type="hidden" name="name" value="'.$name.' - Hotel: ' .$name_khach_san.'">
                <input type="hidden" name="loaiphong" value="'.$ten_loaiphong.'">
                <input type="hidden" name="price" value="'.$price.'">
                <input type="hidden" name="succhua" value="'.$suc_chua.'">
                <input type="hidden" name="ngaydatphong" value="'.$ngay_dat_phong.'">
                <input type="hidden" name="ngaytraphong" value="'.$ngay_tra_phong.'">

                <input type="hidden" name="img" value="'.$img.'">
                
                <input type="submit" id="add-to-cart" onclick=return confirm("Thêm thành công") name="addcart" value="Chọn phòng" style="border-radius: 5px; width: 100%; padding: 5px; background-color: #ef683a; color: #fff; border: 1px solid #ef683a; transition: background-color 0.5s, color 0.5s, border-color 0.5s;">
                
            
                </form>
            <!-- phần text miễn phí ship -->
            <div class="info-promotion">
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Sân bay quốc tế Tân Sơn Nhất <span class="address">2.24 km</span>
                </p>
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> Bảo tàng Phụ nữ Nam Bộ <span>2.33 km</span>
                    
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Trung tâm Triển lãm và Hội chợ Tân Bình <span>1.73 km</span>
                </p>
                <p>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    Jamiul Muslimin Mosque <span>266m</span>
                </p>
               
            </div>
        </div>
            ';
        ?>
        </div>

    </div>
    
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
    $("#comment-text").load("binhluan/binhluan.php", {id_phong: <?=$id_phong?>});
});
</script>

    <div class="container">
        <div class="comment">
            
            <div id="comment-text">
            </div>
        </div>
        
    </div>

   
    