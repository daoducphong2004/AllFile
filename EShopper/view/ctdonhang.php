<div class="container">
    <h5 class="title">Chi tiết đơn hàng</h5>
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Sản phẩm</h5>
                </div>
                <div class="card-content">
                    <div class="order-details">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="">Tên sản phẩm</th>
                                    <th class="">Hình</th>
                                    <th class="">Số lượng</th>
                                    <th class="">Size</th>
                                    <th class="">Color</th>
                                    <th class="">Giá</th>
                                    <th class="">Tạm tính</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                $sum = 0;
                $id_dh = $_GET["id_dh"];
                $dh = showonedh($id_dh);
                foreach (showchitietdh($id_dh) as $row) :
                  $sp = loadone_sanpham($row["id_product"]);
                  $pv = showonepvbyid($row["id_variants"]);
                ?>
                                <tr>
                                    <td><?php echo $sp[0]['name'] ?></td>
                                    <td><img src="adminduanmau/<?php echo $sp[0]['img'] ?>" width="50px" alt=""></td>
                                    <td><?php echo $row['soluong'] ?></td>
                                    <td><?php echo $pv[0]['color_name'] ?></td>
                                    <td><?php echo $pv[0]['size_name'] ?></td>
                                    <td><?php echo intval($sp[0]['price'])?>.000 VNĐ</td>
                                    <td><?php echo intval($row['total'])?>.000 VNĐ</td>
                                </tr>
                                <?php
                  $sum += $row['total'];
                endforeach ?>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <th>Trạng Thái:</th>
                                    <td><?php echo $dh[0]['trangthai'] ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- <div class="card-footer">
                </div> -->
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-6">
            <?php $dh = showonedh($id_dh); ?>
            <h3>Thông tin khách hàng</h3>
            <ul class="list-group">
                <li class="list-group-item">Họ tên: <?php echo $dh[0]['hoten'] ?></li>
                <li class="list-group-item">Địa chỉ: <?php echo $dh[0]['address'] ?></li>
                <li class="list-group-item">Điện thoại: <?php echo $dh[0]['phone'] ?></li>
            </ul>
        </div>
        <div class="col-xl-6">
            <h1>Hóa đơn</h1>
            <table class="table no-bordered">
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Giá</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tổng tiền</td>
                        <td><?php echo number_format($sum, 0, ',', '.') ?>.000 VNĐ</td>
                    </tr>
                    <tr>
                        <td>Phí vận chuyển</td>
                        <td>10.000 VNĐ</td>
                    </tr>
                </tbody>
                <tfoot>
                    <tr>
                        <td>Tổng cộng</td>
                        <?php $sum+=10; ?>
                        <td><?php echo number_format($sum, 0, ',', '.') ?>.000 VNĐ</td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <div class="row">
        <?php
     $dh = showonedh($id_dh);
     if ($dh[0]['trangthai']!='Đã hủy'&&$dh[0]['trangthai']!='Đã giao hàng'&&$dh[0]['trangthai']!="Đang giao hàng") : ?>
        <div class="col-xl-6">
            <a href="index.php?act=huydonhang&id_dh=<?php echo $id_dh ?>" class='btn btn-danger'>Huỷ Đơn Hàng</a>
        </div>
        <?php endif?>
    </div>
</div>
</div>