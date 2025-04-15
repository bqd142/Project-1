<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <!--CUSTOM BASIC STYLES-->
    <link href="assets/css/basic.css" rel="stylesheet" />
    <!--CUSTOM MAIN STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
    <link rel="stylesheet" href="http://localhost/origato/Admin/navbar.css">
</head>
<body>
<div id="wrapper">
        <!-- /. NAV TOP  -->
        <?php include "navbar.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner">
            <div class="row">
            <table class="table table-striped table-bordered table-hover" style="text-align: center;margin-top: 100px;">
            <thead>
                <tr class="table-dark" >
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-madh"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-hoten"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-dc"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-sdt"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-ngay"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-loichuc"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-tg"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-trangthai"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-ct"] ?></th>
                    <th style="text-align: center;"><?= $lang_data["admin-ql_donhang-hanhdong"] ?></th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include("../Model/order.php");
                    $model = new order();
                    $sl = $model->sl_order();
                    foreach($sl as $row){
                ?>
                <tr>
                    <td style="text-align: center;"> <?php echo$row['id_donhang'] ?> </td>
                    <td> <?php echo$row['hoten'] ?> </td>
                    <td> <?php echo$row['diachi'] ?> </td>
                    <td> <?php echo$row['sdt'] ?> </td>
                    <td> <?php echo$row['ngaynhan'] ?> </td>
                    <td> <?php echo$row['loichuc'] ?> </td>
                    <td> <?php echo$row['Time'] ?> </td>
                    <?php 
                        if($lang == 'vi'){
                                                    
                    ?>
                    <td>
                        <span class="badge 
                            <?php 
                                if($row['trangthai'] == 'Chờ xác nhận') echo 'bg-warning';
                                else if($row['trangthai'] == 'Đang vận chuyển') echo 'bg-primary';
                                else echo 'bg-success';
                            ?>">
                            <?php echo$row['trangthai'] ?>
                        </span>
                    </td>
                    <?php
                        }
                        else{
                    ?>
                    <td>
                        <span class="badge 
                            <?php 
                                if($row['trangthai'] == 'Chờ xác nhận') echo 'bg-warning';
                                else if($row['trangthai'] == 'Đang vận chuyển') echo 'bg-primary';
                                else echo 'bg-success';
                            ?>">
                            <?php 
                                if($row['trangthai'] == 'Chờ xác nhận') echo"確認待ち";
                                if($row['trangthai'] == 'Đang vận chuyển') echo"輸送中";
                                if($row['trangthai'] == 'Hoàn thành') echo"完了";

                            ?>
                        </span>
                    </td>
                    <?php } ?>
                    <td> 
                        <a href="chitietdonhang.php?id=<?php echo$row['id_donhang']?>" class="btn btn-info btn-sm">
                        <?= $lang_data["admin-ql_donhang-ct1"] ?>
                        </a> 
                    </td>
                    <td> 
                        <a href="../Control/update_tt.php?id=<?php echo$row['id_donhang'] ?>" class="btn btn-sm 
                            <?php 
                                if($row['trangthai'] == 'Chờ xác nhận') echo 'btn-warning';
                                else if($row['trangthai'] == 'Đang vận chuyển') echo 'btn-success';
                                else echo 'btn-secondary';
                            ?>">
                            <?php
    if($row['trangthai'] == 'Chờ xác nhận'){
        echo $lang_data["admin-ql_donhang-xacnhan"];
    }
    else if($row['trangthai'] == 'Đang vận chuyển') {
        echo $lang_data["admin-ql_donhang-hoanthanh"];
    }
    else {
        echo $lang_data["admin-ql_donhang-daht"];
    }
?>

                        </a> 
                    </td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    <!-- /. WRAPPER  -->
    <div id="footer-sec">
        &copy; 2014 YourCompany | Design By : <a href="http://www.binarytheme.com/" target="_blank">BinaryTheme.com</a>
    </div>
    <!-- /. FOOTER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.js"></script>
     <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
    <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>


</body>
</html>






