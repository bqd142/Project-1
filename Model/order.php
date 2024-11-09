<?php
    include ("connect.php");
    class order{
        public function sl_order(){
            global $conn;
            $sql="SELECT*FROM donhang";
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
        public function sl_id_donhang(){
            global $conn;
            $sql = "SELECT MAX(id_donhang) AS max_id FROM donhang";
            $run = mysqli_query($conn, $sql);
        
            // Kiểm tra nếu truy vấn thành công
            if ($run) {
                $row = mysqli_fetch_assoc($run); // Lấy kết quả dưới dạng mảng kết hợp
                return $row['max_id']; // Trả về giá trị max_id
            } else {
                return null; // Trả về null nếu truy vấn thất bại
            }
        }

    }