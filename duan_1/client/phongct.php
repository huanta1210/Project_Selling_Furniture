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
            <form action="" method="post">
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
                        <strong>Danh mục phòng:</strong>
                        <span>'.$ten_loaiphong.'</span>
                    </p>
            
                </div>
                <div class="select-actions clearfix">
                    <div class="warp-cart">
                        <a href="index.php?act=cart"><button type="button" id="add-to-cart" class="add-to-cart">Chọn phòng</button></a>
                    </div>
                </div>
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