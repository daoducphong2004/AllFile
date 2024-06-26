<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bảng Bình Luận</h4>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên người bình luận</th>
                                    <th class="border-top-0">Tên sản phẩm</th>
                                    <th class="border-top-0">Nội dung</th>
                                    <th class="border-top-0">Ngày Đăng</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (showallbl() as $key) :
                                    $sua = 'index.php?act=fixformbl&id=' . $key['id'];
                                    $xoa = 'index.php?act=xoabl&id=' . $key['id'];
                                ?>
                                <tr>
                                    <td><?php echo $key['id'] ?></td>
                                    <td><?php echo $key['tennguoibinhluan'] ?></td>
                                    <td><?php echo $key['tensanpham'] ?></td>
                                    <td><?php echo $key['noidung'] ?></td>
                                    <td><?php echo $key['ngaydang'] ?></td>
                                    <td>
                                        <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit"
                                                value="Sửa"></a>
                                        <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit"
                                                value="Xoá"></a>
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
    <a href="index.php?act=formaddbl"><input type="submit" class="btn btn-primary" value="Thêm"></a>
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->