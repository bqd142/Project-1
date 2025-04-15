<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>
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
<form method="post" action="../Control/dangnhap.php">
      <div  style="width: 400px; margin-top: 100px; margin-bottom: 100px;" class="border p-3 mx-auto">
        <h4 class="text-center"><?= $lang_data["dangnhap"] ?></h4>
        <div class="mt-3 mb-3 form-floating">
          <input type="text" class="form-control" name="txtname" placeholder="UserName" id="txtname">
          <label for="txtname" ><?= $lang_data["dangnhap-ten"] ?></label>
        </div>
        <div  class="mt-3 mb-3 form-floating">      
          <input type="password" class="form-control" name="txtpass" placeholder="Password"  id="txtpass">
          <label for="txtpass" ><?= $lang_data["dangnhap-mk"] ?></label>
        </div>

        <div class="text-center mt-3">
          <input type="submit" class="btn btn-primary" style="width: 100% ;" value="<?= $lang_data["dangnhap"] ?>" name="txtlog">
        </div>
        <div class="mt-3 small d-flex justify-content-center">
          <p class=" d-inline"><?= $lang_data["dangnhap-chuacotk"] ?> </p> <a class="text-decoration-none" href="dangky.php"> <?= $lang_data["dangnhap-dk"] ?></a>
        </div>
      </div>
</form>


<?php
include("footer.php");
?>
</body>
</html>