<?php
session_start();
$user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();

if (isset($_GET['lang']) && in_array($_GET['lang'], ['vi', 'jp'])) {
    $_SESSION['lang'] = $_GET['lang'];
}
if (isset($_SESSION['lang'])) {
    $lang = $_SESSION['lang'];
} else {
    $lang = $_GET['lang'] ?? 'vi';
    $_SESSION['lang'] = $lang;
}
$lang_data = include("../lang/$lang.php");

include("../Model/cart.php");
$sl_sl = new cart();
$cart_count = $sl_sl->sl_sl($user_identify);
$_SESSION['cart_count'] = $cart_count; // Gán giá trị vào session

?>

<div class="container-fluid" style="background-color: #FFFFFF;height: 80px; padding-bottom: 20px;height: 70px;">
        <div class="row">
            <div class="col-3">
            <a href="homepage.php"><img src="Media/logo.png" width="120px" style="margin-top: 10px; margin-left:250px ;"></a> 
            </div>
            <div class="col-3" style="margin-left: 50px;">
            <form class="search-form" style="background-color: #FFFFFF;"  method="get" action="find.php">
                <div class="search-container">
                    <input type="text" class="search-input" name="select" placeholder="<?= $lang_data["navbar-timkiem"] ?>">
                    <button type="submit" name="txtfind" class="search-button">
                        <i class="bi bi-search"></i>
                    </button>
                </div>
            </form>
            
            </div>
            <div class="col-3" style="margin-top: 15px; color: red; font-size:22px;" >
                <i class="bi bi-telephone-fill"></i> 0911 638 167-0243 863 251
            </div>
            <div class="col-2">
                <div class="language-switcher" style="margin-top:10px;">
                <form method="get">
                    <?php
                    // Lấy tất cả tham số hiện tại trên URL
                    $current_params = $_GET;

                    // Thay đổi giá trị của tham số 'lang'
                    $current_params['lang'] = 'vi';
                    $vietnamese_url = '?' . http_build_query($current_params);

                    $current_params['lang'] = 'jp';
                    $japanese_url = '?' . http_build_query($current_params);
                    ?>
                    <?php if ($lang !== 'vi'): ?>
                        <button type="button" class="btn btn-danger" onclick="location.href='<?= $vietnamese_url ?>'">日本語</button>
                    <?php endif; ?>
                    <?php if ($lang !== 'jp'): ?>
                        <button type="button" class="btn btn-danger" onclick="location.href='<?= $japanese_url ?>'">Tiếng Việt</button>
                    <?php endif; ?>
                </form>
            </div>
            </div>
        </div>
    </div>
    <!-- filepath: c:\xampp\htdocs\origato\View\navbar.php -->
<nav class="custom-navbar">
    <ul class="custom-nav">
        <li><a href="homepage.php"><?= $lang_data["navbar-home"] ?></a></li>
        <li><a href="veorigato.php#start_view"><?= $lang_data["navbar-veorigato"] ?></a></li>
        <li>
            <a href="#"><?= $lang_data["navbar-tintuc"] ?><i class="fa fa-chevron-down"></i></a>
            <ul class="custom-dropdown">
                <li><a href="tincongty.php#start_view"><?= $lang_data["navbar-tintuc1"] ?></a></li>
                <li><a href="tintuyendung.php#start_view"><?= $lang_data["navbar-tintuc2"] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="#"><?= $lang_data["navbar-banhsn"] ?><i class="fa fa-chevron-down"></i></a>
            <ul class="custom-dropdown">
                <li><a href="mouse.php#start_view"><?= $lang_data["navbar-banhsn1"] ?></a></li>
                <li><a href="kemtuoi-scl.php#start_view"><?= $lang_data["navbar-banhsn2"] ?></a></li>
                <li><a href="bentocake.php#start_view"><?= $lang_data["navbar-banhsn3"] ?></a></li>
                <li><a href="betrai.php#start_view"><?= $lang_data["navbar-banhsn4"] ?></a></li>
                <li><a href="begai.php#start_view"><?= $lang_data["navbar-banhsn5"] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="#"><?= $lang_data["navbar-sanphamkhac"] ?><i class="fa fa-chevron-down"></i></a>
            <ul class="custom-dropdown">
                <li><a href="minicake.php#start_view"><?= $lang_data["navbar-sanphamkhac1"] ?></a></li>
                <li><a href="banhmi.php#start_view"><?= $lang_data["navbar-sanphamkhac2"] ?></a></li>
                <li><a href="banhpizza.php#start_view"><?= $lang_data["navbar-sanphamkhac3"] ?></a></li>
                <li><a href="cookies.php#start_view"><?= $lang_data["navbar-sanphamkhac4"] ?></a></li>
            </ul>
        </li>
        <li>
            <a href="cart.php">
                <i class="bi bi-cart4"></i>
                <span id="cart-count">
                    <?= isset($_SESSION['cart_count']) ? $_SESSION['cart_count'] : 0 ?>
                </span>
            </a>
        </li>
        <li class="dropdown" style="margin-top: 10px; margin-left: 10px;" >
            <button type="button" class="btn btn-dark dropdown-toggle" data-bs-toggle="dropdown" style="color: white; background-color: #dc3545;">
                <i class="fa-solid fa-user"></i>
            </button>
            <ul class="dropdown-menu" ">
                <?php 
                    if (isset($_SESSION['user_name'])) {
                        echo '
                            <li><a class="dropdown-item">' . $lang_data["navbar-user"] . ', ' . htmlspecialchars($_SESSION['user_name']) . '</a></li>
                            <li><a class="dropdown-item" href="thongtindonhang.php">' . $lang_data["navbar-user2"] . '</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="doimk.php">' . $lang_data["navbar-user3"] . '</a></li>
                            <li><a class="dropdown-item" href="../Control/dangxuat.php">' . $lang_data["navbar-user4"] . '</a></li>';
                    } else {
                        echo '
                            <li><a class="dropdown-item" href="dangnhap.php">' . $lang_data["navbar-user5"] . '</a></li>
                            <li><a class="dropdown-item" href="dangky.php">' . $lang_data["navbar-user6"] . '</a></li>';
                    }
                ?>
            </ul>
        </li>
    </ul>
</nav>