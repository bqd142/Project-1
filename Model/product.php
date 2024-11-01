<?php
    include ("connect.php");
    class product{
        public function insert($danhmuc, $tensp, $thanhphan, $gia, $hinhanh, $mota){
            global $conn;
            $sql="insert into product (danhmuc, tensp, thanhphan, gia, hinhanh, mota)
                  values('$danhmuc', '$tensp', '$thanhphan', '$gia', '$hinhanh', '$mota')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_namepro($tensp){
            global $conn;
            $sql="select * from product where tensp = '$tensp'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select(){
            global $conn;
            $sql="select * from product";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_danhmuc($danhmuc){
            global $conn;
            $sql="select * from product where danhmuc = '$danhmuc' ";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_id($id){
            global $conn;
            $sql="select * from product where id_product = '$id' ";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function select_notin_id($id){
            global $conn;
            $sql="select * from product where id_product != '$id' ";
            $run=mysqli_query($conn,$sql);
            return $run;
        }


    }
?>