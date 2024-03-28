<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="scss/pay.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="themicon/themify-icons-font/themify-icons/themify-icons.css">
    <script src="js/bootstrap.bundle.min.js"></script>
</head>

<style>
p {
    margin: 0;
}
</style>

<body>
    <section class="section-content container d-flex justifly-content-between">

        <div class="main">
            <div class="main-header">
                <a class="logo" href="">
                    <h2>Moko Furturne</h2>
                </a>
                <ul>
                    <li class="breadcrumb"><a href="">Giỏ hàng</a><i class="chervon-icons fa fa-chevron-right"
                            aria-hidden="true"></i></li>
                    <li class="shipping">Thông tin vận chuyển<i class="chervon-icons fa fa-chevron-right"
                            aria-hidden="true"></i></li>
                    <li class="payments-method">Phương thức thanh toán</li>
                </ul>
            </div>
            <div class="main-content">
                <div class="step">
                    <div class="step-section">
                        <div class="section-header">
                            <h2>Thông tin thanh toán</h2>
                        </div>
                        <div class="sections-form">
                            <div class="section-text">
                                <p> Bạn có tài khoản chưa?
                                    <!-- <a href="index.php?act=dangnhap">Đăng nhập</a> -->
                                </p>
                            </div>
                            <div class="main">
                                <?php 
                                if(isset($_SESSION['user_taikhoan'])) {
                                    $name = $_SESSION['user_taikhoan']['user_taikhoan'];
                                    $email = $_SESSION['user_taikhoan']['email_taikhoan'];
                                    $address = $_SESSION['user_taikhoan']['address'];
                                    $phone = $_SESSION['user_taikhoan']['tell_taikhoan'];

                                } else {
                                    $name = "";
                                    $email = "";
                                    $address = "";
                                    $phone = "";
                                    
                                }
                                
                                ?>
                                <form action="index.php?act=billconfirm" method="POST" class="form" id="form-1">
                                    <div class="form-group">
                                        <label for="fullname" class="form-label">Họ và tên:</label>
                                        <input id="fullname" name="fullname" value="<?=$name?>" type="text"
                                            placeholder="Họ và tên" class="form-control">
                                        <span class="form-message"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="email" class="form-label">Email:</label>
                                        <input id="email" name="email" type="text" value="<?=$email?>"
                                            placeholder="Email" class="form-control">
                                        <span class="form-message"></span>
                                    </div>

                                    <div class="form-group">
                                        <label for="text" class="form-label">Số điện thoại:</label>
                                        <input id="number" name="tell_taikhoan" type="text" value="<?=$phone?>"
                                            placeholder="Số điện thoại" class="form-control">
                                        <span class="form-message"></span>
                                    </div>

                                    <a href="index.php?act=backgroundcart">Giỏ hàng</a>
                                    <a href=""><input type="submit" value="Thanh toán" name="dongydathang"></a>
                                </form>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="side-bar">
            <table class="product-table">
                <thead>
                    <tr>
                        <th><span class="visual-hiden">Hình ảnh</span></th>
                        <th><span class="visual-hiden"></span></th>
                        <th><span class="visual-hiden">Số lượng</span></th>
                        <th><span class="visual-hiden">Giá</span></th>
                    </tr>
                </thead>

                <?php 
                         $tong = 0;
                         $i = 0;
                         foreach ($_SESSION['cart'] as $cart) {
                            $tong += $cart[3];
                            $image = $imgPath.$cart[2];
                 
                             echo '
                             <tbody>
                                <td>
                                    <div class="thumb">
                                        <img src="'.$image.'" alt="">
                                        <span class="product-thumb">2</span>
                                    </div>
                                </td>
                                <td class="product-text">
                                    <span>'.$cart[1].'</span>
                                    <p>'.$cart[4].'</p>
                                    <p>'.$cart[5].'</p>
                                    <p>Ngày nhận phòng: ' .$cart[6].'</p>
                                    <p>Ngày trả phòng: ' .$cart[7].'</p>
                                </td>
                                <td class="product-price"><span>$'.$cart[3].'</span></td>
                                </tbody>

                             '; $i += 1;
                             
                 
                         }
                    
                    ?>

            </table>
            <hr>
            <div class="order">
                <form action="">
                    <div class="form-group">
                        <input id="text-sale" name="text-sale" type="text" placeholder="Mã giảm giá" class="text-sale">
                        <span><button class="submit">Sử dụng</button></span>
                    </div>
                </form>
            </div>
            <hr>
            <div class="total-title">
                <table>
                    <thead>
                        <tr>
                            <td>Tạm tính:</td>
                            <td><span><?php echo '$'.$tong ?></span></td>
                        </tr>
                        <tr>
                            <td>Phí ship:</td>
                            <td><span>-</span></td>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tổng tiền</td>
                            <td><span><?php echo '$'.$tong ?></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>

        </div>
    </section>
    <!-- <script src="pay.js"></script>
    <script>
    validate({
        form: "#form-1",
        formGroup: ".form-group",
        errorSelector: '.form-message',
        rules: [
            validate.isRequired("#fullname"),
            validate.isRequired("#password_confirmation"),
            validate.isRequired("#number"),
        ],
        onSubmit: function(data) {
            console.log(data);
        }
    });
    </script> -->
</body>

</html>