<?php
    include("../Model/product.php");
    if(isset($_POST['txtupdate_id'])){
        $model = new product();
        $sl_id = $model->select_id($_POST['txtid']);
        $sl_id = $sl_id->fetch_assoc();
        $old_img = $sl_id['hinhanh'];
        if(!empty($_FILES['txthinhanh']['name'])){
            move_uploaded_file($_FILES['txthinhanh']['tmp_name'],'../upload/'.$_FILES['txthinhanh']['name']);
            $new_img = $_FILES['txthinhanh']['name'];
        }
        else{
            $new_img = $old_img;
        }
        $update = $model->update_product($_POST['txtid'],$_POST['txtdanhmuc'], $_POST['txtten'], $_POST['txtthanhphan'], $_POST['txtgia'], $new_img, $_POST['txtmota'] );
        if($update){
            echo"<script>alert('Sửa thông tin thành công!');
            window.location.href = '../Control/ql_sanpham.php';
            </script>";
        }
    }

?>