<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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
?>

<table class="table table-dark table-striped" style="width: 900px; margin: 100px auto;">
    <tr>
        <th colspan="7" style="text-align:center;">THÔNG TIN ĐƠN HÀNG</th>
    </tr>
    <?php 
        include("../Model/order.php");
        $select = new order();
        $order_inf = $select->order_infor_idkh(session_id());
        // $order_inf = $order_inf->fetch_assoc();
    ?>
    <tr>
        <th>Họ tên</th>
        <th>Địa chỉ</th>
        <th>số điện thoại</th>
        <th>Ngày nhận</th>
        <th>Lời chúc</th>
        <th>Tổng tiền</th>
        <th>Trạng thái</th>
    </tr>
    <?php foreach($order_inf as $row){ ?>

    <tr>
        <td><?php echo $row['hoten'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['sdt'] ?></td>
        <td><?php echo $row['ngaynhan'] ?></td>
        <td><?php echo $row['loichuc'] ?></td>
        <td><?php echo $row['TongTien'] ?></td>
        <td><?php echo $row['trangthai'] ?></td>
    </tr>
    <?php } ?>

</table>




<?php
include("footer.php");
?>
</body>
</html>