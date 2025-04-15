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
                                include('../Model/account.php');
                                $model=new data_account();
                                $select=$model->select();
                            ?>
                                 <table class="table table-striped table-bordered table-hover" style="margin-top: 100px;">
                                    <thead>
                                        <tr>
                                            <th><?= $lang_data["admin-qltk-tk"] ?></th>
                                            <th><?= $lang_data["admin-qltk-mk"] ?></th>
                                            <th><?= $lang_data["admin-qltk-type"] ?></th>
                                            <th><?= $lang_data["admin-qltk-dc"] ?></th>
                                            <th><?= $lang_data["admin-qltk-gt"] ?></th>
                                            <th><?= $lang_data["admin-qltk-st"] ?></th>
                                            <th><?= $lang_data["admin-qltk-mail"] ?></th>
                                            <th><?= $lang_data["admin-qltk-avt"] ?></th>
                                            <th colspan="2"><?= $lang_data["admin-qltk-hd"] ?></th>
                                        </tr>
                                    </thead>                               
                                    <tbody>
                                    <?php foreach($select as $row){ ?>
                                            <tr>
                                                <td><?php echo $row['username'] ?></td>
                                                <td><?php echo $row['pass'] ?></td>
                                                <td><?php echo $row['type'] ?></td>
                                                <td><?php echo $row['address'] ?></td>
                                                <td><?php echo $row['gender'] ?></td>
                                                <td><?php echo $row['hobby'] ?></td>
                                                <td><?php echo $row['email'] ?></td>
                                                <td><img src="../upload/<?php echo $row['avatar']?>" width="100px" height="100px" ></td>
                                                <td><a href="../Control/delete_account.php?id=<?php echo $row['id_user']?>"
                                                         onClick="if(confirm('Bạn có chắc chắn xóa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-qltk-xoa"] ?></td>
                                                <td><a href="update_taikhoan.php?id=<?php echo $row['id_user']?>"
                                                         onClick="if(confirm('Bạn có muốn sửa')) return true; 
                                                                   else return false;"><?= $lang_data["admin-qltk-sua"] ?></td>
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
