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
    include("../Model/posts.php");
    $id = $_GET['id'];
    $model = new post();
    $baiviet = $model->sl_baiviet_lang($id, $lang);
    $baiviet = $baiviet->fetch_assoc();
?>
    
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <a id="start_view"></a>
    <div class="container mt-5" style="background-color:blanchedalmond; p {margin-bottom: 35px;}">  
        
        <h2 class="text-danger" style="text-align: center;margin-bottom: 30px;padding-top: 30px;"><?php echo $baiviet['Tieude'];?></h2>
        <p style="max-width: 700px; text-align: justify; margin: 0 auto;"><?php echo $baiviet['Noidung'];?></p>
        <p style="text-align: center; padding-bottom: 30px;">
            <img src="../upload/<?php echo $baiviet['Hinh_anh'];?>" width="50%" alt="">
        </p>
    </div>
    


<?php
include("footer.php");
?>
</body>
</html>