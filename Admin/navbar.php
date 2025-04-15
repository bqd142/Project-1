<?php
session_start();
// Kiểm tra xem người dùng đã đăng nhập chưa
if (!isset($_SESSION['user_name']) || $_SESSION['user_name']!= 'admin') {
    header("Location: login.php");
    exit();  
}
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

?>
<nav class="navbar-default navbar-side" role="navigation" style="background-color: #FFF5D7;"> 
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu" style="background-color: #FFF5D7;">
            <li>
                <div class="user-img-div">
                    <img src="../View/Media/logo.png" width="80px" height="100px">
                </div>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i><?= $lang_data["admin-navbar-togger1"] ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="baocao.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger2"] ?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i><?= $lang_data["admin-navbar-togger3"] ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ql_donhang.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger4"] ?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i><?= $lang_data["admin-navbar-togger5"] ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ql_sanpham.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger6"] ?></a>
                    </li>
                    <li>
                        <a href="themsanpham.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger7"] ?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i><?= $lang_data["admin-navbar-togger8"] ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ql_baiviet.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger9"] ?></a>
                    </li>
                    <li>
                        <a href="thembaiviet.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger10"] ?></a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#"><i class="fa fa-desktop "></i><?= $lang_data["admin-navbar-togger11"] ?><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="ql_taikhoan.php"><i class="fa fa-toggle-on"></i><?= $lang_data["admin-navbar-togger12"] ?></a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>

<!-- Thanh điều hướng góc trên -->
<div style="position: absolute; top: 0; right: 0; left: 0; height: 70px; background-color: #FFF5D7; padding: 0 20px; display: flex; justify-content: space-between; align-items: center; color: #dc3545; z-index: 99999; box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);">
    <!-- Logo ở góc trái -->
    <div style="display: flex; align-items: center;">
        <img src="../View/Media/logo.png" width="90px" height="50px" style="margin-right: 500px; margin-left: 50px">
        <p style="font-size: 24px; color: #dc3545; margin-left: 100; font-weight: bold;"><?= $lang_data["admin-navbar-slogan"] ?></p>
    </div>

    <!-- Góc phải của thanh trên -->
    <div class="navbar-right">
        <form method="get" class="language-switcher">
            <?php
            $current_params = $_GET;
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
        <span class="user-greeting"><?= $lang_data["admin-navbar-xinchao"] ?> <strong><?= $_SESSION['user_name'] ?? 'Khách' ?></strong></span>
        <?php if (isset($_SESSION['user_name'])): ?>
            <a href="logout.php" class="logout-link"><?= $lang_data["admin-navbar-thoat"] ?></a>
        <?php endif; ?>
    </div>
</div>

