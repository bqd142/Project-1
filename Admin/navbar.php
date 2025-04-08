<?php
      session_start();
?>
<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
        <li>
            <div class="user-img-div">
            <img src="../upload/avt.jpg" width="80px" height="80px" >

                <div class="inner-text">
                <?php 
                if(isset($_SESSION['user_name'])){
                    if($_SESSION['user_name'] == 'admin' ){
                        echo"".$_SESSION['user_name']."</br>";
                        echo "<a href='logout.php'>Logout</a>";
                    }
                }
                
                else{
                    echo "<a href='login.php'>Login</a>";
                }    
                  ?>       
                </div>
            </div>

        </li>
        <li>
            <a href="#"><i class="fa fa-desktop "></i>Sản phẩm<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                <li>
                    <a href="ql_sanpham.php"><i class="fa fa-toggle-on"></i>Quản lý sản phẩm</a>
                </li>
                <li>
                    <a href="themsanpham.php"><i class="fa fa-toggle-on"></i>Thêm sản phẩm</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-desktop "></i>Tài khoản khách<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                <li>
                    <a href="ql_taikhoan.php"><i class="fa fa-toggle-on"></i>Quản lý tài khoản</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="#"><i class="fa fa-desktop "></i>Đơn hàng<span class="fa arrow"></span></a>
             <ul class="nav nav-second-level">
                <li>
                    <a href="ql_donhang.php"><i class="fa fa-toggle-on"></i>Quản lý đơn hàng</a>
                </li>
            </ul>
        </li>
</div>

</nav>

