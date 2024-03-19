<?php 
include "../client/header.php";

include "../models/pdo.php";
include "../models/danhmuc.php";
include "../models/phong.php";
include "../global.php";


$rooms = load_phong_home();
$danhMucPhong = loadLoaiPhong();

if(isset($_GET['act']) && $_GET['act'] != "") {
    $act = $_GET['act'];
    switch($act) {
        // quản lí danh mục phòng
        case 'phong':
            $listPhong = loadPhong(); 
            include "..client/phong.php";
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