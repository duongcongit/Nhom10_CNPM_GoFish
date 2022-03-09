<?php
include "../../config/constants.php";

include "../partials/header.php";
?>

<!-- Content start-->


<!--  -->
<div class="col-md-12 mt-2 mb-3 nav-page">
    <h5 class="text-muted"><a href="../index.php">Kênh người bán</a> / </span><a href="">Quản lý sản phẩm</a></h5>
</div>
<!--  -->
<div class="col-md-12 manage-products shadow">
    <div class="col-md-12">
        <ul class="nav">
            <li class="nav-item">
                <a class="nav-link active" href="#">Tất cả</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Đang hoạt động</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Hết hàng</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Bị khóa</a>
            </li>
        </ul>
        <hr class="mt-0">
    </div>

    <div class="col-md-12 products-search">
        <form>
            <div class="input-group mb-3">
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <select class="form-select select-ten">
                            <option value="0" selected>Tên sản phẩm</option>
                            <option value="1">Mã sản phẩm</option>
                        </select>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3">Danh mục sản phẩm</span>
                        <input type="text" class="form-control" placeholder="Chọn danh mục sản phẩm">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3" dir="rtl" style="min-width: 161px;">Kho hàng</span>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                        <p class="text-muted px-2">__</p>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
                <div class="col-md-12 col-lg-6 pe-4">
                    <div class="input-group mb-3">
                        <span class="pe-3" dir="rtl" style="min-width: 161px;">Đã bán</span>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                        <p class="text-muted px-2">__</p>
                        <input type="text" class="form-control" placeholder="Nhập vào">
                    </div>
                </div>
            </div>

            <button class="btn btn-danger px-4">Tìm</button>
            <button class="btn btn-secondary px-4">Nhập lại</button>
        </form>
    </div>

    <div class="col-md-12 mt-3">
        <div class="d-flex justify-content-between">
            <?php
            //Sql Query 
            $sql_products = "SELECT * FROM products WHERE userID = '{$_SESSION['userID']}'";
            //Execute Query
            $res_products = $conn->query($sql_products);
            //Count Rows
            $count_products = $res_products->num_rows;
            ?>
            <h3 class="ms-2"><?php echo $count_products ?> Sản phẩm <span class="fs-6 text-primary">( <?php echo $count_products ?>/1000 )</span></h3>
            <a type="button" href="./add-product.php" class="btn btn-danger ms-auto"><i class="bi bi-plus-circle-fill me-1"></i>Thêm một sản phẩm mới</a>
        </div>
        <!--  -->
        <table class="styled-table">
            <thead>
                <tr>
                    <th>Tên sản phẩm</th>
                    <th>Mã SKU</th>
                    <th>Danh mục hàng</th>
                    <th>Giá</th>
                    <th>Kho hàng</th>
                    <th>Đã bán</th>
                    <th>Sửa thông tin</th>
                </tr>
            </thead>
            <tbody id="table-products">
                <!--  -->

                <!--  -->
            </tbody>
        </table>
        <!--  -->
    </div>

</div>
<!-- Content end-->

<?php
include "../partials/footer.php";
?>