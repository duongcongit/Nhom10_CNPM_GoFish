<?php include('config/constants.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="assets/css/index.css">
  <title>Trang chủ</title>
</head>

<body>
<header>
        <div class="header-top container-fluid">
            <div class="wrapper ms-5 me-3">
                <div class="initial ms-5 pe-2">
                    <a href="seller.php">Kênh người bán</a>
                </div>
                <div class="initial ms-2 pe-2">
                    <a href="">Tải ứng dụng</a>
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
        <div class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-logo ms-5" href="index.php">
                    <button type="button" class="btn btn-light ms-2">
                        <img src="assets/img/gofish-logo.png"
                            alt="">
                    </button>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon" style="color: #000;"></span>
                </button>
                <div class="collapse navbar-collapse ms-5" id="navbarSupportedContent">
                    <div class="search ms-5" style="display: inline;">
                        <div style="display: inline-flex;">
                            <span class="input-group-text" id="addon-wrapping"><i class="bi bi-search"></i></span>
                            <input type="text" class="form-control p-3" placeholder="Search for fish, product...">
                        </div>
                    </div>
                    <li class="nav-item dropdown ms-5" style="border-right: 1px solid rgb(238, 221, 221);">
                        <a class="nav-link me-2" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            <div class="text-nav">
                                <i class="bi bi-person-circle"></i> Tài khoản 
                                <i class="bi bi-caret-down-fill"></i>
                            </div>
                            </i>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 150px; text-align: center;">
                            <div class="login" style="border-bottom: 1px solid pink   ;">
                                <a href="login.php">Đăng nhập</a>
                            </div>
                            <div class="signup">
                                <a href="signup.php">Đăng Ký</a>
                            </div>

                        </ul>
                    </li>
                    <a href="" class="notifi ms-5">
                        <i class="bi bi-bell"></i> Thông báo
                    </a>
                    <a href="" class="cart ms-5">
                        <i class="bi bi-cart"></i> Giỏ hàng
                    </a>
                </div>
            </div>
        </div>

        <!-- Menu -->
        <div class="menu">
            <div class="wrapper container ms-5 me-5">
                <ul class="main-nav ms-5">
                    <li class="nav-item ms-5">
                        <a class="nav-link active" href="index.php">
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
                                <i class="bi bi-info-circle"></i> Hỗ trợ</div>
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
  <main>
    <!-- ITEM  -->
    <div class="container">
      <section class="pt-5" id="item">
        <div class="suggest">
          <p class="text-uppercase text-center">Đề Xuất</p>
          <h2 class="text-uppercase text-center">Cá</h2>
        </div>
        <div class="row">
          <?php 

                //Create SQL Query to Display CAtegories from Database
                $sql1 = "SELECT * from item";
                //Execute the Query
                $res1 = mysqli_query($conn, $sql1);
                //Count rows to check whether the category is available or not
                $count1 = mysqli_num_rows($res1);

                if($count1>0)
                {
                    //CAtegories Available
                    while($row=mysqli_fetch_assoc($res1))
                    {
                        //Get the Values like id, title, image_name
                        $id = $row['itemID'];
                        $type = $row['type'];
                        $hinhAnh = $row['itemImg'];
                        ?>

          <div class="col-lg-4 col-md-6 col-sm-12 mt-3 position-relative">
            <a href="<?php echo SITEURL; ?>detailView.php?id=<?php echo $id; ?> ">
              <?php 
                                    //Check whether Image is available or not
                                    if($hinhAnh=="")
                                    {
                                        //Display MEssage
                                        echo "<div class='error'>Image not Available</div>";
                                    }
                                    else
                                    {
                                        //Image Available
                                        ?>
              <img src="<?php echo SITEURL; ?>assets/img/products/<?php echo $hinhAnh; ?>" class="img-fluid"
                style="height:350px">
              <?php
                                    }
                                ?>


              <h3 class="text-light position-absolute text-center p-1 border border-primary rounded bg-dark"
                style="z-index:1;bottom:25px;transform: translateX(-50%);left:50%">
                <?php echo $type ?>
              </h3>
            </a>
          </div>


          <?php
                    }
                }
                else
                {
                    //Categories not Available
                    echo "<div class='error'>Category not Added.</div>";
                }
            ?>
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
      crossorigin="anonymous"></script>
</body>

</html>