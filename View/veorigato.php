<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Về origato</title>
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
<a id="start_view" style="display: block; height: 0; visibility: hidden;"></a>
    <img src="Media/vearigatouslide1.png" style="width: 100%;">
    <div class="container mt-5" style="background-color:blanchedalmond; p {margin-bottom: 15px;}">  
        <h5 class="text-danger"><?= $lang_data["veorigato"] ?></h5>
        
        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato1"] ?> </p>
        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato2"] ?></p>
        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato3"] ?></p>

        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato4"] ?></p>
        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato5"] ?></p>

        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato6"] ?></p>

        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato7"] ?></p>

        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato8"] ?></p>

        <p class="mt-3 text-muted" style="text-align: justify; line-height: 2;"><?= $lang_data["veorigato9"] ?> </p>
        
    </div>
    


<?php
include("footer.php");
?>
</body>
</html>