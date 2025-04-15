<?php
    include ("connect.php");
    class product{
        public function insert_pro($gia ,$hinh){
            global $conn;
            $sql = "INSERT INTO products (gia,hinhanh) VALUES ('$gia', '$hinh')";
            $run = mysqli_query($conn, $sql);
        
            if ($run) {
                return mysqli_insert_id($conn);
            } else {
                return false;
            }
        }
        public function insert_pro_translation($id_pro,$lang_code , $tensp, $thanhphan, $mota, $danhmuc){
            global $conn;
            $sql="insert into product_translations (product_id, language_code,tensp,thanhphan,mota,danhmuc) values ('$id_pro','$lang_code' , '$tensp', '$thanhphan', '$mota', '$danhmuc')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }

        public function select_namepro($tensp){
            global $conn;
            $sql="select * from products, product_translations  
            where  product_translations.product_id = products.id
            and  tensp = '$tensp'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_lang($lang){
            global $conn;
            $sql="select * from products, product_translations
            where  product_translations.product_id = products.id
            and  language_code = '$lang'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_danhmuc_lang($danhmuc, $lang){
            global $conn;
            $sql="select * 
                  from products, product_translations 
                  where danhmuc = '$danhmuc' 
                  and language_code = '$lang'
                  and  product_translations.product_id = products.id";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_id_lang($id,$lang){
            global $conn;
            $sql="select * 
                  from products, product_translations 
                  where product_id = '$id' 
                  and language_code = '$lang'
                  and product_translations.product_id = products.id";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_danhmuc($danhmuc){
            global $conn;
            $sql="select danhmuc
                  from product_translations 
                  where danhmuc = '$danhmuc' 
                ";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_notin_id($danhmuc,$id){
            global $conn;
            $sql="select * 
                  from products, product_translations  
                  where danhmuc='$danhmuc' and product_id != '$id' 
                  and product_translations.product_id = products.id";
                  
                  
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_find($ten){
            global $conn;
            $sql="select * 
                  from products, product_translations  
                  where (tensp like '%$ten%' or gia = '$ten')  
                  and product_translations.product_id = products.id";
            $run=mysqli_query($conn,$sql);
            return $run;
        }

       
        
        public function delete_product($id){
            global $conn;
            $sql="delete from product where id_product='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function update_product($id, $danhmuc, $tensp, $thanhphan, $gia, $hinhanh, $mota){
            global $conn;
            $sql="update product 
                set danhmuc = '$danhmuc', tensp = '$tensp', thanhphan = '$thanhphan', gia = '$gia', hinhanh = '$hinhanh', mota = '$mota'    
                where id_product='$id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }




    }
?>