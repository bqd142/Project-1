<?php
session_start();
include ("../Model/cart.php");

if (isset($_POST['txtsub'])) {
    $model = new cart();

    $user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();


    $sl = $model->sl_cart($user_identify, $_POST['id_pro']);

    if ($sl->num_rows == 0) {
        $add = $model->add_cart($user_identify, $_POST['id_pro'], $_POST['txtsl']); 
        
    } else {
        $update = $model->update_cart($user_identify, $_POST['id_pro'], $_POST['txtsl']); 
    }



    $_SESSION['alertvi'] = [
        'title' => 'Thêm sản phẩm thành công!',
        'icon' => 'success'
    ];
    $_SESSION['alertjp'] = [
        'title' => '商品が正常に追加されました!',
        'icon' => 'success'
    ];
    $_SESSION['cart_count'] = $model->sl_sl($user_identify);
    header('Location: ../View/chitietsanpham.php?id=' . $_POST['id_pro'] . '#start_view');
}
?>
