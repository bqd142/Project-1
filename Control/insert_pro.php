<?php
session_start();
include ("../Model/product.php");
if(isset($_POST['txtsub'])){
    if(empty($_POST['txtdanhmuc']) || empty($_POST['txtgia']) || empty($_FILES['txthinhanh']['name']) || empty($_POST['txtmota_vi']) || empty($_POST['txtten_vi']) || empty($_POST['txtthanhphan_vi']) || empty($_POST['txtmota_jp']) || empty($_POST['txtten_jp']) || empty($_POST['txtthanhphan_jp']) ){
        echo "<script>alert('Vui Lòng nhập đủ thông tin');
             window.location.href = '../Admin/themsanpham.php';
            </script>"; 
    }
    $danhmuc_vi = $_POST['txtdanhmuc'];
    $map_danhmuc = [
        "Bánh sinh nhật Mousse - Phomat - Tiramisu" => "バースデームースケーキ - チーズ - ティラミス",
        "Bánh sinh nhật kem tươi - Socola" => "ホイップクリームチョコレートバースデーケーキ",
        "Bánh sinh nhật Bento cake" => "バースデーベントケーキ",
        "Mini Cake" => "ミニケーキ",
        "Bánh sinh nhật Bé gái" => "女の子用バースデーケーキ",
        "Bánh sinh nhật Bé trai" => "男の子用バースデーケーキ",
        "Bánh mì dinh dưỡng" => "栄養パン",
        "Bánh mì pizza" => "ピザパン",
        "Cookies - Macaroon" => "クッキー・マカロン"
    ];

    $danhmuc_jp = $map_danhmuc[$danhmuc_vi] ?? '';

    else{
        $model = new product();
        move_uploaded_file($_FILES['txthinhanh']['tmp_name'],'../upload/'.$_FILES['txthinhanh']['name']);
        $name_vi = $model->select_namepro($_POST['txtten_vi']);
        $name_jp = $model->select_namepro($_POST['txtten_jp']);
        if($name_vi->num_rows == 0 && $name_jp->num_rows == 0){
            $id_pro = $model->insert_pro($_POST['txtgia'], $_FILES['txthinhanh']['name']);
         
            
            if ($id_pro !== false){
                $in_pro_vi = $model->insert_pro_translation($id_pro,'vi', $_POST['txtten_vi'], $_POST['txtthanhphan_vi'], $_POST['txtmota_vi'], $danhmuc_vi);
                $in_pro_jp = $model->insert_pro_translation($id_pro,'ja', $_POST['txtten_jp'], $_POST['txtthanhphan_jp'], $_POST['txtmota_jp'], $danhmuc_jp);
                
            }

            if($in_pro_vi && $in_pro_jp){
                echo "<script>alert('Thêm thành công');
                window.location.href = '../Admin/themsanpham.php';
                </script>"; 
            }
            else{
                echo "<script>alert('Thêm không thành công');
                window.location.href = '../Admin/themsanpham.php';
                </script>"; 
            }   
        }
        
        else{
            echo "<script>alert('Sản phẩm đã tồn tại');
            window.location.href = '../Admin/themsanpham.php';
           </script>";  
        } 
    }
}

?>