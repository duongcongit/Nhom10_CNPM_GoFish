<?php
include "../../config/constants.php";



if (isset($_POST['btnEditProduct'])) {
    $prodID         = $_POST['productID'];
    $prodName       = $_POST['prodNameEdit'];
    $prodDetail     = $_POST['prodDetailEdit'];
    $prodCategory   = $_POST['prodCategoryEdit'];
    $prodSKU        = $_POST['prodSKUEdit'];
    $prodPrice      = $_POST['prodPriceEdit'];
    $prodStock      = $_POST['prodStockEdit'];
    $userIDPr       = $_SESSION['userID'];
    $prodImg        = "";
    // $statusMsgUploadImg = "";


    // Get status of image in database is exist or not
    $ispt1empty =  $_POST['isphoto1editempty'];
    $ispt2empty =  $_POST['isphoto2editempty'];
    $ispt3empty =  $_POST['isphoto3editempty'];
    $img1Status = "no";
    $img2Status = "no";
    $img3Status = "no";


    if ($prodSKU == "") {
        $prodSKU = "NULL";
    }

    //

    $sql_edit_product = "UPDATE products SET productSKU='$prodSKU', productName='$prodName', categoryID='$prodCategory', detail='$prodDetail', price='$prodPrice', stock='$prodStock' WHERE productID='$prodID' AND userID='$userIDPr';";
    $edit_product = $conn->query($sql_edit_product);

    // Gen random character to set name for prducts image
    $temp_word = array_merge(range('a', 'z'));
    shuffle($temp_word);
    $randChr = substr(implode($temp_word), 0, 20) . rand(000, 999) . ".";


    // Process upload products image
    // Image 1
    if (empty($_FILES["prodImg1Edit"]["name"])  && $ispt1empty != "TRUE") {
        $img1Status = "yes";
    } else if (isset($_FILES['prodImg1Edit']) && !empty($_FILES["prodImg1Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg1Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage1 = "1" . $randChr . $fileType;
        $targetFilePath = $targetDir . $prodImage1;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt1empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt1empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg1Edit"]["tmp_name"], $targetFilePath)) {
                if ($ispt1empty != "TRUE") {
                    $sql_img1 = "UPDATE product_image SET image = '$prodImage1' WHERE productID='$prodID' AND image='$ispt1empty'";
                } else {
                    $sql_img1 = "INSERT INTO product_image VALUES('$prodID', '$prodImage1');";
                }
                $conn->query($sql_img1);
                $img1Status = "yes";
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    } else {
        $img1Status = "no";
    }


    // Image 2
    if (empty($_FILES["prodImg2Edit"]["name"])  && $ispt2empty != "TRUE") {
        $img2Status = "yes";
    } else if (isset($_FILES['prodImg2Edit']) && !empty($_FILES["prodImg2Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg2Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage2 = "";
        if ($img1Status == "no") {
            $prodImage2 = "1" . $randChr . $fileType;
        } else {
            $prodImage2 = "2" . $randChr . $fileType;
        }
        $targetFilePath = $targetDir . $prodImage2;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt2empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt2empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg2Edit"]["tmp_name"], $targetFilePath)) {
                if ($ispt2empty != "TRUE") {
                    $sql_img2 = "UPDATE product_image SET image = '$prodImage2' WHERE productID='$prodID' AND image='$ispt2empty'";
                } else {
                    $sql_img2 = "INSERT INTO product_image VALUES('$prodID', '$prodImage2');";
                }
                $conn->query($sql_img2);
                $img2Status = "yes";
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    } else {
        $img2Status = "no";
    }





    // Image 3

    if (isset($_FILES['prodImg3Edit']) && !empty($_FILES["prodImg3Edit"]["name"])) {
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg3Edit"]["name"]);
        $fileType = pathinfo($fileName_tmp, PATHINFO_EXTENSION);
        $prodImage3 = "";
        $prodImage3_temp = "";
        //
        if ($img2Status == "yes") {
            if ($img1Status == "yes") {
                $prodImage3 = "3" . $randChr . $fileType;
            } else if ($img1Status == "no") {
                $prodImage3 = "2" . $randChr . $fileType;
            }
        } else if ($img2Status == "no") {
            if ($img1Status == "yes") {
                $prodImage3 = "2" . $randChr . $fileType;
            } else if ($img1Status == "no") {
                $prodImage3 = "1" . $randChr . $fileType;
            }
        }
        //
        $targetFilePath = $targetDir . $prodImage3;
        $allowTypes = array('jpg', 'png', 'jpeg');
        //
        if ($ispt3empty != "TRUE") {
            unlink("../../assets/img/products/" . $ispt3empty);
        }
        //
        if (in_array($fileType, $allowTypes)) {
            if (move_uploaded_file($_FILES["prodImg3Edit"]["tmp_name"], $targetFilePath)) {
                if ($ispt3empty != "TRUE") {
                    $sql_img3 = "UPDATE product_image SET image = '$prodImage3' WHERE productID='$prodID' AND image='$ispt3empty'";
                } else {
                    $sql_img3 = "INSERT INTO product_image VALUES('$prodID', '$prodImage3');";
                }
                $conn->query($sql_img3);
                //echo "Thành công";
            } else {
                $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
            }
        } else {
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }





    $_SESSION['editProdSucsess'] = "Đã <strong>cập nhật</strong> thông tin sản phẩm <strong> SKU: " . $prodSKU . "</strong> Thành công!";
    header("location:" . SITEURL . "seller/products/");
} else {
    header("location:" . SITEURL . "seller/");
}
