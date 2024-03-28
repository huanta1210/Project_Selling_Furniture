<style>
.body-content .alert {
    margin: auto;
    text-align: center;
}

.body-content .check i {
    font-size: 100px;
}

.body-content .check p {
    font-size: 30px;
    font-weight: bold;
}
</style>
<div class="body-content">
    <div class="alert alert-success" role="alert">
        <div class="check">
            <i class="fa fa-check-circle" aria-hidden="true">
            </i>
            <p>Đặt hàng thành công!</p>
        </div>

        <div class="text">
            <?php 
            if(isset($listBill) && is_array($listBill)) {
                extract($listBill);
                echo '
                    <p> Cảm ơn '.$listBill['tentaikhoan'].' đã đặt phòng thành công với mã phòng '.$listBill['id_bill'].' là trị giá '.$listBill['tongtien'].' , thanh toán khi nhận phòng</p>
                    <p>Ngày nhận phòng: '.$listBill['ngaydatphong'].'</p>
                    <p>Ngày nhận phòng: '.$listBill['ngaytraphong'].'</p>


                ';
            }
            ?>

        </div>


    </div>
</div>