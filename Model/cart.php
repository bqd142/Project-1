<?php
    include ("connect.php");
    class cart{
        public function sl_cart_id($ss_id){
            global $conn;
            $sql="SELECT*FROM cart where session_id = '$ss_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_cart($ss_id, $pro_id){
            global $conn;
            $sql="SELECT*FROM cart where session_id = '$ss_id' and product_id = '$pro_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function add_cart($ss_id, $pro_id, $SL){
            global $conn;
            $sql="insert into cart (session_id, product_id, Soluong)
                  values('$ss_id','$pro_id','$SL')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function update_cart($ss_id, $pro_id, $SL){
            global $conn;
            $sql="update cart set Soluong = Soluong + '$SL'
                    where session_id = '$ss_id' and product_id = '$pro_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function delete_cart($ss_id){
            global $conn;
            $sql="delete cart 
                where session_id = '$ss_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
    }