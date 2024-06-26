<div class="row mb">
    <div class="boxtrai mr">
        <div class="row mb">
            <div class="boxtitle">Đơn hàng đã đặt</div>
            <div class="row boxcontent cart-table">
                <table style="width: 100%;">
                    <tr >
                        <th>Số thứ tự</th>
                        <th colspan='3'>Họ Tên</th>
                        <th>trạng thái</th>
                        <th>ngày đặt hàng</th>
                        <th>ngày giao hàng</th>
                        <th>tổng tiền</th>
                        <th>Chức Năng</th>
                    </tr>
                    <?php $temp = 0;
                    $total = 0; //print_r(show_cart($iduser1));
                    $product = show_pay($iduser1);
// print_r($product);
                    


                    // print_r($product);
                    foreach ($product as $sp) :
                        
                        $xoadh = 'index.php?act=huydonhang&id='.$sp['id'] ;
                        // echo $temp;
                    ?>
                        <tr>
                            <td><?php echo $temp; ?></td>
                            <td colspan='3'><?php echo $sp['name'] ?></td>
                            <td><?php echo $sp['trangthai']; ?></td>
                            <td><?php echo $sp['ngaydathang']; ?></td>
                            <td><?php echo $sp['ngaygiaohang']; ?></td>
                            <td><?php echo $sp['tongtien'] ?></td>
                            <td>
                                <a href="<?php echo $xoadh ?>"><input type="submit" value="Huỷ đơn hàng"></a>
                            </td>
                        </tr>
                    <?php $temp++;
                    endforeach ?>
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