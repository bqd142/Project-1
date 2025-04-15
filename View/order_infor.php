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
            width: 90%;
            margin: 30px auto;
            border-collapse: collapse;
            background-color: #FFF5D7;
            font-family: Arial, sans-serif;
            font-size: 14px;
            color: #333;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .table-ttdh th, .table-ttdh td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #e0e0e0;
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

        .table-ttdh td img {
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .table-ttdh .total-row th {
            background-color: #dc3545;
            color: #FFF;
            font-size: 16px;
            font-weight: bold;
        }

        .table-ttdh .total-row .tong {
            font-size: 16px;
            font-weight: bold;
            color: #dc3545;
        }
        .table-ttdh .no-hover:hover {
            background-color: inherit !important;
            transition: none !important;
        }
    </style>
</head>
<body>
<?php
    include("navbar.php");
?>
<?php
include("../Model/order.php");
$id = $_GET['id'];
$order = new order();
$data = $order->chitietdonhang($id, $lang);
?>
<table class="table-ttdh" style="margin-top: 80px;margin-bottom: 200px;">
    <thead>
        <tr>
            <th colspan="9"><?= $lang_data["chitietdonhang-tieude"] ?></th>
        </tr>
        <tr>
            <th><?= $lang_data["chitietdonhang-hinh"] ?></th>
            <th><?= $lang_data["chitietdonhang-ten"] ?></th>
            <th><?= $lang_data["chitietdonhang-dongia"] ?></th>
            <th><?= $lang_data["chitietdonhang-sl"] ?></th>
            <th><?= $lang_data["chitietdonhang-thanhtien"] ?></th>
            <th><?= $lang_data["chitietdonhang-diachi"] ?></th>
            <th><?= $lang_data["chitietdonhang-sdt"] ?></th>
            <th><?= $lang_data["chitietdonhang-ngaynhan"] ?></th>
            <th><?= $lang_data["chitietdonhang-thoigian"] ?></th>
        </tr>
    </thead>
    <tbody>
    <?php 
    $tong = 0;
    foreach ($data as $row) { 
        $thanhtien = $row['gia'] * $row['Soluong'];
        $tong += $thanhtien;
    ?>
        <tr>
            <td><img src="../upload/<?php echo $row['hinhanh']; ?>" width="80"></td>
            <td><?php echo $row['tensp']; ?></td>
            <td>
                <?php 
                if($lang == 'vi') echo ($row['gia'])."VNĐ"; 
                if($lang == 'jp') echo round($row['gia']/180)."¥";
                ?> 
        
        
            </td>
            <td><?php echo $row['Soluong']; ?></td>
            <td>
                <?php 
                
                if($lang == 'vi') echo $thanhtien."VNĐ"; 
                if($lang == 'jp') echo round($thanhtien/180)."¥";
            
                ?> 
            </td>
            <td><?php echo $row['diachi']; ?></td>
            <td><?php echo $row['sdt']; ?></td>
            <td><?php echo $row['ngaynhan']; ?></td>
            <td><?php echo $row['Time']; ?></td>
        </tr>
    <?php } ?>
    </tbody>
    <tfoot>
        <tr class="total-row">
            <th colspan="4"><?= $lang_data["chitietdonhang-tongtien"] ?>:</th>
            <td colspan="1" class="tong">
                <?php 
                 if($lang == 'vi') echo $tong."VNĐ"; 
                 if($lang == 'jp') echo round($tong/180)."¥";
                ?> 
            
            </td>
            <td colspan="4" class="no-hover"> <a class="btn btn-danger" href="thongtindonhang.php"><?= $lang_data["chitietdonhang-ql"] ?> </a> </td>
        </tr>
    </tfoot>
</table>


<?php
include("footer.php");
?>
</body>
</html>