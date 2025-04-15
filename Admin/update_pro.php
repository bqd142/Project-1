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
        
        <?php 
            include "navbar.php"; 
            include "../Model/product.php"; 
            $id = $_GET['up'];
            $model = new product();
            $sl = $model->select_id($id);
            $sl = $sl->fetch_assoc();
        ?>
        <div id="page-wrapper">
            <div id="page-inner" >
                <div style=" border: 2px solid black; padding-bot:50px;">
        <h3 style="text-align: center ; margin-top: 60px;"> Sửa thông tin sản phẩm</h3>
        <form method="post" style="width: 700px; margin: 0 auto; " action="../Control/update_pro.php" enctype="multipart/form-data"> 
        
        <label for="tensp" class="form-label">Danh Mục sản phẩm</label>
        <select class="form-control" name="txtdanhmuc">
            <option value="Bánh sinh nhật Mousse - Phomat - Tiramisu " <?php if ($sl['danhmuc'] == 'Bánh sinh nhật Mousse - Phomat - Tiramisu ') echo 'selected'; ?>>Bánh sinh nhật Mousse - Phomat - Tiramisu </option>
            <option value="Bánh sinh nhật kem tươi - Socola" <?php if ($sl['danhmuc'] == 'Bánh sinh nhật kem tươi - Socola') echo 'selected'; ?>>Bánh sinh nhật kem tươi - Socola</option>
            <option value="Bánh sinh nhật Bento cake" <?php if ($sl['danhmuc'] == 'Bánh sinh nhật Bento cake') echo 'selected'; ?>>Bánh sinh nhật Bento cake</option>
            <option value="Mini Cake" <?php if ($sl['danhmuc'] == 'Mini Cake') echo 'selected'; ?>>Mini Cake</option>
            <option value="Bánh sinh nhật Bé gái" <?php if ($sl['danhmuc'] == 'Bánh sinh nhật Bé gái ') echo 'selected'; ?>>Bánh sinh nhật Bé gái </option>
            <option value="Bánh sinh nhật Bé trai" <?php if ($sl['danhmuc'] == 'Bánh sinh nhật Bé trai') echo 'selected'; ?>>Bánh sinh nhật Bé trai</option>
            <option value="Bánh mì dinh dưỡng" <?php if ($sl['danhmuc'] == 'Bánh mì dinh dưỡng') echo 'selected'; ?>>Bánh mì dinh dưỡng</option>
            <option value="Bánh mì pizza" <?php if ($sl['danhmuc'] == 'Bánh mì pizza') echo 'selected'; ?>>Bánh mì pizza</option>
            <option value="Cookies - Macaroon" <?php if ($sl['danhmuc'] == 'Cookies - Macaroon') echo 'selected'; ?>>Cookies - Macaroon</option>
        </select>
        <div class="mb-3 mt-3">
            <label for="tensp" class="form-label">Tên sản phẩm</label>
            <input type="text" class="form-control" id="tensp" placeholder="Nhập tên sản phẩm" name="txtten"  value="<?php echo $sl['tensp']?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="tp" class="form-label">Thành phần</label>
            <input type="text" class="form-control" id="tp" placeholder="Nhập thành phần" name="txtthanhphan" value="<?php echo $sl['thanhphan']?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="gia" class="form-label">Giá</label>
            <input type="number" class="form-control" id="gia" placeholder="Nhập Giá" name="txtgia" value="<?php echo $sl['gia']?>">
        </div>
        <div class="mb-3 mt-3">
            <label for="ha" class="form-label">Hình Ảnh</label>
            <input type="file" class="form-control" id="ha" placeholder="Chọn Hình ảnh" name="txthinhanh">
        </div>
        <div class="mb-3 mt-3">
            <label for="mota" class="form-label">Mô tả</label>
            <textarea class="form-control" id="mota" name="txtmota">
                <?php echo $sl['mota']?>
            </textarea>
        </div>
        <input type="text" name="txtid" value=<?php echo$id; ?> style="display: none;">
        <button type="submit" class="btn btn-dark" name="txtupdate" style="margin-left:300px;margin-top:20px;">Sửa</button>
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
