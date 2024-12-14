<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Origato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="icon" href="Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php
include("navbar.php");
include("../Model/cart.php");
include("../Model/product.php");

$cart = new cart();
$product = new product();
$sl_cart = $cart->sl_cart_id(session_id());
$total = 0;
?>
    <div class="container"  style="margin-top: 120px;" >
    <table class="table" width="800px">
        <tr>
            <th></th>
            <th style="width: 500px;">SẢN PHẨM</th>
            <th style="width: 550px;">GÍA</th>
            <th style="width: 550px;">SỐ LƯỢNG</th>
            <th style="width: 600px;text-align:right;">TỔNG</th>
        </tr>
        <?php
            foreach($sl_cart as $row){
                $sl_pro = $product->select_id($row['product_id']);
                $sl_pro = $sl_pro->fetch_assoc();
        ?>
        <tr>
            <td><img class="rounded" width="100px" height="100px" src="../upload/<?php echo$sl_pro['hinhanh'];?>"> </td>
            <td><?php echo $sl_pro['tensp'] ?></td>
            <td><?php echo $sl_pro['gia'] ?></td>
            <form method="post">
            <td><input type="number" class="form-control" name="txtsl[<?= $row['cart_id'] ?>]" style="width:70px;" min="0" value="<?php echo $row['Soluong'] ?>"></td>
            <?php $sum = $sl_pro['gia'] * $row['Soluong']; 
                $total+=$sum;
            ?>
            <td style="text-align:right;"><?php echo $sum ?> đ</td>
        </tr>
        
        <?php
            }
        ?>
        
        <tr>
            <td colspan="4" style="font-size:22px; color:red;font-weight: 600;"> Tổng </td>
            <td style="font-size:22px;color:red;font-weight: 600; text-align:right;"> <?php echo $total ?> đ</td>
        </tr>
        <tr>
        <td colspan="5"> <button type="submit" name="txtupdate" style="height:40px; width:200px; float: right;" class="btn btn-outline-danger"> Cập nhật giỏ hàng</button> </td>
        </tr>
        <tr>
            <td colspan="3"> </td>
            <td colspan="2"> <button class="btn btn-danger" name="txtsub" style="height:60px; width:280px; margin-top: 20px;float:right;">
        Thanh toán
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