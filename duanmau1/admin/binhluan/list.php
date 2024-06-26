<div class="row">
  <div class="row mb formtitle">
    <h1>Danh sách bình luận</h1>
  </div>
  <div class="row formcontent">
    <div class="row mb10 formdanhsach">
      <table>
        <tr>
          <th></th>
          <th>ID bình luận</th>
          <th>ID sản phẩm</th>
          <th>Tên Sản Phẩm</th>
          <th>Tên khách hàng</th>
          <th>Nội Dung</th>
          <th>Ngày Bình Luận</th>
          <th></th>
        </tr>
        <?php
        foreach (dsbl() as $tk) :
        ?>
          <?php
          $xoabl = 'index.php?act=xoabl&id=' . $tk['idbl'];
          ?>
          <tr>
            <td><input type="checkbox" name="" id=""></td>
            <td><?php echo $tk['idbl'] ?></td>
            <td><?php echo $tk['idsp'] ?></td>
            <td><?php echo $tk['tensp'] ?></td>
            <td><?php echo $tk['tenkh'] ?></td>
            <td><?php echo $tk['Nd'] ?></td>
            <td><?php echo $tk['nbl'] ?></td>
            <td>
              <a href="<?php echo $xoabl ?>"><input type="submit" value="Xoá"></a>
            </td>
          </tr>
        <?php endforeach ?>
      </table>
    </div>

    <div class="row mb20">
      <input type="button" value="Chọn Tất cả">
      <input type="button" value="Bỏ chọn tất cả">
      <input type="button" value="Xoá tất cả các sản phẩm đã chọn">
      <a href="index.php?act=addsp"> <input type="button" value="Nhập Thêm"></a>
    </div>
  </div>
</div>