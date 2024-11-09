<?php
session_start();

$inactive = 3600; 

if (isset($_SESSION['timeout'])) {
    $session_life = time() - $_SESSION['timeout'];
    if ($session_life > $inactive) {
        session_unset();
        session_destroy();
        echo "<script>alert('Phiên làm việc đã hết hạn.');</script>";
    }
}
$_SESSION['timeout'] = time();
?>
?>

<nav class="navbar navbar-expand-xxl bg-dark navbar-dark fixed-top">
        <div class="container">
            <a href="homepage.php" class="navbar-brand">Origato</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#Navbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="Navbar">
                <ul class="navbar-nav mx-2">
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="veorigato.php">VỀ ORIGATO</a> 
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">TIN TỨC</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="tincongty.php">Tin công ty</a></li>
                        <li><a class="dropdown-item" href="tintuyendung.php">Tin tuyển dụng</a></li>
                        <li><a class="dropdown-item" href="tinkhuyenmai.php">Khuyến mãi hot</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">BÁNH SINH NHẬT</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="mouse.php">Bánh sinh nhật Mousse-Phomat-Tiramisu</a></li>
                        <li><a class="dropdown-item" href="kemtuoi-scl.php">Bánh sinh nhật kem tươi - Socola</a></li>
                        <li><a class="dropdown-item" href="bentocake.php">Bánh sinh nhật Bento Cake</a></li>                        
                        <li><a class="dropdown-item" href="betrai.php">Bánh sinh nhật bé trai</a></li>
                        <li><a class="dropdown-item" href="begai.php">Bánh sinh nhật bé gái</a></li>
                        </ul>
                    </li>
                    <li class="nav-item mx-2">
                        <a class="nav-link" href="banhtrungthu.php">BÁNH TRUNG THU 2024</a> 
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">SẢN PHẨM KHÁC</a>
                        <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="minicake.php">Mini cake</a></li>
                        <li><a class="dropdown-item" href="banhmi.php">Bánh mì dinh dưỡng</a></li>
                        <li><a class="dropdown-item" href="banhpizza.php">Bánh pizza</a></li>
                        <li><a class="dropdown-item" href="cookies.php">Cookies - Macaron</a></li>
                        </ul>
                    </li>
                </ul>
                <div class="dropdown" style="margin-left: 370px;" >
                    <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown">
                      <i class="fa-solid fa-user"></i>
                    </button>
                    <ul class="dropdown-menu" >
                      <li><a class="dropdown-item" href="#">Đăng nhập</a></li>
                      <li><a class="dropdown-item" href="#">Đăng ký</a></li>
                    </ul>
                </div>   
                <a href="cart.php" class="text-light" style="margin-left: 15px;"><i class="fa-solid fa-cart-shopping"></i></a>             
            </div> 
        </div>        
    </nav>