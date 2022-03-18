<?php
    include "../config/constants.php";
        $sql = "Delete from users";
        $number = mysqli_query($conn,$sql);
        $sql2 = "Delete from products";
        $number2 = mysqli_query($conn,$sql2);
        $sql3 = "Delete from cart";
        $number3 = mysqli_query($conn,$sql3);
        if($number > 0 or  $number2 > 0 or $number3 > 0 ){
            header("location: account.php"); //Chuyển hướng về trang quản trị
        }
        else{
            header("location: error.php"); //Chuyển hướng, hiển thị thông báo lỗi
        }
        
       
        //Buoc 03: Đóng kết nối
        mysqli_close($conn);
?>
