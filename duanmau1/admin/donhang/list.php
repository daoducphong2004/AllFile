<div class="row mb">
  <div class=" mr">
    <div class="row mb">
      <div class="boxtitle">Đơn hàng đã đặt</div>
      <div class="row boxcontent cart-table">
        <style>
          table {
            border-collapse: collapse;
            width: 100%;
          }

          th,
          td {
            text-align: left;
            padding: 8px;
          }

          th {
            background-color: #4CAF50;
            color: white;
          }
        </style>
        <table style="width: 100%;">
          <tr>
            <th>Số thứ tự</th>
            <th>Họ Tên</th>
            <th>trạng thái</th>
            <th>ngày đặt hàng</th>
            <th>ngày giao hàng</th>
            <th>tổng tiền</th>
            <th>Chức Năng</th>
          </tr>
          <?php $temp = 0;
          $total = 0; //print_r(show_cart($iduser1));
          $product = showall_pay();
          // print_r($product);
          // print_r($product);
          foreach ($product as $sp) :

            $suadh = 'index.php?act=suadh&id=' . $sp['id'];
            $xoadh = 'index.php?act=xoadh&id=' . $sp['id'];
            // echo $temp;a
          ?>
            <tr>
              <td><?php echo $temp; ?></td>
              <td><?php echo $sp['name'] ?></td>
              <td><?php echo $sp['trangthai']; ?></td>
              <td><?php echo $sp['ngaydathang']; ?></td>
              <td><?php echo $sp['ngaygiaohang']; ?></td>
              <td><?php echo $sp['tongtien'] ?></td>
              <td>
                <a href='<?php echo $suadh ?>'><input type="submit" value="Sửa"></a>
                <a href="<?php echo $xoadh ?>"><input type="submit" value="Xoá"></a>
              </td>
            </tr>
          <?php $temp++;
          endforeach ?>
        </table>
      </div>
    </div>
  </div>

</div>
<?php

?>