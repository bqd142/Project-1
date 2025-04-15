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
            <div id="page-inner" >
            <div style=" border: 2px solid black;margin-top: 100px;">
    <form action="../Control/add_post.php" method="POST" enctype="multipart/form-data" class="p-3" style="background-color: #eeeeee;padding: 40px; ">
        <h3 style="text-align: center ; "> <?= $lang_data["admin-thembaiviet-tieude"] ?></h3>
        <div class="mb-3">
        <label for="theloai" class="form-label"><strong><?= $lang_data["admin-thembaiviet-theloai"] ?></strong></label>
        <select class="form-control" name="txttheloai" id="theloai">
            <option value="Tin Công Ty"><?= $lang_data["admin-thembaiviet-theloai1"] ?></option>
            <option value="Tin Tuyển Dụng"><?= $lang_data["admin-thembaiviet-theloai2"] ?></option>
        </select>
        </div>
        <div class="mb-3">
            <label for="txthinh" class="form-label"><strong><?= $lang_data["admin-thembaiviet-hinh"] ?></strong></label>
            <input type="file" class="form-control" id="txthinh" name="txthinh">
        </div>

    <!-- Tiếng Việt -->
        <div style="border: 1px solid #ccc; padding: 20px; margin-top: 20px;background-color: #d1ecf1;">
            <legend class="w-auto px-2"><?= $lang_data["admin-thembaiviet-ndvi"] ?></legend>

            <div class="mb-3">
                <label for="txtTieude_vi" class="form-label"><?= $lang_data["admin-thembaiviet-tieude1"] ?></label>
                <input type="text" class="form-control" id="Tieude_vi" name="Tieude_vi">
            </div>

            <div class="mb-3">
                <label for="Noidung_vi" class="form-label"><?= $lang_data["admin-thembaiviet-nd"] ?></label>
                <textarea class="form-control" id="Noidung_vi" name="Noidung_vi" rows="5" required></textarea>
            </div>
        </div>

    <!-- 日本語 -->
        <div  style="border: 1px solid #ccc; padding: 20px; margin-top: 20px;background-color: #f8d7da;">
            <legend class="w-auto px-2"><?= $lang_data["admin-thembaiviet-ndjp"] ?></legend>

            <div class="mb-3">
                <label for="Tieude_ja" class="form-label"><?= $lang_data["admin-thembaiviet-tieude1"] ?></label>
                <input type="text" class="form-control" id="Tieude_ja" name="Tieude_ja" required>
            </div>

            <div class="mb-3">
                <label for="Noidung_ja" class="form-label"><?= $lang_data["admin-thembaiviet-nd"] ?></label>
                <textarea class="form-control" id="Noidung_ja" name="Noidung_ja" rows="5" required></textarea>
            </div>
        </div>

        <button type="submit" name="txtadd" class="btn btn-success" style="margin-left: 522px; margin-top: 20px;"><?= $lang_data["admin-thembaiviet-them"] ?></button>
    </form>
</div>
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
