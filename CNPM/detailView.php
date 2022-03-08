<?php include('constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets/css/detail.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <title>Chi tiết sản phẩm</title>
</head>

<body>
  <!-- header -->
  <header>
    <div class="header-top container-fluid">
      <div class="wrapper ms-5 me-3">
        <div class="initial ms-5 pe-2">
          <a href="">Kênh người bán</a>
        </div>
        <div class="initial ms-2 pe-2">
          <a href="">Trở thành người bán Gofish</a>
        </div>
        <div class="social ms-2 pe-2">
          <span style="color: rgb(150, 157, 21);">Kết nối</span>
          <a href=""><i class="bi bi-facebook text-primary"></i></a>
          <a href=""><i class="bi bi-tiktok text-dark"></i></a>
          <a href=""><i class="bi bi-instagram text-info me-5"></i></a>
        </div>
        <div class="slogan ms-auto">
          <p class="me-5">Gofish - Thả hồn vào sự huyền dịu của thiên nhiên</p>
        </div>
      </div>
    </div>
    <div class="navbar navbar-expand-lg bg-white ms-3">
      <div class="container-fluid ms-5">
        <a class="navbar-logo ms-5" href="index.php">
          <button type="button" class="btn btn-light">
            <img
              src="https://images.squarespace-cdn.com/content/v1/5cef069f124fff000125b347/1559169045380-V07V99DGIM6IQ01H0Z2U/gofish-logo.png"
              alt="">
          </button>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
          <div class="search ms-5" style="display: inline;">
            <div style="display: inline-flex;">
              <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
              <input type="text" class="form-control p-3" placeholder="Search for fish, product...">
            </div>
          </div>
          <a href="" class="member ms-5">
            <i class="bi bi-person-circle ms-5"></i> Tài Khoản
          </a>
          <a href="" class="notifi ms-5">
            <i class="bi bi-bell"></i> Thông báo
          </a>
          <a href="" class="cart ms-5">
            <i class="bi bi-cart"></i> Giỏ hàng
          </a>
        </div>
      </div>
    </div>

    <!-- menu -->
    <div class="menu">
      <div class="wrapper container ms-5 me-5">
        <ul class="main-nav ms-5">
          <li class="nav-item ms-5">
            <a class="nav-link active" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">Trang chủ</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">Sản phẩm</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">Giới thiệu</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">
                <i class="bi bi-info-circle"></i> Hỗ trợ
              </div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">Tin tức</div>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="">
              <div class="text-nav" style="font-style: normal; font-size: 18px;">Liên hệ</div>
            </a>
          </li>
        </ul>
      </div>
    </div>

  </header>
  <?php
    /*Kiểm tra xem có nhận được mã sản phẩm từ trang chủ*/
    if(isset($_GET['id']))
    {
        //Lấy mã sản phẩm và thông tin của sản phẩm đã chọn
        $iditem = $_GET['id'];
        //sql lấy thông tin của sản phẩm
        $sql = "SELECT users.id,users.username,users.email,users.telephone,users.address,item.itemName,item.type,item.price,item.detail,item.itemLeft,item.itemImg
        FROM item,users where item.id = users.id and item.itemID  = '$iditem'";

        //Thực thi câu lệnh
        $res = mysqli_query($conn, $sql);

        //Đếm số bản ghi
        $count = mysqli_num_rows($res);
        //Kiểm tra xem bản ghi có tồn tại không
        if($count==1)
        {
            //Lấy dữ liệu từ database
            $row = mysqli_fetch_assoc($res);
            $tenSanPham = $row['itemName'];
            $theLoai = $row['type'];
            $price = $row['price'];
            $chiTiet = $row['detail'];
            $conLai = $row['itemLeft'];
            $hinhAnh = $row['itemImg'];
            $userName = $row['username'];
            $userEmail = $row['email'];
            $userPhone = $row['telephone'];
            $userID = $row['id'];
        }
        else
        {
            //Chuyển hướng về trang chủ
            header('location:'.SITEURL);
        }

    }
    else
    {
        //Chuyển hướng về trang chủ
        header('location:'.SITEURL);
    }
    ?>

  <section class="posts_slider container-fluid" style="padding: 0;">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
            </div>
          </div>
        </div>
        <div class="carousel-item ">
          <div class="row">
            <div class="col-md-12">
              <img src="https://cakienghoanglam.com/thumb/1366x524/1/upload/hinhanh/549862.png" alt="">
            </div>
          </div>
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <i class="bi bi-arrow-left"></i>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <i class="bi bi-arrow-right"></i>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  </section>

  <div class="simple-banner mt-2">
    <a href="">
      <img src="https://cf.shopee.vn/file/0ed0d80b26a4a8dc8f8652679f37604d" alt="">
    </a>
  </div>

  <!-- Thông tin của item đã chọn -->
  <section class="Item-info">
    <div class="container">
      <div class="row" style='padding-top: 70px'>
        <!-- Đặt sản phẩm -->
        <div class="row border p-3 border-success rounded info-tour ">
          <div
            style='font-size:22px;font-weight:500;padding:10px;background-color:blue;color:#fff;border-radius:8px;width:220px;margin-left:12px'>
            Thông tin sản phẩm
          </div>
          <div class="row">
            <div class="item-menu-img col-md-5">
              <?php               
                  //Kiểm tra hình ảnh
                  if($hinhAnh=="")
                  {
                      //nếu không có
                      echo "<div class='error'>Image not Available.</div>";
                  }
                  else
                  {
                      //nếu có
              ?>
              <img src="<?php echo SITEURL; ?>assets/img/<?php echo $hinhAnh; ?>" alt="Item-img"
                style="max-height: 400px;width:100%" class="img-fluid mt-3">
              <?php
                    }
                  
              ?>

            </div>
            <form method="POST" class="order col-md-7 mt-3">
              <!-- Chi tiết của sản phẩm và chọn thanh toán -->
              <div class="item-menu-desc">
                <h4 style='color:blue'>
                  <?php echo $tenSanPham; ?>
                </h4>
                <p>Mã sản phẩm: <span style='color:red;font-weight:500;font-size:25px'>
                    <?php echo $iditem; ?>

                  </span>
                </p>
                <p>Giá: <span style='color:red;font-weight:500;font-size:25px' id='price'>
                    <?php echo $price; ?> đ

                  </span>
                </p>
                <p>Còn lại: <span style='color:red;font-weight:500;font-size:25px'>
                    <?php echo $conLai; ?>
                  </span>
                </p>
                <p class="text-warning"><i class="bi bi-flag me-3"></i>Loại Hình:
                  <?php echo $theLoai ?>
                </p>
                <p><i class="bi bi-building me-3"></i>Mã người bán:
                  <?php echo $userID ?>
                </p>
                <p><i class="bi bi-building me-3"></i>Tên người bán:
                  <?php echo $userName ?>
                </p>
                <p><i class="bi bi-envelope me-3"></i>Email liên hệ:
                  <?php echo $userEmail ?>
                </p>
                <p><i class="bi bi-telephone me-3"></i>Số điện thoại liên hệ:
                  <?php echo $userPhone ?>
                </p>
                <p>
                  <span style='color:blue;font-weight:500;font-size:25px'>
                    Thông tin về sản phẩm: <br>
                  </span>
                  <?php echo $chiTiet; ?>
                </p>
                <h4>Phương thức thanh toán</h4>

                <div class="d-flex ">
                  <select class="form-select w-50" aria-label="Default select example" name="cast">
                    <option selected value="Chuyển Khoản">Chuyển khoản</option>
                    <option value="Tiền Mặt">Tiền Mặt</option>
                  </select>
                </div>

                <h4 class="mt-3">Chọn số lượng</h4>
                <div class="item-num d-flex  mt-3">
                  <div class="order-label me-3">
                    <?php
                      echo "<input type='number' class='input' name='quantity1' id='quantity1' min='1' max='$conLai' value ='1'>";
                      echo '<br>';
                  ?>
                  </div>
                </div>


                <p class="mt-3" id="price">Tổng Tiền: <span id="item_price">
                    <?php echo $price ?>
                  </span></p>

              </div>



              <input type="submit" name="submit1" value="Thêm vào giỏ"
                style='font-size:25px;font-weight:500;width:250px' class="btn btn-success mt-3">
              <input type="submit" name="submit" value="Mua ngay" style='font-size:25px;font-weight:500;color:#fff'
                class="btn btn-warning mt-3">
            </form>
          </div>
        </div>

        <!-- Hết đặt sản phẩm -->
      </div>

    </div>
    </div>
  </section>
  <!-- Kết thúc phần thông tin sản phẩm -->

  <!-- Notice -->
  <div class="notice bg-light">
    <div class="title-notice mt-5">
      <h1>Tin tức nổi bật nhất</h1>
    </div>
    <section class="posts_slider container mt-3">
      <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">

        <div class="carousel-inner">
          <div class="carousel-item active">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img
                      src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg"
                      alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img src="https://cakienghoanglam.com/upload/user/images/thi-cong-ho-thuy-sinh-1.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img
                      src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg"
                      alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img src="https://cakienghoanglam.com/upload/user/images/thi-cong-ho-thuy-sinh-1.jpg" alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="carousel-item ">
            <div class="row">
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img
                      src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg"
                      alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Mua cá rồng và những điều cần biết</h4>
                    <p>Cá rồng là một trong những loài cá được rất nhiều người yêu thích bởi vẻ đẹp độc đáo và mang ý
                      nghĩa tâm linh, mang lại vận may, những điều tốt lành đến với gia chủ. Tuy nhiên, mua cá rồng cần
                      lưu ý những gì, mua ở đâu uy tín? là điều không phải ai cũng biết.</p>
                  </div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="row">
                  <div class="col-md-5">
                    <img
                      src="https://cakienghoanglam.com/thumb/225x220/1/upload/sanpham/ca-canh-bien-platinum-percula-clownfish.jpg"
                      alt="">
                  </div>
                  <div class="col-md-7">
                    <h4>Thi công hồ thủy sinh cần quan tâm những vấn đề gì?</h4>
                    <P>Bạn có nhu cầu thi công hồ thủy sinh? Bạn đang phân vân không biết nên bắt đầu thi công từ đâu?
                      Nên lựa chọn đơn vị thi công nào uy tín, đảm bảo chất lượng, làm việc chuyên nghiệp? Những thông
                      tin dưới đây của chúng tôi chắc chắn sẽ hữu ích dành cho bạn.</P>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="prev">
          <i class="bi bi-arrow-left"></i>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
          data-bs-slide="next">
          <i class="bi bi-arrow-right"></i>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </section>

  </div>

  <footer>
    <footer style="background-color: #faf9f7;" class="mt-3">
      <div class="container pt-3">
        <div class="row">
          <div class="col-md-4">
            <div class=" logo-footer">
              <img class="col-md-6 img-fluid"
                src="https://images.squarespace-cdn.com/content/v1/5cef069f124fff000125b347/1559169045380-V07V99DGIM6IQ01H0Z2U/gofish-logo.png"
                alt="">
            </div>
          </div>
          <div class="col-md mt-2">
            <h1 class="text-footer">CHĂM SÓC KHÁCH HÀNG</h1>
            <ul class="list-unstyled">
              <li><a href="" class="text-decoration-none">Trung Tâm Trợ Giúp</a></li>
              <li><a href="" class="text-decoration-none">Hướng Dẫn Mua Hàng</a></li>
              <li><a href="" class="text-decoration-none">Hướng Dẫn Bán Hàng</a></li>
              <li><a href="" class="text-decoration-none">Thanh Toán</a></li>
              <li><a href="" class="text-decoration-none">Vận chuyển</a></li>
              <li><a href="" class="text-decoration-none">Trả Hàng & Hoàn Tiền</a></li>
              <li><a href="" class="text-decoration-none">Chính Sách Bảo Hành</a></li>
            </ul>
          </div>
          <div class="col-md mt-2">
            <h1 class="text-footer">About Gofish</h1>
            <ul class="list-unstyled">
              <li><a href="" class="text-decoration-none">Giới thiệu về Gofish</a></li>
              <li><a href="" class="text-decoration-none">Tuyển dụng</a></li>
              <li><a href="" class="text-decoration-none">Điều khoản</a></li>
              <li><a href="" class="text-decoration-none">Chính sách bảo mật</a></li>
              <li><a href="" class="text-decoration-none">Kênh Người Bán</a></li>
              <li><a href="" class="text-decoration-none">Flash Sales</a></li>
            </ul>
          </div>
          <div class="col-md mt-2">
            <h1 class="text-footer">Theo dõi chúng tôi trên</h1>
            <ul class="list-unstyled">
              <li><a href=""><i class="bi bi-facebook text-primary"></i> Facebook</a></li>
              <li><a href=""><i class="bi bi-tiktok text-dark"></i>Tiktok</a></li>
              <li><a href=""><i class="bi bi-instagram text-info"></i>Instagram</a></li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </footer>
  <div class="mt-2" style="text-align: center;">
    <div class="col-md ms-5 me-5">
      <ul class="list-footer">
        <li>
          <p style="margin-top: 15px; display: inline-flex;">Gofish
            <span style="color: rgb(119, 108, 108) ;" class="footer-text">© 2021 </span>
          </p>
        </li>
        <li><a href="" class="text-decoration-none link-dark">About</a></li>
        <li><a href="" class="text-decoration-none link-dark">Acessibility</a></li>
        <li><a href="" class="text-decoration-none link-dark">User Agreement</a></li>
        <li><a href="" class="text-decoration-none link-dark">Privacy Policy</a></li>
        <li><a href="" class="text-decoration-none link-dark">Cookie Policy</a></li>
        <li><a href="" class="text-decoration-none link-dark">Copyright Policy</a></li>
        <li><a href="" class="text-decoration-none link-dark">Brand Policy</a></li>
        <li><a href="" class="text-decoration-none link-dark">Guest Controls</a></li>
        <li><a href="" class="text-decoration-none link-dark">Community Guidelines</a></li>
        <li><a href="" class="text-decoration-none link-dark">Guest Controls</a></li>
        <li><a href="" class="text-decoration-none link-dark">Language</a></li>
      </ul>
    </div>
  </div>
  <div id="hotline">
    <a href="tel:0366035523" id="yBtn">
      <i class="bi bi-telephone-fill"></i>
    </a>
    <div class="text-quotes">
      <a href="tel:0333135698">0366035523</a>
    </div>

  </div>
  <div id="messenger" style="width:20px">
    <i class="bi bi-messenger"></i>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script>
    // JS xử lý tổng tiền thanh toán
    $(document).ready(function () {
      $(".input").on('input', function () {
        var moneyString1 = $("#price").text();
        var money1 = parseInt(moneyString1);
        var number1 = document.getElementById('quantity1').value;
        number1 = parseInt(number1);

        if (Number.isNaN(number1)) {
          number1 = 0;
        }

        $("#item_price").text(money1 * number1);

      })

    });


  </script>
</body>

</html>