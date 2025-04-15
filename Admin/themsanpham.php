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
    
        <?php include "navbar.php"; ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper">
            <div id="page-inner" >
                <div style=" border: 2px solid black;margin-top: 100px;">
                <form action="../Control/insert_pro.php" method="POST" enctype="multipart/form-data" class="p-3" style="background-color: #eeeeee;padding: 40px; ">
                    <h3 style="text-align: center ; "> <?= $lang_data["admin-themsanpham-tieude"] ?></h3>
                    <div class="mb-3">
                    <label for="tensp" class="form-label"><?= $lang_data["admin-themsanpham-danhmuc"] ?></label>
                    <select class="form-control" name="txtdanhmuc"  >
                        <option value="Bánh sinh nhật Mousse - Phomat - Tiramisu "><?= $lang_data["admin-themsanpham-danhmuc1"] ?></option>
                        <option value="Bánh sinh nhật kem tươi - Socola"><?= $lang_data["admin-themsanpham-danhmuc2"] ?></option>
                        <option value="Bánh sinh nhật Bento cake"><?= $lang_data["admin-themsanpham-danhmuc3"] ?></option>
                        <option value="Mini Cake"><?= $lang_data["admin-themsanpham-danhmuc4"] ?></option>
                        <option value="Bánh sinh nhật Bé gái"><?= $lang_data["admin-themsanpham-danhmuc5"] ?></option>
                        <option value="Bánh sinh nhật Bé trai"><?= $lang_data["admin-themsanpham-danhmuc6"] ?></option>
                        <option value="Bánh mì dinh dưỡng"><?= $lang_data["admin-themsanpham-danhmuc7"] ?></option>
                        <option value="Bánh mì pizza"><?= $lang_data["admin-themsanpham-danhmuc8"] ?></option>
                        <option value="Cookies - Macaroon"><?= $lang_data["admin-themsanpham-danhmuc"] ?>9</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="txthinh" class="form-label"><strong><?= $lang_data["admin-themsanpham-hinh"] ?></strong></label>
                    <input type="file" class="form-control" id="txthinh" name="txthinhanh">
                </div>
                <div class="mb-3 mt-3">
                        <label for="gia" class="form-label"><?= $lang_data["admin-themsanpham-gia"] ?></label>
                        <input type="number" class="form-control" id="gia" placeholder="<?= $lang_data["admin-themsanpham-gia1"] ?>" name="txtgia">
                </div>
                <!-- Tiếng Việt -->
                <div style="border: 1px solid #ccc; padding: 20px; margin-top: 20px;background-color: #d1ecf1;">
                    <legend class="w-auto px-2"><?= $lang_data["admin-themsanpham-noidungvi"] ?></legend>

                    <div class="mb-3 mt-3">
                        <label for="tensp" class="form-label"><?= $lang_data["admin-themsanpham-ten"] ?></label>
                        <input type="text" class="form-control" id="tensp" placeholder="<?= $lang_data["admin-themsanpham-ten1"] ?>" name="txtten_vi">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="tp" class="form-label"><?= $lang_data["admin-themsanpham-thanhphan"] ?></label>
                        <input type="text" class="form-control" id="tp" placeholder="<?= $lang_data["admin-themsanpham-thanhphan1"] ?>" name="txtthanhphan_vi">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="mota" class="form-label"><?= $lang_data["admin-themsanpham-mota"] ?></label>
                        <textarea class="form-control" id="mota" name="txtmota_vi" placeholder="<?= $lang_data["admin-themsanpham-mota1"] ?>"></textarea>
                        </textarea>
                    </div>
                </div>

                <!-- 日本語 -->
                <div  style="border: 1px solid #ccc; padding: 20px; margin-top: 20px;background-color: #f8d7da;">
                    <legend class="w-auto px-2"><?= $lang_data["admin-themsanpham-noidungjp"] ?></legend>

                    <div class="mb-3 mt-3">
                        <label for="tensp" class="form-label"><?= $lang_data["admin-themsanpham-ten"] ?></label>
                        <input type="text" class="form-control" id="tensp" placeholder="<?= $lang_data["admin-themsanpham-ten1"] ?>" name="txtten_jp">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="tp" class="form-label"><?= $lang_data["admin-themsanpham-thanhphan"] ?></label>
                        <input type="text" class="form-control" id="tp" placeholder="<?= $lang_data["admin-themsanpham-thanhphan1"] ?>" name="txtthanhphan_jp">
                    </div>
                    <div class="mb-3 mt-3">
                        <label for="mota" class="form-label"><?= $lang_data["admin-themsanpham-mota"] ?></label>
                        <textarea class="form-control" id="mota" name="txtmota_jp" placeholder="<?= $lang_data["admin-themsanpham-mota1"] ?>"></textarea>
                        </textarea>
                    </div>
                </div>

                <button type="submit" name="txtsub" class="btn btn-success" style="margin-left: 522px; margin-top: 20px;"><?= $lang_data["admin-themsanpham-them"] ?></button>
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
