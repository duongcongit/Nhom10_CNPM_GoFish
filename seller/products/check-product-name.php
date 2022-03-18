<?php
include "../../config/constants.php";

if(isset($_POST['productName'])){
    $productName = $_POST['productName'];
    $userIDPr = $_SESSION['userID'];
    $msg = "";
    $sql_prod_name = "SELECT * FROM products WHERE productName = '$productName' AND userID = '$userIDPr'";
    $res_productName = $conn->query($sql_prod_name);
    echo $res_productName->fetch_assoc()['productName'];
}
else {
    header("location:" . SITEURL . "seller/");
}
?>