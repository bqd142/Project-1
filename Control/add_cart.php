<?php
session_start();
include ("../Model/cart.php");
if(isset($_POST['txtsub'])){
        $model = new cart();
        $sl = $model->sl_cart(session_id(),$_POST['id_pro']);
        if($sl->num_rows == 0){
            $add = $model->add_cart(session_id(),$_POST['id_pro'],$_POST['txtsl']); 
            echo "<script>
                    alert('Đã thêm vào giỏ hàng');
                    window.location.href = '../View/chitietsanpham.php?id=" . $_POST['id_pro'] . "';
                </script>";
        }
        else{
            $update = $model->update_cart(session_id(),$_POST['id_pro'],$_POST['txtsl']); 
            echo "<script>
                    alert('Đã thêm vào giỏ hàng');
                    window.location.href = '../View/chitietsanpham.php?id=" . $_POST['id_pro'] . "';
                </script>"; 
        } 
    }


?>