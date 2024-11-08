<?php
    include ("connect.php");
    class order{
        public function sl_order_id($ss_id){
            global $conn;
            $sql="SELECT*FROM cart where session_id = '$ss_id'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function add_order($hoten, $diachi, $sdt, $ngaynhan, $loichuc, $id_kh ){
            global $conn;
            $sql="insert into donhang(hoten, diachi, sdt, ngaynhan, loichuc, cart_id)
                    values('$hoten', '$diachi', '$sdt', '$ngaynhan', '$loichuc', '$id_kh')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        

    }