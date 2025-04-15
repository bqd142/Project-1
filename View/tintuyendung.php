<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tin tuyển dụng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="http://localhost/origato/View/CSS/navbar.css">
    <link rel="icon" href="Media/logo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&display=swap" rel="stylesheet">
    <style>
    .description {
        text-align: justify;
        display: -webkit-box;
        -webkit-line-clamp: 3;          
        -webkit-box-orient: vertical;
        overflow: hidden;
        text-overflow: ellipsis;
        word-break: break-word;
        line-height: 1.4em;
        min-height: 4.2em;         
    }
    </style>
</head>
<body>
<?php
    include("navbar.php");
    include("../Model/posts.php");
    $model = new post();
    $select = $model->sl_theloai_lang('Tin Tuyển Dụng', $lang);
    $count = 0;
?>
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <a id="start_view"></a>
    <h3 class="text-danger text-center mt-5"><?= $lang_data["tintuyendung"] ?></h3>
    <div class="container">
    <div class="row row-cols-3 g-4 mt-5"> <!-- Thêm g-4 để tạo khoảng cách giữa các dòng -->
        <?php foreach ($select as $row) { ?>
            <div class="col d-flex">
                <a href="baivietchitiet.php?id=<?php echo $row['id']; ?>#start_view" style="text-decoration: none;" class="w-100 d-flex">
                    <div class="card border border-5 h-100 d-flex flex-column w-100">
                        <img class="card-img-top" style="height: 260px; object-fit: cover;" src="../upload/<?php echo $row['Hinh_anh']; ?>">
                        <div class="card-body d-flex flex-column">
                            <p class="text-danger mb-1">
                                <i class="fa-regular fa-calendar-days"></i>
                                <?php echo date("d/m/Y", strtotime($row['Ngay_tao'])); ?>
                            </p>
                            <div class="mt-auto description">
                                <?php echo mb_substr($row['Noidung'], 0, 120) . '...'; ?>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
    <?php
include("footer.php");
?>
    
</body>
</html>