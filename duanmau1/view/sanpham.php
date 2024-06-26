<div class="row mb ">
    <div class="boxtrai mr ">
        <div class="row ">
            <?php
            $i = 0;
            foreach ($allsp as $sp) :
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
                        <p><?php echo $sp['name'] ?></p>
                    </a>
                </div>

            <?php endforeach ?>
        </div>
    </div>

</div>