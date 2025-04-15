<?php
    include ("connect.php");
    class post{
        public function insert_post($theloai, $hinh){
            global $conn;
            $sql = "INSERT INTO posts (TheLoai,	Hinh_anh) VALUES ('$theloai', '$hinh')";
            $run = mysqli_query($conn, $sql);
        
            if ($run) {
                return mysqli_insert_id($conn);
            } else {
                return false;
            }
        }
        public function insert_post_translation($id_post,$lang_code , $tieude, $noidung){
            global $conn;
            $sql="insert into post_translations (id_baiviet, language_code,Tieude,Noidung) values ('$id_post','$lang_code' , '$tieude', '$noidung')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_post_lang($lang){
            global $conn;
            $sql="select * from posts, post_translations where posts.id=post_translations.id_baiviet 
                  and post_translations.language_code='$lang'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        
        public function sl_theloai_lang($theloai,$lang){
            global $conn;
            $sql="select * from posts, post_translations where posts.id=post_translations.id_baiviet 
                  and post_translations.language_code='$lang'
                  and posts.TheLoai='$theloai'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_baiviet_lang($id,$lang){
            global $conn;
            $sql="select * from posts, post_translations 
                  where posts.id=post_translations.id_baiviet 
                  and posts.id='$id'
                  and language_code='$lang'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }


    
        

    }