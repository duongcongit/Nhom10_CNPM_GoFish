<?php
include "../../config/constants.php";

include "../partials/header.php";
?>

            <!-- Content start-->
            <div class="col main-right container-fluid row">

                <!--  -->
                <div class="col-md-12 mt-2 mb-3 nav-page">
                    <h5 class="text-muted"><a href="">Kênh người bán</a> / </span><a href="">Quản lý sản phẩm</a></h5>
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
                            <h3>0 Sản phẩm</h3>
                            <a type="button" href="<?php echo SITEURL ?>seller/products/add-product.php" class="btn btn-danger ms-auto"><i
                                    class="bi bi-plus-circle-fill me-1"></i>Thêm một sản phẩm mới</a>
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
                            <tbody>
                                <tr>
                                    <td class="row">
                                        <div style="max-width: fit-content;">
                                            <img src="../issets/img/may-loc.png" alt="" class="product-avatar-list">
                                        </div>
                                        
                                        <div class="col row d-flex align-items-center">
                                            <div class="col-md-12 produc-status-active">
                                                Đang hoạt động
                                            </div>
                                            <div class="col-md-12">
                                                <b>Máy lọc thác Sunsun HBL-301</b>
                                            </div>
                                        </div>
                                    </td>
                                    <td>PVN1632</td>
                                    <td>Đồ điện</td>
                                    <td>95.000đ</td>
                                    <td>34
                                        <i class="bi bi-pencil-fill text-danger fs-6" type="button"></i>
                                    </td>
                                    <td>6</td>
                                    <td>
                                        <a href="./edit-product.html" class="bi bi-pencil-square fs-5"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="row">
                                        <div style="max-width: fit-content;">
                                            <img src="../issets/img/may-loc.png" alt="" class="product-avatar-list">
                                        </div>
                                        
                                        <div class="col row d-flex align-items-center">
                                            <div class="col-md-12 produc-status-out">
                                                Hết hàng
                                            </div>
                                            <div class="col-md-12">
                                                <b>Máy lọc thác Sunsun HBL-301</b>
                                            </div>
                                        </div>
                                    </td>
                                    <td>PVN1632</td>
                                    <td>Đồ điện</td>
                                    <td>95.000đ</td>
                                    <td>34
                                        <i class="bi bi-pencil-fill text-danger fs-6" type="button"></i>
                                    </td>
                                    <td>6</td>
                                    <td>
                                        <a href="./edit-product.html" class="bi bi-pencil-square fs-5"></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="row">
                                        <div style="max-width: fit-content;">
                                            <img src="../issets/img/may-loc.png" alt="" class="product-avatar-list">
                                        </div>
                                        
                                        <div class="col row d-flex align-items-center">
                                            <div class="col-md-12 produc-status-locked">
                                                Bị khóa
                                            </div>
                                            <div class="col-md-12">
                                                <b>Máy lọc thác Sunsun HBL-301</b>
                                            </div>
                                        </div>
                                    </td>
                                    <td>PVN1632</td>
                                    <td>Đồ điện</td>
                                    <td>95.000đ</td>
                                    <td>34
                                        <i class="bi bi-pencil-fill text-danger fs-6" type="button"></i>
                                    </td>
                                    <td>6</td>
                                    <td>
                                        <a href="#" class="bi bi-pencil-square fs-5"></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <!--  -->
                    </div>

                </div>
            </div>
            <!-- Content end-->

<?php
include "../partials/footer.php";
?>