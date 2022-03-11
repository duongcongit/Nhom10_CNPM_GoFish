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


    $sql_add_product = "INSERT INTO products (productID, productSKU, productName, category, detail, price, stock, sold, status, userID) VALUES (NULL, '$prodSKU', '$prodName', '$prodCategory', '$prodDetail', '$prodPrice', '$prodStock', '$prodSold', '$prodStatus', '$userIDPr');";
    $insert_product = $conn->query($sql_add_product);

    //
    $sql_get_prodID = "SELECT * FROM products WHERE productSKU = '$prodSKU' and userID = '$userIDPr'";
    $res_id = $conn->query($sql_get_prodID)->fetch_assoc();
    $prodID = $res_id['productID'];


    // Process upload products image
    // Imamge 1
    if(isset($_FILES['prodImg1Add']) && !empty($_FILES["prodImg1Add"]["name"])){
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg1Add"]["name"]);
        $fileType = pathinfo($fileName_tmp,PATHINFO_EXTENSION);
        $prodImage1 = $prodID."-1.".$fileType;
        $targetFilePath = $targetDir . $prodImage1;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["prodImg1Add"]["tmp_name"], $targetFilePath)){
                $prodImg = $prodImg.$prodImage1;
                echo $prodImg;
                //echo "Thành công";
                }else{
                    $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
                }
        }else{
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    // Image 2
    if(isset($_FILES['prodImg2Add']) && !empty($_FILES["prodImg2Add"]["name"])){
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg2Add"]["name"]);
        $fileType = pathinfo($fileName_tmp,PATHINFO_EXTENSION);
        $prodImage2 = "";
        $prodImage2_temp = "";
        if(empty($_FILES["prodImg1Add"]["name"])){
            $prodImage2 = $prodID."-1.".$fileType;
            $prodImage2_temp = $prodID."-1.".$fileType;
        }
        else{
            $prodImage2 = ",".$prodID."-2.".$fileType;
            $prodImage2_temp = $prodID."-2.".$fileType;
        }
        $targetFilePath = $targetDir . $prodImage2_temp;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["prodImg2Add"]["tmp_name"], $targetFilePath)){
                $prodImg = $prodImg.$prodImage2;
                //echo "Thành công";
                }else{
                    $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
                }
        }else{
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    // Image 3
    if(isset($_FILES['prodImg3Add']) && !empty($_FILES["prodImg3Add"]["name"])){
        $targetDir = "../../assets/img/products/";
        $fileName_tmp = basename($_FILES["prodImg3Add"]["name"]);
        $fileType = pathinfo($fileName_tmp,PATHINFO_EXTENSION);
        $prodImage3 = "";
        $prodImage3_temp = "";
        if(empty($_FILES["prodImg1Add"]["name"]) && empty($_FILES["prodImg2Add"]["name"])){
            $prodImage3 = $prodID."-1.".$fileType;
            $prodImage3_temp = $prodID."-1.".$fileType;
        }
        else if(!empty($_FILES["prodImg1Add"]["name"]) && empty($_FILES["prodImg2Add"]["name"])){
            $prodImage3 = ",".$prodID."-2.".$fileType;
            $prodImage3_temp = $prodID."-2.".$fileType;
        }
        else if(empty($_FILES["prodImg1Add"]["name"]) && !empty($_FILES["prodImg2Add"]["name"])){
            $prodImage3 = ",".$prodID."-2.".$fileType;
            $prodImage3_temp = $prodID."-2.".$fileType;
        }
        else{
            $prodImage3 = ",".$prodID."-3.".$fileType;
            $prodImage3_temp = $prodID."-3.".$fileType;
        }
        $targetFilePath = $targetDir . $prodImage3_temp;
        $allowTypes = array('jpg','png','jpeg');
        if(in_array($fileType, $allowTypes)){
            if(move_uploaded_file($_FILES["prodImg3Add"]["tmp_name"], $targetFilePath)){
                $prodImg = $prodImg.$prodImage3;
                //echo "Thành công";
                }else{
                    $statusMsgUploadImg = "Đã xảy ra lỗi khi upload ảnh!.";
                }
        }else{
            $statusMsgUploadImg = 'Chỉ chấp nhận file JPG, JPEG, PNG.';
        }
    }

    //


    $sql_update_img = "UPDATE products SET image = '$prodImg' WHERE productID='$prodID' AND userID = '$userIDPr';";
    $update_img = $conn->query($sql_update_img);
    

    
    $_SESSION['addProdSucsess'] = "Đã <strong>thêm</strong> thành công sản phẩm <strong> SKU: ".$prodSKU."</strong>";
    header("location:" . SITEURL . "seller/products/");

}else {
    header("location:" . SITEURL . "seller/");
}
