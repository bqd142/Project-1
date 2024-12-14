<?php
include "../model/account.php";
session_start();
if(isset($_POST['txtlog'])){
    if(empty($_POST['txtname']) || empty($_POST['txtpass'])){
        echo"<script>alert('Vui lòng nhập đầy đủ thông tin!');
        window.location.href = '../View/dangnhap.php'; 
        </script>";
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['txtname']);
        $tmp = $tmp->fetch_assoc(); 
        if($_POST['txtpass'] == $tmp['pass']){
            $_SESSION['user_name'] = $_POST['txtname'];
            if($_SESSION['user_name'] == 'admin'){
                echo"<script>window.location.href = '../Admin/index.php'; </script>";
            }
            else{
                echo"<script>window.location.href = '../View/homepage.php'; </script>";
            }
        }
        else{
            echo"<script>alert('Sai tài khoản hoặc mật khẩu!');
            window.location.href = '../View/dangnhap.php'; 
            </script>";
        }

    }
}

?>