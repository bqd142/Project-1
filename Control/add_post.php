<?php
    session_start();
    include ("../Model/posts.php");
    if(isset($_POST['txtadd'])){
        if(empty($_POST['txttheloai']) || empty($_FILES['txthinh']['name']) || empty($_POST['Tieude_vi']) || empty($_POST['Noidung_vi']) || empty($_POST['Tieude_ja']) || empty($_POST['Noidung_ja'])){
            echo "<script>alert('Vui Lòng nhập đủ thông tin');
                 window.location.href = '../Admin/thembaiviet.php';
                </script>"; 
        }
        else{
            $model = new post();
            move_uploaded_file($_FILES['txthinh']['tmp_name'],'../upload/'.$_FILES['txthinh']['name']);
            $id_post = $model->insert_post($_POST['txttheloai'], $_FILES['txthinh']['name']); 

            
            if ($id_post !== false){
                $in_post_vi = $model->insert_post_translation($id_post,'vi', $_POST['Tieude_vi'], $_POST['Noidung_vi']);
                $in_post_ja = $model->insert_post_translation($id_post,'ja', $_POST['Tieude_ja'], $_POST['Noidung_ja']);
                
            }
            if($in_post_vi && $in_post_ja){
                echo "<script>alert('Thêm thành công');
                window.location.href = '../Admin/thembaiviet.php';
                </script>"; 
            }
            else{
                echo "<script>alert('Thêm không thành công');
                window.location.href = '../Admin/thembaiviet.php';
                </script>"; 
            }
        }
    }



?>