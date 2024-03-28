<?php 
    function insertBinhLuan($noidung_binhluan,$id_taikhoan,$id_phong,$ngaybinhluan) {
        $sql = "INSERT INTO binhluan(noidung_binhluan,id_taikhoan,id_phong,ngay_binhluan) 
        VALUES ('$noidung_binhluan','$id_taikhoan','$id_phong','$ngaybinhluan')";
        pdo_execute($sql);
    }
    function loadBinhLuan($id_phong) {
        $sql = "SELECT * FROM binhluan JOIN taikhoan ON binhluan.id_taikhoan = taikhoan.id_taikhoan WHERE id_phong = '".$id_phong."' ORDER BY id_binhluan DESC";
        $listbinhLuan = pdo_query($sql);
        return $listbinhLuan;
    }

    function loadAllBinhLuan() {
        $sql = "SELECT * FROM binhluan 
        JOIN taikhoan ON binhluan.id_taikhoan = taikhoan.id_taikhoan
        JOIN phong ON binhluan.id_phong = phong.id_phong";
        $listbinhLuan = pdo_query($sql);
        return $listbinhLuan;
    }


    // function loadDaComment($id_taikhoan) {
    //     $sql = "SELECT * FROM vai_tro WHERE id_taikhoan = '$id_taikhoan'";
    //     $dacomment = pdo_query($sql);
    //     return $dacomment;
    // }
    // function danhdaucomment($id_taikhoan) {
    //     $sql = "INSERT INTO da_comment (id_taikhoan) VALUES ($id_taikhoan)";
    //     pdo_execute($sql);
    // }

    function countBinhLuan() {
        $sql = "SELECT COUNT(noidung_binhluan) FROM binhluan WHERE noidung_binhluan IS NOT NULL AND noidung_binhluan <> ''";
        $countBinhLuan = pdo_query($sql);
        return $countBinhLuan;
    }

?>