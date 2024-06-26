<div class="row mb ">
    <div class="boxtrai mr ">
        <div class="row">
            <div class="banner">
                <?php include 'slider.html' ?>
            </div>
        </div>
        <div class="row ">
            <?php
            $i = 0;
            foreach ($spnew as $sp) :
            ?>
                <?php if (($i == 2) || ($i == 5) || ($i == 8)) {
                    $mr = "";
                } else {
                    $mr = "mr";
                }
                ?>
                <div class="boxsp <?php echo $mr ?>">
                    <a href="index.php?act=sanphamct&id=<?php echo $sp['id'] ?>">
                        <div class="img">
                            <?php $img = substr($sp['img'], 3);
                            ?>
                            <img src="<?php echo $img ?>" alt="">
                        </div>
                        <p><strong><?php echo $sp['price'] ?></strong></p>
                        <div class="spname" style="overflow: hidden;text-overflow: ellipsis;max-length: 20;">
                        <p><?php echo $sp['name'] ?></p>
                        </div>
                    </a>
                    <div class="row btnaddtocart">
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
            <?php endforeach ?>
        </div>
    </div>
    <div class="boxphai">
        <?php include('view/boxright.php'); ?>
    </div>
</div>