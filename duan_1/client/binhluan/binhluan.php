<?php 
    SESSION_START();
    include "../../models/binhluan.php";
    include "../../models/pdo.php";

    $id_phong = $_REQUEST['id_phong'];
    $id_taikhoan = $_SESSION['user_taikhoan']['id_taikhoan'];

    $listbinhLuan = loadBinhLuan($id_phong);
    $countBinhLuan = countBinhLuan();
    

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bình luận</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<style>
.comment-text table {
    width: 100%;
}

.comment-text table tr td:nth-child(1) {
    width: 20%;
}
.comment-text table tr td:nth-child(2) {
    width: 50%;
}
.comment-text table tr td:nth-child(3) {
    width: 30%;
}

.container-comment {
    border: 1px solid #DCDCDC;
}
.comment ul {
    padding: 0;
    border-bottom: 1px solid #DCDCDC;
    width: 100%;
}
.comment ul li {
    display: inline-block;
    list-style: none;
    padding: 5px 5px;
}



#comment {
    width: 100%;
    border: 1px solid #DCDCDC;
    border-radius: 5px;
    margin-top: 10px;
    transition: border-color 0.3s, box-shadow 0.3s; 
}

#comment:focus {
    outline: none;
    border-color: #5cb85c; 
    box-shadow: 0 0 5px rgba(92, 184, 92, 0.5); 
}
</style>
<body>
<div class="container container-comment">
    <div class="comment">
        <ul>
            <li>Mô tả</li>
            <?php 
                foreach ($countBinhLuan as $binhLuan) {
                    extract($binhLuan);
                    echo '<li>Đánh giá('.$binhLuan[0].')</li>';
                }
            ?>
            
        </ul>
        
            
        <div class="comment-text">
            <table>
            <?php 
                    foreach ($listbinhLuan as $binhLuan) {
                        extract($binhLuan);
                            echo '
                            <tr>
                                <td>'.$user_taikhoan.'</td>
                                <td>'.$noidung_binhluan.'</td>
                                <td>'.$ngay_binhluan.'</td>
                            </tr>
                        
                        ';
                        
                    }
                ?>
            </table>
        </div>
    </div>
    <form action="<?=$_SERVER['PHP_SELF'];?>" method="POST">
        <input type="hidden" name="id_phong" value="<?=$id_phong?>">
        <input type="hidden" name="id_taikhoan"value="<?=$id_taikhoan?>" >
        <input type="text" name="noidung_binhluan" id="comment">
        <input type="submit" name="guibinhluan" value="Bình luận">
    </form>
</div>
<?php
    if(isset($_POST['guibinhluan']) && $_POST['guibinhluan']) {
        $id_phong = $_POST['id_phong'];
        $noidung_binhluan = $_POST['noidung_binhluan'];
        $ngaybinhluan = date('Y-m-d H:i:s');
        $id_taikhoan = $_SESSION['user_taikhoan']['id_taikhoan'];
    
        insertBinhLuan($noidung_binhluan,$id_taikhoan,$id_phong,$ngaybinhluan);
        header("Location: ". $_SERVER['HTTP_REFERER']);
        exit;
        // if(!hasCommented($id_taikhoan)) {
        //     insertBinhLuan($noidung_binhluan, $id_taikhoan, $id_phong,$ngaybinhluan);
        //     updateCommentStatus($id_taikhoan);
        //     header("Location: " . $_SERVER['HTTP_REFERER']);
        //     exit;
        // } else {
        //     echo "Tài khoản của bạn đã bình luận trước đó.";
        // }

    }

    ?>
    
</body>
</html>