<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Giỏ Hàng</div>
            <div class="row boxcontent cart-table">
                <table>
                    <tr>
                        <th>Số thứ tự</th>
                        <th>Hình</th>
                        <th>Sản Phẩm</th>
                        <th>Đơn Giá</th>
                        <th>Số Lượng</th>
                        <th>Thành Tiền</th>
                        <th>Thao Tác</th>
                    </tr>
                    <?php
                    if (isset($iduser1)) {
                        $temp = 0;
                        $total = 0;

                        // Display the cart items
                        $product = show_cart($iduser1);
                        foreach ($product as $sp) {
                    ?>
                            <tr>
                                <form action="index.php?act=cart" method="post">
                                    <input type="hidden" name="idcart" value="<?php echo $sp['id']; ?>">
                                    <td><?php echo ++$temp; ?></td>
                                    <td><img width="100%" style="display:flex;justify-content: center;" src="<?php echo substr($sp['img'], 3); ?>" alt=""></td>
                                    <td><?php echo $sp['name']; ?></td>
                                    <td><?php echo $sp['price']; ?></td>
                                    <td><input type="number" value="<?php echo $sp['quantity']; ?>" name='quantity'></td>
                                    <td><?php echo $sp['price'] * $sp['quantity']; ?></td>
                                    <td>
                                        <input type="submit" name='fixquantity' value="Update">
                                        <input type="submit" name='deletecart' value="Xoá">
                                    </td>
                                </form>
                            </tr>
                    <?php

                            $total += $sp['price'] * $sp['quantity'];
                        }

                        // Set the total session variable
                        $_SESSION['total'] = $total;
                    } else {
                        echo "Vui Lòng đăng nhập để dùng chức năng này";
                    }
                    ?>
                    <tr>
                        <td colspan="6">Tổng Cộng: <?php if (isset($total)) echo $total ?></td>
                        <td><a href="index.php?act=pay"><button>Đặt Hàng</button></a></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
    <div class="boxphai">
        <?php include('view/boxright.php'); ?>
    </div>
</div>
<?php

?>