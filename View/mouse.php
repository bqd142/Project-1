<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Bánh Sinh nhật Mousse</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="CSS/navbar.css">
        <link rel="icon" href="Media/logo.png" type="image/x-icon">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    </head>
<body>
<?php 
include ("navbar.php");
?>
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <div class="container mt-5">
       <div class="row">
        <div class="col-3">
            <div class=" rounded-3" style="width: 260px;">
                <h3 style="height: 40px;" class="text-center bg-primary text-light">Danh Mục Bánh</h3>
                <div class="list-group" style="margin-top: -7px;" >
                    <a href="mouse.php" class="list-group-item list-group-item-action list-group-item-warning">> Bánh sinh nhật Mousse-Phomat-Tiramisu</a>
                    <a href="kemtuoi-scl.php" class="list-group-item list-group-item-action list-group-item-warning">> Bánh sinh nhật Kem tươi - Socola</a>
                    <a href="bentocake.php" class="list-group-item list-group-item-action list-group-item-warning">> Bánh sinh nhật Bento Cake</a>
                    <a href="minicake.php" class="list-group-item list-group-item-action list-group-item-warning">> Mini Cake</a>
                    <a href="begai.php" class="list-group-item list-group-item-action list-group-item-warning">> Bánh sinh nhật bé gái</a>
                    <a href="betrai.php" class="list-group-item list-group-item-action list-group-item-warning">> Bánh sinh nhật bé trai</a>
                </div>
            </div>
        </div>
        
        <div class="col-9">
        <?php 
            include ("../Model/product.php");
            $model = new product();
            $sl = $model->select_danhmuc("Bánh sinh nhật Mousse - Phomat - Tiramisu");
            $count = 0;
        ?>
        <div class="container">
                <div class="row">
                <?php foreach($sl as $row){ 
                    $count++;     
                ?>
                    <div class="col-4">
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
                if($count % 3 == 0){
                    echo'</div>
                <div class="row mt-5" >';
                }
                } 
                ?>
                </div>
            </div>
        </div>
       </div>
    </div>
    
<?php
include ("footer.php");
?>
</body>
</html>