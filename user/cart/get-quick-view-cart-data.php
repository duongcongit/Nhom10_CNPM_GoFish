<?php
require '../../config/constants.php';


if (isset($_SESSION['id'])) {
    $userID         = $_SESSION['id'];
    //
    $sql_count_prod = "SELECT * FROM cart WHERE userID='$userID';";
    $num_prod       = $conn->query($sql_count_prod)->num_rows;

    //
    $sql_data_qcart = "SELECT products.*,price FROM cart,products WHERE cart.userID='$userID' AND cart.productID=products.productID ORDER BY time_add DESC LIMIT 0,5;";
    $res_data_qcart = $conn->query($sql_data_qcart);
?>

    <a href="./login.php" class="bi bi-cart-fill fs-4 text-danger">
        <span class="fs-5">Giỏ hàng</span>
    </a>
    <p id="count-cart"><?php echo $num_prod; ?></p>
    <div class="quick-cart-list text-dark container-fluid px- mb-0">
        <div class="text-muted fs-6 mb-3">
            Sản phẩm mới thêm
            <!-- <hr class="mt-0"> -->
        </div>
        <?php
        while ($res = $res_data_qcart->fetch_assoc()) {
            $prodName = $res['productName'];
            $sql_img1 = "SELECT * FROM product_image WHERE productID='{$res['productID']}' AND image LIKE '1%'";
            $img1 = $conn->query($sql_img1)->fetch_assoc()['image'];
        ?>
            <div style="width: 100%;" class="mb-4 d-flex justify-content-between align-items-center">
                <div>
                    <img src="<?php echo SITEURL ?>assets/img/products/<?php echo $img1 ?>" alt="" class="product-avatar-list" style="width: 50px;">
                    <span class="quick-produc-name">
                        <?php
                        if (strlen($prodName) > 35) {
                            echo substr($prodName, 0, 35) . "...";
                        } else {
                            echo $prodName;
                        }
                        ?>
                    </span>
                </div>
                <span class="text-danger fs-6 quick-product-price"><sup><u>đ</u></sup><?php echo number_format($res['price'], 0, '.', '.') ?></span>
            </div>
        <?php
        }

        ?>
        <!--  -->
        <div class="d-flex justify-content-between align-items-center">
            <p class="text-muted mb-2" style="font-size: 15px;"><?php echo $num_prod; ?> Sản phẩm trong giỏ hàng</p>
            <a href="<?php echo SITEURL ?>user/cart" class="btn btn-danger mb-3">Xem giỏ hàng</a>
        </div>
    </div>

<?php
} else {
?>

    <a type="button" href="./login.php" class="bi bi-cart-fill fs-4 text-danger mb-3"><span class="fs-5">Giỏ hàng</span></a>
<?php
}

?>