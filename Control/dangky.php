<?php 
session_start();
include "../model/account.php";
if(isset($_POST['txtsub'])){
    if(empty($_POST['txtname']) || empty($_POST['txtmail']) || empty($_POST['txtpass']) || empty($_POST['txtconfirm'])){
        $_SESSION['alertvi'] = [
            'title' => 'Vui lòng nhập đủ thông tin!',
            'icon' => 'error'
        ];
        $_SESSION['alertjp'] = [
            'title' => '完全な情報を入力してください。!',
            'icon' => 'error'
        ];
        echo"<script>window.location.href = '../View/dangky.php';</script>";
        
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['txtname']);
        if($tmp->num_rows == 0){
            if($_POST['txtpass'] == $_POST['txtconfirm']){
                $model->insert_account($_POST['txtname'], $_POST['txtmail'], $_POST['txtpass']);
                $_SESSION['alertvi'] = [
                    'title' => 'Đăng ký thành công!',
                    'icon' => 'success'
                ];
                $_SESSION['alertjp'] = [
                    'title' => '登録成功しました!',
                    'icon' => 'success'
                ];
                echo"<script>window.location.href = '../View/dangnhap.php';</script>";
            }
            else{
                $_SESSION['alertvi'] = [
                    'title' => 'Vui lòng xác nhận lại Mật Khẩu!',
                    'icon' => 'error'
                ];
                $_SESSION['alertjp'] = [
                    'title' => 'ユーザー名は既に存在します。!',
                    'icon' => 'error'
                ];
                echo"<script>window.location.href = '../View/dangky.php';</script>";
            }
        }
        else{
            $_SESSION['alertvi'] = [
                'title' => 'UserName đã tồn tại!',
                'icon' => 'error'
            ];
            $_SESSION['alertjp'] = [
                'title' => 'ユーザー名はすでに存在します!',
                'icon' => 'error'
            ];
            echo"<script>window.location.href = '../View/dangky.php';</script>";
        }
    }
}


?>