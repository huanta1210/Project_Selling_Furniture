<?php 
SESSION_START();
include "../client/header.php";

include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/phong.php";
include "../models/taikhoan.php";

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

        
        case 'cart':
            if(isset($_POST['addcart']) && $_POST['addcart']) {
                $id = $_POST['idphong'];
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $soluong = 1;
                $total = $soluong * $price;
                $addRoom = [$id, $name, $img, $price, $soluong, $total];
                array_push($_SESSION['cart'], $addRoom);
            }
            include "cart/backgroundcart.php";
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