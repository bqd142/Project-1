<?php
    include("../Model/account.php");
    if(isset($_POST['txtupdate_id'])){
        $model = new data_account();
        $sl_id = $model->sl_id($_POST['txtid']);
        $sl_id = $sl_id->fetch_assoc();
        $old_avt = $sl_id['avatar'];
        if(!empty($_FILES['txtavatar']['name'])){
            move_uploaded_file($_FILES['txtavatar']['tmp_name'],'../upload/'.$_FILES['txtavatar']['name']);
            $new_avt = $_FILES['txtavatar']['name'];
        }
        else{
            $new_avt = $old_avt;
        }
        $update=$model->update_profile_id($_POST['id'],$_POST['txtaddress'], $new_avt, $_POST['txtgender'],  $_POST['txthobby'],  $_POST['txtemail'], $_POST['txtpass']);
        if($update){
            echo "<script>alert('Đã cập nhật thông tin');
                window.location.href = '../Admin/ql_taikhoan.php';
                </script>";
        } 
        else {echo "<script>alert('Chưa thực hiện được');</script>";}
    
    }

?>