<?php
include "../../config/constants.php";

$userIDPr = $_SESSION['userID'];
$sql = "SELECT productID FROM products WHERE userID='$userIDPr';";
$res = $conn->query($sql);
while($row=mysqli_fetch_assoc($res))
{
    $productID = $row['productID'];
    $sqlx = "DELETE FROM product_image WHERE productID='$productID';";
    $resx = $conn->query($sqlx);
}

$sql1 = "DELETE FROM products WHERE userID='$userIDPr';";
$res1 = $conn->query($sql1);

$sql2 = "SELECT * FROM products WHERE userID='$userIDPr';";
$res2 = $conn->query($sql2);
if ($res2->num_rows == 0) {
        $_SESSION['deleteAllProdSucsess'] = "Đã <strong>xóa</strong> toàn bộ sản phẩm mà bạn đã đăng bán sản phẩm <strong>Thành công!";
        header("location:" . SITEURL . "seller/products/delete-product.php");
} else {
    include "../partials/header.php";
}


/*
$sql1 = "DELETE FROM product_image WHERE userID='$userIDPr';";
$sql2 = "DELETE FROM products WHERE userID='$userIDPr';";
$res1 = $conn->query($sql2);
if ($res->num_rows == 0) {
        $_SESSION['deleteAllProdSucsess'] = "Đã <strong>xóa</strong> toàn bộ sản phẩm mà bạn đã đăng bán sản phẩm <strong>Thành công!";
        header("location:" . SITEURL . "seller/products/delete-product.php");
} else {
    include "../partials/header.php";
    $prodInf = $res->fetch_assoc();
}
*/

?>
