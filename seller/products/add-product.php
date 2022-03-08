<?php
include "../../config/constants.php";

include "../partials/header.php";
?>

<!-- Content start-->
<div class="col main-right container-fluid row">

    <!--  -->
    <div class="col-md-12 mt-2 mb-3 nav-page">
        <h5 class="text-muted"><a href="">Kênh người bán</a> / <a href="">Quản lý sản phẩm</a> / <b href="">Thêm sản phẩm</b></h5>
    </div>
    <!--  -->
    <div class="col-md-12 manage-products shadow">
        <div class="col-md-12">
            <i class="bi bi-plus-circle-fill fs-2 text-danger"></i>
            <span>
                <strong class="fs-4 ms-2">Thêm 1 sản phẩm mới</strong>
                <p class="ms-5">Vui lòng điền đầy đủ thông tin sản phẩm.</p>
            </span>
        </div>
        <!--  -->
        <div class="col-md-12 d-flex justify-content-center">
            <div class="col-md-11">
                <hr>
                <form action="">
                    <div class="basic-info col-md-12">
                        <h5><strong>Thông tin cơ bản</strong></h5>
                        <div class="input-group mb-3 mt-5">
                            <div class="col-md-12 pe-4">
                                <div class="input-group mb-3">
                                    <span class="pe-3" dir="rtl" style="min-width: 161px;">Tên sản phẩm
                                        *</span>
                                    <input type="text" class="form-control" placeholder="Nhập vào">
                                </div>
                            </div>
                            <div class="col-md-12 pe-4">
                                <div class="input-group mb-3">
                                    <span class="pe-3" dir="rtl" style="min-width: 161px;">Mô tả sản phẩm
                                        *</span>
                                    <textarea class="form-control" rows="10" aria-label="With textarea" cols="40"></textarea>
                                </div>
                            </div>
                            <div class="col-md-12 pe-4">
                                <div class="input-group mb-3">
                                    <span class="pe-1" dir="rtl" style="min-width: 161px;">Danh mục sản phẩm
                                        *</span>
                                    <select class="form-select" style="max-width: 500px;">
                                        <option value="0" selected>Chọn danh mục sản phẩm</option>
                                        <option value="1">Cá cảnh</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-12 pe-4">
                                <div class="input-group mb-3">
                                    <span class="pe-3" dir="rtl" style="min-width: 161px;">Mã SKU *</span>
                                    <input type="text" class="form-control" placeholder="Mã SKU tùy chỉnh">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <hr>
                    <div class="basic-info col-md-12">
                        <h5><strong>Thông tin bán hàng</strong></h5>
                        <div class="col-md-12 pe-4 mt-5">
                            <div class="input-group mb-3">
                                <span class="pe-3" dir="rtl" style="min-width: 161px;">Giá *</span>
                                <span class="input-group-text">đ</span>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                        </div>
                        <div class="col-md-12 pe-4">
                            <div class="input-group mb-3">
                                <span class="pe-3" dir="rtl" style="min-width: 161px;">Kho hàng *</span>
                                <input type="text" class="form-control" placeholder="0">
                            </div>
                        </div>
                    </div>
                    <!--  -->
                    <hr>
                    <div class="basic-info col-md-12 container-fluid px-0 pb-5 ms-0">
                        <h5 class="mb-5"><strong>Hình ảnh</strong></h5>
                        <p class="ms-4 mb-4">(*) Tối đa 3 hình ảnh</p>
                        <div class="row ms-5">
                            <div class="card p-0 mb-3 me-3 d-flex justify-content-center" style="width: 200px;height: 200px;">
                                <input type="file" name="" id="photo-1-input" onchange="loadPhoto1(event)">
                                <label for="photo-1-input" type="button">
                                    <img id="photo-1-preview" src="../issets/img/no-image.png" alt="" style="max-width: 100%;">
                                </label>
                                <!--  -->
                                <div class="d-flex justify-content-between" style="position: absolute;margin-left: 140px; top: 0; border: solid 1px rgb(72, 120, 224); border-radius: 5px; background-color: rgba(188, 199, 219, 0.8);">
                                    <label for="photo-1-input" type="button">
                                        <i class="bi bi-pencil-fill text-primary fs-5 ms-2"></i>
                                    </label>
                                    <i class="bi bi-trash-fill text-danger fs-5 ms-2" id="del-photo-1" type="button"></i>
                                </div>
                                <!--  -->
                            </div>
                            <!--  -->
                            <script>
                                var loadPhoto1 = function(event) {
                                    document.getElementById("photo-1-preview").src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src);
                                    };
                                };
                            </script>
                            <!--  -->

                            <!-- Photo 2 -->
                            <div class="card px-0 mb-3 me-3 d-flex justify-content-center align-items-center" style="width: 200px;height: 200px;background-size: contain;">
                                <input type="file" name="" id="photo-2-input" onchange="loadPhoto2(event)">
                                <label for="photo-2-input" type="button">
                                    <img id="photo-2-preview" src="../issets/img/no-image.png" alt="" style="max-width: 100%;">
                                </label>
                            </div>
                            <!--  -->
                            <script>
                                var loadPhoto2 = function(event) {
                                    document.getElementById("photo-2-preview").src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src);
                                    };
                                };
                            </script>
                            <!--  -->

                            <!-- Photo 3 -->
                            <div class="card px-0 mb-3 me-3 d-flex justify-content-center align-items-center" style="width: 200px;height: 200px;background-size: contain;">
                                <input type="file" name="" id="photo-3-input" onchange="loadPhoto3(event)">
                                <label for="photo-3-input" type="button">
                                    <img id="photo-3-preview" src="../issets/img/no-image.png" alt="" style="max-width: 100%;">
                                </label>
                            </div>
                            <!--  -->
                            <script>
                                var loadPhoto3 = function(event) {
                                    document.getElementById("photo-3-preview").src = URL.createObjectURL(event.target.files[0]);
                                    output.onload = function() {
                                        URL.revokeObjectURL(output.src);
                                    };
                                };
                            </script>
                            <!--  -->
                        </div>
                    </div>

                    <hr>

                    <div class="col-md-12 py-2 d-flex justify-content-end">
                        <button class="btn btn-secondary px-4">Hủy và quay lại</button>
                        <button class="btn btn-primary px-4 mx-3" type="submit">Thêm sản phẩm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--  -->
</div>
<!-- Content end-->

<?php
include "../partials/footer.php";
?>