<?php
session_start();
include ("../Model/cart.php");
include ("../Model/order.php");
if(isset($_POST['txtsub']))
if(empty($_POST['txtten']) || empty($_POST['txtho']) ||empty($_POST['txtdiachi']) ||empty($_POST['txtsdt']) ){
    echo "<script>alert('Vui Lòng nhập đủ thông tin');
             window.location.href = '../View/thanhtoan.php';
            </script>"; 
}
else{
    $order = new order();
    $hoten = $_POST['txtho'] . ' ' . $_POST['txtten'];
    $insert_order = $order->add_order($hoten,$_POST['txtdiachi'], $_POST['txtsdt'],$_POST['txttime'], $_POST['txtloichuc'],session_id());
}
?>