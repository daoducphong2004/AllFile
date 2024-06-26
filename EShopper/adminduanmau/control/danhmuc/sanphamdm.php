<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- column -->
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Bảng Sản Phẩm</h4>
                    <div class="table-responsive">
                        <table class="table user-table no-wrap">
                            <thead>
                                <tr>
                                    <th class="border-top-0">#</th>
                                    <th class="border-top-0">Tên sản phẩm</th>
                                    <th class="border-top-0">Giá</th>
                                    <th class="border-top-0">Số lượng</th>
                                    <th class="border-top-0">Hình ảnh</th>
                                    <th class="border-top-0">Ngày tạo</th>
                                    <th class="border-top-0">lượt xem</th>
                                    <th class="border-top-0">id danh mục</th>
                                    <th class="border-top-0">id user</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (showallspdm($id) as $key) :
                                    $sua = 'index.php?act=fixform&id=' . $key['id'];
                                    $xoa = 'index.php?act=xoasp&id=' . $key['id'];
                                ?>
                                    <tr>
                                        <td><?php echo $key['id'] ?></td>
                                        <td><?php echo $key['name'] ?></td>
                                        <td><?php echo $key['price'] ?></td>
                                        <td><?php echo $key['quantity'] ?></td>
                                        <td><img src="<?php echo $key['img'] ?>" width="81.91px" alt=""></td>
                                        <td><?php echo $key['ngaytao'] ?></td>
                                        <td><?php echo $key['luotxem'] ?></td>
                                        <td><?php echo $key['id_dm'] ?></td>
                                        <td><?php echo $key['id_user'] ?></td>
                                        <td>
                                            <a href='<?php echo $sua ?>'><input class='btn btn-primary' type="submit" value="Sửa"></a>
                                            <a href="<?php echo $xoa ?>"><input class='btn btn-primary' type="submit" value="Xoá"></a>
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
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->