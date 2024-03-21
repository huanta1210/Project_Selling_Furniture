<?php 

function loadPhong() {
    $sql = "SELECT * FROM phong JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong";
    $listPhong = pdo_query("$sql");
    return $listPhong;
}


function insertPhong($tenphong,$giaphong,$ngaydatphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san) {
    $sql = "INSERT INTO phong(name,price,ngay_dat_phong,img,mo_ta,suc_chua,id_loaiphong,id_khach_san) VALUES ('$tenphong','$giaphong','$ngaydatphong','$img','$mota','$succhua','$id_loaiphong','$id_khach_san')";
    pdo_execute($sql);
}

function deletephong() {
    $id = $_GET['id'];
    $sql = "DELETE FROM phong WHERE id_phong = '$id'";
    pdo_execute($sql);
}

function loadOnePhong() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM phong WHERE id_phong = '$id'";
    $phong = pdo_query_one($sql);
    return $phong;
}

function updatePhong($id,$tenphong,$giaphong,$ngaydatphong,$img,$mota,$succhua,$id_loaiphong,$id_khach_san) {
    if($img != "") {
        $sql ="UPDATE phong SET name ='$tenphong', price ='$giaphong', ngay_dat_phong ='$ngaydatphong', img ='$img', mo_ta ='$mota', suc_chua ='$succhua', id_loaiphong ='$id_loaiphong', id_khach_san = '$id_khach_san' WHERE id_phong = '$id'";
    } else {
        $sql ="UPDATE phong SET name ='$tenphong', price ='$giaphong', ngay_dat_phong ='$ngaydatphong', mo_ta ='$mota', suc_chua ='$succhua', id_loaiphong ='$id_loaiphong', id_khach_san = '$id_khach_san' WHERE id_phong = '$id'";
    }
    pdo_execute($sql);
}


function load_phong_home() {
    $sql ="SELECT * FROM phong";        
    $listPhong = pdo_query($sql);
    return $listPhong;
}

function load_One_Phong() {
    $id = $_GET['idphong'];
    $sql = "SELECT * FROM phong JOIN loai_phong ON phong.id_loaiphong = loai_phong.id_loaiphong
    JOIN khach_san ON phong.id_khach_san = khach_san.id_khach_san WHERE id_phong = '$id'";
    $phong = pdo_query_one($sql);
    return $phong;
}

function load_phong($kyw="",$id_loaiphong=0) {
    $sql ="SELECT * FROM phong WHERE 1";
    if($kyw != "") {
        $sql.=" AND name LIKE '%".$kyw."%' "; 
    }
    if($id_loaiphong > 0) {
        $sql.=" AND id_loaiphong ='".$id_loaiphong."'"; 
    }
    $sql.=" ORDER BY id_phong DESC ";
    $listLoaiPhong = pdo_query($sql);
    return $listLoaiPhong;
}







?>