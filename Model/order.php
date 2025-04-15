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
        public function add_order($hoten, $diachi, $sdt, $ngaynhan, $loichuc, $user_id ){
            global $conn;
            $sql="insert into donhang(hoten, diachi, sdt, ngaynhan, loichuc, user_id)
                    values('$hoten', '$diachi', '$sdt', '$ngaynhan', '$loichuc', '$user_id')";
            $run=mysqli_query($conn,$sql);
            return $run;
        }
        public function order_infor_idkh($user_id){
            global $conn;
            $sql = "
                SELECT 
                    donhang.id_donhang,     
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan,
                    donhang.Time, 
                    donhang.loichuc, 
                    SUM(products.gia * cart.soluong) AS TongTien, 
                    donhang.trangthai
                FROM 
                    donhang
                JOIN 
                    cart ON donhang.id_donhang = cart.donhang
                JOIN 
                    products ON cart.product_id = products.id
                WHERE 
                    donhang.user_id = '$user_id'
                GROUP BY 
                    donhang.id_donhang,          
                    donhang.hoten, 
                    donhang.diachi, 
                    donhang.sdt, 
                    donhang.ngaynhan, 
                    donhang.loichuc,
                    donhang.Time, 
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
                    SUM(products.gia * cart.soluong) AS TongTien, 
                    donhang.trangthai
                FROM 
                    donhang
                JOIN 
                    cart ON donhang.id_donhang = cart.donhang
                JOIN 
                    products ON cart.product_id = products.id
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

        public function chitietdonhang($id_donhang, $lang) {
            global $conn;
            $sql = "SELECT 
                        donhang.id_donhang,
                        donhang.hoten,
                        donhang.diachi,
                        donhang.sdt,
                        donhang.ngaynhan,
                        donhang.loichuc,
                        donhang.trangthai,
                        donhang.user_id,
                        donhang.Time,
                        cart.cart_id,
                        cart.Soluong,
                        products.id AS id_product,
                        products.gia,
                        products.hinhanh,
                        product_translations.tensp,
                        product_translations.danhmuc,
                        product_translations.thanhphan,
                        product_translations.mota
                    FROM donhang
                    JOIN cart ON donhang.id_donhang = cart.donhang
                    JOIN products ON cart.product_id = products.id
                    JOIN product_translations ON products.id = product_translations.product_id
                    WHERE donhang.id_donhang = '$id_donhang'
                    AND product_translations.language_code = '$lang'";
            
            return mysqli_query($conn, $sql);
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
        // Báo cáo theo ngày
        public function revenueByDay($date) {
            global $conn;
            $sql = "
                SELECT SUM(products.gia * cart.soluong) AS TongTien
                FROM cart, products, donhang
                WHERE cart.donhang = donhang.id_donhang
                AND donhang.id_donhang = cart.donhang
                AND cart.product_id = products.id
                AND DATE(donhang.Time) = '$date'
                and cart.donhang != 0 
                and donhang.trangthai != 'Chờ xác nhận'
                and donhang.trangthai != 'Đang vận chuyển'
            ";
            return mysqli_query($conn, $sql);
        }

        // Báo cáo theo tháng
        public function revenueByMonth($month) {
            global $conn;
            $sql = "
                SELECT SUM(products.gia * cart.soluong) AS TongTien
                FROM donhang
                JOIN cart ON donhang.id_donhang = cart.donhang
                JOIN products ON cart.product_id = products.id
                WHERE DATE_FORMAT(donhang.Time, '%Y-%m') = '$month'
                AND cart.donhang != 0
                AND donhang.trangthai != 'Chờ xác nhận'
                AND donhang.trangthai != 'Đang vận chuyển'
            ";
            return mysqli_query($conn, $sql);
        }

        // Báo cáo theo quý
        public function revenueByQuarter($year, $quarter) {
            global $conn;
            $start_month = ($quarter - 1) * 3 + 1;
            $end_month = $start_month + 2;
            $sql = "
                SELECT SUM(products.gia * cart.soluong) AS TongTien
                FROM donhang
                JOIN cart ON donhang.id_donhang = cart.donhang
                JOIN products ON cart.product_id = products.id
                WHERE YEAR(donhang.Time) = $year 
                AND MONTH(donhang.Time) BETWEEN $start_month AND $end_month
                AND cart.donhang != 0
                AND donhang.trangthai != 'Chờ xác nhận'
                AND donhang.trangthai != 'Đang vận chuyển'
            ";
            return mysqli_query($conn, $sql);
        }

        // Báo cáo theo năm
        public function revenueByYear($year) {
            global $conn;
            $sql = "
                SELECT SUM(products.gia * cart.soluong) AS TongTien
                FROM donhang
                JOIN cart ON donhang.id_donhang = cart.donhang
                JOIN products ON cart.product_id = products.id
                WHERE YEAR(donhang.Time) = $year
                AND cart.donhang != 0
                AND donhang.trangthai != 'Chờ xác nhận'
                AND donhang.trangthai != 'Đang vận chuyển'
            ";
            return mysqli_query($conn, $sql);
        }


    }