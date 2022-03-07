<?php include('constants.php'); ?>
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
    <title>Trang chủ</title>
</head>

<body>
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
                            <img src="<?php echo SITEURL; ?>assets/img/<?php echo $hinhAnh; ?>" class="img-fluid"
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
            <div class="col-md text-center text-muted bg-light mt-3">
                &copy;Nhom 10 3/2022
            </div>
        </footer>

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
</body>

</html>