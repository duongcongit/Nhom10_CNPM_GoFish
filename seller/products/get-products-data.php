<?php
include "../../config/constants.php";

if (isset($_POST['tableID'])) {
    $page = $_POST['page'];
    $numRow = $_POST['numRow'];
    $sortBy = $_POST['sortBy'];

    $sqlTotalRow    = "SELECT * FROM products WHERE userID = '{$_SESSION['userID']}'";
    $totalRow       = $conn->query($sqlTotalRow)->num_rows;
    $numPage        = ceil($totalRow / $numRow);
    $start          = ($page - 1) * $numRow;
    $sql            = $sqlTotalRow . " ORDER BY $sortBy" . " LIMIT $start, $numRow";
    $result         = $conn->query($sql);


    if ($totalRow > 0) {
?>
        <?php
        $i = $start;
        while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
                <!-- <td><? //= $row['maTour']; 
                            ?></td> -->
                <td class="row">
                    <div style="max-width: fit-content;">
                        <img src="../issets/img/<?= $row['image']; ?>" alt="" class="product-avatar-list">
                    </div>

                    <div class="col row d-flex align-items-center">
                        <?php
                        if ($row['status'] == 1 and $row['stock'] > 0) {
                        ?>
                            <div class="col-md-12 produc-status-active">
                                Đang hoạt động
                            </div>
                        <?php
                        }
                        if ($row['status'] == 1 and $row['stock'] == 0) {
                        ?>
                            <div class="col-md-12 produc-status-out">
                                Hết hàng
                            </div>
                        <?php
                        }
                        if ($row['status'] == 3) {
                        ?>
                            <div class="col-md-12 produc-status-locked">
                                Bị khóa
                            </div>

                        <?php
                        }
                        ?>
                        <div class="col-md-12">
                            <b><?= $row['productName']; ?></b>
                        </div>
                    </div>
                </td>
                <td><?= $row['productSKU'];?></td>
                <td><?= $row['category']; ?></td>
                <td><?= $row['price']; ?>đ</td>
                <td><?= $row['stock']; ?>
                    <?php
                    if ($row['status'] == 3) {
                    ?>
                        <i class="bi bi-pencil-fill fs-6 text-muted" style="cursor:not-allowed;"></i>

                    <?php
                    } else {
                    ?>
                        <i class="bi bi-pencil-fill text-danger fs-6 edit-stock" type="button"></i>
                    <?php
                    }
                    ?>
                </td>
                <td><?= $row['sold']; ?></td>
                <td>
                    <?php
                    if ($row['status'] == 3) {
                    ?>
                        <i class="bi bi-pencil-square fs-5 text-muted" style="cursor:not-allowed;"></i>

                    <?php
                    } else {
                    ?>
                        <a href="./edit-product.php?producid=98234649356" class="bi bi-pencil-square fs-5"></a>
                    <?php
                    }
                    ?>

                </td>
            </tr>
        <?php
        }
    } else {
        ?>
        <div class="col-md-12 h-50 d-flex flex-column justify-content-center align-items-center">
            <i class="bi bi-binoculars text-muted" style="font-size: 80px;"></i>
            <p class="text-muted fs-3">Chưa có dữ liệu</p>
        </div>


<?php
    }
    //



    //
}


?>