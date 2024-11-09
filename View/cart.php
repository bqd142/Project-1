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
    <table class="table">
        <tr>
            <th></th>
            <th style="width: 400px;">Sản Phẩm</th>
            <th style="width: 450px;">Giá</th>
            <th style="width: 450px;">Số lượng</th>
            <th style="width: 500px;">Tổng</th>
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
            <td><?php echo $row['Soluong'] ?></td>
            <?php $sum = $sl_pro['gia'] * $row['Soluong']; 
                $total+=$sum;
            ?>
            <td><?php echo $sum ?> đ</td>
        </tr>
        <?php
            }
        ?>
        <tr>
            <td colspan="4" style="font-size:22px; color:red;font-weight: 600;"> Tổng </td>
            <td style="font-size:22px;color:red;font-weight: 600;"> <?php echo $total ?> đ</td>
        </tr>
        <form method="post">
        <tr>
            <td colspan="3"> </td>
            <td colspan="2"> <button class="btn btn-danger" name="txtsub" style="height:40px; width:150px; margin-left:300px;margin-top: 20px;">
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
        echo "<script>window.location.href = '../View/thanhtoan.php';</script>";
    }
}
?>
<?php
include("footer.php");
?>
</body>
</html>