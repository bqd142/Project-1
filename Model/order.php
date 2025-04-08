<?php
    include ("connect.php");
    class order{
        public function sl_order(){
            global $conn;
            $sql="SELECT*FROM donhang";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function sl_id($id){
            global $conn;
            $sql="SELECT*FROM donhang where id_donhang ='$id'";
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
        public function order_infor_idkh($id_kh){
            global $conn;
            $sql = "
                SELECT 
                    donhang.id_donhang,     
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan, 
                    donhang.loichuc, 
                    SUM(product.gia * cart.soluong) AS TongTien, 
                    donhang.trangthai
                FROM 
                    donhang
                JOIN 
                    cart ON donhang.id_donhang = cart.donhang
                JOIN 
                    product ON cart.product_id = product.id_product
                WHERE 
                    donhang.cart_id = '$id_kh' -- Chỉ lấy các đơn hàng có cart_id giống với $id_kh
                GROUP BY 
                    donhang.id_donhang,          
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan, 
                    donhang.loichuc, 
                    donhang.trangthai;
            ";
        
            $run = mysqli_query($conn, $sql);
            return $run;
        }
        
        public function order_infor_iddh($id_donhang){
            global $conn;
            $sql="  SELECT 
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan, 
                    donhang.loichuc, 
                    SUM(product.gia * cart.soluong) AS TongTien, 
                    donhang.trangthai
                FROM 
                    donhang
                JOIN 
                    cart ON donhang.id_donhang = cart.donhang
                JOIN 
                    product ON cart.product_id = product.id_product
                WHERE 
                    donhang.id_donhang = '$id_donhang'
                GROUP BY 
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan, 
                    donhang.loichuc, 
                    donhang.trangthai;";
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
        public function update_trangthai1($id_donhang){
            global $conn;
            $sql="update donhang set trangthai = 'Đang vận chuyển' where id_donhang = '$id_donhang'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function update_trangthai2($id_donhang){
            global $conn;
            $sql="update donhang set trangthai = 'Hoàn thành' where id_donhang = '$id_donhang'";
            $run=mysqli_query($conn,$sql);
            return $run;
        }

    }