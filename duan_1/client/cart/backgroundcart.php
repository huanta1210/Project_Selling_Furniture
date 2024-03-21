<div class="container">
    <div class="cart-main">
        <div class="inner">
            <h3>Giỏ hàng</h3>
            <form action="">
                <table class="table cart-table">
                    <thead class="cart-row">
                        <tr>
                            <th colspan="2" class="text-center">Thông tin sản phẩm</th>
                            <th class="text-center">Đơn giá</th>
                            <th class="text-center">Số lượng</th>
                            <th class="text-right">Tổng giá</th>
                        </tr>
                    </thead>
                    <tbody class="cart-row">
                        <tr>
                            <td><a href=""><img class="image"
                                        src="img/Ghế_cafe_gỗ_đệm_da_phong_cách-removebg-preview.png" alt=""></a>
                            </td>
                            <td class="cart-text">_Sofa Table - Coffee Table - Pine Wood Tea Table
                                <br>
                                <small class="small">Brown</small> <br>
                                <a class="remove-cart" href="">Xoá</a>
                            </td>
                            <td><span>$1200.00</span></td>
                            <td class="quantity">
                                <!-- <div class="count">
                                        <input type="button" value="-" class="apart-btn">
                                        <input type="text" name="quantity" value="1" min="1" id="quantity" onchange="totalBill()">
                                        <input type="button" value="+" class="add-btn">
                                    </div> -->
                                <input type="number" name="" id="quantity" onchange="totalBill()">
                            </td>
                            <td><span class="totalAmount">$1200.00</span></td>
                        </tr>
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
                            <span class="totalAmounts">0</span>
                        </p>
                        <p class="text-bottom"><em>Vận chuyển</em></p>
                        <button type="submit" id="btn" name="update" class="btn btn-primary"><a
                                href="index.php?act=phong">Cập
                                nhật</a></button>
                        <button type="submit" id="btn" name="check-out" class="btn btn-primary"><a href="pay.html">Thanh
                                toán</a></button>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>