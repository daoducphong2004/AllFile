<div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Bảng Liên Hệ</h4>
                                <div class="table-responsive">
                                    <table class="table user-table no-wrap">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0">#</th>
                                                <th class="border-top-0">Tên Khách Hàng</th>
                                                <th class="border-top-0">Email</th>
                                                <th class="border-top-0">Nội Dung</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                            foreach(loadalllienhe() as $key):
                                                $xoa='index.php?act=xoalh&id='.$key['id'];
                                            ?>
                                            <tr>
                                                <td><?php echo $key['id']?></td>
                                                <td><?php echo $key['name']?></td>
                                                <td><?php echo $key['email']?></td>
                                                <td><?php echo $key['message']?></td>
                                                <td>
                                                <a href="<?php echo $xoa?>"><input class='btn btn-primary' type="submit" value="Xóa"></a>
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