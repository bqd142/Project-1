<?php 
include "../model/account.php";
if(isset($_POST['txtsub'])){
    if(empty($_POST['txtname']) || empty($_POST['txtmail']) || empty($_POST['txtpass']) || empty($_POST['txtconfirm'])){
        echo"<script>alert('Vui lòng nhập đủ thông tin!');
        window.location.href = '../View/dangky.php';
        </script>";
    }
    else{
        $model = new data_account();
        $tmp = $model->sl_username($_POST['txtname']);
        if($tmp->num_rows == 0){
            if($_POST['txtpass'] == $_POST['txtconfirm']){
                $model->insert_account($_POST['txtname'], $_POST['txtmail'], $_POST['txtpass']);
                echo"<script>alert('Đăng ký thành công!');
                window.location.href = '../View/dangnhap.php';
                </script>";
            }
            else{
                echo"<script>alert('Vui lòng xác nhận lại Mật Khẩu!');
                window.location.href = '../View/dangky.php';
                </script>";
            }
        }
        else{
            echo"<script>alert('UserName đã tồn tại!');
                window.location.href = '../View/dangky.php';
                </script>";
        }
    }
}


?>