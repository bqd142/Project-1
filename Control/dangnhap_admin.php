<?php
include "../model/account.php";
session_start();
if(isset($_POST['txtlog'])){
    if(empty($_POST['txtname']) || empty($_POST['txtpass'])){
        // $_SESSION['alertvi'] = [
        //     'title' => 'Vui lòng nhập đủ thông tin!',
        //     'icon' => 'error'
        // ];
        // $_SESSION['alertjp'] = [
        //     'title' => '完全な情報を入力してください。!',
        //     'icon' => 'error'
        // ];
        echo"<script>window.location.href = '../Admin/login.php';</script>";
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['txtname']);
        $tmp = $tmp->fetch_assoc(); 
        if($_POST['txtpass'] == $tmp['pass']){
            if($_POST['txtname'] == 'admin'){
                $_SESSION['user_name'] = 'admin';
                echo"<script>window.location.href = '../Admin/ql_donhang.php'; </script>";
            }
            else{
                // $_SESSION['alertvi'] = [
                //     'title' => 'Sai tài khoản hoặc mật khẩu!',
                //     'icon' => 'error'
                // ];
                // $_SESSION['alertjp'] = [
                //     'title' => 'アカウントまたはパスワードが間違っています。!',
                //     'icon' => 'error'
                // ];
                 echo"<script>window.location.href = '../Admin/login.php';</script>";
            }

        }
        else{
            // $_SESSION['alertvi'] = [
            //     'title' => 'Sai tài khoản hoặc mật khẩu!',
            //     'icon' => 'error'
            // ];
            // $_SESSION['alertjp'] = [
            //     'title' => 'アカウントまたはパスワードが間違っています。!',
            //     'icon' => 'error'
            // ];
            echo"<script>window.location.href = '../Admin/login.php';</script>";
        }

    }
}

?>