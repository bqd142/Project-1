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

include("../Model/product.php");

$cart = new cart();
$product = new product();

$user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();

$sl_cart = $cart->sl_cart_user($user_identify);
$total = 0;
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

    <div class="container"  style="margin-top: 120px;" >
    <table class="table" width="800px">
        <tr>
            <th></th>
            <th style="width: 500px;"><?= $lang_data["cart-sp"] ?></th>
            <th style="width: 550px;"><?= $lang_data["cart-gia"] ?></th>
            <th style="width: 550px;"><?= $lang_data["cart-sl"] ?></th>
            <th style="width: 600px;text-align:right;"><?= $lang_data["cart-tong1"] ?></th>
        </tr>
        <?php
            foreach($sl_cart as $row){
                $sl_pro = $product->select_id_lang($row['product_id'], $lang);
                $sl_pro = $sl_pro->fetch_assoc();
        ?>
        <tr>
            <td><img class="rounded" width="100px" height="100px" src="../upload/<?php echo$sl_pro['hinhanh'];?>"> </td>
            <td><?php echo $sl_pro['tensp'] ?></td>
            <td>
                <?php 
                    if ($lang == "vi") {
                        echo $sl_pro['gia'] . " VNĐ";
                    } else if ($lang == "jp") {
                        echo round($sl_pro['gia'] / 180) . " ¥";
                    }
                ?>
            </td>
            <form method="post">
            <td><input type="number" class="form-control" name="txtsl[<?= $row['cart_id'] ?>]" style="width:70px;" min="0" value="<?php echo $row['Soluong'] ?>"></td>
            <?php $sum = $sl_pro['gia'] * $row['Soluong']; 
                $total+=$sum;
            ?>
            <td style="text-align:right;">
                <?php 
                    if ($lang == "vi") {
                        echo $sum . " VNĐ";
                    } else if ($lang == "jp") {
                        echo round($sum / 180) . " ¥";
                    }
                ?>
            </td>
        </tr>
        
        <?php
            }
        ?>
        
        <tr>
            <td colspan="4" style="font-size:22px; color:red;font-weight: 600;"> <?= $lang_data["cart-tong2"] ?> </td>
            <td style="font-size:22px;color:red;font-weight: 600; text-align:right;">
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
        <td colspan="5"> <button type="submit" name="txtupdate" style="height:40px; width:200px; float: right;" class="btn btn-outline-danger"><?= $lang_data["cart-capnhat"] ?></button> </td>
        </tr>
        <tr>
            <td colspan="3"> </td>
            <td colspan="2"> <button class="btn btn-danger" name="txtsub" style="height:60px; width:280px; margin-top: 20px;float:right;">
            <?= $lang_data["cart-thanhtoan"] ?>
        </button> </td>
        </tr>
        </form>
    </table>
</div>
<?php
if (isset($_POST['txtsub'])) {
    if ($total == 0) {
        echo "<script>alert('Đơn hàng trống');</script>";
    } else {
        echo "<script>window.location.href = 'thanhtoan.php';</script>";
    }
}
include("../Control/update_cart.php");
?>
<?php
include("footer.php");
?>
</body>
</html>