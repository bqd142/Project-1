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
    <style>
        .noidung-gioihan {
            display: -webkit-box;
            -webkit-line-clamp: 5;       /* Số dòng tối đa */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .content-limit {
        display: -webkit-box;
        -webkit-line-clamp: 8;
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;

        font-size: 16px;         /* giảm một chút nếu đang lớn */
        line-height: 1.4;        /* đảm bảo mỗi dòng không quá cao */
        max-height: calc(1.4em * 8);  /* giới hạn chiều cao tương ứng 8 dòng */
    }
        
    </style>
</head>
<body>
<?php
include("navbar.php");
?>
    
       <!--slideshow--> 
    <div id="demo" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
          <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="Media/slideshow1.png" alt="Los Angeles" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="Media/slideshow2.png" alt="Chicago" class="d-block w-100">
          </div>
          <div class="carousel-item">
            <img src="Media/slideshow3.png" alt="New York" class="d-block w-100">
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
          <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
          <span class="carousel-control-next-icon"></span>
        </button>
    </div>
    <div style="background-color:#fff8ed;">
    <!--input-group--> 
<?php
if(isset($_POST['txtsub'])){
    echo "<script>
            window.location.href = 'find.php?select=".$_POST['txtfind']."';
           </script>";  
}
?>
    <?php
        include ("../Model/product.php");
        $model = new product();
    ?>
    <div style="background-color: aliceblue;" class="pb-3"> <!--bánh trung thu--> 
        <h3 class="text-center pt-5 pt-4 text-danger"><?= $lang_data["homepage-danhmuc1"] ?></h3>
        <div class="container mt-5">
            
        <div class="row">
            <?php
                $model = new product();
                if($lang == 'vi'){
                $sl = $model->select_danhmuc_lang("Bánh trung thu", "vi");
            }
            else{
                $sl = $model->select_danhmuc_lang("月餅", "jp");
            }
                $count = 0;
                foreach($sl as $row){ 
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
        <a type="button" href="banhtrungthu.php" class="btn btn-danger d-flex justify-content-center mx-auto mt-4 " style="width: 150px;"><?= $lang_data["homepage-xemthem"] ?></a>
    </div>
    <div class="pb-3"> <!--bánh sinh nhật--> 
    <h3 class="text-center pt-4 text-danger pb-3" style="text-transform: uppercase;"><?= $lang_data["homepage-danhmuc2"] ?></h3>
    <div class="container mt-5">
    <div class="row" >
            <?php
            $model = new product();
            if($lang == 'vi'){
                $sl = $model->select_danhmuc_lang("Bánh sinh nhật Mousse - Phomat - Tiramisu ", "vi");
            }
            else{
                $sl = $model->select_danhmuc_lang("バースデームースケーキ - チーズ - ティラミス", "jp");
            }
            $count = 0;
            foreach($sl as $row){ 
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
    <a href="mouse.php" type="button" class="btn btn-danger   d-flex justify-content-center mx-auto mt-4" style="width: 150px;"><?= $lang_data["homepage-xemthem"] ?></a>
    <div style="height : 25px">&nbsp; </div>
    <div> 
    </div>
    <div style="background-color: aliceblue;" class="pb-3"> <!--Bánh sinh nhật kem tươi-scl--> 
        <h3 class="text-center pt-4 text-danger"><?= $lang_data["homepage-danhmuc3"] ?></h3>
        <div class="container mt-5">
        <div class="row">
            <?php
                $model = new product();
                if($lang == 'vi'){
                    $sl = $model->select_danhmuc_lang("Bánh sinh nhật kem tươi - Socola", "vi");
                }
                else{
                    $sl = $model->select_danhmuc_lang("ホイップクリームチョコレートバースデーケーキ", "jp");
                }
                $count = 0;
                foreach($sl as $row){ 
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
        <a href="kemtuoi-scl.php" type="button" class="btn btn-danger d-flex justify-content-center mx-auto mt-4 mb-3" style="width: 150px;"><?= $lang_data["homepage-xemthem"] ?></a> 
        </div>
        
    <div> <!--Mini Cake--> 
        <h3 class="text-center mt-5 text-danger"><?= $lang_data["homepage-danhmuc4"] ?></h3>
        <div class="container mt-5">
        <div class="row">
            <?php
                $model = new product();
                if($lang == 'vi'){
                    $sl = $model->select_danhmuc_lang("Mini Cake", "vi");
                }
                else{
                    $sl = $model->select_danhmuc_lang("ミニケーキ", "jp");
                }
                $count = 0;
                foreach($sl as $row){ 
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
        <a href="minicake.php" type="button" class="btn btn-danger   d-flex justify-content-center mx-auto mt-4 mb-3" style="width: 150px;"><?= $lang_data["homepage-xemthem"] ?></a>
        <div style="height : 25px">&nbsp; </div>
    </div>
    <?php
        include("../Model/posts.php");
        $post = new post();
        $km = $post->sl_theloai_lang('Tin Khuyến Mãi', $lang); 
        $cuahangmoi = $post->sl_theloai_lang('Cửa Hàng Mới', $lang);    
    ?>

    <div class="container mt-5 pb-5"> <!--khuyến mãi--> 
        <div class="row">
            <div  class="col-6" >
                <h4 class="text-danger text-fw-bold mb-3"><?= $lang_data["homepage-km"] ?></h4>
                <?php foreach ($km as $row) { ?>
                <a  href="baivietchitiet.php?id=<?php echo $row['id']; ?>#start_view" style="text-decoration: none;" class="text-dark">
                    <img src="../upload/<?php echo $row['Hinh_anh']; ?>" alt="abc" class="float-start" style="width:35%; padding-right: 10px; marin-top: 20px;">
                    <div> 
                        <a href="#" style="text-decoration: none;" class="text-muted"><h5><?php $row['Tieude'] ?></h5></a>
                        <p class="text-danger"><i class="fa-regular fa-calendar-days"></i> 5/7/2024 &nbsp; <i class="fa-regular fa-eye"></i> 142 </p>
                        <P style="margin-top: -12px; text-align: justify;" class="noidung-gioihan" ><?php echo$row['Noidung']; ?></P> 
                    </div>
                </a>     
                <?php } ?>
            </div>
            <div  class="col-6" >
                <h4 class="text-danger text-fw-bold mb-3"><?= $lang_data["homepage-cuahangmoi"] ?></h4>
                <?php foreach ($cuahangmoi as $row) { ?>
                <a  href="baivietchitiet.php?id=<?php echo $row['id']; ?>#start_view" style="text-decoration: none;" class="text-dark">
                    <img src="../upload/<?php echo $row['Hinh_anh']; ?>" alt="abc" class="float-start" style="width:35%; padding-right: 10px; marin-top: 20px;">
                    <div> 
                        <a href="#" style="text-decoration: none;" class="text-muted"><h5><?php $row['Tieude'] ?></h5></a>
                        <p class="text-danger"><i class="fa-regular fa-calendar-days"></i> 5/7/2024 &nbsp; <i class="fa-regular fa-eye"></i> 142 </p>
                        <P style="margin-top: -12px; text-align: justify;" class="noidung-gioihan" ><?php echo$row['Noidung']; ?></P> 
                    </div>
                </a>      
                <?php } ?>
            </div>
        </div>
    </div>
    </div>
<?php
include("footer.php");
?>
</body>
</html>