    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Chi Tiết Sản Phẩm</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Trang Chủ</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Chi Tiết Sản Phẩm</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5 pb-5">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner border">
                        <div class="carousel-item active">
                            <img class="w-100 h-100" src="adminduanmau/<?=$onesp[0]['img']?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="adminduanmau/<?=$onesp[0]["img"]?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="adminduanmau/<?=$onesp[0]["img"]?>" alt="Image">
                        </div>
                        <div class="carousel-item">
                            <img class="w-100 h-100" src="adminduanmau/<?=$onesp[0]["img"]?>" alt="Image">
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-7 pb-5">
                <h3 class="font-weight-semi-bold"><?=$onesp[0]['name']?></h3>
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(<?php
                                            $sldg = countdh($onesp[0]['id']);
                                            echo ($sldg[0]['sldg']);
                                            ?> Đánh giá)</small>
                </div>
                <?php  $integerValue = intval($onesp[0]['price']);?>
                <h3 class="font-weight-semi-bold mb-4"><?=$integerValue?>.000 VNĐ</h3>
                <p class="mb-4"><?=$onesp[0]['des']?></p>
                <form method="POST" action="index.php?act=addsptocart">
                    <input type="hidden" name="id_product" value="<?php echo $onesp[0]['id']?>">
                    <div class="d-flex mb-3">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Sizes:</p>
                        <?php
                    $pv = showpbbyid($onesp[0]['id']);
                    $temp = 1;
                    $printedSizeNames = array();
                    foreach ($pv as $key) :
                        if (!in_array($key['size_name'], $printedSizeNames)) {
                    ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" value="<?php echo $key['size_name'] ?>"
                                id="size-<?php echo $temp ?>" name="size">
                            <label class="custom-control-label"
                                for="size-<?php echo $temp ?>"><?php echo $key['size_name'] ?></label>
                        </div>
                        <?php
                        $printedSizeNames[] = $key['size_name'];
                        $temp++;
                    }
                  
                    endforeach ?>
                    </div>
                    <div class="d-flex mb-4">
                        <p class="text-dark font-weight-medium mb-0 mr-3">Colors:</p>
                        <?php
                    $pv = showpbbyid($onesp[0]['id']);
                    $temp = 1;
                    $printedSizeNames = array();
                    foreach ($pv as $key) :
                        if (!in_array($key['color_name'], $printedSizeNames)) {
                    ?>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" class="custom-control-input" value="<?php echo $key['color_name'] ?>"
                                id="color-<?php echo $temp ?>" name="color">
                            <label class="custom-control-label"
                                for="color-<?php echo $temp ?>"><?php echo $key['color_name'] ?></label>
                        </div>
                        <?php
                             $printedSizeNames[] = $key['color_name'];
                             $temp++;
                            }
                      
                    endforeach ?>
                    </div>
                    <div class="d-flex align-items-center mb-4 pt-2">
                        <button type="submit" name='submit' class="btn btn-primary px-3"><i
                                class="fa fa-shopping-cart mr-1"></i>Thêm Vào Giỏ Hàng</button>
                    </div>
                </form>

                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-2">Bình Luận</a>
                    <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-3">Đánh Giá(<?php
                                                                                            $sldg = countdh($onesp[0]['id']);
                                                                                            echo ($sldg[0]['sldg']);
                                                                                            ?>)</a>
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-2">
                        <h4 class="mb-3">Bình Luận</h4>
                        <div class="row">
                            <div class="container">
                                <ul class="list-group">
                                    <?php
                                $id_product = $onesp[0]['id'];
                                if (isset($_SESSION['user'])) {
                                    $id_user = $_SESSION['user']['id'];
                                }
                                foreach (showblbysp($id_product) as $key) :
                                ?>
                                    <ul class="list-group">

                                        <li class="list-group-item">
                                            <span class="text-primary"><?php echo $key['hoten'] ?></span>
                                            <span class="text-muted"><?php echo $key['noidung'] ?></span>
                                            <br>
                                            <small class="text-gray"><?php echo $key['ngaydang'] ?></small>
                                            <?php
                                            if(isset($_SESSION['user'])){
                                            if ($_SESSION['user']['id'] == $key['id_user']||$_SESSION['user']['vaitro'] == "nhanvien" || $_SESSION['user']['vaitro'] == "admin"){
                                                echo  '<a href="#" data-toggle="dropdown"><i class=" fas fa-angle-down"></i><span class="caret"></span></a>
                                                <ul style="border-radius:10px;" class="dropdown-menu">
                                                <li  style="display: flex;justify-content:center;"><a href="index.php?act=xoabl&id_bl=' . $key['id'] . '&id_product=' . $key['id_product'] . '">Xóa bình luận</a></li>
                                            </ul>';
                                            }
                                        }
                                            ?>
                                        </li>
                                    </ul>
                                    <?php endforeach ?>
                                </ul>

                                </ul>
                                <?php
                            if (isset($_SESSION['user'])) :
                            ?>
                                <form action="index.php?act=upcomment" method="post">
                                    <input type="hidden" name="id_product" value="<?php echo $onesp[0]['id'] ?>">
                                    <input type="hidden" name="id_user" value="<?php echo $_SESSION['user']['id'] ?>">
                                    <div class="form-group">
                                        <label for="noidung">Nội dung</label>
                                        <textarea class="form-control" id="noidung" name="noidung" rows="3"></textarea>
                                    </div>
                                    <button type="submit" name='submit' class="btn btn-primary">Gửi</button>
                                </form>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="tab-pane-3">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="mb-4"><?php echo countdh($onesp[0]['id'])[0]['sldg'];?> Đánh giá cho
                                    "<?php echo $onesp[0]['name'] ?>"</h4>
                                <?php foreach (showdgbysp($onesp[0]['id'])as $key) : ?>
                                <div class="media mb-4">
                                    <div class="media-body">
                                        <h6><?php echo $key['tennguoidanhgia'] ?> <small> -
                                                <i><?php echo $key['ngaydang'] ?></i></small></h6>
                                        <div class="text-primary mb-2">
                                            <?php for ($i = 0; $i < $key['star']; $i++) : ?>
                                            <i class="fas fa-star"></i>
                                            <?php endfor; ?>
                                            <?php if ($key['star'] != (int)$key['star']) : ?>
                                            <i class="fas fa-star-half-alt"></i>
                                            <?php endif; ?>
                                            <?php for ($i = 0; $i < 5 - ceil($key['star']); $i++) : ?>
                                            <i class="far fa-star"></i>
                                            <?php endfor; ?>
                                        </div>
                                        <p><?php echo $key['noidung'] ?></p>
                                    </div>
                                </div>
                                <?php endforeach ?>
                            </div>
                            <div class="col-md-6">
                                <form action='index.php?act=dangdg' method='POST'>
                                    <h4 class="mb-4">Thêm đánh giá</h4>
                                    <small>Email của bạn sẽ không được công bố. Các trường bắt buộc được đánh dấu
                                        *</small>
                                    <div class="d-flex my-3">
                                        <p class="mb-0 mr-2">Đánh giá của bạn * :</p>
                                        <div class="text-primary">
                                            <div class="rating">
                                                <input type="radio" id="star5" name="rating" value="5">
                                                <label for="star5">5 sao</label>
                                                <input type="radio" id="star4" name="rating" value="4">
                                                <label for="star4">4 sao</label>
                                                <input type="radio" id="star3" name="rating" value="3">
                                                <label for="star3">3 sao</label>
                                                <input type="radio" id="star2" name="rating" value="2">
                                                <label for="star2">2 sao</label>
                                                <input type="radio" id="star1" name="rating" value="1">
                                                <label for="star1">1 sao</label>
                                            </div>

                                        </div>
                                    </div>

                                    <input type="hidden" name="id_product" value='<?php echo $id_product ?>'>
                                    <div class="form-group">
                                        <label for="message">Đánh giá của bạn *</label>
                                        <textarea id="message" name='noidung' cols="30" rows="5"
                                            class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <?php
                                    if (isset($_SESSION['err'])) :
                                        echo '<div class="form-group alert alert-danger" id="error">';
                                        echo $_SESSION['err'];
                                    ?>
                                    </div>

                                    <?php endif ?>
                            </div>
                            <div class="form-group mb-0">
                                <input type="submit" value="Thêm đánh giá của bạn" name="submit"
                                    class="btn btn-primary px-3">
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Shop Detail End -->


    <!-- Products Start -->
    <div class="container-fluid py-5">
        <div class="text-center mb-4">
            <h2 class="section-title px-5"><span class="px-2">Sản Phẩm Cùng Loại</span></h2>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel related-carousel">
                    <?php
                     foreach($sp_cung_loai as $spcl){
                        extract($spcl);
                        $integerValue = intval($price);
                        $linksp="index.php?act=sanphamct&idsp=".$id;
                        echo ' <div class="card product-item border-0">
                        <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                            <img class="img-fluid w-100" src="adminduanmau/'.$img.'" alt="">
                        </div>
                        <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                            <h6 class="text-truncate mb-3">'.$name.'</h6>
                            <div class="d-flex justify-content-center">
                                <h6>'.$integerValue.'.000 VNĐ</h6><h6 class="text-muted ml-2"><del>$123.00</del></h6>
                            </div>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-light border">
                        <a href="'.$linksp.'" class="btn btn btn-block text-dark p-0">
                         <i class="fas fa-eye text-primary mr-1"></i>Xem Chi Tiết
                        </a>
                    </div>
                    </div>';
                     }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->