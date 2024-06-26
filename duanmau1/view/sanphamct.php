<div class="boxtrai mr ">
    <?php
    if (isset($_GET['id']) && ($_GET['id'] > 0)) {
        $sp = showone_sp($_GET['id']);
        extract($sp);
    }
    ?>
    <div class="row mb">
        <div class="boxtitle">Sản Phẩm</div>
        <div class="row boxcontent ">
            <div class="product-detail">
                <div class="product-image">
                    <img src="<?php echo substr($img, 3) ?>" alt="">
                </div>
                <div class="product-info">
                    <h1><?php echo $name ?></h1>
                    <p><?php echo $mota ?></p>
                    <h2><?php echo $price ?></h2>
                    <form action="index.php?act=addtocart" method="post">
                            <input type="hidden" name="id" value="<?php echo $sp['id'] ?>">
                            <input type="hidden" name="name" value="<?php echo $sp['name'] ?>">
                            <input type="hidden" name="img" value="<?php echo $img ?>">
                            <input type="hidden" name="price" value="<?php echo $sp['price'] ?>">
                            <input type="number" name="quantity" value="1"  step="1" min="1" id="">
                            <input type="submit" name='addtocart' value="thêm vào giỏ hàng">
                    </form>
                </div>
            </div>
        </div>
         <!-- jquery -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
        <script>
            $(document).ready(function() {
                    $("#binhluan").load("view/binhluan/blform.php", {idpro:<?php echo $id ?>});
            });
        </script>



            <!-- endjquery -->
        <div class="row" id='binhluan'>
            <!-- <div class="boxtitle">bình luận</div>
            <div class="row boxcontent">
                <iframe src="view/binhluan/blform.php?idpro=<?php //echo $id ?>" frameborder="0" width="100%" height="100px"></iframe>
            </div> -->
        </div>
        <div class="row mb">
            <div class="boxtitle">sản phẩm cùng loại</div>
            <div class="row boxcontent">
                <ul class="danh-sach-san-pham">
                    <?php
                    $allspcungloai = show_sp_cungloai($id, $iddm);
                    foreach ($allspcungloai as $sp) : ?>
                        <li class="san-pham">
                            <a href="index.php?act=sanphamct&id=<?php echo $sp['id'] ?>">
                                <div class="hinh-anh-san-pham">
                                    <?php $img = substr($sp['img'], 3);
                                    ?>
                                    <img src="<?php echo $img ?>" alt="">
                                </div>
                                <p class="ten-san-pham"><?php echo $sp['name'] ?></p>
                            </a>
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
        </div>
    </div>
</div>
</div>
<div class="boxphai">
    <?php include('view/boxright.php'); ?>
</div>
</div>