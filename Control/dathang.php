<?php
session_start();
include ("../Model/cart.php");
include ("../Model/order.php");
if(isset($_POST['txtsub'])){
    if(empty($_POST['txtten']) || empty($_POST['txtho']) ||empty($_POST['txtdiachi']) ||empty($_POST['txtsdt']) ){
        $_SESSION['alertvi'] = [
            'title' => 'Vui Lòng nhập đủ thông tin!',
            'icon' => 'error'
        ];
        $_SESSION['alertjp'] = [
            'title' => '完全な情報を入力してください。',
            'icon' => 'error'
        ];
        echo "<script>window.location.href = '../View/thanhtoan.php'</script>"; 
    }
    else{
        $order = new order();
        $cart = new cart();
        $user_identify = isset($_SESSION['user_name']) ? $_SESSION['user_name'] : session_id();
        $hoten = $_POST['txtho'] . ' ' . $_POST['txtten'];
        $insert_order = $order->add_order($hoten,$_POST['txtdiachi'], $_POST['txtsdt'],$_POST['txttime'], $_POST['txtloichuc'],$_SESSION['user_name']);
        $cart->update_donhang($order->sl_id_donhang(),$user_identify);
        
        $_SESSION['alertvi'] = [
            'title' => 'Đặt hàng thành công!',
            'icon' => 'success'
        ];
        $_SESSION['alertjp'] = [
            'title' => '注文が完了しました！',
            'icon' => 'success'
        ];
        if(isset($_SESSION['user_name'])){
            echo "<script>window.location.href = '../View/thongtindonhang.php'</script>"; 
        }
        else{
            echo "<script>window.location.href = '../View/cart.php'</script>"; 
        }
        
        
    }
    $_SESSION['cart_count'] = $model->sl_sl($user_identify);
}
?>