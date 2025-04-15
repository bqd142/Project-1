<?php

    if(isset($_POST['txtupdate'])){
        $sl = $cart->sl_cart_user($user_identify);
        foreach ($sl as $tmp) {
            if($_POST['txtsl'][$tmp['cart_id']] == 0){
                $delete = $cart->delete_pro_in_cart($user_identify, $tmp['cart_id']);
            }
            else{
                $update = $cart->capnhatgiohang($user_identify, $tmp['cart_id'], $_POST['txtsl'][$tmp['cart_id']]);
            }
        }
        $_SESSION['alertvi'] = [
            'title' => 'Cập nhật giỏ hàng thành công!',
            'icon' => 'success'
        ];
        $_SESSION['alertjp'] = [
            'title' => 'カートが正常に更新されました!',
            'icon' => 'success'
        ];
        echo "<script>window.location.href='../View/cart.php';</script>";
        
    }
?>