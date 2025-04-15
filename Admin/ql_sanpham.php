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
                <div class="col-md-6" style="width: 100%">
                  <!--   Kitchen Sink -->
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="table-responsive">
                            <?php
                                include('../Model/product.php');
                                $model=new product();
                                $select=$model->select_lang($lang);
                            ?>
                                <table class="table table-striped table-bordered table-hover" style="margin-top: 100px;">
                                    <thead>
                                        <tr>
                                            <th><?= $lang_data["admin-sanpham-sp1"] ?></th>
                                            <th style="width: 120px;"><?= $lang_data["admin-sanpham-sp2"] ?></th>
                                            <th><?= $lang_data["admin-sanpham-sp3"] ?></th>
                                            <th><?= $lang_data["admin-sanpham-sp4"] ?></th>
                                            <th><?= $lang_data["admin-sanpham-sp5"] ?></th>
                                            <th><?= $lang_data["admin-sanpham-sp6"] ?></th>
                                            <th colspan="2"><?= $lang_data["admin-sanpham-sp7"] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($select as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['danhmuc'] ?></td>
                                                <td><?php echo $row['tensp'] ?></td>
                                                <td><?php echo $row['thanhphan'] ?></td>
                                                <td><?php echo $row['gia'] ?></td>
                                                <td><img src="../upload/<?php echo $row['hinhanh'] ?>" width="200px" height="200px" ></td>
                                                <td><?php echo $row['mota'] ?></td>
                                                <td><a href="../Control/delete_pro.php?del=<?php echo $row['product_id']?>"
                                                         onClick="if(confirm('Bạn có chắc chắn xóa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-sanpham-sp8"] ?></td>
                                                <td><a href="update_pro.php?up=<?php echo $row['product_id']?>"
                                                         onClick="if(confirm('Bạn có muốn sửa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-sanpham-sp9"] ?></td>
                                            </tr>
                                    <?php } ?>
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
                    </div>
                     <!-- End  Kitchen Sink -->
                </div>
                <!-- /. ROW  -->

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
