<div class="container">
    <div class="cart-main">
        <div class="inner">
            <h3>Giỏ hàng</h3>
            <form action="">
                <table class="table cart-table">
                    <thead class="cart-row">
                        <tr>
                            <th colspan="2" class="text-center">Thông tin phòng</th>
                            <th class="text-center">Loại phòng</th>
                            <th class="text-center">Giá</th>
                            <th class="text-center">Sức chứa</th>
                            <th class="text-center">Ngày đặt phòng</th>
                            <th class="text-center">Ngày trả phòng</th>
                            <th class="text-right">Tổng giá</th>
                            <th>Xoá</th>

                        </tr>
                    </thead>

                    <tbody class="cart-row">
                        <?php
                        $tong = 0;
                        $i = 0;
                        foreach ($_SESSION['cart'] as $cart) {
                            $tong += $cart[3];
                            $image = $imgPath.$cart[2];
                            $xoa = '<a class="remove-cart" href="index.php?act=delcart&iddatphong='.$i.'"><input type="button" value="Xoá"></a>';
                
                            echo '
                                <tr>
                                    <td><a href=""><img class="image" src="'.$image.'" alt=""></a> </td>
                                    <td class="cart-text"> '.$cart[1].'  </td>
                                    <td> '.$cart[4].'</td>
                                    
                                    <td><span class="totalAmount">$'.$cart[3].'</span></td>
                                    <td> '.$cart[5].'</td>
                                    <td> ' .$cart[6].'</td>  
                                    <td> ' .$cart[7].'</td>  
                                    <td> $'.$cart[3].'</td>  
                
                                    <td>'.$xoa.'</td>
                                </tr>  
                            '; $i += 1;
                            
                
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-grid cart-row">
                    <div class="grid-item">
                        <h6>Chú thích cho cửa hàng</h6>
                        <textarea name="" id="" cols="80" rows="5"></textarea>
                    </div>
                    <div class="grid-items">


                        <p class="text-right">
                            <span>Tổng tiền:</span>
                            <span class="totalAmounts"><?php echo $tong .'$'?></span>
                        </p>

                        <p class="text-bottom"><em>Vận chuyển</em></p>
                        <button type="submit" id="btn" name="update" class="btn btn-primary"><a
                                href="index.php?act=phong">Cập
                                nhật</a></button>
                        <button type="submit" id="btn" name="check-out" class="btn btn-primary"><a
                                href="index.php?act=bill">Thanh
                                toán</a></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>