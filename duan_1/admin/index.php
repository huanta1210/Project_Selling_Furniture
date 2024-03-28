<?php 
include "header.php";

include "../models/danhmuc.php";
include "../models/khachsan.php";
include "../models/phong.php";
include "../models/taikhoan.php";
include "../models/binhluan.php";

include "../models/pdo.php";





if(isset($_GET['act'])) {
    $act = $_GET['act'];
    switch($act) {
        // quản lí danh mục phòng
        case 'adddm':
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $ten_loaiphong = $_POST['tenloaiphong'];
                insertLoaiPhong($ten_loaiphong);
                $thongbao = "<h4>Thêm thành công</h4>";
            }
            include "danhmuc/add.php";
            break;

        case 'listdanhmuc':
            $listLoaiPhong = loadLoaiPhong();
            include "danhmuc/list.php";
            break;

        case 'delete':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                deleteLoaiPhong();
            }
            $listLoaiPhong = loadLoaiPhong();

            include "danhmuc/list.php";
            break;

        case 'update':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
                $loaiPhong = loadOneLoaiPhong();
            }
            include "danhmuc/update.php";
            break;

        case 'updateloaiphong':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                updateLoaiPhong(); 
                $thongbao = "<h4>Cập nhật thành công</h4>";
            }
            $listLoaiPhong = loadLoaiPhong();
            include "danhmuc/list.php";
            break;
            
        //Quản lí khách sạn 
        case 'khachsan':
            $listKhachSan = loadKhachSan();
            include "khachsan/list.php";
            break;

        case 'addkhachsan':
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $errors = [];
                $tenkhachsan = $_POST['tenkhachsan'];
                $sdtkhachsan = $_POST['hotline'];
                $diachi = $_POST['diachi'];
                
                $anhkhachsan = $_FILES['anhkhachsan']['name'];
                $anhkhachsan_tmp = $_FILES['anhkhachsan']['tmp_name'];
                move_uploaded_file($anhkhachsan_tmp, '../upload/img'.$anhkhachsan);

                if(empty($tenkhachsan)) {
                    $errors[] = 'Vui lòng nhập tên khách sạn';
                }
                
                if(empty($sdtkhachsan)) {
                    $errors[] = 'Vui lòng nhập hotline khách sạn';
                }
                if (!is_numeric($sdtkhachsan)) {
                    $errors[] = 'Hotline phải là số';
                }

                if(empty($diachi)) {
                    $errors[] = 'Vui lòng nhập địa chỉ khách sạn';
                }

                if(empty($errors)) {
                    insertKhachSan($tenkhachsan,$anhkhachsan,$sdtkhachsan,$diachi);
                    $thongbao = "<h4>Thêm thành công</h4>";
                } else {
                    foreach($errors as $error) {
                        echo '<p style="color:red" >'.$error.'</p>';
                    }
                }
            }

            include "khachsan/add.php";
            break;

        case 'updatekhachsan':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
                $khachSan = loadOneKhachSan();
            }
            include "khachsan/update.php";
            break;

        case 'capnhatkhachsan':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenkhachsan = $_POST['tenkhachsan'];
                $sdtkhachsan = $_POST['hotline'];
                $diachi = $_POST['diachi'];
                $id = $_POST['id'];
                
                $anh_khach_san = $_FILES['anhkhachsan']['name'];
                $anhkhachsan_tmp = $_FILES['anhkhachsan']['tmp_name'];
                move_uploaded_file($anhkhachsan_tmp, '../upload/img'.$anh_khach_san);

                updateKhachSan($id,$tenkhachsan,$anh_khach_san,$sdtkhachsan,$diachi);                
            }
            $listKhachSan = loadKhachSan();

            include "khachsan/list.php";
            break;
            
        case 'deletekhachsan':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                deleteKhachSan();
            }
            $listKhachSan = loadKhachSan();

            include "khachsan/list.php";
            break;
        // quản lí phòng
        case 'quanliphong':
           
            $listPhong = loadPhong();
            include "phong/list.php";
            break;

        case 'addphong':
            if(isset($_POST['themmoi']) && $_POST['themmoi']) {
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
                $ngaydatphong = $_POST['ngaydatphong'];
                $ngaytraphong = $_POST['ngaytraphong'];

                $id_khach_san = $_POST['id_khach_san'];
                
                $img = $_FILES['anhphong']['name'];
                $img_tmp = $_FILES['anhphong']['tmp_name'];
                move_uploaded_file($img_tmp, '../upload/img'.$img);
                
                $mota = $_POST['mota'];
                $succhua = $_POST['succhua'];
                $idloaiphong = $_POST['id_loaiphong'];

                insertPhong($tenphong,$giaphong,$ngaydatphong,$ngaytraphong,$img,$mota,$succhua,$idloaiphong,$id_khach_san); 
                $thongbao = "<h4>Thêm thành công</h4>";

            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            $listPhong = loadPhong();
            include "phong/add.php";
            break;

        case 'deletephong':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) {
                deletephong();
            }
            $listPhong = loadPhong();
            include "phong/list.php";
            break;

        case 'updatephong':
            if(isset($_GET['id']) && ($_GET['id'] > 0)) { 
                $phong = loadOnePhong();
            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            include "phong/update.php";
            break;
    
        case 'capnhatphong':
            if(isset($_POST['capnhat']) && $_POST['capnhat']) {
                $tenphong = $_POST['tenphong'];
                $giaphong = $_POST['giaphong'];
                $ngaydatphong = $_POST['ngaydatphong'];
                $ngaytraphong = $_POST['ngaytraphong'];

                
                $img = $_FILES['anhphong']['name'];
                $img_tmp = $_FILES['anhphong']['tmp_name'];
                move_uploaded_file($img_tmp, '../upload/img'.$img);
                
                $id = $_POST['id'];
                $mota = $_POST['mota'];
                $succhua = $_POST['succhua'];
                $id_loaiphong = $_POST['id_loaiphong'];
                $id_khach_san = $_POST['id_khach_san'];

                updatePhong($id,$tenphong,$giaphong,$ngaydatphong,$ngaytraphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san);
                $thongbao = "<h4>Thêm thành công</h4>";
            }
            $listkhachsan = loadKhachSan();
            $listLoaiPhong = loadLoaiphong();
            $listPhong = loadPhong();
            include "phong/list.php";
            break;
            // quản lí người dùng
            case 'quanlinguoidung':
                $listTaiKhoan = loadAllTaiKhoan();
                include "taikhoan/list.php";
                break;
            case 'quanlibinhluan':
                $listBinhLuan = loadAllBinhLuan();
                include "binhluan/list.php";
                break;
            case 'quanlinhantraphong':
                $loadCheckInOutRoom = loadCheckInOutRoom();
                include "booking/list.php";
                break;
            case 'quanlinhantraphong':
                $listBieuDo = loadThongKe();
                include "bieudo/bieudo.php";
                break;
             
                    

        default:
            include "home.php";
            break;
    }
} else {
    include "home.php";
}

include "home.php";
include "footer.php";
?>