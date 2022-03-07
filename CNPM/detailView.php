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
  <header class='text-center' style='font-size:40px;color:red'>Đây là header</header>
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


                <p class="mt-3" id="price">Tổng Tiền: <span id="item_price"><?php echo $price ?></span></p>

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
  <footer class='text-center mt-3' style='font-size:40px;color:red'>Đây là footer</footer>

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