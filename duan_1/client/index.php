<?php 
SESSION_START();
include "../client/header.php";

include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/phong.php";
include "../models/taikhoan.php";
include "../models/cart.php";
include "../models/binhluan.php";



include "../global.php";

if(!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}


$rooms = load_phong_home();
$danhMucPhong = loadLoaiPhong();


if(isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch($act) {
        // quản lí danh mục phòng
        case 'phong':
            if(isset($_POST['kyw']) && $_POST['kyw'] != "") {
                $kyw = $_POST['kyw'];
            } else {
                $kyw = "";
            }


            if(isset($_GET['id_loaiphong']) && $_GET['id_loaiphong'] > 0) {
                $id_loaiphong = $_GET['id_loaiphong'];
                
            } else {
                $id_loaiphong = 0;
            }
            $listLoaiPhong = load_phong($kyw,$id_loaiphong);
            include "phong.php";
            break;       
            

        case 'phongct':
            $loadOnePhong = load_One_Phong();
            include "phongct.php";
            break;
        case 'dangky':
            if(isset($_POST['dangky']) && $_POST['dangky']) {
                $user_taikhoan = $_POST['fullname'];
                $pass_taikhoan = $_POST['password'];
                $email_taikhoan = $_POST['email'];

                insert_taiKhoan($user_taikhoan,$pass_taikhoan,$email_taikhoan);
            }
            include "taikhoan/dangky.php";
            break;
        case 'dangnhap':
            if(isset($_POST['dangnhap']) && $_POST['dangnhap']) {
                $user_taikhoan = $_POST['fullname'];
                $pass_taikhoan = $_POST['password'];
                $getUser = getUser($user_taikhoan,$pass_taikhoan);

                if(is_array($getUser)) {
                    $_SESSION['user_taikhoan'] = $getUser;
                    $thongbao = "Đăng nhập thành công";
                } else {
                    $thongbao = "Tài khoản không tồn tại vui lòng kiểm tra lại";
                }
    
            }
            include "taikhoan/dangnhap.php";
            break;

        case 'dangnhapadmin':
            break;
        case 'thoat':
            SESSION_UNSET();
            break;

        
        case 'addcart':
            if(isset($_POST['addcart']) && $_POST['addcart']) {
                $id = $_POST['idphong'];
                $name = $_POST['name'];
                $img = $_POST['img'];
                $price = $_POST['price'];
                $loaiphong = $_POST['loaiphong'];
                $succhua = $_POST['succhua'];
                $ngaydatphong = $_POST['ngay_dat_phong'];
                $ngaytraphong = $_POST['ngay_tra_phong'];

                $addRoom = [$id, $name, $img, $price,$loaiphong,$succhua,$ngaydatphong,$ngaytraphong];
                array_push($_SESSION['cart'], $addRoom);
            }
            include "cart/backgroundcart.php";
            break;

        case 'delcart':
            if(isset($_GET['iddatphong'])) {
                array_slice($_SESSION['cart'],$_GET['iddatphong'],1);
                // unset($_SESSION['cart'][$_GET['iddatphong']]);
            } else {
                $_SESSION['cart'] = [];
            } 
            include "cart/backgroundcart.php";
            break;
        case 'bill':
            include "cart/bill.php";
            break;
        case 'billconfirm':
            if(isset($_POST['dongydathang']) && $_POST['dongydathang']) {
                $name = $_POST['fullname'];
                $email = $_POST['email'];
                $dienthoai = $_POST['tell_taikhoan'];
                
                if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
                    $carts = $_SESSION['cart'];
                    foreach ($carts as $cart) {
                       $ngaydatphong = $cart[6]; 
                       $ngaytraphong = $cart[7]; 
                    }
                }
                
                $tong = totalCart();
                $id_bill = insertBill($name,$email, $ngaydatphong,$ngaytraphong,$dienthoai,$tong);

                foreach ($_SESSION['cart'] as $cart) {
                    print_r($cart);
                    insertCart($_SESSION['user_taikhoan']['id_taikhoan'],$cart[1],$cart[2],$cart[3],$cart[6],$cart[7],$id_bill,$cart[0]);
                }
               
            }
            $listBill = loadOneBill($id_bill);
            include "cart/billconfirm.php";
            break;

        default:
            include "../client/body.php";
            break;
    }
} else {
    include "../client/body.php";
}

include "../client/footer.php";
?>