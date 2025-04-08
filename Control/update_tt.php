<?php
    include("../Model/order.php");
    $id = $_GET['id'];
    $model = new order();
    $sl_id = $model->sl_id($id);
    $sl_id = $sl_id->fetch_assoc(); 
    if($sl_id['trangthai'] == 'Chờ xác nhận'){
        $update = $model->update_trangthai1($id);
        header("Location: ../Admin/ql_donhang.php");
    }
    else if($sl_id['trangthai'] == 'Đang vận chuyển'){
        $update = $model->update_trangthai2($id);
        header("Location: ../Admin/ql_donhang.php");
    }
?>