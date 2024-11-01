<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="CSS/navbar.css">
    <link rel="icon" href="Media/logo.png" type="image/x-icon">
</head>
<body>
    <?php
    include("navbar.php");
    ?>
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <?php
    include("../Model/product.php");
    $id = $_GET['id'];
    $model = new product();
    $sl_id = $model->select_id($id);
    $sl_id = $sl_id->fetch_assoc();
    ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-5">

                <img width="90%" src="../upload/<?php echo $sl_id['hinhanh'];?>">
            </div>
            <div class="col-6">
                <h2 style="color: brown; font-weight: 650;"> <?php echo $sl_id['tensp']; ?> </h2>
                <p>MÃ: NH1</p>
                <span>Danh Mục: </span> <span style="color:red ;">  <?php echo $sl_id['danhmuc']; ?></span>
                <hr style="width: 100%;">
                <p style="font-size: 25px; font-weight: 700; color:red;">  <?php echo $sl_id['gia']; ?> ₫ </p>
                <p class="mt-3">Thành phần:  <?php echo $sl_id['thanhphan']; ?> </p>
                <p>Các size bánh: Size 16 cho 3-4 người ăn; Size 18 cho 5 – 7 người ăn; Size 22 cho 9 – 11 người ăn; Size 25 cho 12-15 người ăn</p>
                <p>Với bánh đặt theo yêu cầu Quý khách vui lòng đặt trước 24h – 48h để Origato phục vụ Quý khách chu đáo nhất!</p>
                <p>Hotline tư vấn và đặt bánh: 0911.638.166</p>
                <div class="input-group mb-3" style="width: 250px;">
                    <input type="number" class="form-control" value="1" min="1" style="width: 40px;">
                    <button class="btn btn-outline-danger" type="button">Thêm vào giỏ hàng</button>
                </div>
            </div>
            <div class="col-1"></div>
        </div>
    </div>
    <div class="container" style="margin-top: 40px;font-weight: 370;">
        <hr style="width: 100%;">
        <h4>MÔ TẢ</h4>
        <p> <?php echo $sl_id['mota']; ?></p>
        <p>Origato nhận đặt các loại bánh kem theo yêu cầu cho các dịp sinh nhật, tiệc hội nghị, liên hoan, các dịp kỷ niệm, ngày cưới….</p>
        <p>Hotline tư vấn và đặt bánh: 0911.638.166</p>
        <p>Bánh đi kèm hộp có tên và logo công ty được in trên vỏ hộp.</p>
        <p>Đồ tặng kèm theo bánh sinh nhật gồm: Dao cắt bánh + Thìa + Đĩa.</p>
        <span>Đặt thêm phụ kiện nến, mũ sinh nhật tại link: </span> <a href="https://origato.com.vn/danh-muc-san-pham/phu-kien/" style="text-decoration: none; color: red;">https://origato.com.vn/danh-muc-san-pham/phu-kien/</a> <p></p>
        <p>Origato nhận chuyển bánh tận nhà, miễn phí trong vòng bán kính 5km từ số 25, Trương Định, quận Hai Bà Trưng, Hà Nội với đơn hàng từ 300k trở lên và hỗ trợ gửi bánh miễn phí đến cửa hàng Origato gần khách hàng nhất!</p>
    </div>
    <div class="container" style="margin-top: 40px;font-weight: 370;">
        <hr style="width: 100%;">
        <h4>SẢN PHẨM LIÊN QUAN</h4>
        <?php
            $sl = $model->select_notin_id($id);
            $count = 0;
        ?>
        <div class="container mt-5">
            <div class="row">
                <?php foreach($sl as $row){ 
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
<?php
include ("footer.php");
?>
</body>
</html>