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
    <style>
        .table-ttdh {
            width: 100%;
            border-collapse: collapse;
            background-color: #FFF5D7;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            margin: 20px 0;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-ttdh th, .table-ttdh td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #e0e0e0;
            text-align: center;
        }

        .table-ttdh th {
            background-color: #dc3545;
            color: #FFF;
            font-weight: bold;
            text-transform: uppercase;
        }

        .table-ttdh tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .table-ttdh tr:hover {
            background-color: #ffe4e1;
            transition: background-color 0.3s ease;
        }

        .table-ttdh td {
            color: #555;
        }

        .table-ttdh .status {
            font-weight: bold;
            color: #dc3545;
            text-align: center;
        }

        .table-ttdh .status.completed {
            color: #28a745;
        }

        .table-ttdh .status.pending {
            color: #ffc107;
        }

        .table-ttdh .status.cancelled {
            color: #6c757d;
        }
    </style>
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
<table class="table-ttdh" style="width: 1100px; margin: 100px auto;">
    <tr>
        <th colspan="9" style="text-align:center;"><?= $lang_data["thongtindonhang"] ?></th>
    </tr>
    <?php 
        include("../Model/order.php");
        $user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();
        $select = new order();
        $order_inf = $select->order_infor_idkh($user_identify);
    ?>
    <tr>
        <th><?= $lang_data["thongtindonhang-hoten"] ?></th>
        <th><?= $lang_data["thongtindonhang-diachi"] ?></th>
        <th><?= $lang_data["thongtindonhang-sdt"] ?></th>
        <th><?= $lang_data["thongtindonhang-ngay"] ?></th>
        <th><?= $lang_data["thongtindonhang-loichuc"] ?></th>
        <th><?= $lang_data["thongtindonhang-tongtien"] ?></th>
        <th><?= $lang_data["thongtindonhang-thoigiandathang"] ?></th>
        <th><?= $lang_data["thongtindonhang-trangthai"] ?></th>
        <th><?= $lang_data["thongtindonhang-chitiet"] ?></th>
    </tr>
    <?php foreach($order_inf as $row){ ?>

    <tr>
        <td><?php echo $row['hoten'] ?></td>
        <td><?php echo $row['diachi'] ?></td>
        <td><?php echo $row['sdt'] ?></td>
        <td><?php echo $row['ngaynhan'] ?></td>
        <td><?php echo $row['loichuc'] ?></td>
        <td><?php echo $row['TongTien'] ?></td>
        <td><?php echo $row['Time'] ?></td>
        <td><?php echo $row['trangthai'] ?></td>
        <td> 
            <a href="order_infor.php?id=<?php echo$row['id_donhang']?>" class="btn btn-danger btn-sm">
            <?= $lang_data["admin-ql_donhang-ct1"] ?>
            </a> 
        </td>
    </tr>
    <?php } ?>
</table>
<?php
include("footer.php");
?>
</body>
</html>