<?php
include "../../config/constants.php";

if (isset($_POST['btnAddProduct'])) {
    $prodName = $_POST['prodNameAdd'];
    $prodDetail = $_POST['prodDetailAdd'];
    $prodCategory = $_POST['prodCategoryAdd'];
    $prodSKU = $_POST['prodSKUAdd'];
    $prodPrice = $_POST['prodPriceAdd'];
    $prodStock = $_POST['prodStockAdd'];
    $prodSold = 0; // Default
    $userIDPr = $_SESSION['userID'];
    $prodImg = "";
    $prodStatus = 1;
    // $statusMsgUploadImg = "";

    if ($prodSKU == "") {
        $prodSKU = "NULL";
    }

    $sql_add_product = "INSERT INTO products (productID, productSKU, productName, categoryID, detail, price, stock, sold, status, userID) VALUES (NULL, '$prodSKU', '$prodName', '$prodCategory', '$prodDetail', '$prodPrice', '$prodStock', '$prodSold', '$prodStatus', '$userIDPr');";
    $insert_product = $conn->query($sql_add_product);

    // Get product id
    $sql_get_id = "SELECT * FROM products WHERE productName='$prodName' AND userID='$userIDPr'";
    $prodID = $conn->query($sql_get_id)->fetch_assoc()['productID'];

    

    // Gen random character to set name for prducts image
    $temp_word = array_merge(range('a', 'z'));
    shuffle($temp_word);
    $randChr = substr(implode($temp_word), 0, 20) . rand(000, 999).".";


    // Process upload product image
    // Imamge 1
    if (isset($_FILES['prodImg1Add']) && !empty($_FILES["prodImg1Add"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg1Add"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage1 = "1" . $randChr . $fileType;
        $targetFilePath = $targetDir . $prodImage1;
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg1Add"]["tmp_name"], $targetFilePath)) {
                $sql_insert_img1 = "INSERT INTO product_image VALUES('$prodID', '$prodImage1');";
                $conn->query($sql_insert_img1);
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    // Image 2
    if (isset($_FILES['prodImg2Add']) && !empty($_FILES["prodImg2Add"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg2Add"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage2 = "";
        if (empty($_FILES["prodImg1Add"]["name"])) {
            $prodImage2 = "1".$randChr . $fileType;
        } else {
            $prodImage2 = "2".$randChr . $fileType;
        }
        $targetFilePath = $targetDir . $prodImage2;
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg2Add"]["tmp_name"], $targetFilePath)) {
                $sql_insert_img2 = "INSERT INTO product_image VALUES('$prodID', '$prodImage2');";
                $conn->query($sql_insert_img2);
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    // Image 3
    if (isset($_FILES['prodImg3Add']) && !empty($_FILES["prodImg3Add"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg3Add"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage3 = "";
        if (empty($_FILES["prodImg1Add"]["name"]) && empty($_FILES["prodImg2Add"]["name"])) {
            $prodImage3 = "1".$randChr . $fileType;
        } else if (!empty($_FILES["prodImg1Add"]["name"]) && empty($_FILES["prodImg2Add"]["name"])) {
            $prodImage3 = "2".$randChr . $fileType;
        } else if (empty($_FILES["prodImg1Add"]["name"]) && !empty($_FILES["prodImg2Add"]["name"])) {
            $prodImage3 = "2".$randChr . $fileType;
        } else {
            $prodImage3 = "3".$randChr . $fileType;
        }
        $targetFilePath = $targetDir . $prodImage3;
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg3Add"]["tmp_name"], $targetFilePath)) {
                $sql_insert_img3 = "INSERT INTO product_image VALUES('$prodID', '$prodImage3');";
                $conn->query($sql_insert_img3);
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    //




    $_SESSION['addProdSucsess'] = "Đã <strong>thêm</strong> thành công sản phẩm <strong> SKU: " . $prodSKU . "</strong>";
    header("location:" . SITEURL . "seller/products/");
} else {
    header("location:" . SITEURL . "seller/");
}
