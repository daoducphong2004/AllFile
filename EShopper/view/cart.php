    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Giỏ Hàng</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Giỏ Hàng</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>Sản Phẩm</th>
                            <th>Giá</th>
                            <th>Ảnh</th>
                            <th>Màu</th>
                            <th>Size</th>
                            <th>Số Lượng</th>
                            <th>Tổng</th>
                            <th>Xóa</th>
                            <th>Cập Nhật</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        <?php
                        $id = $_SESSION["user"]['id'];
                        $total = 0;
                        foreach (showcart($id) as $key):
                            $productPrice = $key['price'] * $key['quantity'];
                            $total += $productPrice;
                            $pv = showonepvbyid($key['id_variants']);
                        ?>
                        <tr>
                            <form action="index.php?act=quantityspincart" method="post">
                                <td class="align-middle"><?php echo $key['name'] ?></td>
                                <td class="align-middle"><?php echo intval($key['price'])?>.000 VNĐ</td>
                                <td class="align-middle"><img width=50px src="adminduanmau/<?php echo $key['img']?>"
                                        alt=""></td>
                                <td class="align-middle"><?php echo $pv[0]['color_name'] ?></td>
                                <td class="align-middle"><?php echo $pv[0]['size_name'] ?></td>
                                <td class="align-middle">
                                    <div class="input-group quantity mx-auto">
                                        <input type="hidden" name="id" value='<?php echo $key['id'] ?>'>
                                        <input type="number" max='<?php echo $key['slsp']?>' name='quantity'
                                            class="form-control form-control-sm bg-secondary text-center"
                                            value="<?php echo $key['quantity'] ?>">
                                    </div>
                                </td>

                                <td class="align-middle"><?php
                                                                $total = $key['quantity'] * $key['price'];
                                                                echo $key['quantity'] * $key['price'] ?>.000 VNĐ</td>
                                <td class="align-middle"><a
                                        href="index.php?act=xoaspincart&id=<?php echo $key['id'] ?>"><i
                                            class=" fa fa-times"></i></a></td>
                                <td class="align-middle"><a
                                        href="index.php?act=quantityspincart&id=<?php echo $key['id'] ?>"><input
                                            class="btn" value="Cập nhật" type="submit"></i></a></td>
                        </tr>
                        </form>
                        <?php
                        endforeach ?>

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <form class="mb-5" action="">
                    <div class="input-group">
                        <input type="text" class="form-control p-4" placeholder="Mã Giảm Giá">
                        <div class="input-group-append">
                            <button class="btn btn-primary">Áp Dụng</button>
                        </div>
                    </div>
                </form>
                <?php
                $id = $_SESSION["user"]['id'];
                $total = 0;
                foreach (showcart($id) as $key) :
                    $productPrice = $key['price'] * $key['quantity'];
                    $total += $productPrice;
                endforeach;
                ?>
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Tạm Tính Giỏ Hàng</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Tạm Tính</h6>
                            <h6 class="font-weight-medium"><?php echo number_format($total, 0, ',', '.'); ?>.000 VNĐ
                            </h6>
                        </div>
                        <div class="d-flex justify-content-between">
                            <h6 class="font-weight-medium">Phí Vận Chuyển</h6>
                            <h6 class="font-weight-medium">10.000 VNĐ</h6>
                        </div>
                    </div>
                    <div class="card-footer border-secondary bg-transparent">
                        <div class="d-flex justify-content-between mt-2">
                            <h5 class="font-weight-bold">Tổng Cộng</h5>
                            <?php $total+=10;?>
                            <h5 class="font-weight-bold"><?php echo number_format($total, 0, ',', '.')?>.000 VNĐ
                            </h5>
                        </div>
                        <a href="index.php?act=formcheckout"><button class="btn btn-block btn-primary my-3 py-3">Tiến
                                Hành Thanh Toán</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->