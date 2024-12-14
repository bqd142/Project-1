<?php
 include('../Model/account.php');
 $id = $_GET['id'];
 $data=new data_account();
 $del=$data->del_profile($id);
 echo "<script> window.location.href = '../Admin/ql_taikhoan.php';</script>;";
 ?>