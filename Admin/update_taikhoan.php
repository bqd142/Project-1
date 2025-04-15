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
            <?php
    include("../Model/account.php");
    $id = $_GET['id'];
    $model = new data_account();
    $infor = $model->sl_id($id);
    $infor = $infor->fetch_assoc(); 
  ?>
    <div class="container" style="margin-bottom: 100px;">
        <form method="post" action="../Control/update_account.php" enctype="multipart/form-data"> 
            <div class="row mt-5">
                <div class="offset-1 col-4">
                    <h4>HÌNH ĐẠI DIỆN</h4>
                    <img class="rounded" width="165px" height="165px" src="../upload/<?php echo$infor['avatar'];?>">
                </div>
                <div class="col-7 lh-lg" >
                    <h4>THÔNG TIN CÁ NHÂN</h4>
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        EMAIL:
                        <input type="text" class="form-control mb-3" name="txtemail" value="<?php echo$infor['email'];?>"> 
                        PASSWORD:
                        <input type="text" class="form-control mb-3" name="txtpass" value="<?php echo$infor['pass'];?>"> 
                        ADDRESS:
                        <input type="textarea" class="form-control mb-3" name="txtaddress" value="<?php echo$infor['address'];?>"> 
                        AVATAR:
                        <input type="file" class="form-control mb-3" name="txtavatar">
                        GENDER:
                        <select class="form-control" name="txtgender">
                            <option value="Male" <?php if ($infor['gender'] == 'Male') echo 'selected'; ?>>Male</option>
                            <option value="Female" <?php if ($infor['gender'] == 'Female') echo 'selected'; ?>>Female</option>
                            <option value="Other" <?php if ($infor['gender'] == 'Other') echo 'selected'; ?>>Other</option>
                        </select>
                        HOBBY:
                        <textarea name="txthobby" class="form-control"> <?php echo$infor['hobby'];?></textarea>
                </div>
                <div class="row d-flex justify-content-center mt-5">
                <button name="txtupdate_id"  type="submit" style="width: 100px;" class="btn btn-dark">Cập Nhật</button>
                <input type="text" name="txtid" value=<?php echo$id; ?> style="display: none;">
            </div>
            </div>
        </form>
    </div>
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
