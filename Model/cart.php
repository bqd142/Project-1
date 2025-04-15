<?php
    include ("connect.php");
    class cart{
        public function sl_cart_user($user_id){
            global $conn;
            $sql="SELECT*FROM cart where user_id = '$user_id' and donhang = 0";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_cart($user_id, $pro_id){
            global $conn;
            $sql="SELECT*FROM cart where user_id = '$user_id' and product_id = '$pro_id' and donhang = 0";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_sl($user_id){
            global $conn;
            $sql="SELECT SUM(Soluong) AS sl FROM cart where user_id = '$user_id' and donhang = 0";
            $run=mysqli_query($conn,$sql);
            if ($run) {
                $row = mysqli_fetch_assoc($run); 
                return $row['sl'] ?? 0; 
            } else {
                return 0; 
            }
        }
        public function add_cart($user_id,$pro_id, $SL){
            global $conn;
            $sql="insert into cart (user_id,product_id,Soluong,donhang)
                  values('$user_id','$pro_id','$SL',0)";
            $run=mysqli_query($conn,$sql);
            return $run;
        }

        
        public function update_cart($user_id,$pro_id, $SL){
            global $conn;
            $sql="update cart set Soluong = Soluong + '$SL'
                    where user_id = '$user_id' and product_id = '$pro_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function delete_cart($ss_id) {
            global $conn;
            $sql = "DELETE FROM cart WHERE session_id = '$ss_id' ";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function delete_pro_in_cart($user_id, $id_cart) {
            global $conn;
            $sql = "DELETE FROM cart WHERE user_id = '$user_id' and cart_id = '$id_cart' ";
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        public function update_donhang($id_donhang,$user_id ) {
            global $conn;
            $sql = "update cart set donhang = '$id_donhang' where user_id = '$user_id' and donhang = 0";
            $run = mysqli_query($conn, $sql);
            return $run;
        }

        public function capnhatgiohang($user_id, $cart_id, $sl ) {
            global $conn;
            $sql = "update cart set Soluong = '$sl' where user_id = '$user_id' and cart_id = '$cart_id'";
            $run = mysqli_query($conn, $sql);
            return $run;
        }



    }
    
    

?>