<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Responsive Bootstrap Advance Admin Template</title>
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
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">ORIGATO</a>
            </div>

            <div class="header-right">
                <a href="message-task.html" class="btn btn-info" title="New Message"><b>30 </b><i class="fa fa-envelope-o fa-2x"></i></a>
                <a href="message-task.html" class="btn btn-primary" title="New Task"><b>40 </b><i class="fa fa-bars fa-2x"></i></a>
                <a href="login.html" class="btn btn-danger" title="Logout"><i class="fa fa-exclamation-circle fa-2x"></i></a>
            </div>
        </nav>
        <!-- /. NAV TOP  -->
        <?php include "navbar.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner" >
                <div style=" border: 2px solid black; padding-bot:50px;">
        <h3 style="text-align: center ; margin-top: 60px;"> Thêm sản phẩm</h3>
        <form method="post" style="width: 700px; margin: 0 auto; " action="../Control/insert_pro.php" enctype="multipart/form-data"> 
        
        <label for="tensp" class="form-label">Danh Mục sản phẩm</label>
        <select class="form-control" name="txtdanhmuc"  >
            <option value="Bánh sinh nhật Mousse - Phomat - Tiramisu ">Bánh sinh nhật Mousse - Phomat - Tiramisu </option>
            <option value="Bánh sinh nhật kem tươi - Socola">Bánh sinh nhật kem tươi - Socola</option>
            <option value="Bánh sinh nhật Bento cake">Bánh sinh nhật Bento cake</option>
            <option value="Mini Cake">Mini Cake</option>
            <option value="Bánh sinh nhật Bé gái">Bánh sinh nhật Bé gái </option>
            <option value="Bánh sinh nhật Bé trai">Bánh sinh nhật Bé trai</option>
            <option value="Bánh mì dinh dưỡng">Bánh mì dinh dưỡng</option>
            <option value="Bánh mì pizza">Bánh mì pizza</option>
            <option value="Cookies - Macaroon">Cookies - Macaroon</option>
        </select>
        <div class="mb-3 mt-3">
            <label for="tensp" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="tensp" placeholder="Nhập tên sản phẩm" name="txtten">
        </div>
        <div class="mb-3 mt-3">
            <label for="tp" class="form-label">Thành phần</label>
            <input type="text" class="form-control" id="tp" placeholder="Nhập thành phần" name="txtthanhphan">
        </div>
        <div class="mb-3 mt-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" placeholder="Nhập Giá" name="txtgia">
        </div>
        <div class="mb-3 mt-3">
            <label for="ha" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="ha" placeholder="Chọn Hình ảnh" name="txthinhanh">
        </div>
        <div class="mb-3 mt-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="txtmota">
            </textarea>
        </div>
        <button type="submit" class="btn btn-dark" name="txtsub" style="margin-left: 300px;">Thêm sản phẩm</button>
    </form>
    <a href="#" style="font-size:35px; color:blue"> <i class="bi bi-facebook"></i></a> 
              <a href="#" style="font-size:35px; color:brown"> <i class="bi bi-instagram"></i> </a>
              <a href="#" style="font-size:35px; color:brown"> <i class="bi bi-youtube"></i> </a>

            </div>
        </div>


    
    
    
    
    <script src="assets/js/jquery-1.10.2.js"></script>
    <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/jquery.metisMenu.js"></script>
    <script src="assets/js/custom.js"></script>
    


</body>
</html>
