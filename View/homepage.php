<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Origato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="icon" href="Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php
include("navbar.php");
?>
    
       <!--slideshow--> 
    <div id="demo" class="carousel slide" data-bs-ride="carousel" style="margin-top: 35px;">
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

    <form method="post" > 
    <div class="container" style="padding-top: 80px;">
        <div class="row">
            <div class="col-5">
                <img style="margin-left: 30%;" src="Media/logo.png">
            </div>
            <div class="col-7">
                <div class="container" style="width: 800px;">
                    <div class="row">
                        <div class="col-md-5">
                            <form style="width: 320px">
                                <div class="input-group">
                                  <input type="text" class="form-control" placeholder="Tìm kiếm..." name="txtfind">
                                  <button type="submit" class="btn btn-outline-dark" name="txtsub"><i class="fa-solid fa-magnifying-glass"></i></button> 
                                </div>
                            </form>
                        </div>
                        <div class="col-md-7 fs-5">
                            <i class="fa-solid fa-phone"></i> &nbsp;&nbsp; 099999999-08888888
                        </div>
                    </div>
                </div>
            </div>    
        </div>
    </div>
    </form>
    <?php
        include ("../Model/product.php");
        $model = new product();
    ?>
    <div style="background-color: aliceblue;" class="pb-3"> <!--bánh trung thu--> 
        <h3 class="text-center mt-5 pt-4 text-danger">BÁNH TRUNG THU LẠNH 2024</h3>
        <div class="container mt-5">
            
        <div class="row">
            <?php
            $sl = $model->select_danhmuc("Bánh trung thu");
                $count = 0;
                foreach($sl as $row){ 
                    $count++;  
            ?>
                <div class="col-3">
                    <a href="chitietsanpham.php?id=<?php echo $row['id_product'];?>" class="d-flex justify-content-center" style="text-decoration: none;">
                        <div  class="card card-hover" style="width:250px; border: 0;">
                            <img class="card-img-top" src="../upload/<?php echo$row['hinhanh'];?>">
                            <div class="card-body">
                                <h5 class="card-title text-center text-muted"><?php echo $row['tensp'] ?></h5>
                                <p class="text-center d-block text-muted h6 my-4"><?php echo $row['gia'] ?></p>
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
        <a type="button" href="banhtrungthu.php" class="btn btn-danger d-flex justify-content-center mx-auto mt-4 " style="width: 150px;">Xem thêm</a>
    </div>
    <div class="pb-3"> <!--bánh sinh nhật--> 
    <h3 class="text-center pt-4 text-danger pb-3" style="text-transform: uppercase;">Bánh sinh nhật Mousse-Phomat-Tiramisu</h3>
    <div class="container mt-5">
    <div class="row" >
            <?php
            $sl = $model->select_danhmuc("Bánh sinh nhật Mousse - Phomat - Tiramisu ");
                $count = 0;
                foreach($sl as $row){ 
                    $count++;  
            ?>
                <div class="col-3">
                    <a href="chitietsanpham.php?id=<?php echo $row['id_product'];?>" class="d-flex justify-content-center" style="text-decoration: none;">
                        <div  class="card card-hover" style="width:250px; border: 0;">
                            <img class="card-img-top" src="../upload/<?php echo$row['hinhanh'];?>">
                            <div class="card-body">
                                <h5 class="card-title text-center text-muted"><?php echo $row['tensp'] ?></h5>
                                <p class="text-center d-block text-muted h6 my-4"><?php echo $row['gia'] ?></p>
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
    <a href="mouse.php" type="button" class="btn btn-danger   d-flex justify-content-center mx-auto mt-4" style="width: 150px;">Xem thêm</a>
    <div style="height : 25px">&nbsp; </div>
    <div> 
    </div>
    <div style="background-color: aliceblue;" class="pb-3"> <!--Bánh sinh nhật kem tươi-scl--> 
        <h3 class="text-center pt-4 text-danger">Bánh sinh nhật kem tươi - Socola</h3>
        <div class="container mt-5">
        <div class="row">
            <?php
            $sl = $model->select_danhmuc("Bánh sinh nhật kem tươi - Socola");
                $count = 0;
                foreach($sl as $row){ 
                    $count++;  
            ?>
                <div class="col-3">
                    <a href="chitietsanpham.php?id=<?php echo $row['id_product'];?>" class="d-flex justify-content-center" style="text-decoration: none;">
                        <div  class="card card-hover" style="width:250px; border: 0;">
                            <img class="card-img-top" src="../upload/<?php echo$row['hinhanh'];?>">
                            <div class="card-body">
                                <h5 class="card-title text-center text-muted"><?php echo $row['tensp'] ?></h5>
                                <p class="text-center d-block text-muted h6 my-4"><?php echo $row['gia'] ?></p>
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
        <a href="kemtuoi-scl.php" type="button" class="btn btn-danger d-flex justify-content-center mx-auto mt-4 mb-3" style="width: 150px;">Xem thêm</a> 
        </div>
        
    <div> <!--Mini Cake--> 
        <h3 class="text-center mt-5 text-danger">MINI CAKE</h3>
        <div class="container mt-5">
        <div class="row">
            <?php
            $sl = $model->select_danhmuc("Mini Cake");
                $count = 0;
                foreach($sl as $row){ 
                    $count++;  
            ?>
                <div class="col-3">
                    <a href="chitietsanpham.php?id=<?php echo $row['id_product'];?>" class="d-flex justify-content-center" style="text-decoration: none;">
                        <div  class="card card-hover" style="width:250px; border: 0;">
                            <img class="card-img-top" src="../upload/<?php echo$row['hinhanh'];?>">
                            <div class="card-body">
                                <h5 class="card-title text-center text-muted"><?php echo $row['tensp'] ?></h5>
                                <p class="text-center d-block text-muted h6 my-4"><?php echo $row['gia'] ?></p>
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
        <a href="minicake.php" type="button" class="btn btn-danger   d-flex justify-content-center mx-auto mt-4 mb-3" style="width: 150px;">Xem thêm</a>
        <div style="height : 25px">&nbsp; </div>
    </div>
    <div class="container mt-5 pb-5"> <!--khuyến mãi--> 
        <div class="row">
            <div class="col-6" >
                <h4 class="text-danger text-fw-bold mb-3" >Khuyến mãi hot</h4>
                <img src="Media/kmpizza.jpg" alt="abc" class="float-start" style="width: 40%; padding-right: 20px;">
                    <div> 
                        <a href="#" style="text-decoration: none;" class="text-dark"><h4>PIZZA MUA 2 TẶNG 1: NGÔI NHÀ 'CHÉN' PIZZA NGON NHƯ Ở ROMA</h4></a>
                        <p class="text-danger"><i class="fa-regular fa-calendar-days"></i> 5/7/2024 &nbsp; <i class="fa-regular fa-eye"></i> 142 </p>
                        <P style="margin-top: -12px;" class="fs-4">Khuyến mãi pizza mua 2 tặng 1 đến hết ngày 25/09/2024. Những miếng pizza ngon chuẩn Ý đã sẵn sàng để chờ bạn rước về đó. Với những nguyên liệu cao cấp cùng 3 hương vị cực đỉnh: Xúc...</P> 
                    </div>
            </div>
            <div  class="col-6" >
                <h4 class="text-danger text-fw-bold mb-3">Cửa hàng mới</h4>
                <img src="Media/khaitruong1.jpg" alt="abc" class="float-start" style="width:25%; padding-right: 10px;">
                    <div> 
                        <a href="#" style="text-decoration: none;" class="text-muted"><h5>PIZZA MUA 2 TẶNG 1: NGÔI NHÀ 'CHÉN' PIZZA NGON NHƯ Ở ROMA</h5></a>
                        <p class="text-danger"><i class="fa-regular fa-calendar-days"></i> 5/7/2024 &nbsp; <i class="fa-regular fa-eye"></i> 142 </p>
                        <P style="margin-top: -12px;">Sáng nay 5/7/2024 cửa hàng Origato tại địa chỉ: Tầng 1 tòa CT4A2, Bắc Linh Đàm, phường Đại Kim, quận Hoàng Mai đã chính thức đi vào hoạt động... </P> 
                    </div>
                    
                    <img src="Media/khaitruong1.jpg" alt="abc" class="float-start" style="width:25%; padding-right: 10px;">
                        <div> 
                            <a href="#" style="text-decoration: none;" class="text-muted"><h5>PIZZA MUA 2 TẶNG 1: NGÔI NHÀ 'CHÉN' PIZZA NGON NHƯ Ở ROMA</h5></a>
                            <p class="text-danger"><i class="fa-regular fa-calendar-days"></i> 5/7/2024 &nbsp; <i class="fa-regular fa-eye"></i> 142 </p>
                            <P style="margin-top: -12px;">Sáng nay 5/7/2024 cửa hàng Origato tại địa chỉ: Tầng 1 tòa CT4A2, Bắc Linh Đàm, phường Đại Kim, quận Hoàng Mai đã chính thức đi vào hoạt động... </P> 
                        </div>
            </div>
        </div>
    </div>
    </div>
<?php
include("footer.php");
?>
</body>
</html>