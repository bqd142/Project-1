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
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <?php if (isset($_SESSION['alert' . $lang])): ?>
    <?php $alert = $_SESSION['alert' . $lang]; ?>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "<?= $alert['title'] ?>",
                icon: "<?= $alert['icon'] ?>"
            });
        });
    </script>
    <?php unset($_SESSION['alertvi'], $_SESSION['alertjp']); ?>
    <?php endif; ?>
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <a id="start_view"></a>
    <?php
    include("../Model/product.php");
    $id = $_GET['id'];
    $model = new product();
    $sl_id = $model->select_id_lang($id,$lang);
    $sl_id = $sl_id->fetch_assoc();
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-5">
                <img width="90%" src="../upload/<?php echo $sl_id['hinhanh'];?>">
            </div>
            <div class="col-6">
                <h2 style="color: brown; font-weight: 650;"> <?php echo $sl_id['tensp']; ?> </h2>
                <p><?= $lang_data["chitietsp-ma"] ?></p>
                <span><?= $lang_data["chitietsp-danhmuc"] ?></span> <span style="color:red ;">  <?php echo $sl_id['danhmuc']; ?></span>
                <hr style="width: 100%;">
                <p style="font-size: 25px; font-weight: 700; color:red;">  
                    <?php 
                        if ($lang == "vi") {
                            echo $sl_id['gia'] . " VNĐ";
                        } else if ($lang == "jp") {
                            echo round($sl_id['gia'] / 180) . " ¥";
                        }
                    ?>
                </p>
                <p class="mt-3"><?= $lang_data["chitietsp-thanhphan"] ?><?php echo $sl_id['thanhphan']; ?> </p>
                <p><?= $lang_data["chitietsp-luachon1"] ?></p>
                <p><?= $lang_data["chitietsp-luachon2"] ?></p>
                <p><?= $lang_data["chitietsp-hotline"] ?></p>
                <form method="post" action="../Control/add_cart.php">
                <div class="input-group mb-3" style="width: 250px;">
                    <input type="text" name="id_pro" class="form-control" value="<?php echo $sl_id['product_id']; ?>" style="display: none;">
                    <input type="number" name="txtsl" class="form-control" value="1" min="1" style="width: 40px;">
                    <button class="btn btn-outline-danger" type="submit" name="txtsub"><?= $lang_data["chitietsp-them"] ?></button>
                </div>
                </form>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;font-weight: 370;">
        <hr style="width: 100%;">
        <h4><?= $lang_data["chitietsp-mota"] ?></h4>
        <p> <?php echo $sl_id['mota']; ?></p>
        <p><?= $lang_data["chitietsp-mota1"] ?></p>
        <p><?= $lang_data["chitietsp-mota2"] ?></p>
        <p><?= $lang_data["chitietsp-mota3"] ?></p>
        <p><?= $lang_data["chitietsp-mota4"] ?></p>
        <span><?= $lang_data["chitietsp-mota5"] ?></span> <a href="https://origato.com.vn/danh-muc-san-pham/phu-kien/" style="text-decoration: none; color: red;">https://origato.com.vn/danh-muc-san-pham/phu-kien/</a> <p></p>
        <p><?= $lang_data["chitietsp-mota6"] ?></p>
    </div>
    <div class="container" style="margin-top: 40px;font-weight: 370;">
        <hr style="width: 100%;">
        <h4><?= $lang_data["chitietsp-lienquan"] ?></h4>
        <?php
            $danhmuc = $model->sl_danhmuc($id);
            $sl = $model->select_notin_id($sl_id['danhmuc'],$id);
            $count = 0;
        ?>
        <div class="container mt-5">
            <div class="row">
                <?php foreach($sl as $row){ 
                    $count++;
                ?>
                    <div class="col-3">
                        <a href="chitietsanpham.php?id=<?php echo $row['product_id'];?>#start_view" class="d-flex justify-content-center" style="text-decoration: none;">
                            <div  class="card card-hover" style="width:250px; border: 0;">
                                <img class="card-img-top" src="../upload/<?php echo$row['hinhanh'];?>">
                                <div class="card-body">
                                    <h5 style="min-height: 48px;" class="card-title text-center text-muted"><?php echo $row['tensp'] ?></h5>
                                    <p class="text-center d-block text-muted h6 my-4">
                                        <?php 
                                            if ($lang == "vi") {
                                                echo $row['gia'] . " VNĐ";
                                            } else if ($lang == "jp") {
                                                echo round($row['gia'] / 180) . " ¥";
                                            }
                                        ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php
                
            if($count == 4) break;
            }
                ?>
        
            </div>
        </div>
    </div>
<?php
include ("footer.php");
?>
</body>
</html>