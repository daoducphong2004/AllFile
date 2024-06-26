<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="row boxcontent cart-table ">
                <table style='width: 100%;'>
                    <tr>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                    </tr>
                    <?php
                    // $cart = show_idproincart();
                    // print_r($cart);
                    ?>
                    <?php
                    $total = 0; //print_r(show_cart($iduser1));
                    $product = show_cart($iduser1);
                    foreach ($product as $sp) :
                    ?>
                        <tr>
                            <form action="index.php?act=pay" method="post">
                                <td><img width="50%" style="display:flex;justify-content: center;" src="<?php echo substr($sp['img'], 3); ?>" alt=""></td>
                                <td><?php echo $sp['name']; ?></td>
                                <td><?php echo $sp['price']; ?></td>
                                <td>Qty:<?php echo $sp['quantity']; ?></td>
                            </form>
                        </tr>
                    <?php
                        $total += $sp['price'] * $sp['quantity'];
                        $_SESSION['total'] = $total;
                    endforeach ?>
                    <tr>
                        <td colspan="4" style='text-align: center;'>Tổng Cộng: <?php echo $total ?></td>
                    </tr>
                </table>
            </div>


            <div class="row boxcontent">
                <div class="boxtitle ">Đặt Hàng</div>
                <?php $user1 = showone_tk($iduser1);
                extract($user1[0]) ?>
                <form class="form-checkout" action="index.php?act=pay" method="post" style=" width: 100%;margin: 0 auto;">
                    <label style=" font-size: 16px;font-weight: bold;display: block; margin-bottom: 10px;" for="name">Họ Tên:</label>
                    <input style=" width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 14px;" type="text" id="name" name="name" required>

                    <label style=" font-size: 16px;font-weight: bold;display: block; margin-bottom: 10px;" for="email">Email:</label>
                    <input style=" width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 14px;" type="email" id="email" value="<?php echo $email ?>" name="email" required>

                    <label style=" font-size: 16px;font-weight: bold;display: block; margin-bottom: 10px;" for="address">Address:</label>
                    <input style=" width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 14px;" type="text" id="address" value="<?php echo $address ?>" name="address">

                    <label style=" font-size: 16px;font-weight: bold;display: block; margin-bottom: 10px;" for="tel">Telephone:</label>
                    <input class="mb" style=" width: 100%;border: 1px solid #ccc;padding: 10px;font-size: 14px;" type="tel" id="tel" value="<?php echo $tel ?>" name="tel">
                    <?php echo $err ?>
                    <button style=" width: 100%;background-color: #000;color: #fff;border: none;padding: 10px;font-size: 16px;cursor: pointer;" type="submit" name='pay'>Thanh Toán</button>
                </form>
            </div>
        </div>
    </div>

    <div class="boxphai">
        <?php include('view/boxright.php'); ?>
    </div>
</div>
<?php

?>