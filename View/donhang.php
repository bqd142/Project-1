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
    <table class="table">
        <tr>
            <th>Mã đơn hàng</th>
            <th>Họ tên</th>
            <th>Địa chỉ</th>
            <th>Số điện thoại</th>
            <th>Ngày nhận</th>
            <th>Lời chúc</th>
            <th>Trạng thái  </th>
            <th>chi tiết đơn hàng</th>
            <th>Hành động </th>
        </tr>
        <?php 
            include("../Model/order.php");
            $model = new order();
            $sl = $model->sl_order();
            foreach($sl as $row){
        ?>
        <tr>
            <td> <?php echo$row['id_donhang'] ?> </td>
            <td> <?php echo$row['hoten'] ?> </td>
            <td> <?php echo$row['diachi'] ?> </td>
            <td> <?php echo$row['sdt'] ?> </td>
            <td> <?php echo$row['ngaynhan'] ?> </td>
            <td> <?php echo$row['loichuc'] ?> </td>
            <td> <?php echo$row['trangthai']?> </td>
            <td> <a href="chitietdonhang.php?id=<?php echo$row['id_donhang'] ?>"> Chi tiết </a> </td>
            <td> <button type="button" class="btn btn-success">XÁC NHẬN</button> </td>

        </tr>
        <?php
            }
        ?>
    </table>
</body>
</html>