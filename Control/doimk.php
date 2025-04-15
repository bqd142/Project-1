<?php
include "../model/account.php";
session_start();
if(isset($_SESSION['user_name'])){
    if(isset($_POST['txtchangepass'])){
        if(empty($_POST['txtold']) || empty($_POST['txtnew']) || empty($_POST['txtconfirm'])){
            echo"
                    <script> 
                    alert('Vui lòng nhập đầy đủ thông tin!');
                    window.location.href = '../View/doimk.php'; 
                    </script>
                    ";
        }
        else{
            $model = new data_account();
            $acc = $model->sl_username($_SESSION['user_name']);
            $acc = $acc->fetch_assoc();
            if($_POST['txtold'] == $acc['pass']){
                if($_POST['txtnew'] == $_POST['txtconfirm']){
                    $model->update_pass($_SESSION['user_name'],$_POST['txtnew']);
                    echo"
                    <script> 
                    alert('Đổi mật khẩu thành công!');
                    window.location.href = '../View/homepage.php'; 
                    </script>
                    ";
                }
                else{
                    echo"
                    <script> 
                    alert('Vui lòng xác nhận lại mật khẩu mới!');
                    window.location.href = '../View/doimk.php'; 
                    </script>
                    ";
                }
            }
            else{
                echo"
                <script> 
                alert('Nhập sai mật khẩu!');       
                 window.location.href = '../Guest/changepass.php';       
                </script>
                ";
            }
        }
    }
}
?>