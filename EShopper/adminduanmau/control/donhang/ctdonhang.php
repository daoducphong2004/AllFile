<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bảng Chi Tiết Đơn Hàng</h4>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">Tên sản phẩm</th>
                                    <th class="border-top-0">Hình</th>
                                    <th class="border-top-0">Số lượng</th>
                                    <th class="border-top-0">Size</th>
                                    <th class="border-top-0">Color</th>
                                    <th class="border-top-0">Giá</th>
                                    <th class="border-top-0">Tạm tính</th>

                                </tr>
                            </thead>
                            <?php
                              $sum = 0;
                              foreach (showchitietdh($id_dh) as $row) :
                              $dh = showonedh($row["id_donhang"]);  
                              $sp = showonesp($row["id_product"]);
                              $pv = showonepvbyid($row["id_variants"]);
                ?>
                            <tbody>
                                <tr>
                                    <td><?php echo $sp[0]['name'] ?></td>
                                    <td><img src="<?php echo $sp[0]['img'] ?>" width="50px" alt=""></td>
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
                                    <th class="border-top-0">Tổng</th>
                                    <td><?php echo number_format($sum, 0, ',', '.')?>.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <th class="border-top-0">Phí Phận Chuyển</th>
                                    <td>10.000 VNĐ</td>
                                </tr>
                                <?php $sum+=10 ?>
                                <tr>
                                    <th class="border-top-0">Tổng Cộng</th>
                                    <td><?php echo number_format($sum, 0, ',', '.')?>.000 VNĐ</td>
                                </tr>
                                <tr>
                                    <th class="border-top-0">Trạng Thái</th>
                                    <td><?php echo $dh[0]['trangthai']?></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->