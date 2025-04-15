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
                                include('../Model/posts.php');
                                $model=new post();
                                $select=$model->sl_post_lang($lang);
                            ?>
                                <table class="table table-striped table-bordered table-hover" style="margin-top: 100px;">
                                    <thead>
                                        <tr>
                                            <th style="width:120px;"><?= $lang_data["admin-baiviet-tieude1"] ?></th>
                                            <th><?= $lang_data["admin-baiviet-tieude2"] ?></th>
                                            <th><?= $lang_data["admin-baiviet-tieude3"] ?></th>
                                            <th><?= $lang_data["admin-baiviet-tieude4"] ?></th>
                                            <th><?= $lang_data["admin-baiviet-tieude5"] ?></th>
                                            <th colspan="2"><?= $lang_data["admin-baiviet-tieude6"] ?></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach($select as $row){ ?>
                                            <tr>
                                                <td>
                                                    <?php 
                                                        if($lang =='jp'){
                                                            if($row['TheLoai'] == 'Tin Công Ty') echo '会社のニュース';
                                                            else if($row['TheLoai'] == 'Cửa Hàng Mới') echo '新しい店舗';
                                                            else if($row['TheLoai'] == 'Tin Khuyến Mãi') echo 'プロモーションニュース';
                                                            else if($row['TheLoai'] == 'Tin Tuyển Dụng') echo '求人情報';
                                                        }
                                                        else echo $row['TheLoai']; ?>
                                                </td>
                                                <td><?php echo $row['Tieude'] ?></td>
                                                <td><?php echo $row['Ngay_tao'] ?></td>
                                                <td><?php echo mb_substr($row['Noidung'], 0, 300) . '...'; ?></td>
                                                <td><img src="../upload/<?php echo $row['Hinh_anh'] ?>" width="200px" height="200px" ></td>
                                                <td><a href="#"
                                                         onClick="if(confirm('Bạn có chắc chắn xóa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-baiviet-tieude7"] ?></td>
                                                <td><a href="#"
                                                         onClick="if(confirm('Bạn có muốn sửa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-baiviet-tieude8"] ?></td>
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
