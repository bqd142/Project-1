<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Origato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/origato/View/CSS/navbar.css">
    <link rel="icon" href="Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
</head>
<body>
<?php
include("navbar.php");
?>
<?php if (isset($_SESSION['alert' . $lang])): ?>
    <?php $alert = $_SESSION['alert' . $lang]; ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "<?= $alert['title'] ?>",
                icon: "<?= $alert['icon'] ?>"
            });
        });
    </script>
    <?php unset($_SESSION['alertvi'], $_SESSION['alertjp']); ?>
<?php endif; ?>
    <div class="container mt-5">
        <form method="post" action="../Control/dathang.php">  
            <div class="row">
            <div class="col-4" style="color:#EC1618;font-weight: 600;border-right: 2px solid gray;">
                <h4 > <i style="color:#4D372E;" class="bi bi-1-circle-fill"></i><?= $lang_data["thanhtoan-tthd"] ?></h4>
                <div class="d-flex"> 
                    <div style="display: inline-block; width: 200px;margin-top: 10px;">
                    <?= $lang_data["thanhtoan-ten"] ?> <input type="text" class="form-control" name="txtten">
                    </div>
                    <div style="display: inline-block;width: 200px;margin-left: 27px;margin-top: 10px;">
                    <?= $lang_data["thanhtoan-ho"] ?> <input type="text" class="form-control" name="txtho">
                    </div>
                </div>
                <div style="margin-top: 10px;">
                <?= $lang_data["thanhtoan-diachi"] ?> <input type="text" class="form-control" name="txtdiachi">
                </div>
                <div  style="margin-top: 10px;">
                <?= $lang_data["thanhtoan-sdt"] ?> <input type="text" class="form-control" name="txtsdt">
                </div>
                <div  style="margin-top: 10px;">
                <?= $lang_data["thanhtoan-ngay"] ?> <input type="text" class="form-control" name="txttime">
                </div>
                <div  style="margin-top: 10px;">
                <?= $lang_data["thanhtoan-nd"] ?> <textarea name="txtloichuc" class="form-control" rows="4"> </textarea>
                </div>
            </div>
            <div class="col-4" style="color:#EC1618;font-weight: 600;">
                <h4  style="text-align: center;"> <i style="color:#4D372E;" class="bi bi-2-circle-fill"></i><?= $lang_data["thanhtoan-pttt"] ?></h4>
                <p style="color: #4D372E;width: 300px;margin-left: 75px;border-bottom: 2px solid gray;"><?= $lang_data["thanhtoan-xacnhan"] ?></p>
            </div>
            <div class="col-4" style="color:#EC1618;font-weight: 600;border-left: 2px solid gray;">
                <h4 > <i style="color:#4D372E;" class="bi bi-3-circle-fill"></i><?= $lang_data["thanhtoan-tt"] ?></h4>
                <table class="table">
                    <tr>
                        <th><?= $lang_data["thanhtoan-sp"] ?></th>
                        <th><?= $lang_data["thanhtoan-tong"] ?></th>
                    </tr>
                    <?php
                      
                        include("../Model/product.php");

                        $cart = new cart();
                        $product = new product();
                        $user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();
                        $sl_cart = $cart->sl_cart_user($user_identify);
                        $total = 0;
                        foreach($sl_cart as $row){
                            $sl_pro = $product->select_id_lang($row['product_id'], $lang);
                            $sl_pro = $sl_pro->fetch_assoc();
                    ?>
                    <tr>
                        <td><?php echo $sl_pro['tensp'] ?> x <?php echo $row['Soluong']?></td>
                        <td>
                            <?php 
                                if ($lang == "vi") {
                                    echo $sl_pro['gia'] . " VNĐ";
                                } else if ($lang == "jp") {
                                    echo round($sl_pro['gia'] / 180) . " ¥";
                                }
                            ?>
                        </td>
                        <?php $sum = $sl_pro['gia'] * $row['Soluong']; 
                            $total+=$sum;
                        ?>
                    </tr>
                    <?php
                        }
                    ?>
                    <tr>
                        <td><?= $lang_data["thanhtoan-tamtinh"] ?> </td>
                        <td>
                        <?php 
                            if ($lang == "vi") {
                                echo $total . " VNĐ";
                            } else if ($lang == "jp") {
                                echo round($total / 180) . " ¥";
                            }
                        ?>
                        </td>
                    </tr>
                    <tr>
                        <td><?= $lang_data["thanhtoan-tong"] ?> </td>
                        <td style="color:red; font-size:23px"> 
                        <?php 
                            if ($lang == "vi") {
                                echo $total . " VNĐ";
                            } else if ($lang == "jp") {
                                echo round($total / 180) . " ¥";
                            }
                        ?>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <input type="text" name="cart_id" class="form-control" value="<?php echo $row['cart_id']; ?>" style="display: none;">
                        <td colspan="2"><button type="submit" class="btn btn-secondary" name="txtsub"><?= $lang_data["thanhtoan-dathang"] ?></button> </td>
                    </tr>
                </table>
            </div>
            </div>
        </form>
    </div>
    <?php
include("footer.php");
?>
    
</body>
</html>