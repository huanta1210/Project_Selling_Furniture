<?php 
    function totalCart() {
        $tong = 0;
        foreach ($_SESSION['cart'] as $cart) {
           $tong += $cart[3];
        }
        return $tong;
    }

    function insertBill($name,$email,$ngaydatphong,$ngaytraphong,$dienthoai,$tong) {
        $sql = "INSERT INTO bill(tentaikhoan, emailtaikhoan,ngaydatphong,ngaytraphong,sodienthoai,tongtien)
        VALUES ('$name','$email','$ngaydatphong','$ngaytraphong','$dienthoai','$tong' )";
        return pdo_execute_lastInsertId($sql);
    }

    function insertCart($id_taikhoan,$name_datphong,$anh_datphong,$ngay_den,$ngay_di,$tong,$id_bill,$id_phong) {
        $sql = "INSERT INTO dat_phong(id_taikhoan,name_datphong,anh_datphong, ngay_den, ngay_di,tong_tien,id_bill,id_phong)
        VALUES ('$id_taikhoan','$name_datphong','$anh_datphong','$ngay_den','$ngay_di','$tong','$id_bill','$id_phong')";
        pdo_execute($sql);
    }

    function loadOneBill($id_bill) {
        $sql = "SELECT * FROM bill WHERE id_bill = '$id_bill'";
        $bill = pdo_query_one($sql);
        return $bill;
    }

    function loadThongKe() {
        $sql = "SELECT 
        DATE_FORMAT(ngaydatphong, '%Y-%m') AS month,
        COUNT(*) AS total_orders FROM bill WHERE
        YEAR(ngaydatphong) = YEAR(CURRENT_DATE()) AND MONTH(ngaydatphong) = MONTH(CURRENT_DATE())
        GROUP BY 
        DATE_FORMAT(ngaydatphong, '%Y-%m');";
        $listThongKe = pdo_query($sql);
        return $listThongKe;

    }

   
?>