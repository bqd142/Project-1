<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
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

<form method="post" action="../Control/dangky.php">
      <div  style="width: 400px; margin-top: 100px; margin-bottom: 100px;" class="border p-3 mx-auto">
        <h4 class="text-center">Sign Up</h4>
        <div class="mt-3 mb-3 form-floating">
          <input type="text" class="form-control" name="txtname" placeholder="UserName" id="txtname">
          <label for="txtname" >UserName</label>
        </div>
        <div class="mt-3 mb-3 form-floating">
          <input type="text" class="form-control" name="txtmail" placeholder="Email" id="txtmail">
          <label for="txtmail" >Email</label>
        </div>
        <div  class="mt-3 mb-3 form-floating">      
          <input type="password" class="form-control" name="txtpass" placeholder="Password"  id="txtpass">
          <label for="txtpass" >Password</label>
        </div>
        <div  class="mt-3 mb-3 form-floating">      
          <input type="password" class="form-control" name="txtconfirm" placeholder="Confirm Password"  id="txtconfirm">
          <label for="txtpass" >Confirm Password</label>
        </div>
        <div class="text-center mt-3">
          <input type="submit" class="btn btn-primary" style="width: 100% ;" value="Sign Up" name="txtsub">
          <p class=" d-inline">Have an account? </p> <a class="text-decoration-none" href="dangnhap.php"> Sign in</a>
        </div>
       
      </div>
    </form>


<?php
include("footer.php");
?>
</body>
</html>