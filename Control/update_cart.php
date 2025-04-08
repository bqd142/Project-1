<?php
    if(isset($_POST['txtupdate'])){
        $sl = $cart->sl_cart_id(session_id());
        foreach ($sl as $tmp) {
            // Cập nhật giỏ hàng
            if($_POST['txtsl'][$tmp['cart_id']] == 0){
                $delete = $cart->delete_pro_in_cart(session_id(), $tmp['cart_id']);
                if ($delete) {
                    echo "<script>alert('Cập nhật giỏ hàng thành công!');
                          window.location.href = '../View/cart.php';
                          </script>";
                }
            }
            else{
                $update = $cart->capnhatgiohang(session_id(), $tmp['cart_id'], $_POST['txtsl'][$tmp['cart_id']]);
            
                if ($update) {
                    echo "<script>alert('Cập nhật giỏ hàng thành công!');
                          window.location.href = '../View/cart.php';
                          </script>";
                }
            }

            
            
        }
        
    }
    




?>