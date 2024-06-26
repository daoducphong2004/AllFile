<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bảng Đơn Hàng</h4>
                    <div class="table-responsive">

                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">id_user</th>
                                    <th class="border-top-0">Ngày đặt hàng</th>
                                    <th class="border-top-0">Ngày giao hàng</th>
                                    <th class="border-top-0">Địa Chỉ</th>
                                    <th class="border-top-0">SĐT</th>
                                    <th class="border-top-0">Họ tên</th>
                                    <th class="border-top-0">Hình Thức Thanh Toán</th>
                                    <th class="border-top-0">Tổng</th>
                                    <th class="border-top-0">Trạng Thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (showalldh() as $key) :
                                    $sua = 'index.php?act=formfixdh&id=' . $key['id'];
                                    $ctdonhang = "index.php?act=ctdonhang&id_dh=" . $key['id'];
                                    $huy = 'index.php?act=huydh&id=' . $key['id'];
                                ?>
                                <tr>
                                    <td><?php echo $key['id'] ?></td>
                                    <td><?php echo $key['id_user'] ?></td>
                                    <td><?php echo $key['ngaydathang'] ?></td>
                                    <td><?php echo $key['ngaygiaohang'] ?></td>
                                    <td><?php echo $key['address'] ?></td>
                                    <td><?php echo $key['phone']?></td>
                                    <td><?php echo $key['hoten'] ?></td>
                                    <td><?php echo $key['pay'] ?></td>
                                    <td><?php echo number_format($key['tong'], 0, ',', '.')?>.000 VNĐ</td>
                                    <td><?php echo $key['trangthai'] ?></td>
                                    <td>
                                        <a href="<?php echo $ctdonhang ?>"><input class='btn btn-primary' type="submit"
                                                value="Chi Tiết"></a>
                                        <?php if($key['trangthai']!="Đã hủy"&&$key['trangthai']!="Đã giao hàng"){?>
                                        <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit"
                                                value="Sửa"></a>
                                        <a href="<?php echo $huy ?>"><input class='btn btn-primary'
                                                style="background-color:red;" type="submit" value="Hủy"></a>
                                        <?php }; ?>
                                    </td>
                                </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="index.php?act=formadddh"><input type="submit" class="btn btn-primary" value="Thêm"></a>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->